<?php

use Carbon\Carbon;
use App\Models\Employee;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Pagination\LengthAwarePaginator;

new #[layout('components.layout')]
    class extends Component {
    use WithPagination;

        public $q;
        public $sort;

        public function userAccounts()
{
    $response = Http::get('https://admin.gwamerchandise.com/api/users');

    if ($response->successful()) {
        $userData = $response->json();

        // Ensure the 'users' key exists in the response
        if (!isset($userData['users'])) {
            return ['error' => 'Users data not found'];
        }

        // Filter only users with role 'Employee'
        $employees = collect($userData['users'])->where('role', 'Employee')->values();

        // Pagination settings
        $perPage = 10; // Change as needed
        $page = request()->get('page', 1); // Get current page from request
        $currentItems = $employees->forPage($page, $perPage);

        // Create paginator instance
        $paginatedEmployees = new LengthAwarePaginator(
            $currentItems,
            $employees->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return $paginatedEmployees;
    } 

    // Handle failed response
    return ['error' => 'Failed to fetch user data', 'status' => $response->status()];
}
    
        public function search(){
            return Employee::query()
                ->when($this->q, fn($query) => $query->where('first_name', 'LIKE', '%' . $this->q . '%')->orWhere('last_name', 'LIKE', '%' . $this->q . '%'))
                ->when($this->sort, function ($query) {
                $this->sort === 'Firstname' ? $query->orderBy('first_name' , 'asc') : ($this->sort === 'Lastname' ? $query->orderBy('last_name', 'asc') : '');})
                ->latest()->paginate(10);
        }

        public function with(){
            return [
                'employees' => $this->search(),
                'newEmployees' => Employee::where('created_at', '>=', Carbon::now()->subDays(2))->get(),
                'users' => $this->userAccounts(),
            ];
        }
        
}; ?>

    <div class="  " x-data="{ open: false, newH: 'test' }">
        <div class="h-[50px] flex items-center text-lg bg-white drop-shadow-lg mx-5 mb-5 rounded-xl px-4">
            <a href="" class="font-bold">New Hire List Tracking</a>
            <x-icon name="slash" class="size-5"/>
            <a href="">New Hire List</a>
        </div>
        <div class="hidden lg:flex px-2">
            <div @click="newH = 'test'" class="count-card cursor-pointer p-4 rounded-lg" >
                <div>
                    <p class="label-count lg:text-xl sm:text-base" id="tableslide">Total New Hired Employees</p>
                    <p class="text-3xl font-extrabold text-white" >{{ $employees->count() }}</p>
                </div>
                <div>
                    <img src="{{asset('images/applicants.png')}}" alt="" class="w-24 shrink-0">
                </div>
            </div>
            <div class="count-card cursor-pointer p-4 rounded-lg" >
                <div>
                    <p class="label-count lg:text-xl sm:text-base" id="tableslide">New Hired Employees</p>
                    <p class="text-3xl font-extrabold text-white" >{{ $newEmployees->count() }}</p>
                </div>
                <div>
                    <img src="{{asset('images/thumbs.png')}}" alt="" class="w-24 shrink-0">
                </div>
            </div>
            <div @click="newH = 'test2'" class="count-card cursor-pointer p-4 rounded-lg" >
                <div>
                    <p class="label-count lg:text-xl sm:text-base" id="tableslide">Accounts Lists</p>
                    {{-- <p class="text-3xl font-extrabold text-white" >0</p> --}}
                </div>
                <div>
                    <img src="{{asset('images/rocket.png')}}" alt="" class="w-24 shrink-0">
                </div>
            </div>
        </div>
        <div class="mt-6 bg-white  rounded-lg shadow mx-4 h-screen">
           

            

            
            <div x-show="newH === 'test'" class="overflow rounded-xl bg-white">
                <x-notification on="delete-notif" >
                    <x-alert title="Applicant Deleted!" negative solid />
                </x-notification>
                <div class="py-4 px-6 text-2xl">New Hired Lists</div>
                <div class="mx-1  justify-between flex gap-5 bg-white py-2 px-2 rounded-xl mb-3">
                    <div class="w-full">
                        <x-input wire:model.live='q' id="q" icon="magnifying-glass" placeholder="Candidate name" />
                    </div>
                    <div class="flex items-center gap-4 relative">
                        <x-native-select
                            wire:model.live='sort'
                            placeholder="Latest"
                            :options="['Firstname', 'Lastname']"
                        />
                        
                    </div>
                    
                </div>
                <table class=" min-w-full ">
                    <thead class="sticky top-0">
                        <tr class="bg-gradient-to-r from-yellow-300 to-amber-400">
                            <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                Name
                            </th>
                            <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                Contact no.
                            </th>
                            <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                Email
                            </th>
                            <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                Job Position
                            </th>
                            {{-- <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                Score
                            </th> --}}
                            <th scope="col" class="p-5 text-sm leading-6 font-semibold text-gray-900 capitalize text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 text-center">
                        @foreach ($employees as $employee)
                            <x-tables.table-data :applicant="$employee" />
                        @endforeach
                    </tbody>
                </table>
                <div class=" bg-white">
                    {{-- @if ($link) --}}
                                
                    <div class="mx-3 pb-2">
                        {{ $employees->links() }}
                    </div>
                    {{-- @endif --}}
                </div>
            
            </div>

            <div x-show="newH === 'test2'">
                <div class="py-4 px-6 text-2xl">Accounts Lists</div>
                {{-- <div class="mx-1  justify-between flex gap-5 bg-white py-2 px-2 rounded-xl mb-3">
                    <div class="w-full">
                        <x-input wire:model.live='q' id="q" icon="magnifying-glass" placeholder="Candidate name" />
                    </div>
                    <div class="flex items-center gap-4 relative">
                        <x-native-select
                            wire:model.live='sort'
                            placeholder="Latest"
                            :options="['Firstname', 'Lastname']"
                        />
                        
                    </div>
                    
                </div> --}}
                <table  class=" min-w-full ">
                    <thead class="sticky top-0">
                        <tr class="bg-gradient-to-r from-yellow-300 to-amber-400">
                            <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                Names
                            </th>
                            <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                Contact no.
                            </th>
                            <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                Email
                            </th>
                            <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                Status
                            </th>
                            <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                Score
                            </th>
                            <th scope="col" class="p-5 text-sm leading-6 font-semibold text-gray-900 capitalize text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 text-center">
                        {{-- @foreach ($employees as $employee)
                            <x-tables.table-data :applicant="$employee" />
                        @endforeach --}}
                        @foreach ($users as $user)
                            
                        <tr>
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 text-start">{{ $user['name'] }}</td>
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">{{ $user['email'] }}</td>
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">{{ $user['role'] }}</td>
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">{{ $user['status'] }}</td>
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">test</td>
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">test</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        {{ $users->links() }}
                    </tfoot>
                </table>
            </div>
            
            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex justify-center bg-black/40">
                <div @click.away="open = false" class="modal-add mt-20 lg:w-fit w-fit h-fit flex justify-center items-center p-3 rounded-2xl">
                    <x-modal-form>
                    </x-modal-form>
                </div>
            </div>

        </div>

    </div>

