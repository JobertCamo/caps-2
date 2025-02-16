<?php

use App\Models\UserTask;
use Livewire\Volt\Component;

new class extends Component {
    public $task;
    public $file;
    public $date_completed;

    public function submit()
    {
        $this->validate([
            'date_completed' => ['required'],
        ]);

        UserTask::create([
            'user_id' => $this->task->user_id,
            'title' => $this->task->title,
            'task_description' => $this->task->description,
            'date_completed' => $this->date_completed,
        ]);

        $this->task->delete();
        $this->redirect('/task-list');
    }
    
}; ?>

<div class="bg-white p-4 rounded-md max-w-[380px]" @click.away="tass = false">
    <x-notification on="success-notif" >
        <x-alert title="Job Posted!" positive solid />
    </x-notification>
    <div class="mb-3 text-2xl">Submit</div>
    <form class="flex flex-col justify-center items-center space-y-4"  wire:submit="submit">
        <div class="space-y-4">
            @if ($task)
                
            <div class="text-lg"> {{ $task['title'] }}</div>
            <div>
                <div>Description</div>
                <p class="text-sm text-gray-500">{{ $task->description }}</p>
            </div>
            <div>Deadline: <span>{{ $task->deadline }}</span></div>
            @endif
            <x-datetime-picker
                wire:model="date_completed"
                label="Date Completed"
                placeholder="Date Completed"
                errorless
            />
            <x-input type="file" label="Proof ex. image" class="" />
        </div>
        <div class="w-full mt-5">
            <x-button type="submit" label="Mark as Done" class="w-full" amber />
        </div>
    </form>
</div>
