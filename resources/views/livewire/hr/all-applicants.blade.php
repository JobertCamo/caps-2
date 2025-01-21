<?php

use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Applicant;
use App\Models\Interview;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

new #[layout('components.layout')]
 class extends Component {
    use WithPagination;

    public $q = '';
    public $link = true;
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

    // Load interview details for update
    public function update(Interview $interview)
    {
        $this->interview_status = $interview->status;
        $this->feedbacks = $interview->feedback;
        $this->interview_id = $interview->id;
        $this->applicant = $interview->applicant;
    }

    // Delete an applicant and their associated resources
    public function delete(Applicant $applicant)
    {
        $this->authorize('delete', $applicant);

        if (Storage::exists($applicant->resume)) {
            Storage::delete($applicant->resume);
        }

        $applicant->delete();
        $this->dispatch('delete-notif');
    }

    // Perform a search for applicants
    public function search($query)
    {
        $nameSearch = explode(' ', $query);

        return Applicant::query()
            ->when(count($nameSearch) === 1, function ($q) use ($query) {
                $q->where('first_name', 'LIKE', "%$query%")
                    ->orWhere('last_name', 'LIKE', "%$query%")
                    ->orWhere('middle_name', 'LIKE', "%$query%");
            })
            ->when(count($nameSearch) > 1, function ($q) use ($nameSearch) {
                $q->where('first_name', 'LIKE', '%' . $nameSearch[0] . '%')
                    ->where('last_name', 'LIKE', '%' . end($nameSearch) . '%');
            })
            ->get();
    }

    // Get paginated list of applicants
    public function getApplicants()
    {
        // return Applicant::latest()->simplePaginate(6);
        return Applicant::where('status', 'candidate')->latest()->simplePaginate(7);
    }

    // Filter interviews based on the selected criteria
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

    // Store applicant details to employee table
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
            'department' => 'IT',
        ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
        $this->delete($applicant);
        
    }

    // Prepare the data to be passed to the view
    public function with()
    {
        $applicants = $this->q ? $this->search($this->q) : $this->getApplicants();
        $upcomingInterviews = $this->filter ? $this->filterSearch() : $this->getInterviews();

        return compact('applicants', 'upcomingInterviews');
    }

    
    
}; ?>

<div class="overflow-y-auto  ">
    <x-notification on="sched-notif" >
        <x-alert title="Interview Updated!" positive solid />
    </x-notification>
    <x-notification on="delete-notif" >
        <x-alert title="Applicant Deleted!" negative solid />
    </x-notification>
    <div class="h-[50px]  flex items-center text-lg bg-white drop-shadow-lg mx-2 mb-5 rounded-xl px-4">
        <a href="" class="font-bold">Applicant Tracking</a>
        &nbsp;/&nbsp;
        <a href="">Candidate</a>
    </div>

    <div class=" justify-around flex flex-col lg:flex-row p-2 items-center space-x-3 space-y-10 md:flex-wrap " x-data="{interviewDetail: false}">
        <div x-data="{schedModal: false}" class=" flex gap-2 flex-col lg:flex-row" >
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
            <div class="w-full lg:w-1/3 flex-grow sm:flex-grow">
                {{-- <x-calendar-date /> --}}
                <livewire:components.calendar />
            </div>
        </div>

        {{-- <div class=" flex-grow sm:flex-grow">
            <x-calendar-date />
        </div> --}}
    </div>

    <div class="mx-1 mt-5 justify-between flex bg-white py-2 px-2 rounded-xl">
        <div>
            <x-input wire:model.live='q' icon="magnifying-glass" placeholder="Candidate name" />
        </div>
        {{-- <div>
            <div x-data="{ open: false }" class="w-full hidden lg:flex items-center justify-center">
                <x-button x-on:click="open = ! open" amber label="Update Status"></x-button>
                <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                    <div @click.away="open = false" class="modal-add2 mt-20 flex justify-center items-center p-3 rounded-2xl">
                        <div>
                            <form action="">
                                <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                    <legend class="font-bold text-2xl text-amber-600">Update Applicant Status</legend>
                                    <div class="flex space-x-3 text-black">
                                        <div>
                                            <x-input wire:model.live='q' icon="user" label="Name" placeholder="Candidate name" />
                                        </div>
                                        <div>
                                            <x-select label="Select Status" placeholder="Select one status">
                                                <x-select.option label="Passed" value="1" />
                                                <x-select.option label="Failed" value="2" />
                                                <x-select.option label="Not Attended" value="3" />
                                            </x-select>
                                        </div>
                                    </div>

                                </fieldset>
                                <div class="flex justify-end items-center m-2">
                                    <x-button emerald label="Submit" />
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="h-[70%] mt-5 w-full overflow-x-auto hide-scrollbar">
        <div class="flex flex-col ">
            <div class=" overflow-x-auto">
                <div class="min-w-full inline-block align-middle h-screen">
                    <div class="overflow rounded-xl ">
                        <table class=" min-w-full ">
                            <thead class="">
                                <tr class="bg-gradient-to-r from-yellow-300 to-amber-400">
                                    <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Name
                                    </th>
                                    <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Contact no.
                                    </th>
                                    <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Email
                                    </th>
                                    <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Job
                                    </th>
                                    <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Score
                                    </th>
                                    <th scope="col" class="p-5 text-sm leading-6 font-semibold text-gray-900 capitalize text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 text-center" >
                                @if (!empty($applicants))
                                    @foreach ($applicants as $applicant)
                                    <x-tables.table-data :$applicant />
                                    @endforeach
                                @else
                                     NO DATA FOUND.
                                @endif
                            </tbody>
                        </table>
                        <div class=" bg-white">
                            @if ($link)
                                <div class="mx-3 pb-2">
                                    {{ $applicants->links() }}
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

