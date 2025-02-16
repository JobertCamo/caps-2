<?php

use App\Models\Task;
use App\Models\User;
use Livewire\Volt\Component;

new class extends Component {

    public $department;
    public $title;
    public $date_start;
    public $deadline;
    public $description;

    public function submit()
    {

        $users = User::where('department', $this->department)->get();
        
        $validated = $this->validate([
            'title' => ['required'],
            'description' => ['required'],
            'department' => ['required'],
            'date_start' => ['required'],
            'deadline' => ['required'],
        ]);

        $tasks = $users->map(function ($user) use ($validated) {
            return [
                'user_id' => $user->id,
                'title' => $validated['title'],
                'description' => $validated['description'],
                'date_start' => $validated['date_start'],
                'deadline' => $validated['deadline'],
            ];
        });

        Task::insert($tasks->toArray());
        $this->redirect('/hr-task');
    
    }
    
}; ?>

<div x-cloak x-transition x-show="open" class="fixed inset-0 z-10 flex items-center justify-center bg-black/40">
    <div @click.away="open = false" class="modal-add2 mt-20 flex justify-center items-center p-3 rounded-2xl">
        <div>
            <form wire:submit='submit'>
                <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                    <legend class="font-bold text-2xl text-amber-600">Create Task</legend>
                    <div class=" flex items-center justify-center">
                        <div class=" rounded-lg shadow-lg space-y-4">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <x-native-select
                                            label="Department"
                                            wire:model="department"
                                            errorless
                                            placeholder="Select"
                                            :options="['IT Department', 'Sales Department']"
                                            class="h-9"
                                        />
                                    </div>
                                    <div>
                                        <x-input errorless wire:model="title" type="text" label="Title" class="" />
                                    </div>
                                    <div>
                                        <x-input errorless wire:model="date_start" type="date" class="" label="Start Date" />
                                    </div>
                                    <div>
                                        <x-input errorless wire:model="deadline" type="date" class=""  label="Deadline" />
                                    </div>
                                </div>
                                <div>
                                    <x-textarea errorless wire:model='description' type="text" label="Task Description" />
                                </div>
                        </div>
                    </div>
                </fieldset>
                <div class="flex justify-end items-center m-2">
                    <x-button type="submit" emerald label="Submit" />
                </div>
            </form>
        </div>
    </div>
</div>
