@props(['on'])
<div x-cloak x-transition
        x-data="{ shown: false, timeout: null }"
        x-init="@this.on('{{$on}}', () => { shown = true; })"
        x-show.transition.out.opacity.duration.1500ms="shown"
        x-transition:leave.opacity.duration.1500ms
        
        class="h-screen w-full flex justify-center items-center fixed top-0 left-0 z-50 bg-black/10">
            {{ $slot }}
</div>