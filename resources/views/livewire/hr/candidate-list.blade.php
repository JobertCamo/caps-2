<?php

use App\Models\Applicant;
use App\Models\Interview;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

new #[layout('components.layout')]
 class extends Component {
    use WithPagination;
    
    public $q = '';
    public $link = true;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $email;
    public $gender;
    public $birth_date;
    public $contact;
    public $address;
    public $nationality;
    public $religion;
    public $civil_status;
    public $resume;
    public $refered_by;
    public $job_position;

    public function submit(){
        $data = $this->validate([
            'first_name' => ['required'],
            'middle_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required','email','unique:applicants,email'],
            'gender' => ['required'],
            'birth_date' => ['required'],
            'contact' => ['required'],
            'address' => ['required'],
            'nationality' => ['required'],
            'religion' => ['required'],
            'civil_status' => ['required'],
        ]);

        $data['resume'] = 'none';
        $data['job_position'] = 'Onsite';
        Applicant::create($data);
        $this->dispatch('store-notif');
    }

    public function delete(Applicant $applicant)
    {
        $this->authorize('delete', $applicant);

        if(Storage::exists($applicant->resume))
        {
            Storage::delete($applicant->resume);
        }

        $applicant->delete();
        $this->dispatch('delete-notif');

    }

    public function search($q)
    {
        $nameSearch = explode(' ', $q);
        $query = Applicant::query();

        if(count($nameSearch) == 1){
            $query->where('first_name', 'LIKE', '%'.$this->q.'%')
                    ->orWhere('last_name', 'LIKE', '%'.$this->q.'%')
                    ->orWhere('middle_name', 'LIKE', '%'.$this->q.'%')
                    ->get();
        }else{
            $query->where(function($query) use ($nameSearch) {
            $query->where('first_name', 'LIKE', '%' . $nameSearch[0] . '%')
                  ->where('last_name', 'LIKE', '%' . $nameSearch[count($nameSearch) - 1] . '%');
            });
        }
        $this->link = false;
        return $query->get();
    }

    public function getApplicant()
    {
        // $applicant = Applicant::where('status', 'candidate')->latest()->simplePaginate(7);
        $applicant = Applicant::latest()->simplePaginate(6);
        return $applicant;
    }
    
    public function with(): Array
    {

        // $job = Applicant::latest()->get()->groupBy('status');

        // $applicant = Applicant::where('status', 'candidate')->simplePaginate(7);

        !empty($this->q) ? $applicant = $this->search($this->q) : $applicant = $this->getApplicant();


        return [
            'applicants' => $applicant,
            'totalApplicant' => Applicant::all(),
            'totalFailed' => Interview::where('status', 'Failed'),
            'totalPassed' => Interview::where('status', 'Passed'),
            'newApplicants' => Applicant::where('created_at', '>=', Carbon::now()->subDays(2))->get(),
        ];
    }

}; ?>

<div class="relative">
    <x-notification on="delete-notif" >
        <x-alert title="Applicant Deleted!" negative solid />
    </x-notification>
    <x-notification on="store-notif" >
        <x-alert title="Applicant Inserted!" positive solid />
    </x-notification>
    <div class="h-[50px] flex items-center text-lg bg-white drop-shadow-lg mx-5 mb-5 rounded-xl px-4">
        <a href="" class="font-bold">Applicant Tracking</a>
        &nbsp;/&nbsp;
        <a href="">Applicants</a>
    </div>

    <div class="lg:h-[50%] rounded-lg">
        <div class="flex w-full lg:flex-row h-full flex-col">
            <div class="lg:w-[50%] h-[50%] lg:h-[100%] flex flex-wrap items-center justify-center md:h-[40%]">
                <!-- Count Card Trigger for the Modal -->
                <div class="count-card cursor-pointer p-4 rounded-lg" >
                    <div>
                        <p class="label-count lg:text-xl sm:text-base" id="tableslide">New Applicants</p>
                        <p class="text-3xl font-extrabold text-white" >{{ $newApplicants->count() }}</p>
                    </div>
                    <div>
                        <img src="{{asset('images/applicants.png')}}" alt="" class="w-24 shrink-0">
                    </div>
                </div>

                <div class="count-card" >
                    <div>
                        <p class="label-count sm:text-base lg:text-xl md:text-xl">Total Applicants</p>
                        <p class="text-3xl font-extrabold text-white" wire:poll.2s>{{ $totalApplicant->count() }}</p>
                    </div>
                    <div>
                        <img src="{{asset('images/pie.png')}}" alt="" class="w-24">
                    </div>
                </div>

                <div class="count-card cursor-pointer" >
                    <div>
                        <p class="label-count text-xl">Passed</p>
                        <p class="text-3xl font-extrabold text-white">{{ $totalPassed->count() }}</p>
                    </div>
                    <div>
                        <img src="{{asset('images/thumbs.png')}}" alt="" class="w-24">
                    </div>
                </div>

                <div class="count-card" >
                    <div>
                        <p class="label-count">Failed</p>
                        <p class="text-3xl font-extrabold text-white">{{ $totalFailed->count() }}</p>
                    </div>
                    <div>
                        <img src="{{asset('images/rocket.png')}}" alt="" class="w-24">
                    </div>
                </div>
            </div>

            <div class="lg:w-[50%] flex flex-col items-center justify-center -z-10">
                <div shadow="xl" class="w-[95%] lg:w-[95%] md:h-[100%] md:w-fit sm:w-[90%] m-2 bg-white/80 rounded-xl drop-shadow-lg text-black p-2">
                    <x-line-chart />
                    {{-- <livewire:components.line-chart /> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="h-[70%] bg-white mt-5 lg:mx-3  rounded-xl">
        <div class="bg-white rounded-xl flex w-full lg:justify-between md:justify-between justify-evenly items-center px-2 h-[20%]">
            <div class="lg:w-[20%] md:w-[20%] m-5">
                <x-input wire:model.live='q' icon="magnifying-glass" placeholder="Applicant name" />
            </div>

            <div>
                <div x-data="{ open: false }" class="w-full hidden lg:flex">
                    <x-button x-on:click="open = ! open" amber label="Add New Applicant"></x-button>
                    <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex justify-center bg-black/40">
                        <div @click.away="open = false" class="modal-add mt-20 lg:w-fit w-fit h-fit flex justify-center items-center p-3 rounded-2xl">
                            <x-modal-form>
                            </x-modal-form>
                        </div>
                    </div>
                </div>

                <div x-data="{ open: false }" class="w-full lg:hidden flex">
                    <x-mini-button x-on:click="open = ! open" rounded warning icon="plus" />
                    <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                        <div @click.away="open = false" class="modal-add lg:w-fit w-full h-fit flex justify-center items-center p-3 rounded-2xl">
                            <x-modal-form>
                            </x-modal-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="applicant-table">
            {{-- TABLE --}}
            
            <div class="flex flex-col ">
                <div class=" overflow-x-auto">
                    <div class="min-w-full inline-block align-middle h-screen">
                        <div class="overflow rounded-xl ">
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
                                @if ($link)
                                            
                                <div class="mx-3 pb-2">
                                    {{ $applicants->links() }}
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- TABLE --}}

        </div>

    </div>

    {{-- RIGHT SIDE NEW APPLICANTS TABLE --}}
    {{-- ANO TOOOOO PREEEEEEEEEE  --}}
    {{-- <div class="tableslide w-full h-screen overflow-y-auto soft-scrollbar bg-black absolute top-0 translate-x-full rounded-lg transition-all duration-500" id="table-slide">
        <x-new-applicant/>
    </div>
    <div class="tableslide2 w-full h-screen overflow-y-auto soft-scrollbar bg-black absolute top-0 translate-x-full rounded-lg transition-all duration-500" id="table-passed">
        <x-passed-applicant/>
    </div>
    <div class="tableslide3 w-full h-screen overflow-y-auto soft-scrollbar bg-black absolute top-0 translate-x-full rounded-lg transition-all duration-500" id="table-failed">
        <x-failed-applicant/>
    </div> --}}
</div>
