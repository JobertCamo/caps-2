<?php

use Livewire\Volt\Component;
use App\Models\Applicant;
use App\Models\Interview;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

new class extends Component {

    public $q = '';
    public $link = true;
    public $sort = '';
    
    public function delete(Applicant $applicant)
    {
        $this->authorize('delete', $applicant);

        if(File::exists($applicant->resume))
        {
            File::delete($applicant->resume);
        }

        $applicant->delete();
        $this->dispatch('delete-notif');

    }

    public function search()
    {

        return Applicant::query()
            ->when($this->q, fn($query) => $query->where('first_name', 'LIKE', '%' . $this->q . '%')->orWhere('last_name', 'LIKE', '%' . $this->q . '%'))
            ->when($this->sort, function ($query) {
                $this->sort === 'Firstname' ? $query->orderBy('first_name' , 'asc') : ($this->sort === 'Lastname' ? $query->orderBy('last_name', 'asc') : '');
            })
            ->latest()
            ->paginate(5);
    }

    public function getApplicant()
    {
        // $applicant = Applicant::where('status', 'candidate')->latest()->simplePaginate(7);
        $applicant = Applicant::latest()->simplePaginate(6);
        return $applicant;
    }
    
    public function with(): Array
    {
        return [
            'applicants' => $this->search(),
          
        ];
    }
    // public function placeholder()
    // {
    //     return <<<'HTML'
    //     <div role="status" class="  flex justify-center items-center relative mt-10">
    //         <svg aria-hidden="true" class=" w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
    //             <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
    //             <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
    //         </svg>
    //         <span class="sr-only">Loading...</span>
    //     </div>
    //     HTML;
    // }
}; ?>

<div class="overflow rounded-xl ">
    <x-notification on="delete-notif" >
        <x-alert title="Applicant Deleted!" negative solid />
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
            <x-button class="hidden lg:block" x-on:click="open = ! open" amber label="New"></x-button>
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
            @foreach ($applicants as $applicant)
                <x-tables.table-data :$applicant />
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
