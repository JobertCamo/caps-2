<x-layout>
    <div x-data="{nav: 'home'}">
        <div class="flex flex-col md:flex-row items-center justify-between bg-white shadow-md rounded-lg p-4 mb-4">
            <div class="flex items-center space-x-4">
                <div class="font-bold">Employee Dashboard / <span class="font-normal">Home</span></div>
            </div>
        </div>
        <div class="grid lg:grid-cols-5 gap-4">
            <div class="lg:col-span-3 gap-4 flex flex-col ">
                <div class="bg-white px-3 pt-3 shadow-md rounded-lg space-y-3 border-2 border-[#4f200dc5]">
                    <livewire:employee.user-info />
                    <div class="text-center text-sm bg-[#4F200D] text-[#F6F1E9] py-1 rounded-md">
                        <a href="/profile-edit/{{ Auth::user()->id }}">View Profile</a>
                    </div>
                    <div class="flex justify-between ">
                        <button @click="nav = 'home'" :class="nav === 'home' ? 'border-b-2 border-amber-500 text-amber-500 font-bold' : 'text-gray-500'" class="p-2">Task List</button>
                        <button @click="nav = 'posts'" :class="nav === 'posts' ? 'border-b-2 border-amber-500 text-amber-500 font-bold' : 'text-gray-500'" class="p-2">Composed</button>
                        {{-- <button @click="nav = 'failedTask'" :class="nav === 'failedTask' ? 'border-b-2 border-amber-500 text-amber-500 font-bold' : 'text-gray-500'" class="p-2">Failed Tasks</button> --}}
                    </div>
                </div>
                <div class="space-y-4 " x-show="nav === 'home'">
                    <div >
                        <livewire:employee.task-stats />
                    </div>
                    <div class="p-3 bg-[#F6F1E9] rounded-lg shadow-lg space-y-2 min-h-[176px] border-2 border-[#4f200dc5]">
                        <div class="flex justify-between">
                            <div class="font-bold">Task List</div>
                            <a href="/task-list">View Tasks</a>
                        </div>
                        <livewire:employee.task-preview />
                    </div>
                    <div class="p-3 bg-white rounded-lg shadow-lg space-y-2 min-h-[176px] border-2 border-[#4f200dc5]">
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
{{-- yung modal dito naka js--}}
        {{-- <p id="ask" class=" hover:underline"> Would you want to Resign?</p> --}}
        <div class="w-full h-screen flex  items-center justify-center top-0  absolute hidden" id="question">
            <div class="bg-white flex-flex-col lg:left-[450px] -translate-x-2 absolute max-w-[450px] max-h-[500px] overflow-auto p-5 border-2 border-[#4F200D] rounded-lg" >
                <p class="w-fit text-[#4F200D] hover:bg-[#FFD93D] rounded-full duration-400 transition-all"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                  </p>
                <h1 class="text-2xl font-bold text-gray-800 mb-4">Terms & Conditions for Resignation Form</h1>

                <div class="space-y-4 text-gray-700">
                    <div>
                        <h2 class="font-semibold text-lg">1. Acknowledgment of Intent to Resign</h2>
                        <p>By filling out the resignation form, you confirm your voluntary decision to resign from the company.</p>
                    </div>

                    <div>
                        <h2 class="font-semibold text-lg">2. Confirmation of Decision</h2>
                        <p>If you choose to proceed, ensure the form is correctly completed and submitted. If you decide not to proceed, do not submit the form and inform your supervisor or HR.</p>
                    </div>

                    <div>
                        <h2 class="font-semibold text-lg">3. Processing and Approval</h2>
                        <p>Once submitted, the resignation form will undergo review. The company may require an exit interview or clearance process.</p>
                    </div>

                    <div>
                        <h2 class="font-semibold text-lg">4. Notice Period Compliance</h2>
                        <p>You must comply with the notice period stated in your contract. Failure to do so may lead to penalties or loss of benefits.</p>
                    </div>

                    <div>
                        <h2 class="font-semibold text-lg">5. Withdrawal of Resignation</h2>
                        <p>To revoke your resignation, submit a formal written request. Approval is at the company's discretion.</p>
                    </div>

                    <div>
                        <h2 class="font-semibold text-lg">6. Final Pay and Clearance</h2>
                        <p>Your final salary and benefits will be processed per company policy. All pending obligations must be settled before release.</p>
                    </div>
                    <div>
                        <h2 class="font-semibold text-lg">7. Confidentiality and Non-Disclosure</h2>
                        <p>All company property must be returned. Disclosing company information post-resignation may lead to legal consequences.</p>
                    </div>
                </div>
                <div class="flex space-x-3 m-5">
                    <button class="flex-1 min-h-[30px] flex items-center justify-center text-[#4F200D] bg-[#F6F1E9] hover:bg-[#FFD93D]/80 duration-300 transition-all backdrop-blur-50 p-1 rounded-lg">
                        NO
                    </button>
                    <button wire:navigate href="/resignation" class="flex-1 min-h-[30px] flex items-center justify-center text-[#4F200D] bg-[#F6F1E9] hover:bg-[#FFD93D]/80 duration-300 transition-all backdrop-blur-50 p-1 rounded-lg">
                        AGREE
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout>

