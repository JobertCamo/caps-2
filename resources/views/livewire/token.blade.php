<?php

use Livewire\Volt\Component;

new class extends Component {

    public $token = null;

    public function submit()
    {
        $user = Auth::user();
        $this->token = $user->createToken('hr-token')->plainTextToken;
    }
    
}; ?>

<div class="text-center space-y-5">
    <form wire:submit='submit'>
        <x-button type="submit" label="Generate Token" warning/>
    </form>
    <div class="space-y-2">
        @if ($token)
            <div class="text-2xl font-bold"> Copy This Token. </div>
            <p>{{ $token }}</p>
        @endif
    </div>
</div>