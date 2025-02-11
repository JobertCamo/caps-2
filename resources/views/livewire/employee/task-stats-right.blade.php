<?php

use App\Models\UserTask;
use Livewire\Volt\Component;

new class extends Component {

    public function with()
    {
        return[
            'tasks' => Auth::user()->tasks->count(),
            'completed' => Auth::user()->user_tasks->count(),
        ];
    }
    
}; ?>

<div class="p-3 grid grid-cols-2 gap-3">
    <div class="bg-gradient-to-r from-indigo-300 to-indigo-600 rounded-lg p-2 space-y-3 text-white">
        <div class="flex justify-between">
            <div>Task Completed</div>
            <x-icon name="rectangle-stack" />
        </div>
        <div class="text-2xl"> {{ $tasks }}/{{ $completed }}</div>
    </div>
    <div class="bg-gradient-to-r from-sky-400 to-sky-600 rounded-lg p-2 space-y-3 text-white">
        <div class="flex justify-between">
            <div>Task Failed</div>
            <x-icon name="rectangle-stack" />
        </div>
        <div class="text-2xl">0/{{ $tasks }}</div>
    </div>
    
</div>
