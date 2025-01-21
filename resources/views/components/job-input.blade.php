<div class="sm:pb-5  lg:flex min-w-96 lg:w-[70%] mx-auto  mt-2 absolute inset-0 z-9 flex items-center justify-center" x-show="jobCreate" x-cloak>
    <div class="py-3 bg-white rounded-xl shadow-2xl border-black/20 border-2  lg:w-[100%] mx-auto lg:px-20 px-8 relative">
        <h1 class="text-2xl text-gray-700 py-2">Job Create Form</h1>
        <div class="absolute -top-2 -right-2 bg-red-"><x-button @click="jobCreate = false" class="w-4 h-6" rounded="2xl" negative label="X"  /></div>
        <form wire:submit='submit'>
            <hr class="-mx-20">
            <div class="py-1">
                
                <div class="lg:flex mt-3">
                    
                    <x-input
                    wire:model='title'
                    label="Job Title" 
                    placeholder="ex. Fullstack Developer"
                    class="mt-2 mb-3 px-4 py-1  " />
                
                    
                    <x-input 
                    wire:model='salary'
                    label="Salary" 
                    placeholder="Separated by comman. ex. frontend, backend"
                    class="mt-2 mb-3 px-4 py-1 " />

                    
                    
                </div>
                <div class="lg:flex">
                    <x-input 
                    wire:model='location'
                    label="Location" 
                    placeholder="ex. Quezon City"
                    class="mt-2 mb-3 px-4 py-1 " />

                    <x-native-select 
                    wire:model='schedule'
                    label="Schedule" 
                    placeholder="Select Schedule"
                    class="mt-2 mb- px-4 py-1 "
                    :options="['Full Time', 'Part Time']" />
                </div>

                

            <div class="lg:flex">
                <x-textarea 
                wire:model='description'
                label=" Description" 
                placeholder="write your notes"
                class="mt-2 mb-4 px-4 py-1 " />

                <x-textarea 
                wire:model='requirements'
                label="Requirements" 
                placeholder="separated by comma. ex. PHP, CSS, JavaScript,"
                class="mt-2 mb-1 px-4 py-1 " />

                </div>

            </div>

            <div class="lg:flex mt-0">
                    
                <x-input
                wire:model='tags'
                label="Tag" 
                placeholder="Separated by comma. ex. PHP, CSS, JavaScript,"
                class="mt-2 mb-3 px-4 py-1  " />
            
                

                
                
            </div>


            <hr class="-mx-20">
            <div class="lg:flex justify-end  py-3">
                <x-button
                type="submit"
                rounded="xl" 
                warning label="Submit" 
                icon="clipboard-document-check"
                spinner="submit"/>
            </div>
        </form>
    </div>
</div>