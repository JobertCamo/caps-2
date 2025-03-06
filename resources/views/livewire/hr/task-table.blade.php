<?php

use App\Models\UserTask;
use Livewire\Volt\Component;

new class extends Component {

    public function with()
    {
        return [
            'tasks' => UserTask::latest()->paginate(10),
        ];
    }
    
}; ?>

<tbody class="divide-y divide-gray-300 text-center">
    @foreach ($tasks as $task)
        <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 text-start">{{ $task->user->name }}</td>
            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{ $task->title }} </td>
            <td class="p-5 whitespace-nowrap  text-sm leading-6 font-medium text-gray-900">{{ $task->date_completed->format('F d, Y - h:i A') }}</td>
            <td  class="p-5 whitespace-nowrap  text-sm leading-6 font-medium text-gray-900"><a href="{{ $task->file }}" target="_blank"> Docs</a></td>
            
        </tr>
    @endforeach
</tbody>
