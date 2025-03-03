<?php

use App\Models\Post;
use App\Models\Comment;
use Livewire\Volt\Component;

new class extends Component {

    public $postID;
    public $postdetail;
    public $likes;
    public $dislikes;
    public $comments;
    public $postComment;
    public $paginate = 10;

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

    public function addpag()
    {
        $this->paginate += 5;
    }

    public function update(Post $post, Comment $comment)
    {
        $this->postID = $post->id;
        $this->postdetail = $post->post;
        $this->likes = $post->likes;
        $this->dislikes = $post->dislikes;
        $this->comments = $comment->comment;
    }

    public function dislikePost(Post $post)
    {
        $post->dislikes++;
        $post->save();
    }

    public function likePost(Post $post)
    {
        $post->likes++;
        $post->save();
    }

    public function dislikeComment(Comment $comment)
    {
        $comment->dislikes++;
        $comment->save();
    }

    public function likeComment(Comment $comment)
    {
        $comment->likes++;
        $comment->save();
    }

    public function getPosts()
    {
        return Post::with('comments')->latest()->paginate($this->paginate);
    }

    public function with()
    {
        $comment = Comment::find($this->postID);
        $id = '';
        if ($this->postID) {
            $id = $this->postID;
        }
        return [
            'posts' => $this->getPosts(),
            // 'comments' => $this->comments ?? [],
            'comments' => $comment,
            'taes' => Comment::where('post_id', $id)->latest()->paginate(10),
        ];
    }

}; ?>

<div class=" overflow-auto w-full ">
    @forelse ($posts as $post)

    <div class=" shadow-lg border-b-2 border-[#787878]  w-full flex flex-col p-3  bg-[#F6F1E9]">
        <div class="flex gap-2 items-center">
            <img class="rounded-full" src="{{ asset('images/sqaure.png') }}" width="30px" alt="">
            <div class="block">
                @can('view-page')
                    <div>{{ $post->user->name }} <span class="text-xs">- {{ $post->user->department }}</span></div>
                @endcan
                @cannot('view-page')
                    <div>Anonymous</div>
                @endcannot
                <p class="text-xs">{{ $post->created_at->setTimezone('Asia/Manila')->format('F d, Y - h:i A') }}</p>
            </div>
        </div>
        <div class="text-sm py-2 px-5 break-words ">{{$post->post}}</div>
        <div class="flex gap-4">
            <button class="flex items-center gap-1">
                <x-icon wire:click='likePost({{ $post->id }})' name="hand-thumb-up" solid/>
                <p class="text-sm">{{ $post->likes }}</p>
            </button>
            <button class="flex items-center gap-1">
                <x-icon wire:click='dislikePost({{ $post->id }})' name="hand-thumb-down" solid/>
                <p class="text-sm">{{ $post->dislikes }}</p>
            </button>
            <button @click="comment = true"  class="flex items-center gap-1">
                <x-icon wire:click="update({{ $post->id }},{{ optional($post->comments->first())->id ?? '' }})" name="chat-bubble-bottom-center-text" solid/>
            </button>
        </div>
    </div>
    @empty
        <div>No Post Found.</div>
    @endforelse
    <div class="text-center mt-2">
        <x-button type="submit" label="More" wire:click='addpag()' class="w-full" wire:loading.class='animate-pulse' white />
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
                    <div class="text-sm py-2 px-5 ">{{$postdetail}}</div>
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
                    @forelse ($taes as $item)
                    <div class=" w-full flex flex-col p-3 border-b-[1px] border-gray-300">
                        <div class="flex gap-2 items-center">
                            <img class="rounded-full" src="{{ asset('images/sqaure.png') }}" width="30px" alt="">
                            <div>Anonymous</div>
                        </div>
                        <div class="text-sm py-2 px-5 ">{{ $item->comment }}</div>
                        <div class="flex gap-4">
                            <button class="flex items-center gap-1">
                                <x-icon name="hand-thumb-up" wire:click='likeComment({{ $item->id }})' solid/>
                                <p class="text-sm">{{ $item->likes }}</p>
                            </button>
                            <button class="flex items-center gap-1">
                                <x-icon name="hand-thumb-down" wire:click='dislikeComment({{ $item->id }})' solid/>
                                <p class="text-sm">{{ $item->dislikes }}</p>
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
