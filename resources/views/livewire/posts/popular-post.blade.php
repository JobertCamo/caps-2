<?php

use App\Models\Post;
use Livewire\Volt\Component;

new class extends Component {

    public function with()
    {
        return [
            'popularPost' => Post::orderBy('likes', 'desc')->first(),
        ];
    }

}; ?>

<div class="px-3 mb-3 border-2 border-[#4f200dc5]">
    <div class="mt-2 text-xl">Popular</div>
    @if ($popularPost)

    <div class="bg-s[#4F200D] w-full flex flex-col p-3 mt-2 ">
        <div class="flex gap-2 items-center">
            <img class="rounded-full" src="{{ asset('images/sqaure.png') }}" width="30px" alt="">
            @can('view-page')
                <div>{{ $popularPost->user->name }}</div>
            @endcan
            @cannot('view-page')
                <div>Anonymous</div>
            @endcannot
        </div>
        <div class="text-sm py-2 px-5 ">{{ $popularPost->post }}</div>
        <div class="flex gap-4">
            <button class="flex items-center gap-1">
                <x-icon name="hand-thumb-up" solid/>
                <p class="text-sm">{{ $popularPost->likes }}</p>
            </button>
            <button class="flex items-center gap-1">
                <x-icon name="hand-thumb-down" solid/>
                <p class="text-sm">{{ $popularPost->dislikes }}</p>
            </button>
            {{-- <button @click="comment = true"  class="flex items-center gap-1">
                <x-icon name="chat-bubble-bottom-center-text" solid/>
            </button> --}}
        </div>
    </div>
    @endif

</div>
