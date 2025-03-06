<?php

use App\Models\User;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

new #[layout('components.layout')]
class extends Component {

    use WithFileUploads;

    public $external_user_id;
    public $name;
    public $role;
    public $file;
    public $email;
    public $password;
    public $password_confirmation;

    public function mount(User $user)
    {
        $this->file = $user->profile_picture;
        $this->email = $user->email;
        $this->external_user_id = $user->external_user_id;
        $this->role = $user->role;
        $this->name = $user->name;
    }

    public function submit()
    {
        $data = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:4', 'confirmed'],
        ]);

        $response = Http::put('https://admin.gwamerchandise.com/api/users/' . $this->external_user_id, [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'status' => 'active',
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation
        ]);


        // dd($response->json());
        
        $user = User::find(Auth::user()->id);

        $user->email = $this->email;
        $user->save();
        
        $this->dispatch('success-notif');
    }
    
    public function with()
    {
        return [
            'user' => Auth::user(),
        ];
    }
    
}; ?>

<div class="grid lg:grid-cols-2 bg-white p-5 rounded-xl">
    <x-notification on="success-notif" >
        <x-alert title="Profile Updated" positive solid />
    </x-notification>
    <form class="space-y-5" wire:submit='submit'>
        <div class="space-y-5">
            <div class="flex items-center gap-2">
                <img src="{{ asset('storage/'.$file) }}" class="w-24 rounded-full" alt="">
                {{-- <label for="file-upload" class="cursor-pointer">Change Profile Picture</label> --}}
                {{-- <input wire:model='file' id="file-upload" type="file" name="profile_picture" class="hidden"> --}}
            </div>
                <x-input errorless label="Name" value="{{ $user->name }}" readonly/>
                <x-input errorless wire:model='email' label="Email"/>
                {{-- <x-input errorless label="Contact Number" value="{{ $user->email }}" readonly/> --}}
                <x-input  wire:model='password' label="New Password" />
                <x-input  wire:model='password_confirmation' label="Confirm New Password" />
            </div>
            <x-button type="submit" wire:click='submit()' label="Submit" class="w-full" amber />
    </form>
    <a href="/resignation" class="mt-5 lg:mt-0 self-end text-sm justify-self-end text-red-500">Resignation Form</a>
</div>
