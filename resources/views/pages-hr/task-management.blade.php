<x-layout>
    <div class="mx-auto p-2 h-full overflow-y-auto">
        <!-- Responsive container for Task Management and Employee List -->
        <div class="flex flex-col md:flex-row items-center justify-between bg-white shadow-md rounded-lg p-4 mb-4">
            <div class="flex items-center space-x-4">
                <div class="font-bold">Task Management / <span class="font-normal">Task List</span></div>
            </div>
        </div>
        <!-- Main responsive content -->
        <div class="grid lg:grid-cols-3 gap-2 rounded-lg ">
            
            <!-- Sidebar or Secondary sections -->
           
            <div class="lg:col-span-2 rounded-md max-h-[650px] grid gap-10 lg:flex lg:gap-2">
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
            <div class=" rounded-lg bg-white ">
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
            <div class="lg:col-span-3">
                <table class=" min-w-full ">
                    <thead class="sticky top-0">
                        <tr class="bg-gradient-to-r from-yellow-300 to-amber-400">
                            <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                Name
                            </th>
                            <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                Title
                            </th>
                            <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                Date Submitted
                            </th>
                            <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                Docs
                            </th>
                        </tr>
                    </thead>
                    <livewire:hr.task-table />
                </table>
            </div>
            
        </div>
    </div>
</x-layout>