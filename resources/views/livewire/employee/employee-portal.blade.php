<?php

use App\Models\Employee;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

new #[layout('components.layout')]
    class extends Component {
    use WithPagination;

       
        
}; ?>
<div >
    
    <div class="flex flex-col md:flex-row items-center justify-between bg-white shadow-md rounded-lg p-4 mb-4">
        <div class="flex items-center space-x-4">
            <div class="font-bold">Employee Dashboard / <span class="font-normal">Home</span></div>
        </div>
    </div>
    <div class="grid lg:grid-cols-5 gap-4">
        <div class="lg:col-span-3 gap-4 flex flex-col">
            <div class="bg-white flex items-center gap-4 p-3 shadow-md rounded-lg">
                <img class="w-32 h-32" src="{{ asset('images/sqaure.png') }}" alt="">
                <div >
                    <div class="text-2xl font-bold">Christina Moran</div>
                    <div><span class="font-bold">Job Title:</span> Astronaut</div>
                    <div><span class="font-bold">Department:</span> IT Department</div>
                    <div><span class="font-bold">Hired Date:</span> January 20 2024</div>
                </div>
            </div>
            <div class=" bg-white lg:max-h-[366px] xl:min-h-[600px] shadow-md rounded-lg">
                <div class="px-4 py-3 text-xl font-bold">Employee Activity</div>
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 px-3 py-3">
                    <a href="/schedules" wire:navigate.hover>
                        <div class="transition duration-200 hover:scale-105 flex flex-col justify-between items-center bg-gray-200 p-4 rounded-lg shadow bg-gradient-to-r from-amber-400 to-yellow-300">
                            <div class="flex items-center gap-4 mb-2 mt-2">
                                <img src="{{ asset('images/setting.png') }}" alt="" class="w-12 h-12  rounded mb-2">
                                <span class="font-bold text-xl ">69</span>
                            </div>
                            <p class="text-sm font-bold">Profile</p>
                        </div>
                    </a>
                    <a href="/task-list" wire:navigate.hover>
                        <div class="transition duration-200 hover:scale-105 flex flex-col justify-between items-center bg-gray-200 p-4 rounded-lg shadow bg-gradient-to-r from-amber-400 to-yellow-300">
                            <div class="flex items-center gap-4 mb-2 mt-2">
                                <img src="{{ asset('images/calendar.png') }}" alt="" class="w-12 h-12  rounded mb-2">
                                <span class="font-bold text-xl ">69</span>
                            </div>
                            <p class="text-sm font-bold">Tasks List</p>
                        </div>
                    </a>
                    <a href="/schedules" wire:navigate.hover>
                        <div class="transition duration-200 hover:scale-105 flex flex-col justify-between items-center bg-gray-200 p-4 rounded-lg shadow bg-gradient-to-r from-amber-400 to-yellow-300">
                            <div class="flex items-center gap-4 mb-2 mt-2">
                                <img src="{{ asset('images/calendar.png') }}" alt="" class="w-12 h-12  rounded mb-2">
                                <span class="font-bold text-xl ">69</span>
                            </div>
                            <p class="text-sm font-bold">Resignation</p>
                        </div>
                    </a>
                    <a href="/schedules" wire:navigate.hover>
                        <div class="transition duration-200 hover:scale-105 flex flex-col justify-between items-center bg-gray-200 p-4 rounded-lg shadow bg-gradient-to-r from-amber-400 to-yellow-300">
                            <div class="flex items-center gap-4 mb-2 mt-2">
                                <img src="{{ asset('images/calendar.png') }}" alt="" class="w-12 h-12  rounded mb-2">
                                <span class="font-bold text-xl ">69</span>
                            </div>
                            <p class="text-sm font-bold">Freedom Wall</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="bg-white lg:col-span-2 h-[100%] flex flex-col shadow-md rounded-lg lg:max-h-[508px] xl:max-h-[768px] overflow-y-scroll scrollbar-hidden">
            <div class="p-3 grid grid-cols-2 gap-3">
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-600 rounded-lg p-2 space-y-3 text-white">
                    <div class="flex justify-between">
                        <div>Task Completed</div>
                        <x-icon name="rectangle-stack" />
                    </div>
                    <div class="text-2xl">5/10</div>
                </div>
                <div class="bg-gradient-to-r from-sky-400 to-sky-600 rounded-lg p-2 space-y-3 text-white">
                    <div class="flex justify-between">
                        <div>Task Completed</div>
                        <x-icon name="rectangle-stack" />
                    </div>
                    <div class="text-2xl">5/10</div>
                </div>
                
            </div>
            <div class="px-3 bg-white pb-3">
                <div class="text-xl">Announcement</div>
                <div class="bg-[#E5E7EB] mt-3 ">
                    <div class=" p-3">
                        <div class="flex justify-between">
                            <div class="font-bold">Announce Title</div>
                            <x-icon name="ellipsis-horizontal"/>
                        </div>
                        <p class="text-sm">lorem ipsum aksjx skskaowjsd s lorem ipsum aksjx skskaowjsd s</p>
                        <div class="flex justify-between items-center mt-1">
                            <p>pangalan eto</p>
                            <p>2 hours ago</p>
                        </div>
                    </div>
                </div>
                <div class="bg-[#E5E7EB] mt-3 ">
                    <div class=" p-3">
                        <div class="flex justify-between">
                            <div class="font-bold">Announce Title</div>
                            <x-icon name="ellipsis-horizontal"/>
                        </div>
                        <p class="text-sm">lorem ipsum aksjx skskaowjsd s lorem ipsum aksjx skskaowjsd s</p>
                        <div class="flex justify-between items-center mt-1">
                            <p>pangalan eto</p>
                            <p>2 hours ago</p>
                        </div>
                    </div>
                </div>
                <div class="bg-[#E5E7EB] mt-3 ">
                    <div class=" p-3">
                        <div class="flex justify-between">
                            <div class="font-bold">Announce Title</div>
                            <x-icon name="ellipsis-horizontal"/>
                        </div>
                        <p class="text-sm">lorem ipsum aksjx skskaowjsd s lorem ipsum aksjx skskaowjsd s</p>
                        <div class="flex justify-between items-center mt-1">
                            <p>pangalan eto</p>
                            <p>2 hours ago</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
    

