<?php

use App\Models\Post;
use App\Models\Comment;
use Livewire\Volt\Component;

new class extends Component {

    public $paginate = 10;
    public $postID;
    public $postdetails;
    public $likes;
    public $dislikes;
    public $postComment;

    public function submit()
    {
        $this->validate([
            'postComment' => ['required'],
        ]);
        Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $this->postID,
            'comment' => $this->postComment,
        ]);
        // $this->reset();
    }

    public function delete(Post $post)
    {
        $post->delete();
    }

    public function getpost(Post $post)
    {
        $this->postID = $post->id;
        $this->postdetails = $post->post;
        $this->likes = $post->likes;
        $this->dislikes = $post->dislikes;
    }

    public function addpag()
    {
        $this->paginate += 5;
    }

    public function with()
    {

        $comment = Comment::find($this->postID);
        $id = '';
        if ($this->postID) {
            $id = $this->postID;
        }
        
        return [
            'posts' => Auth::user()->posts()->latest()->paginate($this->paginate),    
            'comments' => Comment::where('post_id', $id)->latest()->paginate(10),
        ];
    }
    
}; ?>

<div class="px-3 mb-3" x-data="{comment: false, posts: false}">
    <div class="mt-2 text-xl">Post</div>
    <form action="" class="mt-4 mb-5">
        <input readonly @click="posts = true" placeholder="Post Something..." class="w-full border-[1px] border-gray-300 rounded-md py-1 px-2" >
    </form>
    <div class="space-y-5">
        @forelse ($posts as $post)
        <div class="bg-slate-200 w-full flex flex-col p-3 mt-2">
            <div class="flex justify-between items-center relative" x-data="{dd: false}">
                <div class="flex gap-2 items-center">
                    <img class="rounded-full" src="{{ asset('images/sqaure.png') }}" width="30px" alt="">
                    <div>{{ $post->user->name }}</div>
                </div>
                <x-icon @click="dd = true" name="ellipsis-vertical" />
                <div x-show="dd" @click.away="dd = false" class="absolute right-5 top-0">
                    <div>
                        <x-button wire:click='delete({{ $post->id }})' white label="delete" />
                    </div>
                </div>
            </div>
            <div class="text-sm py-2 px-5 ">{{ $post->post }}</div>
            <div class="flex gap-4">
                <button class="flex items-center gap-1">
                    <x-icon name="hand-thumb-up" solid/> 
                    <p class="text-sm">{{ $post->likes }}</p>
                </button>
                <button class="flex items-center gap-1">
                    <x-icon name="hand-thumb-down" solid/> 
                    <p class="text-sm">{{ $post->dislikes }}</p>
                </button>
                <button @click="comment = true"  class="flex items-center gap-1">
                    <x-icon wire:click='getpost({{ $post->id }})' name="chat-bubble-bottom-center-text" solid/> 
                </button>
            </div>
        </div>
        @empty
            <div>No Post.</div>
        @endforelse
        <div class="mt-2 text-center">
            <x-button wire:click='addpag()' white label="More" class="w-full"/>
        </div>
        {{ $postID }}
    </div>

    <div x-show="posts" x-cloak class="px-2 md:px-0 transition-all duration-300 flex h-screen w-full bg-black/20 fixed top-0 left-0 z-50  justify-center items-center">
        <div class="bg-white p-4 rounded-md min-w-[380px] space-y-2" @click.away="posts = false">
            <div>
                <div class="text-2xl">Post Something</div>
                <p class="text-sm">Post Anonimously</p>
            </div>
            <livewire:posts.post />
        </div>
    </div>

    <div x-show="comment" x-cloak class="px-2 md:px-0 transition-all duration-300 flex h-screen w-full bg-black/20 fixed top-0 left-0 z-50  justify-center items-center">

        <x-post-preloader />

        <div class="bg-white p-4 rounded-md  max-w-[360px] lg:max-w-[450px] min-w-[350px] lg:min-w-[450px] max-h-[540px] min-h-[550px] overflow-auto soft-scrollbar space-y-2" @click.away="comment = false">
            <div class="">
                <div class="bg-slate-200 w-full flex flex-col p-3">
                    <div class="flex gap-2 items-center">
                        <img class="rounded-full" src="{{ asset('images/sqaure.png') }}" width="30px" alt="">
                        <div>Anonymous</div>
                    </div>
                    <div class="text-sm py-2 px-5 ">{{$postdetails}}</div>
                    <div class="flex gap-4">
                        <button class="flex items-center gap-1">
                            <x-icon name="hand-thumb-up" solid/> 
                            <p class="text-sm">{{ $likes }}</p>
                        </button>
                        <button class="flex items-center gap-1">
                            <x-icon name="hand-thumb-down" solid/> 
                            <p class="text-sm">{{ $dislikes }}</p>
                        </button>
                    </div>
                </div>
            </div>
            <div>
                <form wire:submit='submit'>
                    <x-input label="Comment Something" wire:model='postComment' errorless placeholder="Metanga mebobo megago metarantado"/>
                </form>
            </div>
            <div>
                <div class="">
                    @forelse ($comments as $item)
                    <div class=" w-full flex flex-col p-3 border-b-[1px] border-gray-300">
                        <div class="flex gap-2 items-center">
                            <img class="rounded-full" src="{{ asset('images/sqaure.png') }}" width="30px" alt="">
                            <div>Anonymous</div>
                        </div>
                        <div class="text-sm py-2 px-5 ">{{ $item->comment }}</div>
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
                    @empty
                        
                    @endforelse
                </div>
            </div>
        </div>
        
    </div>
    
</div>