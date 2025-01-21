<div>
    <form wire:submit='submit'>
        <fieldset class=" p-4 border-2 w-fit rounded-2xl">
            <legend class=" font-bold text-2xl text-amber-600">Add Applicants</legend>
            <div class="flex ">
                <div class="flex space-x-3">
                    <div>
                        <x-input errorless wire:model="last_name" label="Last Name" placeholder="Enter Last name"/>
                    </div>
                    <div>
                        <x-input errorless wire:model="first_name" label="First Name" placeholder="Enter First name"/>
                    </div>
                    <div>
                        <x-input errorless wire:model="middle_name" label="Middle name" placeholder="Enter Middle name"/>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex space-x-3 items-center  justify-center">
                    <div>
                        <x-native-select errorless wire:model="gender" label="Select Gender" :options="['Male', 'Female']" />
                    </div>
                    <div class="w-[30%]">
                        {{-- <label for="date" class=" text-sm">Birth Date</label> --}}
                        <x-input errorless wire:model='birth_date' label="Birth_Date" type="date"/>
                    </div>
                    <div>
                        <x-phone errorless
                        wire:model='contact'
                        id="multiple-mask"
                        label="Contact"
                        placeholder="Phone"
                        :mask="['(###) ###-####', '+# ### ###-####', '+## ## ####-####']"
                    />
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-[80%]">
                    <x-input errorless wire:model='address' label="Adress" placeholder="Your Adrress"/>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-[80%]">
                    <x-input errorless wire:model='email' label="Email" placeholder="Your Email"/>
                </div>

            </div>
            <div>
                <div class="flex space-x-3 items-center justify-center">
                    <div>
                        <x-input errorless wire:model='nationality' label="Nationality" placeholder="Your Nationality"   corner="Ex: Filipino"/>
                    </div>
                    <div>
                        <x-native-select errorless wire:model='civil_status' label="Civil Status"
                        :options="['Single', 'Married', 'Divorced']"/>
                    </div>
                    <div>
                        <x-native-select errorless wire:model='religion' label="Select Religion" 
                        :options="['Catholic', 'Muslin', 'Iglesia Ni Cristo', 'Born Again']"/>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center">
                <div class="w-[50%]">
                    <x-input errorless wire:model='refered_by' corner="Optional" icon="user" label="Refered by" placeholder="Enter Full Name"/>
                </div>
            </div>
        </fieldset>
        <div class="flex justify-end items-center m-2">
            <x-button type="submit" emerald label="Submit" />
        </div>
    </form>
</div>
