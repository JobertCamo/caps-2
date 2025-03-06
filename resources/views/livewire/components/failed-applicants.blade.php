<?php

use Carbon\Carbon;
use App\Models\Applicant;
use App\Models\Interview;
use App\Models\Resignation;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

new class extends Component {

    public $q = '';
    public $link = true;
    public $sort = '';
    public $evaluation = '';
    
    public function delete()
    {
        $deleted = DB::table('failed_applicants')
        ->where('created_at', '<', now()->subMonths(3))
        ->delete();
        $this->dispatch('delete-notif');
    }
    
    public function search()
    {

        return DB::table('failed_applicants')
            ->when($this->q, fn($query) => $query->where('first_name', 'LIKE', '%' . $this->q . '%')->orWhere('last_name', 'LIKE', '%' . $this->q . '%'))
            ->when($this->sort, function ($query) {
                $this->sort === 'Firstname' ? $query->orderBy('first_name' , 'asc') : ($this->sort === 'Lastname' ? $query->orderBy('last_name', 'asc') : '');
            })
            ->latest()
            ->paginate(5);
    }

    public function getApplicant()
    {
        $applicant = Resignation::latest()->simplePaginate(6);
        return $applicant;
    }
    
    public function with(): Array
    {
        return [
            'applicants' => $this->search(),
          
        ];
    }

}; ?>

<div class="overflow rounded-xl bg-white">
    <x-notification on="delete-notif" >
        <x-alert title="Deleted!" negative solid />
    </x-notification>
    <div class="py-4 px-6 text-2xl">Applicants Lists</div>
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
            <x-button class="hidden lg:block" wire:click='delete()' amber label="Delete"></x-button>
            <x-mini-button class="block lg:hidden" x-on:click="open = ! open" rounded warning icon="plus" />


            
            
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
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-300 text-center" x-data="{eval: false}">
            @foreach ($applicants as $applicant)
                <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                    <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 text-start">{{ $applicant->first_name . ' ' . $applicant->last_name }}</td>
                    <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{ $applicant->contact }} </td>
                    <td class="p-5 whitespace-nowrap  text-sm leading-6 font-medium text-gray-900">{{$applicant->email}}</td>
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
