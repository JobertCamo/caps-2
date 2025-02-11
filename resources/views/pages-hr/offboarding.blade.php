<x-layout>

    <div class="space-y-4" x-data="{open: false, add: false}">
        <div class="flex flex-col md:flex-row items-center justify-between bg-white shadow-md rounded-lg p-4">
            <div class="flex items-center ">
                <div class="font-bold">Employee Tracking / <span class="font-normal">Offboarding</span></div>
            </div>
        </div>

        <div class="bg-white  px-3 pb-4 pt-2 rounded-lg shadow-lg">
            <livewire:hr.offboarding-schedule />
            
        </div>
        
       <livewire:hr.resign-data />

        <div x-cloak x-transition x-show="add" class="fixed inset-0 z-10 flex items-center justify-center bg-black/40">
            <div @click.away="add = false" class="bg-white mt-20 flex justify-center items-center p-3 rounded-2xl">
                <div>
                    <livewire:hr.new-resignee />
                </div>
            </div>
        </div>
        {{--  --}}
        
        
    </div>

    

    
</x-layout>