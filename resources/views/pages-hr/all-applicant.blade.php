<x-layout>
    <div x-data="{ open: false }">
        <div class="flex flex-col md:flex-row items-center justify-between bg-white shadow-md rounded-lg p-4 mb-4">
            <div class="flex items-center ">
                <div class="font-bold">Applicant Tracking / <span class="font-normal">Applicants Lists</span></div>
            </div>
        </div>

        <div class="lg:h-[50%] rounded-lg">
            <div class="flex w-full lg:flex-row h-full flex-col">
                <livewire:components.stats />
                <div class="lg:w-[50%] flex flex-col items-center justify-center -z-10">
                    <div shadow="xl" class="w-[95%] lg:w-[95%] md:h-[100%] md:w-fit sm:w-[90%] m-2 bg-white/80 rounded-xl drop-shadow-lg text-black p-2">
                        <x-line-chart />
                    </div>
                </div>
            </div>
        </div>

        <div class="h-[70%] bg-white mt-5 lg:mx-3  rounded-xl">
            <div class="bg-white rounded-xl flex w-full lg:justify-between md:justify-between justify-evenly items-center px-2 h-[20%]">
                <div>
                    <div  class="w-full hidden lg:flex">
                        <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex justify-center bg-black/40">
                            <div @click.away="open = false" class="modal-add mt-20 lg:w-fit w-fit h-fit flex justify-center items-center p-3 rounded-2xl">
                                <livewire:components.applicant-form-modal />
                            </div>
                        </div>
                    </div>
    
                    <div  class="w-full lg:hidden flex">
                        {{-- <x-mini-button x-on:click="open = ! open" rounded warning icon="plus" /> --}}
                        <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                            <div @click.away="open = false" class="modal-add lg:w-fit w-full h-fit flex justify-center items-center p-3 rounded-2xl">
                                <livewire:components.applicant-form-modal />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="applicant-table">
                <div class="flex flex-col ">
                    <div class=" overflow-x-auto">
                        <div class="min-w-full inline-block align-middle h-screen">
                            <livewire:components.all-applicant-table  />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</x-layout>

{{-- <x-layout>
    
    <div class="relative" x-data="{ open: false }">
        <div class="h-[50px] flex items-center text-lg bg-white drop-shadow-lg mx-5 mb-5 rounded-xl px-4">
            <a href="" class="font-bold">Applicant Tracking</a>
            &nbsp;/&nbsp;
            <a href="">Applicants</a>
        </div>
    
        <div class="lg:h-[50%] rounded-lg">
            <div class="flex w-full lg:flex-row h-full flex-col">
                <livewire:components.stats lazy/>
                <div class="lg:w-[50%] flex flex-col items-center justify-center -z-10">
                    <div shadow="xl" class="w-[95%] lg:w-[95%] md:h-[100%] md:w-fit sm:w-[90%] m-2 bg-white/80 rounded-xl drop-shadow-lg text-black p-2">
                        <x-line-chart />
                    </div>
                </div>
            </div>
        </div>
        
    
        <div class="h-[70%] bg-white mt-5 lg:mx-3  rounded-xl">
            <div class="bg-white rounded-xl flex w-full lg:justify-between md:justify-between justify-evenly items-center px-2 h-[20%]">
                <div>
                    <div  class="w-full hidden lg:flex">
                        <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex justify-center bg-black/40">
                            <div @click.away="open = false" class="modal-add mt-20 lg:w-fit w-fit h-fit flex justify-center items-center p-3 rounded-2xl">
                                <livewire:components.applicant-form-modal />
                            </div>
                        </div>
                    </div>
    
                    <div x-data="{ open: false }" class="w-full lg:hidden flex">
                        <x-mini-button x-on:click="open = ! open" rounded warning icon="plus" />
                        <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                            <div @click.away="open = false" class="modal-add lg:w-fit w-full h-fit flex justify-center items-center p-3 rounded-2xl">
                                <livewire:components.applicant-form-modal />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="applicant-table">
                <div class="flex flex-col ">
                    <div class=" overflow-x-auto">
                        <div class="min-w-full inline-block align-middle h-screen">
                            <livewire:components.all-applicant-table lazy />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout> --}}