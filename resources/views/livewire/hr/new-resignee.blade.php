<?php

use App\Models\User;
use App\Models\Resignation;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;


new class extends Component {

    use WithFileUploads;

    public $selectedUser = null;
    public $name;
    public $contact;
    public $department;
    public $email = null;
    public $job_position;
    public $reason;
    public $file;

    public function submit()
    {
        $data = $this->validate([
            // 'contact' => ['required'],
            'job_position' => ['required'],
            'reason' => ['required'],
            // 'file' => ['required', File::types(['pdf'])],
        ]);
        $data['user_id'] = $this->selectedUser;
        $data['name'] = $this->name;
        $data['email'] = $this->email;
        $data['department'] = $this->department;
        // $data['file'] = $this->file->store('resignations', 'public');
        $data['contact'] = "N/A";
        $data['file'] = "N/A";
        Resignation::create($data);
        $this->redirect('/offboarding');
    }
    
    public function updated()
    {
        $data = User::find($this->selectedUser);
        $this->email = $data->email;
        // $this->contact = $data->email;
        $this->name = $data->name;
        $this->department = $data->department;
    }

    public function with()
    {
        return [
            'users' => User::where('role', 'Employee')->get(),
        ];
    }
    
}; ?>

<form wire:submit='submit'>
    <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
        <legend class="font-bold text-2xl text-amber-600">Add Resignee</legend>
        <div class=" flex items-center justify-center">
            <div class=" space-y-2 rounded-lg shadow-lg">
                    <div class="">
                        <label for="" class="">Employee Name</label>
                        <select wire:model.live='selectedUser' placeholder="Select name" class="border-[1px] border-gray-300 rounded-md p-2 shadow-sm w-full">
                            <option value="">Select Employee</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="grid grid-cols-1  gap-4">
                        {{-- <div>
                            <label class="block text-gray-700 text-sm font-medium mb-1">Contact</label>
                            <x-input class="" wire:model.live='contact' />
                        </div> --}}
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-1">Job Type</label>
                            <x-input class="" wire:model.live='job_position'/>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-1">Email</label>
                        <x-input type="text" class="" wire:model.live='email' readonly/>
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-1">Reason</label>
                        <x-textarea type="text"  wire:model.live='reason'/>
                    </div>
                    {{-- <div>
                        <label class="block text-white text-sm font-medium mb-1">Resignation letter</label>
                        <x-input type="file" class="" wire:model.live='file'/>
                    </div> --}}
            </div>
        </div>
    </fieldset>
    <div class="flex justify-end items-center m-2">
        <x-button type="submit" emerald label="Submit" />
    </div>
</form>
