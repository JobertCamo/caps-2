<?php

use App\Models\Post;
use Livewire\Volt\Component;

new class extends Component {

    public $id;

    // public function mount(Post $post)
    // {
    //     $this->posts = $post;
    // }
    
}; ?>

<div class="bg-white p-4 rounded-md  max-w-[360px] lg:max-w-[390px] max-h-[540px] overflow-auto soft-scrollbar space-y-2" @click.away="comment = false">
    <div class="">
        <div class="bg-slate-200 w-full flex flex-col p-3">
            <div class="flex gap-2 items-center">
                <img class="rounded-full" src="{{ asset('images/sqaure.png') }}" width="30px" alt="">
                <div>{{ $id }}s</div>
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
    <div>
        <x-input label="Comment Something" placeholder="Metanga mebobo megago metarantado"/>
    </div>
    <div>
        <div class="">
            <div class=" w-full flex flex-col p-3">
                <div class="flex gap-2 items-center">
                    <img class="rounded-full" src="{{ asset('images/sqaure.png') }}" width="30px" alt="">
                    <div>Anonymous</div>
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
    </div>
</div>
