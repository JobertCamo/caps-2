
<div class="flex flex-col mx-2">
    <div class=" overflow-x-auto">
        <div class="min-w-full inline-block align-middle h-screen">
            <div class="overflow-hidden rounded-xl ">
                <table class=" min-w-full">
                    <thead class="sticky top-0">
                        <tr class="bg-gradient-to-r from-yellow-300 to-amber-400">
                            {{ $slot }} <!---TABLEHEADER LOAD-->
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-300 ">
                        <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">Aling puring</td>
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> 09123456789 </td>
                            <td class="p-5 whitespace-nowrap text-center text-sm leading-6 font-medium text-gray-900"> alingpuring@gmailcom</td>
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> IT dept</td>
                            <td>
                                <div class="w-full max-w-xl flex items-center space-x-2 ">
                                    <p class=" text-sm text-gray-700" id="score-display">0%</p>
                                    <!-- Progress Bar -->
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div id="progress" class="bg-indigo-600 h-2.5 rounded-full w-[10%]">
                                    </div>
                                </div>
                                    <!-- Score Display -->
                            </td>
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-center text-gray-900">
                                <x-badge flat positive label="Interview Passed" />
                            </td>
                            <td class=" p-5">
                                <x-dropdown>
                                    <x-dropdown.item label="Edit" />
                                    <x-dropdown.item label="Delete" />
                                    <x-dropdown.item label="See History" />
                                </x-dropdown>
                            </td>
                        </tr>
                        <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 "> Louis Vuitton</td>
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> 09123456789 </td>
                            <td class="p-5 whitespace-nowrap text-center text-sm leading-6 font-medium text-gray-900"> ddddddddddddddddelatorrejuliuservin9@gmailcom</td>
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> IT dept</td>
                            <td>
                                <div class="w-full max-w-xl flex items-center space-x-2 ">
                                    <p class=" text-sm text-gray-700" id="score-display">0%</p>
                                    <!-- Progress Bar -->
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div id="progress" class="bg-indigo-600 h-2.5 rounded-full w-[10%]">
                                    </div>
                                </div>
                                    <!-- Score Display -->
                            </td>
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-center text-gray-900">
                                <x-badge flat primary label="Not Attended" />
                            </td>
                            <td class=" p-5">
                                <x-dropdown>
                                    <x-dropdown.item label="Edit" />
                                    <x-dropdown.item label="Delete" />
                                    <x-dropdown.item label="See History" />
                                </x-dropdown>
                            </td>
                        </tr>
                        <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 "> Mang Kanor</td>
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> 09123456789 </td>
                            <td class="p-5 whitespace-nowrap text-center text-sm leading-6 font-medium text-gray-900">mangkanor@gmailcom</td>
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> IT dept</td>
                            <td>
                                <div class="w-full max-w-xl flex items-center space-x-2 ">
                                    <p class=" text-sm text-gray-700" id="score-display">0%</p>
                                    <!-- Progress Bar -->
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div id="progress" class="bg-indigo-600 h-2.5 rounded-full w-[10%]">
                                    </div>
                                </div>
                                    <!-- Score Display -->
                            </td>
                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-center text-gray-900">
                                <x-badge flat negative label="Interview Failed" />
                            </td>
                            <td class=" p-5">
                                <x-dropdown>
                                    <x-dropdown.item label="Edit" />
                                    <x-dropdown.item label="Delete" />
                                    <x-dropdown.item label="See History" />
                                </x-dropdown>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
