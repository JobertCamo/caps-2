<?php

use Carbon\Carbon;
use App\Mail\schedule;
use App\Models\Applicant;
use App\Models\Interview;
use Livewire\Volt\Component;
use Illuminate\Mail\Mailable;
use Livewire\Attributes\Layout;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Facades\Storage;

new #[layout('components.layout')]
 class extends Component {

    public $interview_date;
    public $location;
    public $interviewer;
    public $jo;
    public Applicant $applicant;
    
    public function mount(Applicant $applicant) 
    {
    //    return $this->fill($applicant);
       $this->applicant = $applicant->load('interviews');
       $this->jo = $applicant;

    }

    public function download($filepath)
    {
        $file = storage_path('app/public/' . $filepath);

        if(file_exists($file))
        {
            $downloadFilename = $this->applicant->first_name . $this->applicant->last_name . '.pdf';  
            return response()->download($file, $downloadFilename);
        }else
        {
            $this->dispatch('failed-download');
        }

        // dd($this->applicant->first_name);
    }
    
    public function store()
    {
        $validated = $this->validate([
            'interview_date' => ['required'],
            'location' => ['required'],
            'interviewer' => ['required'],
        ]);

        $validated['status'] = "scheduled";
        $interview = $this->applicant->interviews()->create($validated);
        
        $formattedDate = Carbon::parse($this->interview_date)
                            ->setTimezone('Asia/Manila')
                            ->format('F d, Y - h:i A');

        Mail::to($this->applicant->email)->send(
            new schedule($formattedDate, $this->location, $this->interviewer, $this->jo)
        );
        $this->reset('interview_date','location','interviewer');
        $this->dispatch('interview-sched');
    }
    
}; ?>

<div class="flex mb-16 lg:mb-0 md: justify-center pb-16">
    <x-notification on="interview-sched" >
        <x-alert title="Interview Schedule Completed!" positive solid />
    </x-notification>
    <x-notification on="failed-download" >
        <x-alert title="File not found." negative solid />
    </x-notification>
    <div class="container mx-auto px-4 py-8">
        <div class="p-6 rounded-lg shadow-lg max-w-5xl mx-auto bg-white text-black">
            <div class="space-y-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div>
                        <p class="text-2xl font-semibold text-black">Applicant Details</p>
                    </div>
                    <div class="flex space-x-4 mt-4 md:mt-0" x-data="{schedModal: false}">
                        <x-button amber href="{{ asset('storage/'. $applicant->resume) }}" target="_blank" class="p-2 bg-amber-500 text-black rounded hover:bg-amber-600 transition duration-300">See Resume</x-button>
                        <x-button @click="schedModal = true" amber type="button" class="p-2 bg-amber-500 text-black rounded hover:bg-amber-600 transition duration-300">Create Schedule</x-button>
                        <x-button spinner="download" wire:click="download('{{ $applicant->resume }}')" primary type="button" class="p-2 bg-amber-500 text-black rounded hover:bg-amber-600 transition duration-300">Download resume</x-button>
                        {{-- Schedule Modal --}}
                        <div x-cloak x-transition x-show="schedModal" class="absolute -left-4 inset-0 z-10 flex items-center justify-center bg-black/40">
                            <div @click.away="schedModal = false">
                                <x-modals.modal>
                                    <form wire:submit="store" class="flex flex-col mx-5 my-3 space-y-5">
                                        <h1 class="font-bold text-2xl text-amber-600">Schedule Interview</h1>
                                        <div class="flex flex-col justify-center items-center space-y-3 text-black">
                                            <x-datetime-picker
                                                wire:model.live="interview_date"
                                                label="Appointment Date"
                                                placeholder="Appointment Date"
                                            />
                                            <x-input wire:model="interviewer" label="Interviewer"/>
                                            <x-native-select
                                                wire:model='location'
                                                label="Location"
                                                placeholder="Select one status"
                                                :options="['Quezon City', 'Pasig City']"
                                            />
                                        </div>
                                        <div class="flex justify-end items-center m-2">
                                            <x-button type="submit" amber label="Submit" spinner="store"/>
                                        </div>
                                    </form>
                                </x-modals.modal>
                            </div>
                        </div>
                        {{-- Schedule Modal --}}
                    </div>
                </div>
                <div class="border-b-2">
                    <label class=" text-black">Name</label>
                    <p class="text-2xl font-bold p-2 bg-white text-black rounded">{{ $applicant->first_name . ' ' . $applicant->middle_name . ' ' . $applicant->last_name }}</p>
                </div>
                <div class="flex flex-col md:flex-row justify-between">
                    <div class="flex-grow border-b-2">
                        <label class="font-medium text-black">Email</label>
                        <p class="p-2 bg-white text-black rounded">{{ $applicant->email }}</p>
                    </div>
                    <div class="flex flex-col ml-0 md:ml-4 border-b-2 mt-4 md:mt-0">
                        <label class="font-medium text-black">Date Applied</label>
                        <p class="p-2 bg-white text-black rounded">{{ $applicant->created_at->format('F d, Y') }}</p>
                    </div>
                    <div class="flex flex-col ml-0 md:ml-4 border-b-2 mt-4 md:mt-0">
                        <label class="font-medium text-black">Schedule Interview</label>
                        <p class="p-2 bg-white text-black rounded" wire:poll>
                            @if (empty($applicant->interviews->first()))
                                No Schedule   
                            @else
                                {{ $applicant->interviews->first()->interview_date->setTimezone('Asia/Manila')->format('F d, Y - h:i A') }}
                            @endif
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="border-b-2">
                        <label class="font-medium text-black">Phone No</label>
                        <p class="p-2 bg-white text-black rounded">{{ $applicant->contact }}</p>
                    </div>
                    <div class="border-b-2">
                        <label class="font-medium text-black">Religion</label>
                        <p class="p-2 bg-white text-black rounded">{{ $applicant->religion }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div class="border-b-2">
                        <label class="font-medium text-black">Gender</label>
                        <p class="p-2 bg-white text-black rounded">{{ $applicant->gender }}</p>
                    </div>
                    <div class="border-b-2">
                        <label class="font-medium text-black">Birthday</label>
                        <p class="p-2 bg-white text-black rounded">{{ $applicant->birth_date }}</p>
                    </div>
                </div>
                <div class="border-b-2 mt-4">
                    <label class="font-medium text-black">Address</label>
                    <p class="p-2 bg-white text-black rounded">{{ $applicant->address }}</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div class="border-b-2">
                        <label class="font-medium text-black">Nationality</label>
                        <p class="p-2 bg-white text-black rounded">{{ $applicant->nationality }}</p>
                    </div>
                    <div class="border-b-2">
                        <label class="font-medium text-black">Civil Status</label>
                        <p class="p-2 bg-white text-black rounded">{{ $applicant->civil_status }}</p>
                    </div>
                </div>
            </div>
            {{-- Schedule Modal --}}
            
            {{-- Schedule Modal --}}
        </div>
    </div>
</div>

