<?php

use App\Models\Task;
use Livewire\Volt\Component;
use Livewire\WithPagination;

new class extends Component {

    public Task $task;

    public function update(Task $task)
    {
        $this->task = $task;
    }

    public function tasks()
    {
        return Auth::user()->tasks()->latest()->paginate(10);
    }

    public function with()
    {
        return [
            'tasks' => $this->tasks(),
        ];
    }
    
}; ?>

<div >
    @forelse ($tasks as $task)
        <tr @click=" tass = true " wire:click='update({{ $task->id }})' class="bg-white border-b hover:bg-gray-200 cursor-pointer ">
            {{-- <td class="w-4 p-4">
                <div class="flex items-center">
                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray- bordergray-00rounded fousringblue500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                </div>
            </td> --}}
            <th scope="row" class="px-5 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $task->title }}
            </th>
            <td class="px-5 py-4">
                {{ Str::limit($task->description, 50) }}
            </td>
            <td class="px-2 py-4">
                {{ $task->deadline }}
            </td>
            <td class="px-2 py-4">
                @if (!$task->is_done)
                    <div class="text-green-500">pending</div>
                @else
                    <div class="text-red-500">Complete</div>
                @endif
            </td>
        </tr>
        @empty
            <div class="text-center absolute top-[140px] left-9 z-10">No Data Found</div>
        @endforelse
    <div x-show="tass" x-cloak class="px-2 md:px-0 transition-all duration-300 flex h-screen w-full bg-black/20 fixed top-0 left-0 z-50  justify-center items-center">
        <livewire:employee.task-submit :task=" $task "/>
        
    </div>
    
</div>