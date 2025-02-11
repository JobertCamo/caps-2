<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

new #[layout('components.layout')]
 class extends Component {

    use WithFileUploads;

    public $job_position;
    public $email;
    public $contact;
    public $reason;
    public $file;

    public function submit()
    {
        $data = $this->validate([
            'job_position' => ['required'],
            'email' => ['required'],
            'contact' => ['required'],
            'reason' => ['required'],
            'file' => ['required', File::types(['pdf'])],
        ]);

        $data['name'] = Auth::user()->name;
        $data['department'] = Auth::user()->department;
        $data['file'] = $this->file->store('resignations', 'public');

        Auth::user()->resignation()->create($data);

        $this->dispatch('Resignation-completed');
        // sleep(2);
        $this->redirect('/employee-dashboard', navigate: true);
    }
    
}; ?>

<div class="grid lg:grid-cols-2 bg-white p-5 rounded-xl">
    <x-notification on="Resignation-completed" >
        <x-alert title="Submitted." positive solid />
    </x-notification>
    <div class="space-y-5">
        <div class="space-y-2">
            <div class="text-3xl">Employee Resignation Form</div>
            <div class="px-1">
                <p>Please be advised that undersigned hereby tenders this resignation, effective immediately. Please acknowledge receipt and acceptance of this resignation.</p>
                <p>Thank you for your cooperation.</p>
            </div>
        </div>
        <form class="space-y-5" wire:submit='submit'>
            <x-input errorless wire:model='job_position' label="Job Position" />
            <x-input errorless wire:model='email' label="Email" />
            <x-input errorless wire:model='contact' label="Contact Number" />
            <x-textarea errorless wire:model='reason' label="Reason" />
            <x-input errorless wire:model='file' type="file" label="Resignation Letter" />
            <x-button type="submit" label="Submit" class="w-full" amber />
        </form>
    </div>
</div>
