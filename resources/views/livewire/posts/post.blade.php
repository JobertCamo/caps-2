<?php

use App\Models\Post;
use Livewire\Volt\Component;

new class extends Component {
    public $post;

    public function submit()
    {
        $this->validate([
            'post' => ['required'],
        ]);

        Post::create([
            'user_id' => Auth::user()->id,
            'post' => $this->post,
        ]);
        $this->reset();
        $this->redirect('/wall');
    }
    
}; ?>

<form class="flex flex-col justify-center items-center space-y-4"  wire:submit="submit">
    <div class="space-y-4 w-full">
        <x-textarea wire:model='post' errorless placeholder="Post Something" />
    </div>
    <div class="w-full mt-5">
        <x-button type="submit" label="Post" class="w-full" amber />
    </div>
</form>
