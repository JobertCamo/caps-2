<div class="flex font-bold lg:text-xl md:text-sm justify-between mb-2 items-center ">
    <p>Up Comming Interview Schedule</p>
    <div x-data="{ open: false }">
        <x-button x-on:click="open = ! open"  amber label="Add Schedule"></x-button>
        <div  x-cloak x-transition x-show="open" class=" absolute inset-0  z-10 flex items-center justify-center bg-black/40 ">
            <div @click.away="open = false" class="modal-add lg:w-fit w-fit h-fit flex justify-center items-center p-3 rounded-2xl">
                <x-modal-schedule>

                </x-modal-schedule>
            </div>
        </div>
    </div>
</div>
<div class="  h-[90%] overflow-y-auto overflow-hidden overflow-x-auto scrollbar-thin">
    <div class="  -m-1.5 overflow-x-auto overflow-y-auto">
        <div class="p-1.5 inline-block align-middle">
            <div class="overflow-hidden bg-white rounded-lg ">
                <table class=" divide-y divide-black ">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase">Name</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase">Department</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase">Contact</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase">Date</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase">Time</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <tr class="hover:bg-gray-100 ">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">John Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">IT DEPT</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">09123456789</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">09/30/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12:00 PM</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <x-dropdown>
                                    <x-dropdown.item label="Edit" />
                                    <x-dropdown.item label="Delete" />
                                    <x-dropdown.item label="See History" />
                                </x-dropdown>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-100 ">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">John Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">IT DEPT</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">09123456789</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">09/30/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12:00 PM</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <x-dropdown>
                                    <x-dropdown.item label="Edit" />
                                    <x-dropdown.item label="Delete" />
                                    <x-dropdown.item label="See History" />
                                </x-dropdown>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-100 ">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">John Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">IT DEPT</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">09123456789</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">09/30/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12:00 PM</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <x-dropdown>
                                    <x-dropdown.item label="Edit" />
                                    <x-dropdown.item label="Delete" />
                                    <x-dropdown.item label="See History" />
                                </x-dropdown>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-100 ">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">John Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">IT DEPT</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">09123456789</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">09/30/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12:00 PM</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <x-dropdown>
                                    <x-dropdown.item label="Edit" />
                                    <x-dropdown.item label="Delete" />
                                    <x-dropdown.item label="See History" />
                                </x-dropdown>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-100 ">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">John Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">IT DEPT</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">09123456789</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">09/30/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12:00 PM</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <x-dropdown>
                                    <x-dropdown.item label="Edit" />
                                    <x-dropdown.item label="Delete" />
                                    <x-dropdown.item label="See History" />
                                </x-dropdown>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-100 ">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">John Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">IT DEPT</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">09123456789</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">09/30/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12:00 PM</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <x-dropdown>
                                    <x-dropdown.item label="Edit" />
                                    <x-dropdown.item label="Delete" />
                                    <x-dropdown.item label="See History" />
                                </x-dropdown>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-100 ">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">John Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">IT DEPT</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">09123456789</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">09/30/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12:00 PM</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <x-dropdown>
                                    <x-dropdown.item label="Edit" />
                                    <x-dropdown.item label="Delete" />
                                    <x-dropdown.item label="See History" />
                                </x-dropdown>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-100 ">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">John Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">IT DEPT</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">09123456789</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">09/30/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12:00 PM</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <x-dropdown>
                                    <x-dropdown.item label="Edit" />
                                    <x-dropdown.item label="Delete" />
                                    <x-dropdown.item label="See History" />
                                </x-dropdown>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-100 ">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">John Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">IT DEPT</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">09123456789</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">09/30/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12:00 PM</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <x-dropdown>
                                    <x-dropdown.item label="Edit" />
                                    <x-dropdown.item label="Delete" />
                                    <x-dropdown.item label="See History" />
                                </x-dropdown>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-100 ">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">John Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">IT DEPT</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">09123456789</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">09/30/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12:00 PM</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <x-dropdown>
                                    <x-dropdown.item label="Edit" />
                                    <x-dropdown.item label="Delete" />
                                    <x-dropdown.item label="See History" />
                                </x-dropdown>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-100 ">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">John Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">IT DEPT</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">09123456789</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">09/30/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12:00 PM</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <x-dropdown>
                                    <x-dropdown.item label="Edit" />
                                    <x-dropdown.item label="Delete" />
                                    <x-dropdown.item label="See History" />
                                </x-dropdown>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-100 ">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">John Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">IT DEPT</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">09123456789</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">09/30/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12:00 PM</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <x-dropdown>
                                    <x-dropdown.item label="Edit" />
                                    <x-dropdown.item label="Delete" />
                                    <x-dropdown.item label="See History" />
                                </x-dropdown>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-100 ">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">John Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">IT DEPT</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">09123456789</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">09/30/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12:00 PM</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
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
