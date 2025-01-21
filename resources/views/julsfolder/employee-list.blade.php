<x-layout>
    <div class=" mx-auto p-2">
        <div class="h-[50px] flex items-center text-lg bg-white drop-shadow-lg mx-5 mb-5 rounded-xl px-4">
            <a href="" class="font-bold">New Hire List Tracking</a>
            <x-icon name="slash" class="size-5"/>
            <a href="">New Hire List</a>
        </div>
        <div class="hidden lg:flex">
            <div class="count-card cursor-pointer p-4 rounded-lg" >
                <div>
                    <p class="label-count lg:text-xl sm:text-base" id="tableslide">New Applicants</p>
                    <p class="text-3xl font-extrabold text-white" >0</p>
                </div>
                <div>
                    <img src="{{asset('images/applicants.png')}}" alt="" class="w-24 shrink-0">
                </div>
            </div>
            <div class="count-card cursor-pointer p-4 rounded-lg" >
                <div>
                    <p class="label-count lg:text-xl sm:text-base" id="tableslide">New Applicants</p>
                    <p class="text-3xl font-extrabold text-white" >0</p>
                </div>
                <div>
                    <img src="{{asset('images/applicants.png')}}" alt="" class="w-24 shrink-0">
                </div>
            </div>
            <div class="count-card cursor-pointer p-4 rounded-lg" >
                <div>
                    <p class="label-count lg:text-xl sm:text-base" id="tableslide">New Applicants</p>
                    <p class="text-3xl font-extrabold text-white" >0</p>
                </div>
                <div>
                    <img src="{{asset('images/applicants.png')}}" alt="" class="w-24 shrink-0">
                </div>
            </div>
        </div>
        <div class="mt-6 bg-white p-6 rounded-lg shadow mx-4 h-screen">
            <div class="flex justify-between">
                <div>
                    <h3 class="text-lg font-bold mb-4">Employees List</h3>
                </div>
                <div>
                    <div x-data="{ open: false }" class="w-full hidden lg:flex">
                        <x-button x-on:click="open = ! open" amber label="Add Employee"></x-button>
                        <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex justify-center bg-black/40">
                            <div @click.away="open = false" class="modal-add mt-20 lg:w-fit w-fit h-fit flex justify-center items-center p-3 rounded-2xl">
                                <x-modal-form>
                                </x-modal-form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

            
            <div class="flex flex-col mx-2">
                <div class=" overflow-x-auto">
                    <div class="min-w-full inline-block align-middle h-screen">
                        <div class="overflow-hidden rounded-xl ">
                            <table class=" min-w-full">
                                <thead class="sticky top-0">
                                    <tr class="bg-gradient-to-r from-yellow-300 to-amber-400">
                                        <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">Name</th>
                            <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">Contact no.</th>
                            <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">Email</th>
                            <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">Department</th>
                            <th scope="col" class="p-5 text-sm leading-6 font-semibold text-gray-900 capitalize text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-300 ">
                                    <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">Aling puring</td>
                                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> 09123456789 </td>
                                        <td class="p-5 whitespace-nowrap text-center text-sm leading-6 font-medium text-gray-900"> alingpuring@gmailcom</td>
                                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> IT dept</td>
                                        
                                        
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


        </div>

    </div>
</x-layout>
