<?php

use App\Models\Job;
use Livewire\Volt\Component;

new class extends Component {

    public $q;
    public $alphabetical;

    public function getJobs()
    {
        return Job::query()
            ->when($this->q, fn($query) => $query->where('title', 'LIKE', '%' . $this->q . '%'))
            ->when($this->alphabetical, fn($query) => $query->orderBy('title' , 'asc'))
            ->latest()
            ->paginate(8);
    }

    public function publish(Job $job)
    {
        // dd($job);
        $job->update([
            'status' => 'published'
        ]);
    }
    public function unpublish(Job $job)
    {
        // dd($job);
        $job->update([
            'status' => 'private'
        ]);
    }

    public function delete(Job $job)
    {
        $job->delete();
        $this->dispatch('delete-notif');

    }

    public function with(): array
    {
        return [
            'jobs' => $this->getJobs(),
        ];
    }
    
}; ?>

<div class="space-y-5 rounded-lg bg-white  px-4 py-1 ">
    <x-notification on="delete-notif" >
        <x-alert title="Job Deleted!" negative solid />
    </x-notification>
    <div class="border-[1px] border-gray-200 flex justify-between items-center gap-4 bg-slate-100 py-2 px-2 rounded-xl">
        <div class="flex items-center gap-5">
            <x-input wire:model.live='q' icon="magnifying-glass" placeholder="Search Job Title" />
            <x-checkbox warning sm id="rounded-md" wire:model.live="alphabetical" rounded="base" label="Alphabetical" md />
        </div>
        {{-- <x-button class="hidden md:block" label="Post Job" rounded amber @click=" jobCreate = true " /> --}}
        {{-- <x-button class="block md:hidden" label="+" rounded amber @click=" jobCreate = true " /> --}}
    </div>
    <div class="grid lg:grid lg:grid-cols-4 gap-5">
        @forelse ($jobs as $job)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden border-[1px] flex flex-col justify-between border-gray-200 min-h-[220px]">
                <div class="flex justify-between items-center px-1 border-b-[1px] border-gray-300">
                    <div class="p-2 font-bold lg:text-md">{{ $job->title }}</div>
                    <div class="flex items-center gap-4 relative" x-data="{del: false, pub: false}">
                        {{-- <a href="/edit-job/{{ $job->id }}"><x-icon name="pencil-square" color="blue" solid /></a> --}}
                        <button @click="pub = true"><x-icon name="ellipsis-vertical" /></button>
                        <div x-show="pub" x-cloak @click.away="pub = false" class="absolute top-7 right-7 bg-white shadow-xl px-3 border-[1px] border-gray-500 rounded-md">
                            <button class="hover:text-green-700" wire:click='publish({{ $job->id }})'>Publish</button>
                            <button class="hover:text-gray-600" wire:click='unpublish({{ $job->id }})'>Unpublish</button>
                            <button class="hover:text-red-500" @click="del = true">Delete</button>
                        </div>
                        {{-- <button><x-icon name="trash" solid color="red" @click="del = true" /></button> --}}
                        <div x-show="del" x-cloak class="px-2 md:px-0 transition-all duration-300 flex h-screen w-full bg-black/20 fixed top-0 left-0 z-50  justify-center items-center">
                            <div class="bg-white text-center p-5 space-y-4">
                                <div class="text-xl">Confirm Delete?</div>
                                <div class="flex items-center gap-5">
                                    <x-button label="Cancel" negative @click="del = false" />
                                    <x-button label="Confirm" positive wire:click="delete('{{ $job->id }}')" @click="del = false" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-2 text-md lg:text-sm text-gray-500">
                    {{ $job->description }}
                </div>
                <div class="flex justify-between p-2 border-t-[1px] border-gray-300 text-sm">
                    <div>{{ $job->location }}</div>
                    <div>{{ $job->salary }}</div>
                    @if (Str::lower($job->status) === "published")
                        <div class="text-xs text-green-500">{{ $job->status }}</div>
                    @else
                        <div class="text-xs text-gray-500">{{ $job->status }}</div>
                    @endif
                    
                </div>
            </div>
        @empty
        <div class="">No Data Found.</div>
        @endforelse
        
        
       
    </div>
    <div class="">
        {{ $jobs->links() }}
    </div>
</div>
