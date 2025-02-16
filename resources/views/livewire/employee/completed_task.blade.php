<?php

use App\Models\UserTask;
use Livewire\Volt\Component;

new class extends Component {

    public function getAll()
    {
        return UserTask::latest()->paginate(10);
    }

    public function with()
    {
        return [
            'tasks' => $this->getAll(),
        ];
    }
    
}; ?>

<div >
    @forelse ($tasks as $task)
        <tr class="bg-white border-b hover:bg-gray-200 cursor-pointer ">
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
                {{ Str::limit($task->task_description, 50) }}
            </td>
            <td class="px-2 py-4">
                {{ $task->date_completed->format('F d, Y - h:i A') }}
            </td>
            <td class="px-2 py-4">
                <div class="text-green-500">Done</div>
            </td>
        </tr>
        @empty
            <div class="text-center absolute top-[140px] left-9 z-10">No Data Found</div>
        @endforelse
</div>
