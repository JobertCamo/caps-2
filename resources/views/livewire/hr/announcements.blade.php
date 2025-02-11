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

<div class="flex flex-col  max-h-[400px] overflow-auto soft-scrollbar p-2">
    @forelse ($announcements as $announcement)
    
    <div class="card-task"> <!--START TO NG TASK LISTS CARD WALA YANG CLASS NAME LANG HAHA-->
        <div class="flex items-center ">
            <div class="w-3 h-3 rounded-full bg-green-500 m-2">
            </div>
            <p class="font-semibold text-base">
                {{ $announcement->title }}
            </p>
        </div>
        <p class="indent-5 text-sm">
            {{ $announcement->description }}
        </p>
    </div>
       
    @empty
        
    @endforelse
</div>
