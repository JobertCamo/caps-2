<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div class=" flex items-center gap-4 relative">
    <img class="w-16 h-16 lg:w-20 lg:h-20 rounded-full absolute right-0 top-0" src="{{ 'storage/' . Auth::user()->profile_picture }}" alt="">
    <div >
        <div class="flex gap-2">
            <div class="text-xl md:text-2xl font-bold">{{ Auth::user()->name }}</div>
            <span class="text-xs md:text-sm mt-1">ID:232343434</span>
        </div>
        <div class="flex items-center gap-1 text-sm"><x-icon name="envelope" class="w-5" /> {{ Auth::user()->email }}</div>
        <div class="flex items-center gap-1 text-sm"><x-icon name="building-office" class="w-5" /> {{ Auth::user()->department }}</div>
        <div class="flex items-center gap-1 text-sm"><x-icon name="calendar" class="w-5" /> {{ Auth::user()->created_at->format('F d, Y') }}</div>
    </div>
</div>
