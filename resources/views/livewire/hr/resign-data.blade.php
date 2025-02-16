<?php

use App\Models\Resignation;
use Livewire\Volt\Component;

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
        <x-button label="New" amber @click="add = true" />
    </div>
    <div class="grid lg:grid-cols-3 gap-4">
        @forelse ($resignees as $resignee)
        <div class="bg-white lg:max-w-[360px] min-h-64 max-h-64 flex flex-col justify-between py-3 px-4 rounded-xl border-[1px] border-gray-200 shadow-xl">
            <div class="flex justify-between ">
                <div class="text-2xl font-bold">{{ $resignee->name }}</div>
                <button wire:click='update({{ $resignee->id }})' @click="open = true" class="bg-gray-400/50 hover:bg-gray-400 rounded-full text-xs px-2">More Details</button>
            </div>
            <div class="space-y-3 mb-2">
                <div class="text-md font-bold text-gray-600">Resignation Details</div>
                <p class="text-sm text-gray-500">{{ $resignee->reason }}</p>
            </div>
            <div class="flex justify-between">
                <div class="font-bold text-red-600">{{ $resignee->created_at->format('F d Y') }}</div>
                <x-badge flat postive label="{{ $resignee->status }}" />
            </div>
        </div>
        @empty
            <div>No Data Found.</div>
        @endforelse
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