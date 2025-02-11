<?php

use App\Models\Job;
use App\Mail\JobApplied;
use App\Models\Applicant;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Mail;
use GeminiAPI\Laravel\Facades\Gemini;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

new #[layout('components.usercomponent.appform-layout')]
 class extends Component {

    use WithFileUploads;
    
    public $first_name;
    public $middle_name;
    public $last_name;
    public $email;
    public $gender;
    public $birth_date;
    public $contact;
    public $address;
    public $nationality;
    public $religion;
    public $civil_status;
    public $resume;
    public $refered_by;
    public $job_position;
    public $terms;
    public $notif = false;
    public Job $job;

    public function mount(Job $job)
    {
        return $this->fill($job);
    }

    public function submit()
    {

        $validatedData = $this->validate([
            'first_name' => ['required','min:2'],
            'middle_name' => ['required','min:2'],
            'last_name' => ['required','min:2'],
            'email' => ['required','email','unique:applicants,email'],
            'gender' => ['required'],
            'birth_date' => ['required'],
            'contact' => ['required'],
            'address' => ['required'],
            'nationality' => ['required'],
            'religion' => ['required'],
            'civil_status' => ['required'],
            'resume' => ['required', File::types(['pdf'])],
            'refered_by' => ['nullable'],
            'terms' => ['required'],
        ]);

        $pdf = $this->resume->store('resumes', 'public');
        $validatedData['resume'] = $pdf;
        
        $validatedData['job_position'] = $this->job->title;
        $validatedData['department'] = $this->job->department;

        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile(public_path('storage/'.$pdf));
        $text = $pdf->getText();



        $requirements = $this->job->requirements;

        $res = "can you analyze this resume and check the skills that this resume has
              " .$text . " and analyze if the skills are fit and match with" . $requirements ." 
             and give me the percentage of the skills matches only the number of percentage. just give me a
              number of percentage of your calculation please and dont say any explanation I just need the number I dont need any explanation or label";

        $result = Gemini::geminiPro()->generateContent($res);

        $result2 = $result->text();

        $num = Str::remove('%',$result2);

        $validatedData['score'] = $num;

        // if($num < 50){
        //     $applicant = Applicant::create($validatedData);
        //     $this->dispatch('Application-completed');
        //     sleep(5);
        //     $this->redirect('/jobpost', navigate: true);
        // }else{
        //     $validatedData['status'] = 'candidate';
        //     $applicant = Applicant::create($validatedData);
        //     $this->dispatch('Application-completed');
        //     sleep(5);
        //     $this->redirect('/jobpost', navigate: true);
        // }

        if($num >= 50){
            $validatedData['status'] = 'candidate';
        }

        $applicant = Applicant::create($validatedData);
        $this->dispatch('Application-completed');
        // sleep(5);
        // $this->redirect('/jobpost', navigate: true);

        Mail::to($applicant->email)->send(
            new JobApplied($applicant)
        );


        
        
    }
    
}; ?>

<div class="bg-white rounded-xl" x-data="{terms: false}">
    {{-- <x-notification on="Application-completed" >
        <x-alert title="Application completed" positive solid />
    </x-notification> --}}
    
    <div class="flex flex-col items-center justify-center h-full p-3 text-md">
        <h1 class="self-center m-0 text-2xl font-bold text-black">Application Form</h1>
    <form wire:submit="submit">   <!-- FORM INPUT -->
        {{-- <fieldset class="flex p-4 border-2 w-fit"><!-- FIELD --> --}}
            {{-- <legend>PERSONAL DETAILS</legend> --}}
            <div class="text-black"><!-- MAIN DIV OF INPUTS -->
                <div class="items-center space-y-4 lg:space-x-5 lg:flex lg:flex-row sp">
                    <div class="space-y-4 md:flex rightform sp md:flex-col"><!-- FROM NAME TO CONTACTS -->
                        <div>
                            <label for="first_name">First Name</label>
                            <input wire:model="first_name" type="text"  class="inputs" placeholder="First Name" />
                            <x-input-error name="first_name" />
                        </div>
                        <div>
                            <label for="middle_name">Middle Name</label>
                            <input wire:model="middle_name" type="text" id="middle_name" name="middle_name" class="inputs w-[50%]" placeholder="Middle Name" />
                            <x-input-error name="middle_name" />
                        </div>
                        <div>
                            <label for="last_name">Last Name</label>
                            <input wire:model="last_name" type="text" id="last_name" name="last_name" class="inputs" placeholder="Last Name" />
                            <x-input-error name="last_name" />
                        </div>
                    </div>
                    <div class="space-y-4 leftform sp">
                        <div>
                            <label for="gender">Sex</label>
                            <select id="gender" wire:model='gender' name="gender" class="drop" placeholder="Gender">
                                {{-- <option value="" disabled selected>Gender</option> --}}
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <x-input-error name="gender" />
                        </div>
                        <div>
                            <label for="birthday">Birthday</label>
                            <input wire:model="birth_date" id="birthday" name="birthday" type="date" class="placeholder-gray-500 inputs" placeholder="Enter your birthday" />
                            <x-input-error name="birth_date" />
                        </div>
                        
                        <div>
                            <label for="contact">Contact</label>
                            <input wire:model="contact" id="contact" name="contact" type="tel" pattern="[0-9]{11}" placeholder="09xxxxxxxxx" class="inputs w-[70%]" />
                            <x-input-error name="contact" />
                        </div>
                    </div>
                </div>
                <div class="space-y-4 sp">
                    <!-- ADDRESS TO EMAIL -->
                    <div class="space-y-4">
                        <div>
                            <label for="address">Address:</label>
                            <input wire:model="address" type="text" id="address" name="address" class="inputs" placeholder="123 Main St" />
                            <x-input-error name="address" />
                        </div>
                        <div>
                            <label for="email">Email:</label>
                            <input wire:model="email"  id="email" name="email" class="inputs" placeholder="example@example.com" />
                            <x-input-error name="email" />
                        </div>
                    </div>
                </div>
                <div class="flex space-x-3 lg:flex-row mt-3">
                    <!-- NATIONALITY TO CIVIL -->
                    <div class="flex-1">
                        <label for="national">Nationality</label>
                        <input wire:model="nationality" type="text" id="national" name="national" class="inputs w-[50%]" placeholder="Your Nationality" />
                        <x-input-error name="nationality" />
                    </div>
                    <div class="flex-1">
                        <label for="civil_status">Civil Status</label>
                        <select wire:model="civil_status" id="civil" name="civil" class="drop">
                            <option value="">Civil Status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                        </select>
                        <x-input-error name="civil_status" />
                    </div>
                </div>
                <div class="flex flex-col space-x-3 lg:flex-row mt-3">
                    <!-- RELIGION TO RESUME -->
                    <div class="flex-1">
                        <label for="religion">Religion</label>
                        <select wire:model='religion' id="religion" name="religion" class="drop">
                            <option value="">Religion</option>
                            <option value="catholic">Catholic</option>
                            <option value="muslim">Muslim</option>
                            <option value="inc">Iglesia ni Cristo</option>
                            <option value="bornagain">Born Again</option>
                            <option value="atheist">Atheist</option>
                        </select>
                        <x-input-error name="religion" />
                    </div>    
                    <div class="flex-1 md:mt-3"
                        x-data="{ uploading: false, progress: 0 }"
                        x-on:livewire-upload-start="uploading = true"
                        x-on:livewire-upload-finish="uploading = false"
                        x-on:livewire-upload-cancel="uploading = false"
                        x-on:livewire-upload-error="uploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <label for="resume">Resume:</label>
                        <input type="file" wire:model="resume" id="resume" name="resume" />
                            <x-input-error name="resume" />
                            <div x-show="uploading">
                                Uploading...
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                    </div>      
                </div>
                <div class="mt-3">
                    <label for="referred_by">Referred by:</label>
                    <!-- REFERRED -->
                    <input wire:model="refered_by" type="text" id="referred_by" name="referred_by" class="inputs" placeholder="Referred Person" />
                    <x-input-error name="refered_by" />
                </div>
            </div>
        {{-- </fieldset> --}}
        <div class="flex items-center justify-between mt-2">
            <!-- LAST CONTAINER -->
            <div class="flex items-center">
                <button @click="terms = true"><x-checkbox  label="Terms and Condition" wire:model.live="terms" errorless /></button>
            </div>
            <x-button amber type="submit" class="p-2 text-black rounded-lg  h-fit" spinner="submit">Submit</x-button>
        </div>
    </form>
</div>
<x-stable-notif on="Application-completed" >
    <div class="bg-white w-80 lg:w-96  h-80 flex flex-col items-center justify-center gap-7 py-5 text-center rounded-md shadow-[rgba(0,_0,_0,_0.24)_0px_3px_8px]">
        <div class=" text-3xl font-bold animate-pulse  text-gray-700  w-36 h-36 rounded-full border-2 border-amber-500 flex justify-center items-center">
            Thanks!
        </div>
        <div class="text-gray-700">Application Submitted, <br> Goodluck! :D</div>
        <x-button label="back" amber href="/jobpost"/>
    </div>
</x-stable-notif>
<div wire:loading wire:target="submit"> 
    <div class="px-5 fixed bg-black/10 w-full top-0 left-0 h-screen flex justify-center items-center">
        <div class="bg-white w-80 lg:w-96 h-52 flex justify-center items-center rounded-md shadow-[rgba(0,_0,_0,_0.24)_0px_3px_8px]">
            <div class="text-3xl font-bold animate-pulse bg-gradient-to-r from-amber-300 to-amber-600 bg-clip-text text-transparent">Analyzing....</div>
        </div>
        
    </div>
</div>
<div x-show="terms" x-cloak  class="px-5 fixed bg-black/20 w-full top-0 left-0 h-screen flex justify-center items-center">
    <div @click.away="terms = false" class="bg-white  flex flex-col justify-between max-w-lg">
        <div class="flex items-center gap-2 px-5 py-4 ">
            <x-icon name="clipboard-document-list" color="blue" class="w-12 h-12" />
            <div>
                <div class="text-2xl text-gray-700">Terms and Conditions</div>
                <p class="text-gray-700">smol details</p>
            </div>
        </div>
        <x-terms />
        <div class="px-5 py-4 flex items-center justify-between gap-7">
            <x-button @click="terms = false" light  label="Decline" class="w-full"/>
            <x-button @click="terms = false" label="Accept" class="w-full"/>
        </div>
    </div>
</div>
</div>
