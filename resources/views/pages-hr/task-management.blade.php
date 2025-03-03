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