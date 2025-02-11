<x-layout>
    <div x-data="{jobCreate: false}">
        <div class="flex flex-col md:flex-row items-center justify-between bg-white shadow-md rounded-lg p-4 mb-4">
            <div class="flex items-center space-x-4">
                <div class="font-bold">Applicant Tracking / <span class="font-normal">Applicants Lists</span></div>
            </div>
        </div>
        
        <livewire:jobs.job-list />            

        <div x-show="jobCreate" x-cloak class="px-2 md:px-0 transition-all duration-300 flex h-screen w-full bg-black/20 fixed top-0 left-0 z-50  justify-center items-center">
            <livewire:jobs.create-job />            
        </div>
        
    </div>
</x-layout>