<x-layout>
    <div>
        <div class="flex flex-col md:flex-row items-center justify-between bg-white shadow-md rounded-lg p-4 mb-4">
            <div class="flex items-center space-x-4">
                <div class="font-bold">Applicant Tracking / <span class="font-normal">Priority Applicants</span></div>
            </div>
        </div>

        <livewire:components.applicant-schedule />

        <div class="h-[70%] mt-5 w-full overflow-x-auto hide-scrollbar">
            <div class="flex flex-col ">
                <div class=" overflow-x-auto">
                    <div class="min-w-full inline-block align-middle h-screen">
                        <livewire:components.priority-applicant-table />
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</x-layout>

{{-- <x-layout>
    <div class="overflow-y-auto  ">
        
        <div class="h-[50px]  flex items-center text-lg bg-white drop-shadow-lg mx-2 mb-5 rounded-xl px-4">
            <a href="" class="font-bold">Applicant Tracking</a>
            &nbsp;/&nbsp;
            <a href="">Candidate</a>
        </div>
    
        <livewire:components.applicant-schedule />
    
        
        <div class="h-[70%] mt-5 w-full overflow-x-auto hide-scrollbar">
            <div class="flex flex-col ">
                <div class=" overflow-x-auto">
                    <div class="min-w-full inline-block align-middle h-screen">
                        <livewire:components.priority-applicant-table />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout> --}}