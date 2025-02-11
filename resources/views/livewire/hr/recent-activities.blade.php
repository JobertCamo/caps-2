<?php

use App\Models\UserTask;
use Livewire\Volt\Component;

new class extends Component {

    public function with()
    {
        return [
            'recents' => UserTask::orderBy('created_at', 'desc')->take(3)->get(),
        ];
    }
    
}; ?>

<ol class="relative border-s border-black dark:border-gray-700">
    @forelse ($recents as $recent)
    
    <li class="mb-10 ms-4">
        <div class="absolute w-3 h-3 bg-red-500 rounded-full mt-1.5 -start-1.5 border border-white "></div>
        <time class="mb-1 text-sm font-normal leading-none text-[#34444c]  ">
            {{ $recent->created_at->format('F d Y - H:i A') }}
        </time>
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
            Task Completed - Department
        </h3>
        <p class=" text-sm font-semibold text-[#34444c]">
            {{ $recent->user->name }}
        </p>
        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400 indent-5">
            {{ $recent->task_description }}
        </p>
    </li>
       
    @empty
        
    @endforelse
</ol>
