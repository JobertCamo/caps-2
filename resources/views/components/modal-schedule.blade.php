<div>
    <form action="">
        <fieldset class=" p-4 border-2 w-fit rounded-2xl">
            <legend class=" font-bold text-2xl">Add Applicants</legend>
            <div class="flex ">
                <div class="flex space-x-3">
                    <div>
                        <x-input label="Name" placeholder="Enter Full Name"/>
                    </div>
                    <div>
                        <x-native-select label="Select Department" :options="[
                            ['name' => 'Sales Dept ', 'id' => 1],
                            ['name' => 'Marketing Dept', 'id' => 2],
                            ['name' => 'Production Dept', 'id' => 3],
                            ['name' => 'Business Dept', 'id' => 4],
                            ['name' => 'Operation Dept', 'id' => 5],
                            ['name' => 'Retail/Costumer Service Dept', 'id' => 6],
                        ]" option-label="name" option-value="id"/>
                    </div>
                    <div>

                        <x-time-picker
                            id="interval"
                            wire:model.live="model3"
                            label="Time"
                            placeholder="12:00 AM"
                            without-seconds
                        />
                    </div>
                </div>
            </div>
            <div>
                <div class="flex space-x-3 items-center  justify-center">
                    <div>
                        <x-native-select label="Select Gender" :options="[
                            ['name' => 'Gender', 'id' => 1],
                            ['name' => 'Male', 'id' => 2],
                            ['name' => 'Female', 'id' => 3],
                        ]" option-label="name" option-value="id"/>
                    </div>
                    <div class="w-[30%]">
                        <label for="date" class=" text-sm">Date</label>
                        <input type="date"class="h-[35px] p-1 w-full rounded-md">
                    </div>
                    <div>
                        <x-phone
                        id="multiple-mask"
                        wire:model="phone"
                        label="Contact"
                        placeholder="Phone"
                        :mask="['(###) ###-####', '+# ### ###-####', '+## ## ####-####']"
                    />
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-[80%]">
                    <x-input label="Email" placeholder="Email"/>
                </div>
            </div>
        </fieldset>
        <div class="flex justify-end items-center m-2">
            <x-button emerald label="Submit" />
        </div>
    </form>
</div>
