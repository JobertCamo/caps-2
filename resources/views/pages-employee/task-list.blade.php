<x-layout>
    <div x-data="{tass: false}">
        <div class="flex flex-col md:flex-row items-center justify-between bg-white shadow-md rounded-lg p-4 mb-4">
            <div class="flex items-center space-x-4">
                <div class="font-bold">Employee Dashboard / <span class="font-normal">Home</span></div>
            </div>
        </div>
        <div class="grid lg:grid-cols-5 gap-4" x-data="{task: 'incomplete'}">
            <div class="relative overflow-x-auto  lg:px-3 lg:col-span-3 ">
                <div class="bg-white mb-2 p-3 space-y-3 shadow-md rounded-lg">
                    <div class="text-2xl font-bold">Task Lists</div>
                    <div class="flex items-center gap-2 text-sm border-b-2 border-gray-200">
                        <button @click="task = 'incomplete'" :class="task === 'incomplete' ? 'border-b-2 border-amber-500 text-amber-500' : 'text-gray-500'" amber>task incomplete</button>
                        <button @click="task = 'completed'" :class="task === 'completed' ? 'border-b-2 border-amber-500 text-amber-500' : 'text-gray-500'" amber>task completed</button>
                    </div>
                </div>
                <div x-show="task === 'incomplete'" class="overflow-auto">
                    <table  class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-md min-h-[200px] bg-white relative">
                        <thead class="text-xs text-gray-400 uppercase bg-white ">
                            <tr>
                                {{-- <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                    </div>
                                </th> --}}
                                <th scope="col" class="px-5 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-5 py-3">
                                    Description
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    deadline
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    statussss
                                </th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <livewire:employee.task-list />
                        </tbody>
                    </table>
                </div>
                <div x-show="task === 'completed'" class="overflow-auto">
                    <table  class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-md min-h-[200px] bg-white relative">
                        <thead class="text-xs text-gray-400 uppercase bg-white dark:bg-gray-700 dark:text-gray-400 ">
                            <tr>
                                {{-- <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                    </div>
                                </th> --}}
                                <th scope="col" class="px-5 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-5 py-3">
                                    Description
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Completed
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <livewire:employee.completed_task />
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white lg:col-span-2 h-[100%] flex flex-col shadow-md rounded-lg lg:max-h-[508px] xl:max-h-[768px] overflow-y-scroll scrollbar-hidden">
                <div class="p-3 grid grid-cols-2 gap-3">
                    <div class="bg-gradient-to-r from-indigo-300 to-indigo-600 rounded-lg p-2 space-y-3 text-white">
                        <div class="flex justify-between">
                            <div>Task Completed</div>
                            <x-icon name="rectangle-stack" />
                        </div>
                        <div class="text-2xl">5/10</div>
                    </div>
                    <div class="bg-gradient-to-r from-sky-400 to-sky-600 rounded-lg p-2 space-y-3 text-white">
                        <div class="flex justify-between">
                            <div>Task Completed</div>
                            <x-icon name="rectangle-stack" />
                        </div>
                        <div class="text-2xl">5/10</div>
                    </div>
                    
                </div>
                <livewire:employee.announcements />
            </div>
        </div>
    </div>
</x-layout>