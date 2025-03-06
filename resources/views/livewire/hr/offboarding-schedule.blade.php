<?php

use App\Models\User;
use App\Models\Resignation;
use App\Models\Notification;
use Livewire\Volt\Component;

new class extends Component {

    public $name = null;
    public $id = null;

    public function getsched()
    {
        return Resignation::whereNotNull('schedule')
            ->orderBy('schedule', 'asc') 
            ->get();

    }

    public function approved(Resignation $resignation)
    {
        // dd($resignation->name, $resignation->user_id);
        $user = User::findOrFail($resignation->user_id);
        // dd($user->name);
        $title = "termination";
        $notif = "The account of ". $user->name . " email " . $user->email . " is scheduled for termination please review and take neccessarya action";

        Notification::create([
            'title' => $title,
            'details' => $notif,
        ]);

        $resignation->delete();
        $this->dispatch('resignation approved');
        $this->redirect('/offboarding');

    }

    public function update(Resignation $resignation)
    {
        $this->name = $resignation->name;
        $this->id = $resignation->id;
    }

    public function with()
    {
        return [
            'schedules' => $this->getsched(), 
        ];
    }
    
}; ?>

<div class="space-y-3 lg:space-y-2" x-data="{approval: false}">
    <x-notification on="resignation approved" >
        <x-alert title="Approved!" positive solid />
    </x-notification>
    <div class="flex justify-between items-center text-xl">
        <div>In Line Exit Interview</div>    
        {{-- <button>View all</button> --}}
    </div>
    <div class="grid grid-cols-2 lg:flex gap-3">
        @forelse ($schedules as $schedule)
            <div @click="approval = true" wire:click='update({{ $schedule->id }})' class="rounded-lg ring-2 ring-yellow-500 text-center px-2 hover:bg-amber-50 cursor-pointer">
                <div class="text-sm lg:text-xl">{{ $schedule->name }}</div>
                <p class="text-xs">{{ $schedule->schedule->setTimezone('Asia/Manila')->format('F d Y - h:i A') }}</p>
            </div>
            
        @empty
            
        @endforelse
    </div>
    <div x-show="approval" x-cloak class="px-2 md:px-0 transition-all duration-300 flex h-screen w-full bg-black/20 fixed top-0 left-0 z-50  justify-center items-center">

        <div class="bg-white p-4 rounded-md  overflow-auto soft-scrollbar space-y-2 text-center" @click.away="approval = false">
            <div class="">Resignation Approval of {{ $name }}</div>
            <x-button label="Approve Resignation" negative wire:click='approved({{ $id}})'/>
        </div>
        
    </div>
    
</div>
