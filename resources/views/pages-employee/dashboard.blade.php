<x-layout>
    <div x-data="{nav: 'home'}">
        <div class="flex flex-col md:flex-row items-center justify-between bg-white shadow-md rounded-lg p-4 mb-4">
            <div class="flex items-center space-x-4">
                <div class="font-bold">Employee Dashboard / <span class="font-normal">Home</span></div>
            </div>
        </div>
        <div class="grid lg:grid-cols-5 gap-4">
            <div class="lg:col-span-3 gap-4 flex flex-col">
                <div class="bg-white px-3 pt-3 shadow-md rounded-lg space-y-3">
                    <livewire:employee.user-info />
                    <div class="text-center text-sm bg-slate-200 py-1 rounded-md">
                        <a href="/profile">View Profile</a>
                    </div>
                    <div class="flex justify-between">
                        <button @click="nav = 'home'" :class="nav === 'home' ? 'border-b-2 border-amber-500 text-amber-500 font-bold' : 'text-gray-500'" class="p-2">Task List</button>
                        <button @click="nav = 'posts'" :class="nav === 'posts' ? 'border-b-2 border-amber-500 text-amber-500 font-bold' : 'text-gray-500'" class="p-2">Composed</button>
                        <button @click="nav = 'failedTask'" :class="nav === 'failedTask' ? 'border-b-2 border-amber-500 text-amber-500 font-bold' : 'text-gray-500'" class="p-2">Failed Tasks</button>
                    </div>
                </div>
                <div class="space-y-4" x-show="nav === 'home'">
                    <div >
                        <livewire:employee.task-stats />
                    </div>
                    <div class="p-3 bg-white rounded-lg shadow-lg space-y-2 min-h-[176px]">
                        <div class="flex justify-between">
                            <div class="font-bold">Task List</div>
                            <a href="/task-list">View Tasks</a>
                        </div>
                        <livewire:employee.task-preview />
                    </div>
                    <div class="p-3 bg-white rounded-lg shadow-lg space-y-2 min-h-[176px]">
                        <div class="flex justify-between">
                            <div class="font-bold">Completed</div>
                            <a href="/task-list">View Tasks</a>
                        </div>
                        <livewire:employee.complete-task-preview />
                    </div>
                </div>
                <div x-show="nav === 'posts'" class="min-h-[452px] max-h-[480px] overflow-auto soft-scrollbar bg-white">
                    <livewire:posts.personal-post />
                </div>
                <div x-show="nav === 'failedTask'" class="overflow-auto">
                    <table  class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-md min-h-[200px] bg-white rounded-lg relative">
                        <thead class="text-xs text-gray-400 uppercase  dark:bg-gray-700 dark:text-gray-400 ">
                            <tr>
                                {{-- <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                    </div>
                                </th> --}}
                                <th scope="col" class="px-5 py-3">
                                    Reason
                                </th>
                                <th scope="col" class="px-5 py-3">
                                    Schedule Interview
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="">
                            {{-- DATA --}}
                            <div >
                                <tr class="bg-white border-b hover:bg-gray-200 cursor-pointer ">
                                    <th scope="row" class="px-5  font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    No Data
                                    </th>
                                    <td class="px-5 py-1">
                                        &nbsp;
                                    </td>
                                    <td class="px-2 py-1">
                                        &nbsp;
                                    </td>
                                    
                                </tr>
                            </div>
                            {{-- DATA --}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white lg:col-span-2 h-[100%] flex flex-col shadow-md rounded-lg  overflow-y-scroll scrollbar-hidden">
                <livewire:employee.task-stats-right />

                <livewire:employee.announcements />
            </div>
        </div>
    </div>
</x-layout>