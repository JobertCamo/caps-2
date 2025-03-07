<?php

use Carbon\Carbon;
use App\Models\Applicant;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

new class extends Component {

    public $q = '';
    public $link = true;
    public $sort;
    public $evaluation = '';

    public function delete(Applicant $applicant)
    {
        $this->authorize('delete', $applicant);

        $this->failed_applicants($applicant);

        $applicant->delete();
        $this->dispatch('delete-notif');

        if (Storage::exists($applicant->resume)) {
            Storage::delete($applicant->resume);
        }
    }

    public function viewEval(Applicant $applicant)
    {
        $this->evaluation = $applicant->evaluation;
    }
    
    // Perform a search for applicants
    public function search()
    {

        return Applicant::query()
            ->where('status', 'candidate')
            ->when($this->q, fn($query) => $query->where('first_name', 'LIKE', '%' . $this->q . '%')->orWhere('last_name', 'LIKE', '%' . $this->q . '%'))
            ->when($this->sort, function ($query) {
                $this->sort === 'Firstname' ? $query->orderBy('first_name' , 'asc') : ($this->sort === 'Lastname' ? $query->orderBy('last_name', 'asc') : '');
            })
            ->latest()
            ->paginate(5);
    }

    // Get paginated list of applicants
    public function getApplicants()
    {
        // return Applicant::latest()->simplePaginate(6);
        return Applicant::where('status', 'candidate')->latest()->simplePaginate(7);
    }

    public function failed_applicants(Applicant $applicant)
    {
        DB::table('failed_applicants')->insert([
            'first_name' => $applicant->first_name,
            'middle_name' => $applicant->middle_name,
            'last_name' => $applicant->last_name,
            'gender' => $applicant->gender,
            'email' => $applicant->email,
            'birth_date' => $applicant->birth_date,
            'contact' => $applicant->contact,
            'address' => $applicant->address,
            'nationality' => $applicant->nationality,
            'religion' => $applicant->religion,
            'civil_status' => $applicant->civil_status,
        ]);
    }


    // Prepare the data to be passed to the view
    public function with()
    {
        return [
            'applicants' => $this->search(),
        ];
    }
    
}; ?>


<div class="overflow rounded-xl bg-white">
    <x-notification on="delete-notif" >
        <x-alert title="Applicant Deleted!" negative solid />
    </x-notification>
    <div class="py-4 px-6 text-2xl">Priority Applicants Lists</div>
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
            {{-- <x-button class="hidden lg:block" x-on:click="open = ! open" amber label="New"></x-button> --}}
            {{-- <x-mini-button class="block lg:hidden" x-on:click="open = ! open" rounded warning icon="plus" /> --}}


            
            
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
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Evaluation
                </th>
                <th scope="col" class="p-5 text-sm leading-6 font-semibold text-gray-900 capitalize text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-300 text-center" x-data="{eval: false}">
            @foreach ($applicants as $applicant)
                {{-- <x-tables.table-data :$applicant /> --}}

                <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                    <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 text-start">{{ $applicant->first_name . ' ' . $applicant->last_name }}</td>
                    <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{ $applicant->contact }} </td>
                    <td class="p-5 whitespace-nowrap  text-sm leading-6 font-medium text-gray-900">{{$applicant->email}}</td>
                    <td class="p-5 whitespace-nowrap  text-sm leading-6 font-medium text-gray-900">{{$applicant->job_position}}</td>
                    <td>
                        <div class="w-full max-w-xl grid grid-cols-2 space-x-2 ">
                            <p class=" text-sm text-gray-700" id="score-display">{{ $applicant->score . '%' }}</p>
                            <!-- Progress Bar -->
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div id="progress" class=" h-2.5 rounded-full" style="width: {{ trim($applicant->score) }}%; background-color:{{ $applicant->score > 50 ? 'green' : 'red' }};">
                            </div>
                                
                        </div>
                            <!-- Score Display -->
                    </td>
                    <td class=" p-5" x-data="{delModal: false}">
                        {{--  --}}
                        <div x-data="{dpdown: false}" class="relative">
                            <x-icon name="ellipsis-vertical" class="cursor-pointer mx-auto" @click="dpdown = true"/>
                            <div x-show="dpdown" x-transition x-cloak class="text-black/70 roboto-slab w-40 select-none z-10 absolute -left-20 bg-white shadow-2xl border-solid border-[1px] border-black/15 px-1 py-1 rounded-md">
                                <div @click.away="dpdown = false" class="flex flex-col text-start space-y-2">
                                    <a wire:navigate.hover href="/profile/{{ $applicant->id }}" class="cursor-pointer hover:bg-black/5 rounded-sm px-2">View Profile</a>
                                    <a @click="eval = true" wire:click="viewEval('{{ $applicant->id }}')" class="cursor-pointer hover:bg-black/5 rounded-sm px-2">Evaluation</a>
                                    <a wire:navigate.hover @click="delModal = true" class="cursor-pointer hover:bg-black/5 rounded-sm px-2" >Delete</a>
                                </div>
                            </div>
                        </div>
                        <div x-show="delModal"  @click.away="delModal = false" x-cloak x-transition class="fixed inset-0 z-10 flex gap-5 items-center justify-center">
                            <div class="shadow-lg shadow-indigo-500/40 bg-white p-12 space-x-5 text-center font-bold text-xl space-y-7">
                                <div class="text-balance">Are you sure you want to delete <br> <span class="text-red-500">{{ $applicant->first_name .' '.$applicant->last_name }}</span>?</div>
                                <div class="space-x-5">
                                    <x-button @click="delModal = false" rose wire:click='delete({{ $applicant->id }})'>Delete</x-button>  
                                    <x-button @click="delModal = false" positive>Cancel</x-button>
                                </div>
                            </div>
                        </div>
                        <div x-show="eval"   x-cloak x-transition class="fixed inset-0 z-10 flex gap-5 items-center justify-center">
                            <div @click.away="eval = false" class="max-w-[300px] lg:max-w-[500px] max-h-[680px] shadow-lg  bg-white p-12 space-x-5 text-center text-sm lg:text-xl space-y-7">
                                <div class="text-balance">{{ $evaluation }}</div>
                            </div>
                        </div>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
    <div class=" bg-white">
        {{-- @if ($link) --}}
                    
        <div class="mx-3 pb-2">
            {{ $applicants->links() }}
        </div>
        {{-- @endif --}}
    </div>

</div>
