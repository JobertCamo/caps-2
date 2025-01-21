<?php

use Carbon\Carbon;
use App\Models\Employee;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

new #[layout('components.layout')]
    class extends Component {
    use WithPagination;

        public $q;
    
        public function search(){
            return Employee::query()
                ->when($this->q, fn($query) => $query->where('first_name', 'LIKE', '%' . $this->q . '%')->orWhere('last_name', 'LIKE', '%' . $this->q . '%'))->latest()->paginate(10);
        }

        public function with(){
            return [
                'employees' => $this->search(),
                'newEmployees' => Employee::where('created_at', '>=', Carbon::now()->subDays(2))->get(),

            ];
        }
        
}; ?>

    <div class=" mx-auto p-2">
        <div class="h-[50px] flex items-center text-lg bg-white drop-shadow-lg mx-5 mb-5 rounded-xl px-4">
            <a href="" class="font-bold">New Hire List Tracking</a>
            <x-icon name="slash" class="size-5"/>
            <a href="">New Hire List</a>
        </div>
        <div class="hidden lg:flex px-2">
            <div class="count-card cursor-pointer p-4 rounded-lg" >
                <div>
                    <p class="label-count lg:text-xl sm:text-base" id="tableslide">Total Employees</p>
                    <p class="text-3xl font-extrabold text-white" >{{ $employees->count() }}</p>
                </div>
                <div>
                    <img src="{{asset('images/applicants.png')}}" alt="" class="w-24 shrink-0">
                </div>
            </div>
            <div class="count-card cursor-pointer p-4 rounded-lg" >
                <div>
                    <p class="label-count lg:text-xl sm:text-base" id="tableslide">New Employees</p>
                    <p class="text-3xl font-extrabold text-white" >{{ $newEmployees->count() }}</p>
                </div>
                <div>
                    <img src="{{asset('images/thumbs.png')}}" alt="" class="w-24 shrink-0">
                </div>
            </div>
            <div class="count-card cursor-pointer p-4 rounded-lg" >
                <div>
                    <p class="label-count lg:text-xl sm:text-base" id="tableslide">Resigned Employees</p>
                    <p class="text-3xl font-extrabold text-white" >0</p>
                </div>
                <div>
                    <img src="{{asset('images/rocket.png')}}" alt="" class="w-24 shrink-0">
                </div>
            </div>
        </div>
        <div class="mt-6 bg-white p-6 rounded-lg shadow mx-4 h-screen">
            <div class="flex justify-between mb-5">
                <div>
                    <x-input wire:model.live='q' placeholder="Search" icon="magnifying-glass" />
                </div>
                <div>
                    <div x-data="{ open: false }" class="w-full hidden lg:flex">
                        <x-button x-on:click="open = ! open" amber label="Add Employee"></x-button>
                        <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex justify-center bg-black/40">
                            <div @click.away="open = false" class="modal-add mt-20 lg:w-fit w-fit h-fit flex justify-center items-center p-3 rounded-2xl">
                                <x-modal-form>
                                </x-modal-form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

            
            <div class="flex flex-col mx-2">
                <div class=" overflow-x-auto">
                    <div class="min-w-full inline-block align-middle h-screen">
                        <div class="overflow-hidden rounded-xl ">
                            <table class=" min-w-full">
                                <thead class="sticky top-0">
                                    <tr class="bg-gradient-to-r from-yellow-300 to-amber-400">
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">Name</th>
                            <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">Contact no.</th>
                            <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">Email</th>
                            <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">Department</th>
                            <th scope="col" class="p-5 text-sm leading-6 font-semibold text-gray-900 capitalize text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-300 ">
                                    @forelse ($employees as $employee)
                                        <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">{{ $employee->first_name }}</td>
                                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{ $employee->contact }} </td>
                                            <td class="p-5 whitespace-nowrap text-center text-sm leading-6 font-medium text-gray-900"> {{ $employee->email }}</td>
                                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{ $employee->department }}</td>
                                            
                                            
                                            <td class=" p-5">
                                                <x-dropdown>
                                                    <x-dropdown.item label="Edit" />
                                                    <x-dropdown.item label="Delete" />
                                                    <x-dropdown.item label="See History" />
                                                </x-dropdown>
                                            </td>
                                        </tr>
                                    @empty
                                        <div>NO DATA FOUND.</div>
                                    @endforelse
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

