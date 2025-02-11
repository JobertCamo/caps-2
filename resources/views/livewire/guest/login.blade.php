<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

new class extends Component {

    public $email;
    public $password;

    public function submit()
    {
        $request = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        if(! Auth::attempt(['email' => $this->email, 'password' => $this->password]))
        {
            throw ValidationException::withMessages([
                'email' => 'Email or password do not match!'
            ]);
        }
        session()->regenerate();
        Auth::user()->role !== 'hr' ? $this->redirect('/employee-dashboard') : $this->redirect('/candidate-list');
    }
    
}; ?>

<form class="space-y-5" wire:submit='submit'>
    <div>
        <x-input wire:model='email' icon="user" label="Email" />
    </div>
    <div>
        <x-password wire:model='password' icon="key" label="Password" />
    </div>
    <div class="pt-2">
        <x-button type="submit" rose label="Login" class="w-full" />
    </div>
    <div class="flex justify-between items-center text-[12px]">
        <a href="">Remember me</a>
        <a href="">Forgot Password?</a>
    </div>
    <div class="text-[12px]">
        <a href="">check account</a>
    </div>
</form>