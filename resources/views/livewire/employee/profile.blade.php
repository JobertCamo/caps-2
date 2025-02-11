<?php

use App\Models\User;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

new #[layout('components.layout')]
class extends Component {

    use WithFileUploads;

    public $file;

    public function submit()
    {
        $data = $this->validate([
            'file' => ['required', File::image()->max(1024)],
        ]);

        $file = $this->file->store('profiles', 'public');

        $user = User::find(Auth::user()->id);
        
        $user->profile_picture = $file;
        $user->save();
        
    }
    
    public function with()
    {
        return [
            'user' => Auth::user(),
        ];
    }
    
}; ?>

<div class="grid lg:grid-cols-2 bg-white p-5 rounded-xl">
    <form class="space-y-5" wire:submit='submit'>
        <div class="space-y-5">
            <div class="flex items-center gap-2">
                <img src="{{ 'storage/'.$user->profile_picture }}" class="w-24 rounded-full" alt="">
                <label for="file-upload" class="cursor-pointer">Change Profile Picture</label>
                <input wire:model='file' id="file-upload" type="file" name="profile_picture" class="hidden">
            </div>
                <x-input errorless label="Name" value="{{ $user->name }}" readonly/>
                <x-input errorless label="Email" value="{{ $user->email }}" readonly/>
                <x-input errorless label="Contact Number" value="{{ $user->email }}" readonly/>
                <x-input errorless label="Department" value="{{ $user->department }}" readonly/>
                <x-input errorless label="Password" value="" readonly/>
            </div>
            <x-button type="submit" label="Submit" class="w-full" amber />
    </form>
</div>
