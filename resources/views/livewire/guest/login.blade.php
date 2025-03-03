<?php

use App\Models\User;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

new class extends Component {

    public $email;
    public $password;

    public function submit()
    {
        $request = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:4'],
        ]);

        // if(! Auth::attempt(['email' => $this->email, 'password' => $this->password]))
        // {
        //     throw ValidationException::withMessages([
        //         'email' => 'Email or password do not match!'
        //     ]);
        // }
        // session()->regenerate();
        // Auth::user()->role !== 'hr' ? $this->redirect('/employee-dashboard') : $this->redirect('/candidate-list');

        $response = Http::post('https://admin.gwamerchandise.com/api/auth', [
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $userData = $response->json();

        if ($response->successful()) {
            $userdatas = $userData['user'];

            $user = User::where('external_user_id', $userdatas['id'])->first();
            if($user){
                Auth::login($user);
                return $user->role !== 'HR' ? $this->redirect('/employee-dashboard') : $this->redirect('/candidate-list');
            }else{
                $data = User::create([
                    'name' => $userdatas['name'],
                    'email' => $userdatas['email'],
                    'password' => Hash::make('defaultpassword'),
                    'role' =>  $userdatas['role'],
                    'department' => fake()->randomElement(['IT Department', 'Sales Department']),
                    'external_user_id' => $userdatas['id'],
                ]);
                Auth::login($data);
                return $data->role !== 'HR' ? $this->redirect('/employee-dashboard') : $this->redirect('/candidate-list');
            }
            
        }else {
            throw ValidationException::withMessages([
                'email' => 'Email or password do not match!'
            ]);

        }
        
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