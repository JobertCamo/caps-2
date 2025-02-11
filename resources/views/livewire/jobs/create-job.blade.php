<?php

use App\Models\Job;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Auth;

new class extends Component {

    public $title;
    public $requirements;
    public $salary;
    public $location;
    public $schedule;
    public $description;
    public $tags;
    public $department;

    public function submit()
    {
        $data = $this->validate([
            'title' => ['required', 'string'],
            'description' => ['required','string', 'max:255'],
            'requirements' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'string'],
            'location' => ['required', 'string'],
            'schedule' => ['required'],
            'tags' => ['required'],
            'department' => ['required'],
        ]);

        $this->authorize('create', Job::class);

        $job = Auth::user()->jobs()->create(Arr::except($data, 'tags'));

        // $job = Job::create(Arr::except($data, 'tags'));

        if(!empty($data['tags']))
        {
            foreach (explode(',', strtolower($data['tags'])) as $requirement) {
                $job->tag(trim($requirement));
            }
        }

        // $this->reset();
        $this->dispatch('success-notif');

    }
    
}; ?>

<div class="bg-white p-4 rounded-md">
    <x-notification on="success-notif" >
        <x-alert title="Job Posted!" positive solid />
    </x-notification>
    <div class="mb-3 text-2xl">Publish a Job</div>
    <form class="flex flex-col justify-center items-center space-y-4" @click.away="jobCreate = false" wire:submit="submit">
        <div class="grid grid-cols-2 gap-3 items-center">
            <x-input label="Job Title" wire:model="title" errorless />
            <x-input label="Salary" wire:model="salary" errorless/>
            <div class="flex gap-3 items-center">
                <x-native-select
                    label="Schedule"
                    wire:model="schedule"
                    errorless
                    placeholder="Select"
                    :options="['Full-Time', 'Part-Time', 'Internship']"
                />
            </div>
            <x-native-select
                    label="Location"
                    wire:model="location"
                    errorless
                    placeholder="Select"
                    :options="['Quezon City', 'Pasig City']"
                />
            <x-input label="Tags" wire:model="tags" errorless/>
            <x-input label="Department" wire:model="department" errorless/>
        </div>
        <div class="w-full flex items-center gap-3 space-x-2 ">
            <x-textarea label="Description" placeholder="write description" class="" wire:model="description" errorless/>
            <x-textarea label="Requiments" placeholder="separated by comma ','" class="" wire:model="requirements" errorless/>
        </div>
        <div class="w-full">
            <x-button type="submit" label="Publish" class="w-full" amber />
        </div>
    </form>
</div>
