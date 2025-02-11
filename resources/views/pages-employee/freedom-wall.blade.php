<x-layout>
    <div class="mt-2" x-data="{post: false, comment: false}">
        <div class="grid lg:grid-cols-5 gap-2">
            <div class="lg:col-span-3 gap-4 flex flex-col">
            <div class="bg-white h-[100vh] overflow-auto soft-scrollbar rounded-lg">
                    <div class=" lg:col-span-2 pb-3">
                        <div class="flex flex-col justify-center items-center pt-2 px-3 lg:px-auto">
                            <div class="text-2xl font-bold">Freedom Wall</div>
                            <div class="w-full mt-2">
                                <form action="">
                                    <label for="">Post Something</label>
                                    <input readonly @click="post = true" placeholder="Post Something..." class="w-full border-[1px] border-gray-300 rounded-md py-1 px-2" >
                                </form>
                            </div>
                            <livewire:posts.post-list />
                        </div>
                    </div>
                </div>
            </div>
            {{-- MODAL --}}
            {{-- POST --}}
            <div x-show="post" x-cloak class="px-2 md:px-0 transition-all duration-300 flex h-screen w-full bg-black/20 fixed top-0 left-0 z-50  justify-center items-center">
                <div class="bg-white p-4 rounded-md min-w-[380px] space-y-2" @click.away="post = false">
                    <div>
                        <div class="text-2xl">Post Something</div>
                        <p class="text-sm">Post Anonimously</p>
                    </div>
                    <livewire:posts.post />
                </div>
            </div>
            {{-- POST --}}
            {{-- POST/COMMENTS --}}
            
            {{-- POST/COMMENTS --}}
            {{-- MODAL --}}
            <div class="bg-white lg:col-span-2 h-[100%] flex flex-col shadow-md rounded-lg  overflow-y-scroll scrollbar-hidden">
                @if (request()->is('wall'))
                    <livewire:posts.popular-post />
                
                @else
                <livewire:employee.task-stats-right />
                @endif

                <livewire:employee.announcements />
            </div>
        </div>
    </div>
</x-layout>