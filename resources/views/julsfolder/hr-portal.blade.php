<x-layout>

    <div class="mx-auto p-2 overflow-hidden bg-grey-300">
        <!-- Responsive container for Task Management and Employee List -->
        <div class="h-[50px] flex items-center text-lg bg-white drop-shadow-lg mx-5 mb-5 rounded-xl px-4 ">
            <a href="" class="font-bold">Offboarding management</a>
            <x-icon name="slash" class="w-5 h-5"/>
            <a href="">Resignee List</a>
        </div>
        <div class="grid grid-cols-12 gap-4 mb-3">
            <div class="col-start-1 col-end-8 bg-white shadow-xl rounded-xl min-h-[100px]">
                <div class="flex justify-between">
                    <h1 class="m-2 text-lg font-medium indent-5">
                        In line Exit Interview
                    </h1>
                    <div class="flex gap-2 p-2">
                        <div class="flex gap-2 items-center">
                            <div class="w-4 h-4 rounded-full bg-[#FF6B6D]">
                            </div>
                            <p class="text-sm font-medium text-black/60">
                                Today
                            </p>
                        </div>
                        <div class="flex gap-2 items-center">
                            <div class="w-4 h-4 rounded-full bg-[#FF9A6B]">
                            </div>
                            <p class="text-sm font-medium text-black/60">
                                Soon
                            </p>
                        </div>
                        <div class="flex gap-2 items-center">
                            <div class="w-4 h-4 rounded-full bg-[#FFFA5F]">
                            </div>
                            <p class="text-sm font-medium text-black/60">
                                Upcoming
                            </p>
                        </div>
                        <div class="flex gap-2 items-center">
                            <div class="w-4 h-4 rounded-full bg-[#74FF5C]">
                            </div>
                            <p class="text-sm font-medium text-black/60">
                                New
                            </p>
                        </div>
                    </div>
                </div>
                <div></div>
                <div class="flex items-center gap-2 justify-center">
                    <div class="min-w-[160px]  flex flex-col items-center justify-center border-[3px] bg-white shadow-md border-[#FF6B6D]  rounded-2xl p-[2px]  text-sm hover:bg-[#FF6B6D] hover:border-[#ff4343]">
                        <p class=" font-semibold text-[#34444c]"> SAMPLE TITLEEEEEE</p>
                        <h2>October 28,2024</h2>
                    </div>
                    <div class="min-w-[160px]  flex flex-col items-center justify-center border-[3px] bg-white shadow-md border-[#FF9A6B] rounded-2xl p-[2px]  text-sm hover:bg-[#FF9A6B] hover:border-[#ff7f44]">
                        <p class=" font-semibold text-[#34444c]"> SAMPLE TITLEEEEEE</p>
                        <h2>October 28,2024</h2>
                    </div>
                    <div class="min-w-[160px]  flex flex-col items-center justify-center border-[3px] bg-white shadow-md border-[#FFFA5F] rounded-2xl p-[2px]  text-sm hover:bg-[#FFFA5F] hover:border-[#fff943]">
                        <p class=" font-semibold text-[#34444c]"> SAMPLE TITLEEEEEE</p>
                        <h2>October 28,2024</h2>
                    </div>
                    <div class="min-w-[160px]  flex flex-col items-center justify-center border-[3px] bg-white shadow-md border-[#74FF5C] rounded-2xl p-[2px]  text-sm hover:bg-[#57ff39e0] hover:border-">
                        <p class=" font-semibold text-[#34444c]"> SAMPLE TITLEEEEEE</p>
                        <h2>October 28,2024</h2>
                    </div>

                </div>
            </div>
            <div class="col-start-8 col-end-11  items-end flex">
                <x-input icon="user" label="Name" placeholder="Search Resignee" />
            </div>
            <div  x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                <x-button x-on:click="open = ! open" amber label="Add Resignee"></x-button>
                    <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                        <div @click.away="open = false" class="modal-add2 mt-20 flex justify-center items-center p-3 rounded-2xl">
                            <div>
                                <form action="">
                                    <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                        <legend class="font-bold text-2xl text-amber-600">Add Resignee</legend>
                                        <div class=" flex items-center justify-center">
                                            <div class=" rounded-lg shadow-lg">
                                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                        <div>
                                                            <label class="block text-gray-700 text-sm font-medium mb-1">Firstname</label>
                                                            <x-input type="text" class="" />
                                                        </div>
                                                        <div>
                                                            <label class="block text-gray-700 text-sm font-medium mb-1">Lastname<label>
                                                            <x-input type="text" class="" />
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                        <div>
                                                            <label class="block text-gray-700 text-sm font-medium mb-1">Contact</label>
                                                            <x-input type="text" class="" />
                                                        </div>
                                                        <div>
                                                            <label class="block text-gray-700 text-sm font-medium mb-1">Job Type</label>
                                                            <x-input type="text" class="" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700 text-sm font-medium mb-1">Email</label>
                                                        <x-input type="text" class="" />
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700 text-sm font-medium mb-1">Resignation Details</label>
                                                        <x-textarea type="text"  />
                                                    </div>
                                                    <div>
                                                        <label class="block text-white text-sm font-medium mb-1">Resignation letter</label>
                                                        <x-input type="file" class="" />
                                                    </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="flex justify-end items-center m-2">
                                        <x-button emerald label="Submit" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="gap-4 grid sm:grid-cols-12 lg:grid-cols-3 sm:grid-rows-auto h-screen overflow-y-auto hide-scrollbar">
            <div class="sm:col-span-4 min-h-64 max-h-64 bg-white shadow-lg rounded-2xl p-3"> <!--START NG CARD-->
                <div class="flex justify-between  items-center mb-2">
                    <h1 class=" font-bold text-xl indent-3 text-[#252729]">
                        SAMPLE TITLEEEEEE
                    </h1>
                    <div x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                        <button x-on:click="open = ! open" class="bg-gray-400/50 hover:bg-gray-400 p-1 px-2 rounded-full text-xs font-medium">More Details</button>
                            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                <div @click.away="open = false" class="bg-white mt-20 flex justify-center items-center p-3 rounded-2xl">
                                    <div>
                                        <form action="">
                                            <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                                <legend class="font-bold text-2xl text-amber-600">Resignee Details</legend>
                                                <div class= "flex min-w-[800px] max-w-[800px] min-h-[400px] gap-2">
                                                    <div class="flex-1 max-w-[600px] space-y-3 ">
                                                        <h1 class=" text-xl font-bold indent-5">
                                                            SAMPLE TITLEEEEEE
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
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div>
                    <h1 class=" font-medium text-base indent-8 text-[#34444c]">
                        Resignation Details
                    </h1>
                </div>
                <div class=" min-h-36 max-h-36 overflow-hidden p-2 indent-10">
                    <p class=" truncate-lines text-sm text-[#636e74]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime atque repellat accusantium, necessitatibus repudiandae hic vitae itaque enim voluptatibus cum laboriosam animi vero sit, obcaecati, facilis aut dolorum perferendis quos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, facere ipsa exercitationem sit deleniti vel obcaecati repellat ea autem blanditiis minima laudantium itaque cupiditate natus dicta illum quod repellendus ut!</p>
                </div>
                <div class="flex justify-between items-center mx-2">
                    <p class="font-bold text-red-600">
                        28 OCTOBER 2024
                    </p>
                    <x-badge flat postive label="Processing" />
                </div>
            </div>
            <div class="sm:col-span-4 min-h-64 max-h-64 bg-white shadow-lg rounded-2xl p-3"> <!--START NG CARD-->
                <div class="flex justify-between  items-center mb-2">
                    <h1 class=" font-bold text-xl indent-3 text-[#252729]">
                        SAMPLE TITLEEEEEE
                    </h1>
                    <div x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                        <button x-on:click="open = ! open" class="bg-gray-400/50 hover:bg-gray-400 p-1 px-2 rounded-full text-xs font-medium">More Details</button>
                            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                <div @click.away="open = false" class="bg-white mt-20 flex justify-center items-center p-3 rounded-2xl">
                                    <div>
                                        <form action="">
                                            <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                                <legend class="font-bold text-2xl text-amber-600">Resignee Details</legend>
                                                <div class= "flex min-w-[800px] max-w-[800px] min-h-[400px] gap-2">
                                                    <div class="flex-1 max-w-[600px] space-y-3 ">
                                                        <h1 class=" text-xl font-bold indent-5">
                                                            SAMPLE TITLEEEEEE
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
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div>
                    <h1 class=" font-medium text-base indent-8 text-[#34444c]">
                        Resignation Details
                    </h1>
                </div>
                <div class=" min-h-36 max-h-36 overflow-hidden p-2 indent-10">
                    <p class=" truncate-lines text-sm text-[#636e74]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime atque repellat accusantium, necessitatibus repudiandae hic vitae itaque enim voluptatibus cum laboriosam animi vero sit, obcaecati, facilis aut dolorum perferendis quos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, facere ipsa exercitationem sit deleniti vel obcaecati repellat ea autem blanditiis minima laudantium itaque cupiditate natus dicta illum quod repellendus ut!</p>
                </div>
                <div class="flex justify-between items-center mx-2">
                    <p class="font-bold text-red-600">
                        28 OCTOBER 2024
                    </p>
                    <x-badge flat postive label="Processing" />
                </div>
            </div>
            <div class="sm:col-span-4 min-h-64 max-h-64 bg-white shadow-lg rounded-2xl p-3"> <!--START NG CARD-->
                <div class="flex justify-between  items-center mb-2">
                    <h1 class=" font-bold text-xl indent-3 text-[#252729]">
                        SAMPLE TITLEEEEEE
                    </h1>
                    <div x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                        <button x-on:click="open = ! open" class="bg-gray-400/50 hover:bg-gray-400 p-1 px-2 rounded-full text-xs font-medium">More Details</button>
                            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                <div @click.away="open = false" class="bg-white mt-20 flex justify-center items-center p-3 rounded-2xl">
                                    <div>
                                        <form action="">
                                            <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                                <legend class="font-bold text-2xl text-amber-600">Resignee Details</legend>
                                                <div class= "flex min-w-[800px] max-w-[800px] min-h-[400px] gap-2">
                                                    <div class="flex-1 max-w-[600px] space-y-3 ">
                                                        <h1 class=" text-xl font-bold indent-5">
                                                            SAMPLE TITLEEEEEE
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
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div>
                    <h1 class=" font-medium text-base indent-8 text-[#34444c]">
                        Resignation Details
                    </h1>
                </div>
                <div class=" min-h-36 max-h-36 overflow-hidden p-2 indent-10">
                    <p class=" truncate-lines text-sm text-[#636e74]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime atque repellat accusantium, necessitatibus repudiandae hic vitae itaque enim voluptatibus cum laboriosam animi vero sit, obcaecati, facilis aut dolorum perferendis quos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, facere ipsa exercitationem sit deleniti vel obcaecati repellat ea autem blanditiis minima laudantium itaque cupiditate natus dicta illum quod repellendus ut!</p>
                </div>
                <div class="flex justify-between items-center mx-2">
                    <p class="font-bold text-red-600">
                        28 OCTOBER 2024
                    </p>
                    <x-badge flat postive label="Processing" />
                </div>
            </div>
            <div class="sm:col-span-4 min-h-64 max-h-64 bg-white shadow-lg rounded-2xl p-3"> <!--START NG CARD-->
                <div class="flex justify-between  items-center mb-2">
                    <h1 class=" font-bold text-xl indent-3 text-[#252729]">
                        SAMPLE TITLEEEEEE
                    </h1>
                    <div x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                        <button x-on:click="open = ! open" class="bg-gray-400/50 hover:bg-gray-400 p-1 px-2 rounded-full text-xs font-medium">More Details</button>
                            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                <div @click.away="open = false" class="bg-white mt-20 flex justify-center items-center p-3 rounded-2xl">
                                    <div>
                                        <form action="">
                                            <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                                <legend class="font-bold text-2xl text-amber-600">Resignee Details</legend>
                                                <div class= "flex min-w-[800px] max-w-[800px] min-h-[400px] gap-2">
                                                    <div class="flex-1 max-w-[600px] space-y-3 ">
                                                        <h1 class=" text-xl font-bold indent-5">
                                                            SAMPLE TITLEEEEEE
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
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div>
                    <h1 class=" font-medium text-base indent-8 text-[#34444c]">
                        Resignation Details
                    </h1>
                </div>
                <div class=" min-h-36 max-h-36 overflow-hidden p-2 indent-10">
                    <p class=" truncate-lines text-sm text-[#636e74]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime atque repellat accusantium, necessitatibus repudiandae hic vitae itaque enim voluptatibus cum laboriosam animi vero sit, obcaecati, facilis aut dolorum perferendis quos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, facere ipsa exercitationem sit deleniti vel obcaecati repellat ea autem blanditiis minima laudantium itaque cupiditate natus dicta illum quod repellendus ut!</p>
                </div>
                <div class="flex justify-between items-center mx-2">
                    <p class="font-bold text-red-600">
                        28 OCTOBER 2024
                    </p>
                    <x-badge flat postive label="Processing" />
                </div>
            </div>
            <div class="sm:col-span-4 min-h-64 max-h-64 bg-white shadow-lg rounded-2xl p-3"> <!--START NG CARD-->
                <div class="flex justify-between  items-center mb-2">
                    <h1 class=" font-bold text-xl indent-3 text-[#252729]">
                        SAMPLE TITLEEEEEE
                    </h1>
                    <div x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                        <button x-on:click="open = ! open" class="bg-gray-400/50 hover:bg-gray-400 p-1 px-2 rounded-full text-xs font-medium">More Details</button>
                            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                <div @click.away="open = false" class="bg-white mt-20 flex justify-center items-center p-3 rounded-2xl">
                                    <div>
                                        <form action="">
                                            <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                                <legend class="font-bold text-2xl text-amber-600">Resignee Details</legend>
                                                <div class= "flex min-w-[800px] max-w-[800px] min-h-[400px] gap-2">
                                                    <div class="flex-1 max-w-[600px] space-y-3 ">
                                                        <h1 class=" text-xl font-bold indent-5">
                                                            SAMPLE TITLEEEEEE
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
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div>
                    <h1 class=" font-medium text-base indent-8 text-[#34444c]">
                        Resignation Details
                    </h1>
                </div>
                <div class=" min-h-36 max-h-36 overflow-hidden p-2 indent-10">
                    <p class=" truncate-lines text-sm text-[#636e74]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime atque repellat accusantium, necessitatibus repudiandae hic vitae itaque enim voluptatibus cum laboriosam animi vero sit, obcaecati, facilis aut dolorum perferendis quos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, facere ipsa exercitationem sit deleniti vel obcaecati repellat ea autem blanditiis minima laudantium itaque cupiditate natus dicta illum quod repellendus ut!</p>
                </div>
                <div class="flex justify-between items-center mx-2">
                    <p class="font-bold text-red-600">
                        28 OCTOBER 2024
                    </p>
                    <x-badge flat postive label="Processing" />
                </div>
            </div>
            <div class="sm:col-span-4 min-h-64 max-h-64 bg-white shadow-lg rounded-2xl p-3"> <!--START NG CARD-->
                <div class="flex justify-between  items-center mb-2">
                    <h1 class=" font-bold text-xl indent-3 text-[#252729]">
                        SAMPLE TITLEEEEEE
                    </h1>
                    <div x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                        <button x-on:click="open = ! open" class="bg-gray-400/50 hover:bg-gray-400 p-1 px-2 rounded-full text-xs font-medium">More Details</button>
                            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                <div @click.away="open = false" class="bg-white mt-20 flex justify-center items-center p-3 rounded-2xl">
                                    <div>
                                        <form action="">
                                            <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                                <legend class="font-bold text-2xl text-amber-600">Resignee Details</legend>
                                                <div class= "flex min-w-[800px] max-w-[800px] min-h-[400px] gap-2">
                                                    <div class="flex-1 max-w-[600px] space-y-3 ">
                                                        <h1 class=" text-xl font-bold indent-5">
                                                            SAMPLE TITLEEEEEE
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
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div>
                    <h1 class=" font-medium text-base indent-8 text-[#34444c]">
                        Resignation Details
                    </h1>
                </div>
                <div class=" min-h-36 max-h-36 overflow-hidden p-2 indent-10">
                    <p class=" truncate-lines text-sm text-[#636e74]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime atque repellat accusantium, necessitatibus repudiandae hic vitae itaque enim voluptatibus cum laboriosam animi vero sit, obcaecati, facilis aut dolorum perferendis quos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, facere ipsa exercitationem sit deleniti vel obcaecati repellat ea autem blanditiis minima laudantium itaque cupiditate natus dicta illum quod repellendus ut!</p>
                </div>
                <div class="flex justify-between items-center mx-2">
                    <p class="font-bold text-red-600">
                        28 OCTOBER 2024
                    </p>
                    <x-badge flat postive label="Processing" />
                </div>
            </div>
            <div class="sm:col-span-4 min-h-64 max-h-64 bg-white shadow-lg rounded-2xl p-3"> <!--START NG CARD-->
                <div class="flex justify-between  items-center mb-2">
                    <h1 class=" font-bold text-xl indent-3 text-[#252729]">
                        SAMPLE TITLEEEEEE
                    </h1>
                    <div x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                        <button x-on:click="open = ! open" class="bg-gray-400/50 hover:bg-gray-400 p-1 px-2 rounded-full text-xs font-medium">More Details</button>
                            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                <div @click.away="open = false" class="bg-white mt-20 flex justify-center items-center p-3 rounded-2xl">
                                    <div>
                                        <form action="">
                                            <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                                <legend class="font-bold text-2xl text-amber-600">Resignee Details</legend>
                                                <div class= "flex min-w-[800px] max-w-[800px] min-h-[400px] gap-2">
                                                    <div class="flex-1 max-w-[600px] space-y-3 ">
                                                        <h1 class=" text-xl font-bold indent-5">
                                                            SAMPLE TITLEEEEEE
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
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div>
                    <h1 class=" font-medium text-base indent-8 text-[#34444c]">
                        Resignation Details
                    </h1>
                </div>
                <div class=" min-h-36 max-h-36 overflow-hidden p-2 indent-10">
                    <p class=" truncate-lines text-sm text-[#636e74]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime atque repellat accusantium, necessitatibus repudiandae hic vitae itaque enim voluptatibus cum laboriosam animi vero sit, obcaecati, facilis aut dolorum perferendis quos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, facere ipsa exercitationem sit deleniti vel obcaecati repellat ea autem blanditiis minima laudantium itaque cupiditate natus dicta illum quod repellendus ut!</p>
                </div>
                <div class="flex justify-between items-center mx-2">
                    <p class="font-bold text-red-600">
                        28 OCTOBER 2024
                    </p>
                    <x-badge flat postive label="Processing" />
                </div>
            </div>
            <div class="sm:col-span-4 min-h-64 max-h-64 bg-white shadow-lg rounded-2xl p-3"> <!--START NG CARD-->
                <div class="flex justify-between  items-center mb-2">
                    <h1 class=" font-bold text-xl indent-3 text-[#252729]">
                        SAMPLE TITLEEEEEE
                    </h1>
                    <div x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                        <button x-on:click="open = ! open" class="bg-gray-400/50 hover:bg-gray-400 p-1 px-2 rounded-full text-xs font-medium">More Details</button>
                            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                <div @click.away="open = false" class="bg-white mt-20 flex justify-center items-center p-3 rounded-2xl">
                                    <div>
                                        <form action="">
                                            <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                                <legend class="font-bold text-2xl text-amber-600">Resignee Details</legend>
                                                <div class= "flex min-w-[800px] max-w-[800px] min-h-[400px] gap-2">
                                                    <div class="flex-1 max-w-[600px] space-y-3 ">
                                                        <h1 class=" text-xl font-bold indent-5">
                                                            SAMPLE TITLEEEEEE
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
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div>
                    <h1 class=" font-medium text-base indent-8 text-[#34444c]">
                        Resignation Details
                    </h1>
                </div>
                <div class=" min-h-36 max-h-36 overflow-hidden p-2 indent-10">
                    <p class=" truncate-lines text-sm text-[#636e74]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime atque repellat accusantium, necessitatibus repudiandae hic vitae itaque enim voluptatibus cum laboriosam animi vero sit, obcaecati, facilis aut dolorum perferendis quos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, facere ipsa exercitationem sit deleniti vel obcaecati repellat ea autem blanditiis minima laudantium itaque cupiditate natus dicta illum quod repellendus ut!</p>
                </div>
                <div class="flex justify-between items-center mx-2">
                    <p class="font-bold text-red-600">
                        28 OCTOBER 2024
                    </p>
                    <x-badge flat postive label="Processing" />
                </div>
            </div>
            <div class="sm:col-span-4 min-h-64 max-h-64 bg-white shadow-lg rounded-2xl p-3"> <!--START NG CARD-->
                <div class="flex justify-between  items-center mb-2">
                    <h1 class=" font-bold text-xl indent-3 text-[#252729]">
                        SAMPLE TITLEEEEEE
                    </h1>
                    <div x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                        <button x-on:click="open = ! open" class="bg-gray-400/50 hover:bg-gray-400 p-1 px-2 rounded-full text-xs font-medium">More Details</button>
                            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                <div @click.away="open = false" class="bg-white mt-20 flex justify-center items-center p-3 rounded-2xl">
                                    <div>
                                        <form action="">
                                            <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                                <legend class="font-bold text-2xl text-amber-600">Resignee Details</legend>
                                                <div class= "flex min-w-[800px] max-w-[800px] min-h-[400px] gap-2">
                                                    <div class="flex-1 max-w-[600px] space-y-3 ">
                                                        <h1 class=" text-xl font-bold indent-5">
                                                            SAMPLE TITLEEEEEE
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
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div>
                    <h1 class=" font-medium text-base indent-8 text-[#34444c]">
                        Resignation Details
                    </h1>
                </div>
                <div class=" min-h-36 max-h-36 overflow-hidden p-2 indent-10">
                    <p class=" truncate-lines text-sm text-[#636e74]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime atque repellat accusantium, necessitatibus repudiandae hic vitae itaque enim voluptatibus cum laboriosam animi vero sit, obcaecati, facilis aut dolorum perferendis quos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, facere ipsa exercitationem sit deleniti vel obcaecati repellat ea autem blanditiis minima laudantium itaque cupiditate natus dicta illum quod repellendus ut!</p>
                </div>
                <div class="flex justify-between items-center mx-2">
                    <p class="font-bold text-red-600">
                        28 OCTOBER 2024
                    </p>
                    <x-badge flat postive label="Processing" />
                </div>
            </div>
            <div class="sm:col-span-4 min-h-64 max-h-64 bg-white shadow-lg rounded-2xl p-3"> <!--START NG CARD-->
                <div class="flex justify-between  items-center mb-2">
                    <h1 class=" font-bold text-xl indent-3 text-[#252729]">
                        SAMPLE TITLEEEEEE
                    </h1>
                    <div x-data="{ open: false }"  class="col-start-11 col-span-2 items-end flex justify-center">
                        <button x-on:click="open = ! open" class="bg-gray-400/50 hover:bg-gray-400 p-1 px-2 rounded-full text-xs font-medium">More Details</button>
                            <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                                <div @click.away="open = false" class="bg-white mt-20 flex justify-center items-center p-3 rounded-2xl">
                                    <div>
                                        <form action="">
                                            <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                                <legend class="font-bold text-2xl text-amber-600">Resignee Details</legend>
                                                <div class= "flex min-w-[800px] max-w-[800px] min-h-[400px] gap-2">
                                                    <div class="flex-1 max-w-[600px] space-y-3 ">
                                                        <h1 class=" text-xl font-bold indent-5">
                                                            SAMPLE TITLEEEEEE
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
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div>
                    <h1 class=" font-medium text-base indent-8 text-[#34444c]">
                        Resignation Details
                    </h1>
                </div>
                <div class=" min-h-36 max-h-36 overflow-hidden p-2 indent-10">
                    <p class=" truncate-lines text-sm text-[#636e74]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime atque repellat accusantium, necessitatibus repudiandae hic vitae itaque enim voluptatibus cum laboriosam animi vero sit, obcaecati, facilis aut dolorum perferendis quos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, facere ipsa exercitationem sit deleniti vel obcaecati repellat ea autem blanditiis minima laudantium itaque cupiditate natus dicta illum quod repellendus ut!</p>
                </div>
                <div class="flex justify-between items-center mx-2">
                    <p class="font-bold text-red-600">
                        28 OCTOBER 2024
                    </p>
                    <x-badge flat postive label="Processing" />
                </div>
            </div>
        </div>
    </div>
</x-layout>