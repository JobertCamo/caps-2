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
    x-data="{ details: open }">
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
              {{-- mobile --}}
              <div class="lg:hidden flex flex-col h-full top-32 fixed inset-0 card items-center justify-center z-20" x-show="details"  x-transition:enter="transform transition ease-out duration-500"
                    x-transition:enter-start="translate-y-full opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transform transition ease-in duration-500"
                    x-transition:leave-start="translate-y-0 opacity-100"
                    x-transition:leave-end="translate-y-full opacity-0" x-cloak>
                    <x-preloader />

                  <div @click.away="details = false" class="flex flex-col justify-center items-center px-2">
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
                      <x-button href="/application/{{ $test->title }}" wire:navigate.hover class="mt-2 font-bold"  amber label="Apply Now" />
                  </div>
              </div>
              {{-- mobile --}}
        @endif

        <!-- Right Column for Sorting Component (Responsive) -->
        <div class="space-y-3 flex-1 hidden h-full justify-center p-4 lg:basis-52 md:basis lg:flex md:flex sm:hidden relative">
            {{-- <x-usercomponent.jobsorting /> --}}

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

