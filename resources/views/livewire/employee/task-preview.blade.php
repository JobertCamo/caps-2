<?php

use Livewire\Volt\Component;

new class extends Component {

    public function tasks()
    {
        return Auth::user()->tasks->take(5);
    }

    public function with()
    {
        return [
            'tasks' => $this->tasks(),
        ];
    }
    
}; ?>

<div class="px-3 space-y-1">
    @forelse ($tasks as $task)
    <div class="flex items-center gap-2 md:hidden text-gray-500">
        <a href="task-list" class=" w-4 h-4 border-[1px] border-gray-300 rounded-sm"></a>
        <p class="">{{ Str::limit($task->description, 36) }}</p>
    </div>
    <div class="md:flex md:items-center gap-2 hidden text-gray-500">
        <a href="task-list" class=" w-4 h-4 border-[1px] border-gray-300 rounded-sm"></a>
        <p class="">{{ Str::limit($task->description, 70) }}</p>
    </div>
    @empty
    <div class="flex items-center gap-2">
        <p class="">No Data Found.</p>
    </div>
    @endforelse
</div>
