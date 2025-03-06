<?php

use App\Models\User;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rules\File;

new #[layout('components.layout')] 
class extends Component {
    use WithFileUploads;
    public $file;

    public function mount(User $user)
    {
        $this->file = $user->profile_picture;
    }

    public function submit()
    {

        $this->validate([
            'file' => ['required', File::types(['png,', 'jpg', 'jpeg'])],
        ]);
        $user = auth()->user();

        // Delete the old profile picture if it exists
        if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        // Store the new file
        $path = $this->file->store('profiles', 'public');

        // Update user record
        $user->update(['profile_picture' => $path]);

        $this->file = $path;
    }
    
}; ?>

<div class="bg-white px-2 py-4">
    <form wire:submit='submit' class="space-y-10">
        <div class="flex items-center gap-2">
            <img src="{{ asset('storage/'.$file) }}" class="w-24 rounded-full" alt="">
            <label for="file-upload" class="cursor-pointer">Change Profile Picture</label>
            <input wire:model='file' id="file-upload" type="file" name="profile_picture" class="hidden">
        </div>
        <x-button type="submit" amber label="Submit" class="w-full"/>
    </form>
</div>
