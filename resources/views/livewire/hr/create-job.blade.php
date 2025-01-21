<?php

use App\Models\Job;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

new #[layout('components.layout')]
 class extends Component {

    use WithPagination;


    public $link;

    public function delete(Job $job)
    {

        $job->delete();
        $this->dispatch('delete-notif');

    }

    
    public function with()
    {
        return [
            'AllJobs' => Job::latest()->simplePaginate(6),
        ];
    }
    
}; ?>

<div class="overflow-y-auto  " x-data="{jobCreate: false}">
    {{-- NEWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW --}}
    <x-notification on="success-notif" >
        <x-alert title="Job Posted!" positive solid />
    </x-notification>
    <x-notification on="delete-notif" >
        <x-alert title="Job Deleted!" negative solid />
    </x-notification>
    <div class="h-[50px]  flex justify-between items-center text-lg bg-white drop-shadow-lg mx-2 mb-5 rounded-xl px-4">
        <div class="flex">
            <a href="" class="font-bold">Job Posting</a>
            &nbsp;/&nbsp;
            <a href="">Candidate</a>
        </div>
        <div>
            <x-button @click="jobCreate = true" amber label="Post Job" />
        </div>
    </div>
    

    <div class="mx-1 mt-5 justify-between flex bg-white py-2 px-2 rounded-xl">
        <div>
            <x-input wire:model.live='q' icon="magnifying-glass" placeholder="Candidate name" />
        </div>
        
    </div>
    <div class="h-[70%] mt-5 w-full overflow-x-auto hide-scrollbar">
        <div class="flex flex-col ">
            <div class=" overflow-x-auto">
                <div class="min-w-full inline-block align-middle h-screen">
                    <div class="overflow rounded-xl ">
                        <table class=" min-w-full ">
                            <thead class="">
                                <tr class="bg-gradient-to-r from-yellow-300 to-amber-400">
                                    <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Job Title
                                    </th>
                                    <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Description
                                    </th>
                                    <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Location
                                    </th>
                                    <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Schedule
                                    </th>
                                    <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Salary
                                    </th>
                                    <th scope="col" class="p-5 text-sm leading-6 font-semibold text-gray-900 capitalize text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 text-center" wire:poll>
                                @if (!empty($AllJobs))
                                    @foreach ($AllJobs as $applicant)
                                    <x-tables.job-table :$applicant />
                                    @endforeach
                                @else
                                     NO DATA FOUND.
                                @endif
                            </tbody>
                        </table>
                        <div class=" bg-white">
                            {{-- @if ($link) --}}
                                <div class="mx-3 pb-2">
                                    {{ $AllJobs->links() }}
                                </div>
                            {{-- @endif --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:hr.post-job>

</div>
