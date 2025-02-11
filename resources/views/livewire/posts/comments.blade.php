<?php

use App\Models\Comment;
use Livewire\Volt\Component;

new class extends Component {


    // public function with()
    // {
    //     return [
    //         // 'comments' => Comment::latest()->paginate(10),
    //     ];
    // }
    
}; ?>

<div class="">
    <div class=" w-full flex flex-col p-3">
        <div class="flex gap-2 items-center">
            <img class="rounded-full" src="{{ asset('images/sqaure.png') }}" width="30px" alt="">
            <div>tatatatatatata</div>
        </div>
        <div class="text-sm py-2 px-5 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem iure maiores nemo consectetur? 
            Quo recusandae voluptates cumque dolores dicta impedit nobis repudiandae libero eos beatae totam, dolor possimus fugit vel.</div>
        <div class="flex gap-4">
            <button class="flex items-center gap-1">
                <x-icon name="hand-thumb-up" solid/> 
                <p class="text-sm">69</p>
            </button>
            <button class="flex items-center gap-1">
                <x-icon name="hand-thumb-down" solid/> 
                <p class="text-sm">69</p>
            </button>
        </div>
    </div>
        
        
</div>
