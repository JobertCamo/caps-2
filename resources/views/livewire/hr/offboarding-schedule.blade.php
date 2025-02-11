<?php

use App\Models\Resignation;
use Livewire\Volt\Component;

new class extends Component {

    public function getsched()
    {
        return Resignation::whereNotNull('schedule')
            ->orderBy('schedule', 'asc') 
            ->get();

    }

    public function with()
    {
        return [
            'schedules' => $this->getsched(), 
        ];
    }
    
}; ?>

<div class="space-y-3 lg:space-y-2">
    <div class="flex justify-between items-center text-xl">
        <div>In Line Exit Interview</div>    
        <button>View all</button>
    </div>
    <div class="grid grid-cols-2 lg:flex gap-3">
        @forelse ($schedules as $schedule)
            <div class="rounded-lg ring-2 ring-yellow-500 text-center px-2">
                <div class="text-sm lg:text-xl">{{ $schedule->name }}</div>
                <p class="text-xs">{{ $schedule->schedule->setTimezone('Asia/Manila')->format('F d Y - h:i A') }}</p>
            </div>
        @empty
            
        @endforelse
    </div>
</div>
