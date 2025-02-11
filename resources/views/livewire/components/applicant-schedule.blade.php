<?php

use App\Models\Employee;
use App\Models\Applicant;
use App\Models\Interview;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Storage;

new class extends Component {
    
    public $applicant;
    public $status;
    public $feedback;
    public $feedbacks = '';
    public $interview_status = '';
    public $interview_id;
    public $filter;

    public function submit()
    {
        $validatedData = $this->validate([
            'status' => 'required',
            'feedback' => 'required|min:5',
        ]);

        $this->authorize('update', Applicant::class);

        Interview::findOrFail($this->interview_id)->update($validatedData);

        $this->reset('feedback', 'status');
        $this->dispatch('sched-notif');
    }

    public function delete(Applicant $applicant)
    {
        $this->authorize('delete', $applicant);

        $applicant->delete();
        $this->dispatch('delete-notif');

        if (Storage::exists($applicant->resume)) {
            Storage::delete($applicant->resume);
        }
    }

    // Load interview details for update
    public function update(Interview $interview)
    {
        $this->interview_status = $interview->status;
        $this->feedbacks = $interview->feedback;
        $this->interview_id = $interview->id;
        $this->applicant = $interview->applicant;
    }

    public function filterSearch()
    {
        if ($this->filter === 'Incoming') {
            return Interview::where('interview_date', '>', now())
                ->orderBy('interview_date', 'ASC')
                ->get();
        }

        return Interview::where('status', 'LIKE', "%$this->filter%")->get();
    }

    // Get the latest interviews
    public function getInterviews()
    {
        return Interview::latest()->get();
    }

    public function storeEmployee(Applicant $applicant){
        try {
            Employee::create([
            'first_name' => $applicant->first_name,
            'middle_name' => $applicant->middle_name,
            'last_name' => $applicant->last_name,
            'email' => $applicant->email,
            'gender' => $applicant->gender,
            'birth_date' => $applicant->birth_date,
            'contact' => $applicant->contact,
            'job_position' => $applicant->job_position,
            'department' => $applicant->department,
        ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
        // $this->delete($applicant);
        $applicant->delete();
        $this->dispatch('sched-notif');
        
    }
    

    public function with(){
        $upcomingInterviews = $this->filter ? $this->filterSearch() : $this->getInterviews();

        return compact('upcomingInterviews');

    }
    
}; ?>

<div class=" justify-between flex flex-col lg:flex-row  items-center  md:flex-wrap " x-data="{interviewDetail: false}">
    <x-notification on="sched-notif" >
        <x-alert title="Success" positive solid />
    </x-notification>
    <x-notification on="delete-notif" >
        <x-alert title="Applicant Deleted!" negative solid />
    </x-notification>
    <div x-data="{schedModal: false}" class=" flex gap-2 flex-col lg:flex-row w-full" >
        <div class="justify-center bg-white drop-shadow-lg rounded-xl flex flex-col lg:flex-row p-3 items-center lg:space-x-3 space-y-10 lg:space-y-0 md:flex-wrap w-full md:w-[700px] md:max-h-[340px]"> <!--binago ko height-->
            <!-- Left Content -->
            <div class="w-full h-full overflow-hidden " >
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="flex text-xl font-bold items-center p-2 mx-2">
                        <x-icon name="calendar-days" class="size-6" /> Scheduled Interview
                    </div>
                    <div class="flex relative">
                        <x-native-select
                                wire:model.live="filter"
                                placeholder="All"
                                :options="['Passed', 'Failed', 'Canceled', 'scheduled', 'Incoming']"
                            />
                    </div>
                </div>
                </h1>
                <div class=" rounded-xl flex flex-col  p-2 overflow-auto max-h-[230px] soft-scrollbar gap-2" >
                    @forelse ($upcomingInterviews as $interviews)
                    
                        <div class="rounded-xl shadow-lg border-[2px] p-2 hover:bg-blue-100 relative">
                            {{-- Option --}}
                            <div class="absolute right-0 top-0 text-gray-500 hover:text-red-500 cursor-pointer">
                                <x-icon @click="interviewDetail = true" wire:click="update('{{ $interviews->id }}')" white name="chevron-up-down"  />
                            </div>

                            <div class="flex items-center justify-between flex-wrap">
                                <div class="flex items-center space-x-2">
                                    <x-icon name="building-office" class="size-8" />
                                    <a @click="schedModal = true" wire:click="update('{{ $interviews->id }}')">
                                        <div class="cursor-pointer">
                                            <p class="font-semibold text-base">{{ $interviews->applicant->first_name . ' ' . $interviews->applicant->last_name }}</p>
                                            <div class="flex items-center space-x-3 text-gray-400 text-sm">
                                            <p>{{ $interviews->interview_date->format('F d, Y - h:i A') }}</p>
                                            </div>
                                            <div class="flex gap-1 text-sm text-gray-400">
                                            <p class="font-semibold">Location:</p>
                                            <p>{{ $interviews->location }}</p>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <div class="mt-2 lg:mt-0">
                                    @if ($interviews->status == 'Passed')
                                        <x-badge flat positive label="{{ $interviews->status }}" />
                                    @endif
                                    @if ($interviews->status == 'Failed')
                                        <x-badge flat negative label="{{ $interviews->status }}" />
                                    @endif
                                    @if ($interviews->status == 'Canceled')
                                        <x-badge flat slate label="{{ $interviews->status }}" />
                                    @endif
                                    @if ($interviews->status == 'scheduled')
                                        <x-badge flat info label="{{ $interviews->status }}" />
                                    @endif
                                </div>
                                <div class="text-center">
                                    <p class="font-semibold text-base">{{ $interviews->interviewer }}</p>
                                    <p class="text-gray-400 text-xs">Interviewer</p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center text-2xl md:mt-12">
                            No Schedules.
                        </div>
                    
                    @endforelse
                    
                </div>
            </div>
        </div>
        {{-- Interview Details --}}
        <div x-show="interviewDetail" x-cloak x-transition class="absolute -left-4 inset-0 z-10 flex items-center justify-center bg-black/40">
            <x-modals.modal >
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <div class="text-xl font-bold">
                            Interview Details
                        </div>
                        <div>
                            <x-button @click="interviewDetail = false" white icon="arrow-left" label="back" />
                        </div>
                    </div>
                    <div class="relative">
                    {{-- preloader --}}
                        <div role="status" wire:loading class=" bg-white absolute w-full h-full z-10">
                            <ul role="status" class="space-y-2 max-w-sm animate-pulse" >
                                <li class="h-4 bg-gray-200 rounded-full dark:bg-gray-700 w-90"></li>
                                <li class="h-4 bg-gray-200 rounded-full dark:bg-gray-700 w-90"></li>
                                <li class="h-4 bg-gray-200 rounded-full dark:bg-gray-700 w-90"></li>
                                <span class="sr-only">Loading...</span>
                            </ul>
                        </div>
                        {{-- preloader --}}
                        <ul class="space-y-2">
                            @if ($applicant)
                                <li>Name: {{ $applicant->first_name . ' ' . $applicant->last_name }}</li>
                                <li>Job Position: {{ $applicant->job_position }}</li>
                                <li>Email: {{ $applicant->email }}</li>
                            @else
                                <li>Name:</li>
                                <li>Job Position:</li>
                                <li>Email:</li>
                            @endif
                        </ul>
                    </div>
                    
                    <form class="" wire:submit='submit'>
                        <div class="flex font-bold">
                            Remarks
                            @if($interview_status == "Passed")
                                <div class="text-green-500 ml-10">
                                    {{ $interview_status }}
                                </div>
                            @endif
                            @if($interview_status == "Failed")
                                <div class="text-red-500 ml-10">
                                    {{ $interview_status }}
                                </div>
                            @endif
                            @if($interview_status == "Canceled")
                                <div class="text-gray-500 ml-10">
                                    {{ $interview_status }}
                                </div>
                            @endif
                        </div>
                        
                        <div class="font-bold mt-3">
                            Feedbacks
                        </div>
                        <div class="w-80 break-words text-balance">
                            {{ $feedbacks }}
                        </div>
                        <div class="mt-3 flex space-x-2 justify-center items-center">
                            @if ($applicant)
                            <x-button type="submit" label="Hire" class="w-full" amber wire:click="storeEmployee({{ $applicant->id }})"/>
                            <x-button type="submit" label="Reject" class="w-full" negative wire:click="delete({{ $applicant->id }})" />
                            @endif
                        </div>
                    </form>
                </div>
            </x-modals.modal>
        </div>
        {{-- Interview Details --}}
        {{-- Interview MODAL --}}
        <div x-show="schedModal" x-cloak x-transition class="absolute -left-4 inset-0 z-10 flex items-center justify-center bg-black/40">
            <x-modals.modal >
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <div class="text-xl font-bold">
                            Applicant Info
                        </div>
                        <div>
                            <x-button @click="schedModal = false" white icon="arrow-left" label="back" />
                        </div>
                    </div>
                    <div class="relative">
                    {{-- preloader --}}
                        <div role="status" wire:loading class=" bg-white absolute w-full h-full z-10">
                            <ul role="status" class="space-y-2 max-w-sm animate-pulse" >
                                <li class="h-4 bg-gray-200 rounded-full dark:bg-gray-700 w-90"></li>
                                <li class="h-4 bg-gray-200 rounded-full dark:bg-gray-700 w-90"></li>
                                <li class="h-4 bg-gray-200 rounded-full dark:bg-gray-700 w-90"></li>
                                <span class="sr-only">Loading...</span>
                            </ul>
                        </div>
                        {{-- preloader --}}
                        <ul class="space-y-2">
                            @if ($applicant)
                                <li>Name: {{ $applicant->first_name . ' ' . $applicant->last_name }}</li>
                                <li>Job Position: {{ $applicant->job_position }}</li>
                                <li>Email: {{ $applicant->email }}</li>
                            @else
                                <li>Name:</li>
                                <li>Job Position:</li>
                                <li>Email:</li>
                            @endif
                        </ul>
                    </div>
                    
                    <form class="space-y-4" wire:submit='submit'>
                        <div class="font-bold">
                            Remarks
                        </div>
                        <div class="flex space-x-3">
                            <x-radio id="color-positive" wire:model="status" label="Passed" positive value="Passed" xl />
                            <x-radio id="color-negative" wire:model="status" label="failed" negative value="Failed" xl />
                            <x-radio id="color-secondary" wire:model="status" label="canceled" secondary value="Canceled" xl />
                        </div>
                        <div>
                            <x-textarea wire:model='feedback' placeholder="Feedback..." />
                        </div>
                        <div class="">
                            <x-button type="submit" label="Submit" class="w-full" amber />
                        </div>
                    </form>
                </div>
            </x-modals.modal>
        </div>
        {{-- Interview MODAL --}}
        <div class="w-full lg:w-1/3 flex-grow sm:flex-grow ">
            <livewire:components.calendar />
        </div>
    </div>
</div>
