<?php

use App\Models\Announcement;
use Livewire\Volt\Component;

new class extends Component {

    public function with()
    {
        return [
            'announcements' => Announcement::orderBy('created_at', 'desc')->take(3)->get(),
        ];
    }
}; ?>

<div class="px-3 bg-white pb-3 overflow-auto soft-scrollbar min-h-[500px]">
    <div class="text-xl">Announcement</div>
    @forelse ($announcements as $announcement)
    
    <div class="bg-slate-200 mt-3 ">
        <div class=" p-3">
            <div class="flex justify-between">
                <div class="font-bold">{{ $announcement->title }}</div>
                <x-icon name="ellipsis-horizontal"/>
            </div>
            <p class="text-sm text-gray-500">{{ $announcement->description }}</p>
            <div class="flex justify-between items-center mt-1 text-sm">
                <p>{{ $announcement->user->name }}</p>
                <p>{{ \Carbon\Carbon::parse($announcement->created_at)->diffForHumans() }}</p>
            </div>
        </div>
    </div>
        
    @empty
        
    @endforelse
    
</div>
