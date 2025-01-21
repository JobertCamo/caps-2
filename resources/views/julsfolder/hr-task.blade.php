<x-layout>
    <div class="mx-auto p-2 h-full overflow-y-auto">
        <!-- Responsive container for Task Management and Employee List -->
        <div class="h-[50px] flex items-center text-lg bg-white drop-shadow-lg mx-5 mb-5 rounded-xl px-4">
            <a href="" class="font-bold">Task Management</a>
            <x-icon name="slash" class="w-5 h-5"/>
            <a href="">Task List</a>
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
                        <div class="font-medium text-xl lg:text-2xl p-1 indent-4 sm:indent-10">
                            <h1>SALES DAILY TASK</h1>
                            <p class="text-sm text-gray-500 indent-8 sm:indent-16">
                                Created by: Manong
                            </p>
                            <div class="text-xs font-normal indent-8 sm:indent-16 text-gray-500 space-x-2">
                                <span>Started September 07, 2024</span>
                                <span>-</span>
                                <span>End January 01, 2024</span>
                            </div>
                        </div>
                        <div class="text-gray-800 font-semibold text-base p-2 flex flex-col">
                            <span class="indent-5">Total Progress: 60%</span>
                            <div class="bg-gray-300 w-full sm:w-[90%] rounded-full h-2.5 self-center">
                                <div class="bg-indigo-600 h-2.5 rounded-full w-[10%]"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Pre-Employment Task -->
                    <div class="flex-1 space-y-3">
                        <div class="font-medium text-xl lg:text-2xl p-1 indent-4 sm:indent-10">
                            <h1>PRE-EMPLOYMENT TASK</h1>
                            <p class="text-sm text-gray-500 indent-8 sm:indent-16">
                                Created by: Manong
                            </p>
                            <div class="text-xs font-normal indent-8 sm:indent-16 text-gray-500 space-x-2">
                                <span>Date start: September 07, 2024</span>
                                <span>-</span>
                                <span>Date end: January 01, 2024</span>
                            </div>
                        </div>
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
                    <p class=" font-bold text-xl">Task Notes</p>
                    <div  x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                        <x-button x-on:click="open = ! open" amber label="Add Note"></x-button>
                            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                <div @click.away="open = false" class="modal-add2 mt-20 flex justify-center items-center p-3 rounded-2xl">
                                    <div>
                                        <form action="">
                                            <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                                <legend class="font-bold text-2xl text-amber-600">Create Task Note</legend>
                                                <div class=" flex items-center justify-center">
                                                    <div class=" rounded-lg shadow-lg">
                                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                                <div>
                                                                    <div class="">
                                                                        <label for="department" class="block text-sm font-medium text-gray-700">Select Department</label>
                                                                        <select id="department" name="department" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                                                                            <option value="">Choose a department</option>
                                                                            <option value="sales">Sales</option>
                                                                            <option value="marketing">Marketing</option>
                                                                            <option value="inventory">Inventory</option>
                                                                            <option value="vendor">Vendor Relations</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <label class="block text-gray-700 text-sm font-medium mb-1">Resignation Details</label>
                                                                <x-textarea type="text"  />
                                                            </div>
                                                            <div>
                                                                <label class="block text-white text-sm font-medium mb-1">Resignation letter</label>
                                                                <x-input type="file" class="" />
                                                            </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="flex justify-end items-center m-2">
                                                <x-button emerald label="Submit" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="flex flex-col  max-h-[400px] overflow-auto soft-scrollbar p-2">
                    <div class="card-task"> <!--START TO NG TASK LISTS CARD WALA YANG CLASS NAME LANG HAHA-->
                        <div class="flex items-center ">
                            <div class="w-3 h-3 rounded-full bg-[#FF6B6D] m-2">
                            </div>
                            <p class="font-semibold text-base">
                                Sales Department
                            </p>
                        </div>
                        <p class="indent-5 text-sm">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia architecto sunt enim ut dolor
                        </p>
                    </div>
                    <div class="card-task"> <!--START TO NG CARD TASK WALA YANG CLASS NAME LANG HAHA-->
                        <div class="flex items-center ">
                            <div class="w-3 h-3 rounded-full bg-[#FF6B6D] m-2">
                            </div>
                            <p class="font-semibold text-base">
                                Sales Department
                            </p>
                        </div>
                        <p class="indent-5 text-sm">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia architecto sunt enim ut dolor
                        </p>
                    </div>
                    <div class="card-task"> <!--START TO NG CARD TASK WALA YANG CLASS NAME LANG HAHA-->
                        <div class="flex items-center ">
                            <div class="w-3 h-3 rounded-full bg-[#FF6B6D] m-2">
                            </div>
                            <p class="font-semibold text-base">
                                Sales Department
                            </p>
                        </div>
                        <p class="indent-5 text-sm">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia architecto sunt enim ut dolor
                        </p>
                    </div>
                   
                </div>
            </div>
            <div class="row-span-12 col-span-3 rounded-md max-h-[650px] flex gap-2">
                <div class="flex-1 bg-white rounded-lg">
                    <div class="p-2 border-b-2 flex items-center justify-between mb-2 shadow-md">
                        <h1 class="font-bold text-xl m-2">
                            Task List
                        </h1>
                        <div>
                            <div  x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                                <x-button x-on:click="open = ! open" amber label="Add Task"></x-button>
                                    <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                        <div @click.away="open = false" class="modal-add2 mt-20 flex justify-center items-center p-3 rounded-2xl">
                                            <div>
                                                <form action="">
                                                    <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                                        <legend class="font-bold text-2xl text-amber-600">Create Task</legend>
                                                        <div class=" flex items-center justify-center">
                                                            <div class=" rounded-lg shadow-lg">
                                                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                                        <div>
                                                                            <label for="department" class="block text-sm font-medium text-gray-700">Select Department</label>
                                                                            <select id="department" name="department" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                                                                                <option value="">Choose a department</option>
                                                                                <option value="sales">Sales</option>
                                                                                <option value="marketing">Marketing</option>
                                                                                <option value="inventory">Inventory</option>
                                                                                <option value="vendor">Vendor Relations</option>
                                                                            </select>
                                                                        </div>
                                                                        <div>
                                                                            <label class="block text-gray-700 text-sm font-medium mb-1">Task Name<label>
                                                                            <x-input type="text" class="" />
                                                                        </div>
                                                                        <div>
                                                                            <label class="block text-gray-700 text-sm font-medium mb-1">Date Start:<label>
                                                                            <x-input type="date" class="" />
                                                                        </div>
                                                                        <div>
                                                                            <label class="block text-gray-700 text-sm font-medium mb-1">Date End:<label>
                                                                            <x-input type="date" class="" />
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label class="block text-gray-700 text-sm font-medium mb-1">Task Details</label>
                                                                        <x-textarea type="text"  />
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="flex justify-end items-center m-2">
                                                        <x-button emerald label="Submit" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 space-y-2 overflow-auto max-h-[570px] soft-scrollbar ">
                        <div class="h-[130px] bg-white border-[2px] border-gray-400 shadow-xl rounded-lg p-2 hover:bg-slate-100"> <!--START NG  TASK CARD-->
                            <div class="flex justify-between">
                                <h1 class=" font-bold text-base">
                                    SAMPLE TITLEEEEEE
                                </h1>
                                    <div  x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                                        <button x-on:click="open = ! open" > <x-icon name="pencil-square" class="size-6 shrink-0 text-violet-800 hover:bg-purple-900/20 rounded-md"/></button>
                                            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                                <div @click.away="open = false" class="modal-add2 mt-20 flex justify-center items-center p-3 rounded-2xl">
                                                    <div>
                                                        <form action="">
                                                            <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                                                <legend class="font-bold text-2xl text-amber-600">Edit Task</legend>
                                                                <div class=" flex items-center justify-center">
                                                                    <div class=" rounded-lg shadow-lg">
                                                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                                                <div>
                                                                                    <label class="block text-gray-700 text-sm font-medium mb-1">New Name<label>
                                                                                    <x-input type="text" class="" />
                                                                                </div>
                                                                                <div>
                                                                                    <label class="block text-gray-700 text-sm font-medium mb-1">New Date Start:<label>
                                                                                    <x-input type="date" class="" />
                                                                                </div>
                                                                                <div>
                                                                                    <label class="block text-gray-700 text-sm font-medium mb-1">New Date End:<label>
                                                                                    <x-input type="date" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <label class="block text-gray-700 text-sm font-medium mb-1">Update Task Details</label>
                                                                                <x-textarea type="text"  />
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <div class="flex justify-between items-center m-2">
                                                                <x-button red label="Delete Task"/>
                                                                <x-button emerald label="Submit" />
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                            <div class="mb-2">
                                <p class=" text-xs text-black/50">
                                    Department: Sales Dept
                                </p>
                                <p class=" indent-6 text-sm">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae in nemo commodi voluptatem sint impedit
                                </p>
                            </div>
                            <div class="flex justify-between mx-2 items-center">
                                <div class="flex -space-x-2 overflow-hidden">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80" alt="">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <div class=" h-6 w-6 rounded-full ring-2 ring-white bg-cb text-xs items-center justify-center flex">5+</div>
                                </div>
                                <div class="flex items-center gap-1 text-red-600 font-bold bg-red-700/30 px-2 rounded-full">
                                    <p class=" text-xs">November 3, 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="h-[130px] bg-white border-[2px] border-gray-400 shadow-xl rounded-lg p-2 hover:bg-slate-100"> <!--START NG  TASK CARD-->
                            <div class="flex justify-between">
                                <h1 class=" font-bold text-base">
                                    SAMPLE TITLEEEEEE
                                </h1>
                                    <div  x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                                        <button x-on:click="open = ! open" > <x-icon name="pencil-square" class="size-6 shrink-0 text-violet-800 hover:bg-purple-900/20 rounded-md"/></button>
                                            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                                <div @click.away="open = false" class="modal-add2 mt-20 flex justify-center items-center p-3 rounded-2xl">
                                                    <div>
                                                        <form action="">
                                                            <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                                                <legend class="font-bold text-2xl text-amber-600">Edit Task</legend>
                                                                <div class=" flex items-center justify-center">
                                                                    <div class=" rounded-lg shadow-lg">
                                                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                                                <div>
                                                                                    <label class="block text-gray-700 text-sm font-medium mb-1">New Name<label>
                                                                                    <x-input type="text" class="" />
                                                                                </div>
                                                                                <div>
                                                                                    <label class="block text-gray-700 text-sm font-medium mb-1">New Date Start:<label>
                                                                                    <x-input type="date" class="" />
                                                                                </div>
                                                                                <div>
                                                                                    <label class="block text-gray-700 text-sm font-medium mb-1">New Date End:<label>
                                                                                    <x-input type="date" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <label class="block text-gray-700 text-sm font-medium mb-1">Update Task Details</label>
                                                                                <x-textarea type="text"  />
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <div class="flex justify-between items-center m-2">
                                                                <x-button red label="Delete Task"/>
                                                                <x-button emerald label="Submit" />
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                            <div class="mb-2">
                                <p class=" text-xs text-black/50">
                                    Department: Sales Dept
                                </p>
                                <p class=" indent-6 text-sm">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae in nemo commodi voluptatem sint impedit
                                </p>
                            </div>
                            <div class="flex justify-between mx-2 items-center">
                                <div class="flex -space-x-2 overflow-hidden">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80" alt="">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <div class=" h-6 w-6 rounded-full ring-2 ring-white bg-cb text-xs items-center justify-center flex">5+</div>
                                </div>
                                <div class="flex items-center gap-1 text-red-600 font-bold bg-red-700/30 px-2 rounded-full">
                                    <p class=" text-xs">November 3, 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="h-[130px] bg-white border-[2px] border-gray-400 shadow-xl rounded-lg p-2 hover:bg-slate-100"> <!--START NG  TASK CARD-->
                            <div class="flex justify-between">
                                <h1 class=" font-bold text-base">
                                    SAMPLE TITLEEEEEE
                                </h1>
                                    <div  x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                                        <button x-on:click="open = ! open" > <x-icon name="pencil-square" class="size-6 shrink-0 text-violet-800 hover:bg-purple-900/20 rounded-md"/></button>
                                            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                                <div @click.away="open = false" class="modal-add2 mt-20 flex justify-center items-center p-3 rounded-2xl">
                                                    <div>
                                                        <form action="">
                                                            <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                                                <legend class="font-bold text-2xl text-amber-600">Edit Task</legend>
                                                                <div class=" flex items-center justify-center">
                                                                    <div class=" rounded-lg shadow-lg">
                                                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                                                <div>
                                                                                    <label class="block text-gray-700 text-sm font-medium mb-1">New Name<label>
                                                                                    <x-input type="text" class="" />
                                                                                </div>
                                                                                <div>
                                                                                    <label class="block text-gray-700 text-sm font-medium mb-1">New Date Start:<label>
                                                                                    <x-input type="date" class="" />
                                                                                </div>
                                                                                <div>
                                                                                    <label class="block text-gray-700 text-sm font-medium mb-1">New Date End:<label>
                                                                                    <x-input type="date" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <label class="block text-gray-700 text-sm font-medium mb-1">Update Task Details</label>
                                                                                <x-textarea type="text"  />
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <div class="flex justify-between items-center m-2">
                                                                <x-button red label="Delete Task"/>
                                                                <x-button emerald label="Submit" />
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                            <div class="mb-2">
                                <p class=" text-xs text-black/50">
                                    Department: Sales Dept
                                </p>
                                <p class=" indent-6 text-sm">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae in nemo commodi voluptatem sint impedit
                                </p>
                            </div>
                            <div class="flex justify-between mx-2 items-center">
                                <div class="flex -space-x-2 overflow-hidden">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80" alt="">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <div class=" h-6 w-6 rounded-full ring-2 ring-white bg-cb text-xs items-center justify-center flex">5+</div>
                                </div>
                                <div class="flex items-center gap-1 text-red-600 font-bold bg-red-700/30 px-2 rounded-full">
                                    <p class=" text-xs">November 3, 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="h-[130px] bg-white border-[2px] border-gray-400 shadow-xl rounded-lg p-2 hover:bg-slate-100"> <!--START NG  TASK CARD-->
                            <div class="flex justify-between">
                                <h1 class=" font-bold text-base">
                                    SAMPLE TITLEEEEEE
                                </h1>
                                    <div  x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                                        <button x-on:click="open = ! open" > <x-icon name="pencil-square" class="size-6 shrink-0 text-violet-800 hover:bg-purple-900/20 rounded-md"/></button>
                                            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                                <div @click.away="open = false" class="modal-add2 mt-20 flex justify-center items-center p-3 rounded-2xl">
                                                    <div>
                                                        <form action="">
                                                            <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                                                <legend class="font-bold text-2xl text-amber-600">Edit Task</legend>
                                                                <div class=" flex items-center justify-center">
                                                                    <div class=" rounded-lg shadow-lg">
                                                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                                                <div>
                                                                                    <label class="block text-gray-700 text-sm font-medium mb-1">New Name<label>
                                                                                    <x-input type="text" class="" />
                                                                                </div>
                                                                                <div>
                                                                                    <label class="block text-gray-700 text-sm font-medium mb-1">New Date Start:<label>
                                                                                    <x-input type="date" class="" />
                                                                                </div>
                                                                                <div>
                                                                                    <label class="block text-gray-700 text-sm font-medium mb-1">New Date End:<label>
                                                                                    <x-input type="date" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <label class="block text-gray-700 text-sm font-medium mb-1">Update Task Details</label>
                                                                                <x-textarea type="text"  />
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <div class="flex justify-between items-center m-2">
                                                                <x-button red label="Delete Task"/>
                                                                <x-button emerald label="Submit" />
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                            <div class="mb-2">
                                <p class=" text-xs text-black/50">
                                    Department: Sales Dept
                                </p>
                                <p class=" indent-6 text-sm">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae in nemo commodi voluptatem sint impedit
                                </p>
                            </div>
                            <div class="flex justify-between mx-2 items-center">
                                <div class="flex -space-x-2 overflow-hidden">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80" alt="">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <div class=" h-6 w-6 rounded-full ring-2 ring-white bg-cb text-xs items-center justify-center flex">5+</div>
                                </div>
                                <div class="flex items-center gap-1 text-red-600 font-bold bg-red-700/30 px-2 rounded-full">
                                    <p class=" text-xs">November 3, 2024</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="flex-1 bg-white rounded-lg">
                    <div class="p-2 border-b-2 mb-2 shadow-md">
                        <h1 class="font-bold text-xl m-2">
                            Recent Activities
                        </h1>
                    </div>
                    <div class="px-4 py-2 space-y-2 overflow-auto max-h-[570px] soft-scrollbar ">
                        <ol class="relative border-s border-black dark:border-gray-700">
                            <li class="mb-10 ms-4">
                                <div class="absolute w-3 h-3 bg-red-500 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                                <time class="mb-1 text-sm font-normal leading-none text-[#34444c]  ">
                                    February 2022
                                </time>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                                    Task Completed - Department
                                </h3>
                                <p class=" text-sm font-semibold text-[#34444c]">
                                    Aling puring
                                </p>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400 indent-5">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui numquam eius architecto odio. Quasi corporis, suscipit, incidunt a qui sed, distinctio quidem nostrum illum aut autem est harum excepturi. Voluptate.
                                </p>
                            </li>
                            <li class="mb-10 ms-4">
                                <div class="absolute w-3 h-3 bg-red-500 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                                <time class="mb-1 text-sm font-normal leading-none text-[#34444c]  ">
                                    February 2022
                                </time>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                                    Task Completed - Department
                                </h3>
                                <p class=" text-sm font-semibold text-[#34444c]">
                                    Aling puring
                                </p>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400 indent-5">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui numquam eius architecto odio. Quasi corporis, suscipit, incidunt a qui sed, distinctio quidem nostrum illum aut autem est harum excepturi. Voluptate.
                                </p>
                            </li>
                            <li class="mb-10 ms-4">
                                <div class="absolute w-3 h-3 bg-red-500 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                                <time class="mb-1 text-sm font-normal leading-none text-[#34444c]  ">
                                    February 2022
                                </time>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                                    Task Completed - Department
                                </h3>
                                <p class=" text-sm font-semibold text-[#34444c]">
                                    Aling puring
                                </p>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400 indent-5">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui numquam eius architecto odio. Quasi corporis, suscipit, incidunt a qui sed, distinctio quidem nostrum illum aut autem est harum excepturi. Voluptate.
                                </p>
                            </li>
                           
                        </ol>
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