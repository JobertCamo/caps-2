<x-layout>
    <div class="mx-auto p-2 h-full overflow-y-auto">
        <!-- Responsive container for Task Management and Employee List -->
        <div class="flex flex-col md:flex-row items-center justify-between bg-white shadow-md rounded-lg p-4 mb-4">
            <div class="flex items-center space-x-4">
                <div class="font-bold">Task Management / <span class="font-normal">Task List</span></div>
            </div>
        </div>
        <!-- Main responsive content -->
        <div class=" grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-4 grid-rows-4 rounded-lg ">
            <!-- First large content section -->
            <div class="row-span-1 col-span-1 sm:col-span-2 lg:col-span-3 bg-white rounded-lg p-3">
                <div class="text-2xl font-medium mb-3">
                    <p class="p-3 mx-2">
                        Task Progress
                    </p>
                </div>
                <div class="flex flex-col lg:flex-row w-full">
                    <!-- Sales Daily Task -->
                    <div class="flex-1 space-y-3 mb-3 lg:mb-0">
                        
                        <div class="text-gray-800 font-semibold text-base p-2 flex flex-col">
                            <span class="indent-5">Total Progress: 60%</span>
                            <div class="bg-gray-300 w-full sm:w-[90%] rounded-full h-2.5 self-center">
                                <div class="bg-indigo-600 h-2.5 rounded-full w-[10%]"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Pre-Employment Task -->
                    <div class="flex-1 space-y-3">
                       
                        <div class="text-gray-800 font-semibold text-base p-2 flex flex-col">
                            <span class="indent-5">Total Progress: 60%</span>
                            <div class="bg-gray-300 w-full sm:w-[90%] rounded-full h-2.5 self-center">
                                <div class="bg-[#924AEF] h-2.5 rounded-full w-[10%]"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar or Secondary sections -->
            <div class=" row-span-2 col-span-1 rounded-lg bg-white ">
                <div class="flex p-1 items-center shadow-md justify-between mb-3 ">
                    <p class=" font-bold text-xl">Post Announcement</p>
                    <div  x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                        <x-button x-on:click="open = ! open" amber >+</x-button>
                            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                <div @click.away="open = false" class="modal-add2 mt-20 flex justify-center items-center p-3 rounded-2xl">
                                    <div>

                                        <livewire:hr.post-announcement />
                                        
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <livewire:hr.announcements />
                
            </div>
            <div class="row-span-12 col-span-3 rounded-md max-h-[650px] grid gap-10 lg:flex lg:gap-2">
                <div class="flex-1 bg-white rounded-lg">
                    <div class="p-2 border-b-2 flex items-center justify-between mb-2 shadow-md">
                        <h1 class="font-bold text-xl m-2">
                            Task List
                        </h1>
                        <div>
                            <div  x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                                <x-button x-on:click="open = ! open" amber label="Add Task"></x-button>
                                    <livewire:hr.task-creation />
                            </div>
                        </div>
                    </div>
                        <livewire:hr.task-list />
                        
                       
                    
                </div>
                <div class="flex-1 bg-white rounded-lg">
                    <div class="p-2 border-b-2 mb-2 shadow-md">
                        <h1 class="font-bold text-xl m-2">
                            Recent Activities
                        </h1>
                    </div>
                    <div class="px-4 py-2 space-y-2 overflow-auto max-h-[570px] soft-scrollbar ">
                        <livewire:hr.recent-activities />
                    </div>
                </div>
            </div>
            <div class=" bg-white row-span-10 relative  overflow-hidden col-span-1 rounded-lg max-h-[412px]">
                <div class="flex justify-between p-2 shadow-md">
                    <p class=" font-bold text-xl">Task Reminders</p>
                </div>
                <div class="flex transition-transform duration-500 min-h-[370px]" id="carousel">
                    <!-- Carousel Items -->
                    <div class="carousel-item min-w-full p-2 ">
                        <div class="m-1 min-h-[45%] rounded-lg flex flex-col items-center shadow-lg p-2 border-2 border-red-500 bg-[#FAFAFA]">
                            <div class=" w-full flex justify-between">
                                <h1 class=" font font-semibold">Sales Department</h1>
                                <xicon name="bell"-alert" class="size-6 text-red-500"/>
                            </div>
                            <p class=" font-semibold text-[#34444c]">SAMPLE TITLEEEEEE</p>
                            <xicon name="exclamation-triangle"" class="size-10 text-red-500"/>
                            <h2 class="text-[#34444c] font-semibold">Due Today</h2>
                            <div class="flex gap-2 items-center m-1">
                                <p class="text-sm text-gray-700">Incomplete:</p>
                            <div class="flex -space-x-2 overflow-hidden">
                                <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80" alt="">
                                <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </div>
                            </div>
                        </div>
                        <div class="m-1 min-h-[45%] rounded-lg flex flex-col items-center shadow-lg p-2 border-2 border-red-500 bg-[#FAFAFA]">
                            <div class=" w-full flex justify-between">
                                <h1 class=" font font-semibold">Sales Department</h1>
                                <x-icon name="bell-alert" class="size-6 text-red-500"/>
                            </div>
                            <p class=" font-semibold text-[#34444c]">SAMPLE TITLEEEEEE</p>
                            <x-icon name="exclamation-triangle" class="size-10 text-red-500"/>
                            <h2 class="text-[#34444c] font-semibold">Due Today</h2>
                            <div class="flex gap-2 items-center m-1">
                                <p class="text-sm text-gray-700">Incomplete:</p>
                            <div class="flex -space-x-2 overflow-hidden">
                                <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80" alt="">
                                <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </div>
                            </div>
                        </div>
                    </div>
                    {{-- SECOND CAROUSEL --}}
                    <div class="carousel-item min-w-full p-2 ">
                        <div class="m-1 min-h-[45%] rounded-lg flex flex-col items-center shadow-lg p-2 border-2 border-orange-500 bg-[#FAFAFA]">
                            <div class="w-full flex justify-between">
                                <h1 class="font font-semibold">Sales Department</h1>
                                <x-icon name="bell" class="size-6 text-orange-500"/>
                            </div>
                            <p class="font-semibold text-[#34444c]">SAMPLE TITLEEEEEE</p>
                            <x-icon name="exclamation-triangle" class="size-10 text-orange-500"/>
                            <h2 class="text-[#34444c] font-semibold">Due Soon</h2>
                            <div class="flex gap-2 items-center m-1">
                                <p class="text-sm text-gray-700">Incomplete:</p>
                                <div class="flex -space-x-2 overflow-hidden">
                                    <!--PROFILE DITO-->
                                </div>
                            </div>
                        </div>
                        <div class="m-1 min-h-[45%] rounded-lg flex flex-col items-center shadow-lg p-2 border-2 border-orange-500 bg-[#FAFAFA]">
                            <div class="w-full flex justify-between">
                                <h1 class="font font-semibold">Sales Department</h1>
                                <x-icon name="bell" class="size-6 text-orange-500"/>
                            </div>
                            <p class="font-semibold text-[#34444c]">SAMPLE TITLEEEEEE</p>
                            <x-icon name="exclamation-triangle" class="size-10 text-orange-500"/>
                            <h2 class="text-[#34444c] font-semibold">Due Soon</h2>
                            <div class="flex gap-2 items-center m-1">
                                <p class="text-sm text-gray-700">Incomplete:</p>
                                <div class="flex -space-x-2 overflow-hidden">
                                    <!--PROFILE DITO-->
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- THIRD CAROUSEL --}}
                    <div class="carousel-item min-w-full p-2 ">
                        <div class="m-1 min-h-[45%] rounded-lg flex flex-col items-center shadow-lg p-2 border-2 border-yellow-500 bg-[#FAFAFA]">
                            <div class="w-full flex justify-between">
                                <h1 class="font font-semibold">Sales Departmentssssssssssss</h1>
                                <x-icon name="question-mark-circle" class="size-6 text-yellow-500"/>
                            </div>
                            <p class="font-semibold text-[#34444c]">SAMPLE TITLEEEEEE</p>
                            <x-icon name="face-smile" class="size-10 text-yellow-500"/>
                            <h2 class="text-[#34444c] font-semibold">Upcoming</h2>
                            <div class="flex gap-2 items-center m-1">
                                <p class="text-sm text-gray-700">Incomplete:</p>
                                <div class="flex -space-x-2 overflow-hidden">
                                    <!--PROFILE DITO-->
                                </div>
                            </div>
                        </div>
                        <div class="m-1 min-h-[45%] rounded-lg flex flex-col items-center shadow-lg p-2 border-2 border-yellow-500 bg-[#FAFAFA]">
                            <div class="w-full flex justify-between">
                                <h1 class="font font-semibold">Sales Departmentssssssssss</h1>
                                <x-icon name="question-mark-circle" class="size-6 text-yellow-500"/>
                            </div>
                            <p class="font-semibold text-[#34444c]">SAMPLE TITLEEEEEE</p>
                            <x-icon name="face-smile" class="size-10 text-yellow-500"/>
                            <h2 class="text-[#34444c] font-semibold">Upcoming</h2>
                            <div class="flex gap-2 items-center m-1">
                                <p class="text-sm text-gray-700">Incomplete:</p>
                                <div class="flex -space-x-2 overflow-hidden">
                                    <!--PROFILE DITO-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navigation Buttons -->
                <button onclick="prevSlide()" class="absolute top-1/2 left-1 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white rounded-full p-2 hover:bg-opacity-75">
                    &#10094;
                </button>
                <button onclick="nextSlide()" class="absolute top-1/2 right-1 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white rounded-full p-2 hover:bg-opacity-75">
                    &#10095;
                </button>
            </div>
        </div>
    </div>
    <script>
        let currentIndex = 0;
        const carousel = document.getElementById('carousel');
        const totalSlides = document.querySelectorAll('.carousel-item').length;

        function showSlide(index) {
            const translateX = -index * 100;
            carousel.style.transform = `translateX(${translateX}%)`;
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            showSlide(currentIndex);
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            showSlide(currentIndex);
        }
    </script>
</x-layout>