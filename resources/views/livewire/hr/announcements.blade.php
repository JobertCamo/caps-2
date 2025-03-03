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

<div class=" border-2 border-[#4f200dc5] p-3 overflow-auto soft-scrollbar min-h-[500px] ">
    <div class="text-xl m-1 font-bold">Announcement</div>
    @forelse ($announcements as $announcement)

    <div class=" mt-3 ">
        <div class=" p-3">
            <div class="flex justify-between">
                <div class="font-bold text-[#FFD93D] text-lg">{{ $announcement->title }}</div>
                <x-icon name="ellipsis-horizontal"/>
            </div>
            <p class="">Description: {{ $announcement->description }}</p>
            <div class="flex justify-between items-center mt-1 text-sm">
                <p>{{ $announcement->user->name }}</p>
                <p>{{ \Carbon\Carbon::parse($announcement->created_at)->diffForHumans() }}</p>
            </div>
        </div>
    </div>

    @empty

    @endforelse

</div>
