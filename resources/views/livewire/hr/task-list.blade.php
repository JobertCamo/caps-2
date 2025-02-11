<?php

use App\Models\Task;
use Livewire\Volt\Component;

new class extends Component {

    public function tasks()
    {
        return Task::where('deadline', '>', now())
                ->orderBy('deadline', 'ASC')
                ->get();
    }

    public function with()
    {
        return [
            'tasks' => $this->tasks(),
        ];
    }
    
}; ?>

<div class="p-2 space-y-2 overflow-auto max-h-[570px] soft-scrollbar ">
    @forelse ($tasks as $task)
    <div class="h-[145px] bg-white border-[2px] border-gray-400 shadow-xl rounded-lg p-2 hover:bg-slate-100"> <!--START NG  TASK CARD-->
        <div class="flex justify-between">
            <h1 class=" font-bold text-base">
                {{ $task->title }}
            </h1>
                
        </div>
        <div class="mb-2">
            <p class=" text-xs text-black/50">
                Department: {{ $task->user->department }}
            </p>
            <p class=" indent-6 text-sm">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae in nemo commodi voluptatem sint impedit
            </p>
        </div>
        <div class="flex justify-between mx-2 items-center">
            <div class="flex items-center gap-1 text-red-600 font-bold bg-red-700/30 px-2 rounded-full">
                <p class=" text-xs">{{ $task->deadline }}</p>
            </div>
            <div>
                @if (!$task->is_done)
                  Pending
                @else
                  Completed
                @endif
            </div>
        </div>
    </div>
    @empty
        
    @endforelse
</div>