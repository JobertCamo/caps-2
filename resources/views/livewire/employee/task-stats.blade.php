<?php

use App\Models\UserTask;
use Livewire\Volt\Component;

new class extends Component {

    public function with()
    {
        return [
            'complete' => UserTask::all(),
            'incomplete' => Auth::user()->tasks,
        ];
    }
    
}; ?>

<div class="grid grid-cols-3 gap-5 px-3">
    <div class="bg-white px-3 py-1 shadow-lg rounded-lg">
        <li class="list-none text-sm">Completed Task</li>
        <li class="-mt-1 list-none font-bold text-lg">{{ count($complete) }}</li>
    </div>
    <div class="bg-white px-3 py-1 shadow-lg rounded-lg">
        <li class="list-none text-sm">Incomplete Task</li>
        <li class="-mt-1 list-none font-bold text-lg">{{ count($incomplete) }}</li>
    </div>
    <div class="bg-white px-3 py-1 shadow-lg rounded-lg">
        <li class="list-none text-sm">Failed Task</li>
        <li class="-mt-1 list-none font-bold text-lg">69</li>
    </div>
</div>
