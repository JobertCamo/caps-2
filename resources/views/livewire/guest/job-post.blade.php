<?php

use Carbon\Carbon;
use App\Models\Job;
use App\Models\Tag;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

new #[layout('components.usercomponent.user-layout')]
class extends Component {
    use WithPagination;

    public $test;
    public $title;
    public $description;
    public $results;
    public $q = '';
    public $qr = [];
    public $link = true;
    public $searchBar = true;
    public $tag;

    public function update(Job $job)
    {
        $this->test = $job;
        $this->title = $job->title;
        $this->description = $job->description;
    }

    public function viewTag(Tag $tag)
    {
        $this->searchBar = false;
        $this->results = $tag->jobs;
        $this->tag = $tag->name;
    }

    public function search($q)
    {
        $jobs = Job::where('title', 'LIKE', '%'.$this->q.'%')
                    ->orWhere('location', 'LIKE', '%'.$this->q.'%')
                    ->orWhere('schedule', 'LIKE', '%'.$this->q.'%')
                    ->get();
        $this->link = false;
        return $jobs;
    }

    public function getJob()
    {
        $this->link = true;
        $jobs = Job::latest()->simplePaginate(5);
        return $jobs;

    }

    public function with(): Array
    {
        !empty($this->q) ? $jobs = $this->search($this->q) : $jobs = $this->getJob();
        return [
            'jobs' => $jobs,
            'firstJob' => Job::first(),
        ];

    }
}; ?>

<div class="selection:bg-yellow-300 selection:text-yellow-900 flex items-center  bg-white justify-center w-full h-screen text-black pb-3"
    x-data="{ details: open, tae: true }">
    <div class="lg:w-[90%] h-full flex overflow-hidden md:w-[85%] sm:w[80%] w-[90%]" x-data="{appModal: false}">
        <!-- Left Column -->
        <div class="flex-1 h-full px-5 space-y-5 overflow-auto scrollbar-custom overflow-y-scroll">
            <div class="bg-white sticky top-0 z-10 space-y-3 pt-3 ">
                <div class="flex items-center justify-center mx-2 lg:justify-start">
                    <!-- Job Category Title -->
                    @if ($results)
                        <div class="flex justify-between w-full text-xl font-bold lg:text-2xl ">
                            <h1>Job Listings</h1>
                            <x-button wire:navigate href="/jobpost" white icon="arrow-left" label="back" />
                        </div>
                    @else
                        <div class="text-xl font-bold lg:text-2xl text-black/85">
                            <h1>Job Listings</h1>
                        </div>
                    @endif
                </div>


            </div>
            <!-- Responsive Job Details Card -->

            @if($searchBar)
                <div class="sticky top-12 z-10">
                    <x-input wire:model.live='q' right-icon="magnifying-glass" placeholder="Search something..." />
                </div>
            @else
                <div class="text-md text-black underline">Tag Related to "{{ $tag }}"</div>
            @endif
            <!-- Responsive Job Details Card -->

            @if ($results)
                @foreach ($results as $job)
                    <x-job-card :$job></x-job-card>
                @endforeach
            @else
                @foreach ($jobs as $job)
                    <x-job-card :$job></x-job-card>
                @endforeach
                @if($link)
                    <div>{{ $jobs->links(data: ['scrollTo' => false]) }}</div>
                @endif
            @endif
        </div>
        
        @if($test)
              <div x-show="details" x-cloak class="md:hidden px-2 md:px-0 transition-all duration-300 flex h-screen w-full bg-black/20 fixed top-0 left-0 z-50  justify-center items-center">
                <x-mobile-preloader />
                <div @click.away="details = false" class="bg-white max-w-[360px] lg:max-w-[450px] min-w-[350px] lg:min-w-[450px] max-h-[540px] min-h-[550px] overflow-auto flex flex-col justify-between px-2 py-3 rounded-lg">
                    <div class="text-center space-y-4 ">
                        <div >
                            <div class="text-sm">Job Title</div>
                            <div style="margin-top: -5px" class="text-2xl font-bold">{{ $test->title }}</div>
                        </div>
                        <div>
                            <div class="text-sm">details</div>
                            <div class="flex justify-center items-center gap-4 text-lg " style="margin-top: -5px">
                                <div>{{ $test->location }}</div>
                                <div>{{ $test->salary }}</div>
                                <div>{{ $test->schedule }}</div>
                            </div>
                        </div>
                        <div>
                            <div class="text-sm">Job Description</div>
                            <div class="text-gray-600" style="margin-top: -5px">
                                {{ $test->description }}
                            </div>
                        </div>
                        <div>
                            <div class="text-sm">Job Requirements</div>
                            <div class="text-gray-600" style="margin-top: -5px">
                                @foreach (explode(',', $test->requirements) as $requirement)
                                    <li> {{ $requirement }}</li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <x-button href="/application/{{ $firstJob->id }}" wire:navigate label="Apply Now" amber />
                </div>
            </div>
        
              
        @endif

        

        <div class="space-y-3 flex-1 hidden h-full justify-center p-4 lg:basis-52 md:basis lg:flex md:flex sm:hidden relative">
            <x-preloader/>
            @if (isset($test))

                <div on="updated" class="flex flex-col  cards space-y-2 relative" x-show="details" lazy x-transition x-cloak>
                    <div class="absolute top-0 right-0">
                        <x-mini-button label="X" icon="x-mark" @click="details = false" negative flat
                            interaction="negative" />
                    </div>
                    <p class="font-bold text-2xl" x-text="$wire.title"></p>
                    <ul class="list-disc list-inside text-gray-700">
                        <li>{{ $test->location }}</li>
                        <li>{{ $test->schedule }}</li>
                        <li>{{ $test->salary }}</li>
                    </ul>
                    <h1 class="font-bold text-xl">Job Description</h1>
                    <p class="flex break-all text-gray-700"> {{ $test->description }}</p>
                    <h1 class="font-bold text-xl">Job Requirements</h1>
                    <div class="flex flex-col">
                      @foreach (explode(',', $test->requirements) as $requirement)
                        <li> {{ $requirement }}</li>
                      @endforeach
                    </div>
                    <x-button href="/application/{{ $test->id }}" wire:navigate.hover class="w-[20%] h-[50%] font-bold"  amber label="Apply Now" />
                </div>
            @else
                @if (!isset($firstJob))
                    <div class="text-red-500">
                        no data found
                    </div>  
                @else 
                <div class="flex flex-col  cards space-y-2 relative" x-show="details" lazy x-transition x-cloak>

                    <p class="font-bold text-2xl">{{ $firstJob->title}}</p>
                    <ul class="list-disc list-inside text-gray-700">
                        <li>{{ $firstJob->location }}</li>
                        <li>{{ $firstJob->schedule }}</li>
                        <li>{{ $firstJob->salary }}</li>
                    </ul>
                    <h1 class="font-bold text-xl">Job Description</h1>
                    <p class="flex break-all text-gray-700">{{ $firstJob->description }}</p>
                    <h1 class="font-bold text-xl">Job Requirements</h1>
                    <div class="flex flex-col">
                      @foreach (explode(',', $firstJob->requirements) as $requirement)
                      	<li>{{ $requirement }}</li>
                      @endforeach
                    </div>
                    <x-button href="/application/{{ $firstJob->id }}" class="w-[20%] h-[50%] font-bold"  amber label="Apply Now" />
                </div>
                @endif
            @endif
        </div>
    </div>
</div>

