<x-layout>
    <div class="mt-2 bg-[#F6F1E9]" x-data="{post: false, comment: false}">
        <div class="lg:grid lg:grid-cols-5 lg:grid-rows-1 gap-2 h-screen grid-rows-2">
            <div class="lg:col-span-3 flex flex-col relative">
                <div class="text-2xl font-bold p-2 rounded-t-lg shadow-lg flex items-center border-2 border-[#4f200dc5]"><svg width="" height="40" viewBox="0 0 129 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M65.1933 47.6587L56.8302 24.246C56.0318 21.984 55.4597 20.7332 55.1137 20.4936C54.6214 19.8815 53.7764 19.5755 52.5788 19.5755V18.857H62.9578V19.5755H62.4788C61.4675 19.5755 60.8022 19.8882 60.4828 20.5136C60.3498 20.7664 60.2832 21.0126 60.2832 21.2521C60.2832 21.8243 60.576 22.9487 61.1615 24.6253L66.6903 40.4732L71.3608 27.0005C71.2011 26.4549 71.0348 25.9426 70.8618 25.4636C70.7022 24.9712 70.5425 24.5122 70.3828 24.0864C69.5977 22.0904 68.9058 20.833 68.307 20.314C67.6683 19.8217 66.8832 19.5755 65.9518 19.5755V18.857H76.9096V19.5755H76.1711C74.6675 19.5755 73.9156 20.1942 73.9156 21.4317C73.9156 22.1636 74.2217 23.3878 74.8338 25.1043L80.2828 40.4732L85.6319 24.9047C86.2174 23.268 86.5102 22.137 86.5102 21.5116C86.5102 20.2209 85.4789 19.5755 83.4164 19.5755V18.857H91.8194V19.5755C90.4755 19.5755 89.4442 20.2009 88.7257 21.4517C88.5926 21.7444 88.413 22.1769 88.1868 22.7491C87.9606 23.3213 87.6944 24.0398 87.3884 24.9047L79.5642 47.6587H78.706L72.3189 29.6551L65.9518 47.6587H65.1933Z" fill="#4F200D"/>
                    <path d="M105.196 31.7575C105.406 41.5053 102.202 49.4824 95.5844 55.6888C89.457 61.4471 81.6756 64.4279 72.2403 64.6311C62.4614 64.8418 54.0689 61.9437 47.0629 55.9369C39.8967 49.7461 36.2062 41.6674 35.9915 31.701C35.9047 27.6707 36.5874 23.8113 38.0395 20.1229C38.7802 18.2315 39.3439 16.8285 39.7305 15.9137C40.0853 14.9683 40.2626 14.4956 40.2626 14.4956C40.2209 12.5586 38.6451 11.2328 35.5353 10.5184L35.4989 8.83128L57.9135 6.80123L57.9468 8.34775C45.343 12.3701 39.1592 19.8644 39.3954 30.8306C39.5475 37.8915 42.3077 43.4114 47.6759 47.3905C50.5348 49.5169 54.0072 51.0988 58.093 52.136C62.1475 53.1739 66.8304 53.6357 72.1417 53.5213C81.3895 53.3221 88.5731 50.8856 93.6924 46.2117C98.5658 41.7308 100.921 35.6943 100.757 28.1023C100.659 23.5408 99.6861 19.7328 97.8386 16.6781C95.7664 13.347 92.0027 9.84908 86.5475 6.18446L87.5941 4.70845C99.0738 10.9002 104.941 19.9165 105.196 31.7575Z" fill="#4F200D"/>
                    </svg>
                    </div>
                <div class="flex flex-col justify-center items-center pt-2 px-3 lg:px-auto absolute top-16 right-3">
                    <div  @click="post = true" class="w-full flex items-center justify-center text-[#4F200D] bg-[#FFD93D]/80 duration-300 transition-all backdrop-blur-50 p-1 rounded-lg tooltip">
                            <form action="">
                                <x-icon id="post" name="pencil-square" class="size-9 rounded-lg p-1 shrink-0"  />
                            </form>
                            <span class="tooltip-text mt-1 rounded-md px-1">Post Something</span>
                    </div>
                </div>
                <div class=" h-[100vh] overflow-auto soft-scrollbar  border-2 border-[#4f200dc5]">
                    <div class=" lg:col-span-2 pb-3 ">
                        <div>
                            <livewire:posts.post-list />
                        </div>
                    </div>
                </div>
            </div>
            {{-- MODAL --}}
            {{-- POST --}}
            <div x-show="post" x-cloak class="px-2 md:px-0 transition-all duration-300 flex h-screen w-full bg-black/20 fixed top-0 left-0 z-50  justify-center items-center">
                <div class="bg-[#4F200D] p-4 rounded-md min-w-[380px] space-y-2 text-[#FFD93D]" @click.away="post = false">
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

            <div class=" lg:col-span-2 h-[100%] flex flex-col shadow-md  overflow-y-scroll scrollbar-hidden">
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
