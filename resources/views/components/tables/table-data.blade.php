@props(['applicant'])
<tr class="bg-white transition-all duration-500 hover:bg-gray-50">
    <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 text-start">{{ $applicant->first_name . ' ' . $applicant->last_name }}</td>
    <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{ $applicant->contact }} </td>
    <td class="p-5 whitespace-nowrap  text-sm leading-6 font-medium text-gray-900">{{$applicant->email}}</td>
    <td class="p-5 whitespace-nowrap  text-sm leading-6 font-medium text-gray-900">{{$applicant->job_position}}</td>
    {{-- <td>
        <div class="w-full max-w-xl grid grid-cols-2 space-x-2 ">
            <p class=" text-sm text-gray-700" id="score-display">{{ $applicant->score . '%' }}</p>
            <!-- Progress Bar -->
            <div class="w-full bg-gray-200 rounded-full h-2.5">
            <div id="progress" class=" h-2.5 rounded-full" style="width: {{ trim($applicant->score) }}%; background-color:{{ $applicant->score > 50 ? 'green' : 'red' }};">
            </div>
                
        </div>
            <!-- Score Display -->
    </td> --}}
    <td class=" p-5" x-data="{delModal: false}">
        {{--  --}}
        <div x-data="{dpdown: false}" class="relative">
            <x-icon name="ellipsis-vertical" class="cursor-pointer mx-auto" @click="dpdown = true"/>
            <div x-show="dpdown" x-transition x-cloak class="text-black/70 roboto-slab w-40 select-none z-10 absolute -left-20 bg-white shadow-2xl border-solid border-[1px] border-black/15 px-1 py-1 rounded-md">
                <div @click.away="dpdown = false" class="flex flex-col text-start space-y-2">
                    <a wire:navigate.hover href="/profile/{{ $applicant->id }}" class="cursor-pointer hover:bg-black/5 rounded-sm px-2">View Profile</a>
                    {{-- <a wire:click='updated({{ $applicant->evaluation }})' class="cursor-pointer hover:bg-black/5 rounded-sm px-2">Evaluation</a>{{ $evaluation }} --}}
                    <a wire:navigate.hover @click="delModal = true" class="cursor-pointer hover:bg-black/5 rounded-sm px-2" >Delete</a>
                </div>
            </div>
        </div>
        <div x-show="delModal"  @click.away="delModal = false" x-cloak x-transition class="fixed inset-0 z-10 flex gap-5 items-center justify-center">
            <div class="shadow-lg shadow-indigo-500/40 bg-white p-12 space-x-5 text-center font-bold text-xl space-y-7">
                <div class="text-balance">Are you sure you want to delete <br> <span class="text-red-500">{{ $applicant->first_name .' '.$applicant->last_name }}</span>?</div>
                <div class="space-x-5">
                    <x-button @click="delModal = false" rose wire:click='delete({{ $applicant->id }})'>Delete</x-button>  
                    <x-button @click="delModal = false" positive>Cancel</x-button>
                </div>
            </div>
        </div>
    </td>
</tr>