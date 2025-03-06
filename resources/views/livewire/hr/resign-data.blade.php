<?php

use App\Models\Resignation;
use Livewire\Volt\Component;
use App\Mail\ResignationInterview;
use Illuminate\Support\Facades\Mail;

new class extends Component {

    public $q;
    public $resigneeID;
    public $name;
    public $department;
    public $job_position;
    public $reason;
    public $schedule;

    public function submit()
    {
        $data = $this->validate([
            'schedule' => ['required'],
            'name' => ['required'],
            'department' => ['required'],
            'job_position' => ['required'],
        ]);
        $reisg = Resignation::find($this->resigneeID);
        $data['status'] = 'scheduled';
        $reisg->update([
            'schedule' => $data['schedule'],
            'status' => $data['status'],
        ]);

        Mail::to($reisg->email)->send(
            new ResignationInterview($reisg->name, $reisg->schedule)
        );

        $this->redirect('/offboarding');
    }

    public function update(Resignation $resignation)
    {
        $this->resigneeID = $resignation->id;
        $this->name = $resignation->name;
        $this->department = $resignation->department;
        $this->reason = $resignation->reason;
        $this->job_position = $resignation->job_position;
    }

    public function delete(Resignation $resignation)
    {
        $resignation->delete();
        $this->redirect('/offboarding');
    }

    public function resignee()
    {
        return Resignation::query()
            ->when($this->q, fn($query) => $query->where('name', 'LIKE', '%' . $this->q . '%')->orWhere('department', 'LIKE', '%' . $this->q . '%'))
            ->latest()
            ->paginate(8);
    }
    
    public function with()
    {
        return [
            'resignees' => $this->resignee(),
        ];
    }
    
}; ?>

<div class="space-y-4 bg-white px-4 py-6 rounded-lg">
    <div class="flex items-center gap-3 bg-slate-100 py-2 px-2 border-[1px] border-gray-200 rounded-xl">
        <x-input wire:model.live='q' placeholder="Search Name" icon="magnifying-glass" />
        {{-- <x-button label="New" amber @click="add = true" /> --}}
    </div>
    <div class="grid lg:grid-cols-3 gap-3" x-data="{offdel: false}">
        @forelse ($resignees as $resignee)
        <div class="bg-white lg:max-w-[360px] min-h-28  flex flex-col justify-between py-3 px-4 rounded-xl border-[1px] border-gray-200 shadow-xl">
            <div class="flex justify-between relative">
                <div class="text-2xl font-bold">{{ $resignee->name }}</div>
                <button wire:click='update({{ $resignee->id }})' @click="open = true" class="bg-gray-400/50 hover:bg-gray-400 rounded-full text-xs px-2">More Details</button>
                <button @click="offdel = true" class="absolute -top-3 -right-4"><x-icon class="w-5 h-5" name="x-mark" color="red"/></button>
            </div>
            <div>
                <a href="{{ asset('storage/'. $resignee->file) }}" target="_blank">Letter</a>
            </div>
            <div x-show="offdel"  @click.away="delModal = false" x-cloak x-transition class="fixed inset-0 z-10 flex gap-5 items-center justify-center">
                <div class="shadow-lg shadow-indigo-500/40 bg-white p-12 space-x-5 text-center font-bold text-xl space-y-7">
                    <div class="text-balance">Are you sure you want to delete ?</div>
                    <div class="space-x-5">
                        <x-button @click="offdel = false" rose wire:click='delete({{ $resignee->id }})'>Delete</x-button>  
                        <x-button @click="offdel = false" positive>Cancel</x-button>
                    </div>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="font-bold text-red-600">{{ $resignee->created_at->format('F d Y') }}</div>
                <x-badge flat postive label="{{ $resignee->status }}" />
            </div>
        </div>
        @empty
            <div>No Data Found.</div>
        @endforelse


        {{-- <table class=" min-w-full ">
            <thead class="sticky top-0">
                <tr class="bg-gradient-to-r from-yellow-300 to-amber-400">
                    <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                        Name
                    </th>
                    <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                        Email
                    </th>
                    <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                        Job Position
                    </th>
                    <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                        Department
                    </th>
                    <th scope="col" class="p-5 text-sm leading-6 font-semibold text-gray-900 capitalize text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300 text-center">
                @foreach ($resignees as $resignee)
                <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                    <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 text-start">{{ $resignee->name}}</td>
                    <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{ $resignee->email }} </td>
                    <td class="p-5 whitespace-nowrap  text-sm leading-6 font-medium text-gray-900">{{$resignee->job_position}}</td>
                    <td class="p-5 whitespace-nowrap  text-sm leading-6 font-medium text-gray-900">{{$resignee->department}}</td>
                    <td class="p-5 whitespace-nowrap  text-sm leading-6 font-medium text-gray-900"><button wire:click='update({{ $resignee->id }})' @click="open = true" class="bg-gray-400/50 hover:bg-gray-400 rounded-full text-xs px-2">More Details</button></td>
                </tr>
                @endforeach
            </tbody>
        </table> --}}
        
        
        
    </div>
    <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
        <div @click.away="open = false" class="modal-add2 mt-20 flex justify-center items-center p-3 rounded-2xl">
            <div>
                <form wire:submit='submit'>
                    <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                        <legend class="font-bold text-2xl text-amber-600">Resignee Details</legend>
                        <div class= "lg:flex w-auto lg:min-w-[800px] max-w-[800px] min-h-[400px] gap-2">
                            <div class="flex-1 max-w-[600px] space-y-3 ">
                                <h1 class=" text-xl font-bold indent-5">
                                    {{ $name }}
                                </h1>
                                <div>
                                    <h1 class=" font-bold text-base indent-8 text-[#34444c]">
                                        Resignee Details
                                    </h1>
                                    <p class=" indent-10">
                                        {{ $reason }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex-1 max-w-[500px] space-y-3">
                                <div class=" flex justify-end items-center">
                                    {{-- <x-button negative label="Request Termination" /> --}}
                                </div>
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class=" font-semibold text-base">
                                                Schedule Exit Interview
                                            </p>
                                            <x-datetime-picker
                                                wire:model="schedule"
                                                label="Appointment Date"
                                                placeholder="Appointment Date"
                                            />
                                        </div>
                                            {{-- <button type="submit" class=" bg-emerald-300 m-3 p-2 rounded-xl">Schedule</button> --}}
                                    </div>
                                    <div class="space-y-3">
                                        {{-- <p class=" font-semibold text-base">
                                            Request for documents
                                        </p> --}}
                                        <x-input wire:model.live='name' label="Name" placeholder="Employee " />
                                        <x-input wire:model.live='department' label="Department" placeholder="Department"/>
                                        <x-input wire:model.live='job_position' label="Job Type" placeholder="JobType"/>
                                    </div>
                                    <div class="flex justify-end items-center mt-2">
                                        <x-button type="submit" amber label="Submit"/>
                                    </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>