<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/companyicon.ico') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <wireui:scripts />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @livewireStyles
</head>
    <body class="overflow-auto bg-slate-200 text-black font-roboto scrollbar-thin soft-scrollbar">
        <nav class="flex justify-between bg-white drop-shadow-lg p-3 items-center relative">
            <div>
                <ul class="flex flex-row items-center Lightnav space-x-2 ">
                    <li> <x-icon name="bars-3" class=" size-6 hidden lg:block  " onclick="toggleSidebar()" /></li>
                    <li> <x-icon name="bars-3"  class=" size-6 lg:hidden  " onclick="togglePhoneSidebar()" /></li>
                    <li class="hidden lg:block md:block font-light text-xl select-none">HR Recruitment Applicant Management System</li>
                </ul>
            </div>
            <div class="flex items-center space-x-3">
                @can('view-page')
                <div x-data="{notifi: false}" class="relative z-50">
                    <x-icon @click="notifi = true" name="bell-alert" class="size-6 shrink-0"/>
                    <div x-show="notifi" x-cloak @click.away="notifi = false" class="absolute right-0 lg:right-10 bg-white shadow-lg border-[1px] border-black px-3 py-2 min-w-[300px] min-h-[300px] space-y-2">
                        <div class="text-xl">Notification</div>
                        <livewire:hr.jobpost-notif />
                    </div>
                </div>
                @endcan
                <div x-data="{profileDropdown: false}" class="">
                    <img @click="profileDropdown = true" src="{{ asset('storage/'. Auth::user()->profile_picture) }}" alt="profile" class="rounded-full w-9">
                    <div x-show="profileDropdown" x-transition x-cloak class=" absolute -bottom-[5em] right-2 px-5 py-3 bg-white rounded-md">
                        <div @click.away="profileDropdown = false" class="">
                            <ul class="space-y-2">
                                <li><a wire:navigate  class="flex gap-1" href="/profile-edit/{{ Auth::user()->id }}">Profile<x-icon name="user" class="w-4"/></a></li>
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit" class="flex gap-1">Log Out<x-icon name="arrow-up-tray" class="w-4"/></button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="flex">
            {{-- PC ASIDE --}}
            <aside class="transition-all bg-[#FFFFFF] duration-500 absolute lg:static w-[300px] hidden lg:block h-screen" id="sidebar">
                <div class=" bg-[#FFFFFF] overflow-y-auto scrollbar-hidden">
                    <ul class="flex flex-col gap-2 bg-opacity-0 transition-all duration-500" id="sidebarcontent" >
                        @can('view-page')
                            
                        <div x-data="{ open: true }">
                            <button x-on:click="open = ! open" class="titlesidebar ">
                                <p>Recruitment</p>
                                <span :class="open ? 'rotate-90' : 'rotate-0'" class="arrow transition-transform duration-300 inline-block">
                                    <x-icon name="chevron-right"/>
                                </span>
                            </button>
                            <div x-show="open"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 translate-y-2">
                                {{-- ============================ --}}
                                {{-- 1st create-job --}}
                                {{-- ============================ --}}
                                {{-- <li 
                                    class="side">
                                    <a 
                                        wire:navigate  href="/job-create" class="{{ request()->is('job-create') ? 'bg-amber-200 font-bold' : '' }}">
                                        Job Creation
                                    </a>
                                </li> --}}
                                {{-- ============================ --}}
                                    {{-- 1st create-job --}}
                                {{-- ============================ --}}
                                {{--  --}}
                                <li 
                                    class="side">
                                    <a 
                                        wire:navigate  href="/create-job" class="{{ request()->is('create-job') ? 'bg-amber-200 font-bold' : '' }}">
                                        Post a Jobs
                                    </a>
                                </li>
                                {{--  --}}
                                <li class="side">
                                    <a wire:navigate  href="/jobpost">
                                        Posting
                                    </a>
                                </li>
                                
                            </div>
                        </div>
                        <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">
                            Applicant Tracking
                        </label>
                        <li class="side">
                            <a wire:navigate  href="{{ url('/candidate-list') }}" 
                                class="{{ request()->is('candidate-list') ? 'bg-amber-200 font-bold' : '' }}">
                                All Applicants
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate  href="{{ url('/applicants') }}" class="{{ request()->is('applicants') ? 'bg-amber-200 font-bold' : '' }}">
                                Priority Applicants
                            </a>
                        </li>
                        <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">
                            Onboarding
                        </label>
                        <li class="side">
                            <a wire:navigate  href="{{ url('/employees') }}" class="{{ request()->is('employees') ? 'bg-amber-200 font-bold' : '' }}">
                                New Hire List
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate  href="/hr-task">
                                Employee Tasks
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate  href="/offboarding">
                                Offboarding
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate  href="/wall">
                                Freedom Wall
                            </a>
                        </li>
                        @endcan
                        @cannot('view-page')
                        <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">
                            Employee Portal
                        </label>
                        <li class="side">
                            <a wire:navigate href="{{ url('/employee-dashboard') }}" class="{{ request()->is('employee-dashboard') ? 'bg-amber-200 font-bold' : '' }}">
                                Dashboard
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate href="/wall" class="{{ request()->is('wall') ? 'bg-amber-200 font-bold' : '' }}">
                                Freedom Wall
                            </a>
                        </li>
                        {{-- <li class="side">
                            <a wire:navigate href="/resignation" class="{{ request()->is('resignation') ? 'bg-amber-200 font-bold' : '' }}">
                                Resignation
                            </a>
                        </li> --}}
                        @endcannot
                        
                        {{-- <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">
                            Learning Managment
                        </label> --}}
                        
                    </ul>
                    @can('view-page')
                        
                    {{-- ICON SIDEBAR --}}
                    <ul class="flex items-center flex-col gap-2 p-2 bg-opacity-0 transition-all duration-500 hidden" id="iconside" >
                        <div x-data="{ open: true }" class=" group">
                            <button x-on:click="open = ! open" class="titlesidebar">
                                    <!-- The element that will trigger the tooltip -->
                                    <img src="{{asset('images/search-people.png')}}" alt="" class="rounded-full w-9">
                            </button>
                            <div x-show="open"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 translate-y-2">
                                <li class="side">
                                    <a wire:navigate  href="/job-create">
                                        <x-icon name="pencil-square" class="size-6 shrink-0"/>
                                    </a>
                                </li>
                                <li class="side">
                                    <a wire:navigate  href="/jobpost">
                                        <x-icon name="clipboard-document-list" class=" shrink-0 size-6" />
                                    </a>
                                </li>
                                <li class="side">
                                    <a wire:navigate  href="/application">
                                        <x-icon name="document-text" class=" shrink-0 size-6" />
                                    </a>
                                </li>
                                <li class="side">
                                    <a wire:navigate  href="/exam">
                                        <x-icon name="plus-circle"  class=" shrink-0 size-6 mt-0" />
                                    </a>
                                </li>
                            </div>
                        </div>
                        <li class="side">
                            <a>
                                <x-icon name="globe-alt" class="shrink-0 size-6"/>
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate  href="/applicant-list">
                                <x-icon name="user" class="shrink-0 size-6"/>
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate  href="/candidates">
                                <x-icon name="calendar" class="shrink-0 size-6"/>
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate  href="/employees">
                                <x-icon name="hand-thumb-up" class="shrink-0 size-6"/>
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate  href="/employees">
                                <x-icon name="circle-stack" class="shrink-0 size-6"/>
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate  href="/jobscript">
                                <x-icon name="numbered-list"  class="shrink-0 size-6" />
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate  href="/onboard">
                                <x-icon name="rectangle-stack" class="shrink-0 size-6"/>
                            </a>
                        </li>
                        <li class="side">
                            <a>
                                <x-icon name="users" class="shrink-0 size-6"/>
                            </a>
                        </li>
                        <li class="side">
                            <a>
                                <x-icon name="book-open" class="shrink-0 size-6"/>
                            </a>
                        </li>
                    </ul>
                </div>
                @endcan

                {{-- PHONE ASIDE --}}
            </aside>
            <aside class="-translate-x-full transition-all duration-500 absolute lg:static w-[300px] z-10 lg:hidden block" id="phonebar">
                <div class=" bg-amber-400 h-screen overflow-y-auto scrollbar-hidden">
                    <ul class="flex flex-col gap-2 p-2 bg-opacity-0 transition-all duration-500" id="sidebarcontent" >
                        <label for="menu" class="border-none titlesidebar">
                            Menu
                        </label>
                        <label for="EMPLOYEE ENGANEMENT" ></label>
                        @can('view-page')
                        <div x-data="{ open: true }">
                            <button x-on:click="open = ! open" class="titlesidebar">Recruitment
                                <span :class="open ? 'rotate-90' : 'rotate-0'" class="arrow transition-transform duration-300 inline-block">
                                    <x-icon name="chevron-right"/>
                                </span>
                            </button>
                                
                            <div x-show="open"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 translate-y-2">
                                <li class="side"><a wire:navigate  href="/create-job">Job Creation</a></li>
                                <li class="side"><a wire:navigate  href="/jobpost">Posting</a></li>
                            </div>
                        </div>
                        <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">Applicant Tracking</label>
                        <li class="side"><a wire:navigate  href="/candidate-list">Applicants</a></li>
                        <li class="side"><a wire:navigate  href="/applicants">Candidates</a></li>
                        <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">Onboarding</label>
                        <li class="side"><a wire:navigate  href="/employees">New Hire List</a></li>
                        <li class="side"><a wire:navigate  href="/hr-task">Task List</a></li>
                        @endcan
                        @cannot('view-page')
                            <li class="side"><a wire:navigate  href="/employee-dashboard">Dashboard</a></li>
                            <li class="side"><a wire:navigate  href="/wall">Freedom Wall</a></li>
                            {{-- <li class="side"><a wire:navigate  href="/resignation">Resignation</a></li> --}}
                        @endcannot
                    </ul>
                </div>
            </aside>
            <main class="overflow-auto h-screen m-2 scrollbar-thin w-full soft-scrollbar">
                {{$slot}}
            </main>
        </div>
        @livewireScripts
    </body>
</html>
