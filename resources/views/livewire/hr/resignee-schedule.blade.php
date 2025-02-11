<?php

use Livewire\Volt\Component;

new class extends Component {

    public $resigneeid;
    public $name;
    
}; ?>

<form action="">
    <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
        <legend class="font-bold text-2xl text-amber-600">Resignee Details</legend>
        <div class= "flex min-w-[800px] max-w-[800px] min-h-[400px] gap-2">
            <div class="flex-1 max-w-[600px] space-y-3 ">
                <h1 class=" text-xl font-bold indent-5">
                    {{ $name }}
                </h1>
                <div>
                    <h1 class=" font-bold text-base indent-8 text-[#34444c]">
                        Resignee Details
                    </h1>
                    <p class=" indent-10">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, vero laborum porro distinctio deleniti incidunt tempora cupiditate saepe ullam accusantium corrupti ab aliquam nesciunt sit voluptatem. Porro repudiandae optio labore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim sapiente quidem veritatis numquam ratione, eveniet impedit necessitatibus nisi provident eos pariatur tempore aliquid deleniti, est amet repudiandae rerum quibusdam fugiat!
                    </p>
                </div>
            </div>
            <div class="flex-1 max-w-[500px] space-y-3">
                <div class=" flex justify-end items-center">
                    <x-button negative label="Request Termination" />
                </div>
                <form action="">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class=" font-semibold text-base">
                                Schedule Exit Interview
                            </p>
                            <input type="date" class=" px-2 py-1 rounded-md shadow-xl border-[2px] border-black/20 ">
                        </div>
                            <button type="submit" class=" bg-emerald-300 m-3 p-2 rounded-xl">Schedule</button>
                    </div>
                </form>
                <form action="">
                    <div>
                        <p class=" font-semibold text-base">
                            Request for documents
                        </p>
                        <x-input label="Name" placeholder="Employee " />
                        <x-input label="Department" placeholder="Department"/>
                        <x-input label="Job Type" placeholder="JobType"/>
                    </div>
                    <div class="flex justify-end items-center mt-2">
                        <x-button amber label="Submit"/>
                    </div>
                </form>
            </div>
        </div>
    </fieldset>
</form>
