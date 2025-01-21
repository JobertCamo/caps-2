@props(['on'])
<div x-cloak x-transition
        x-data="{ shown: false, timeout: null }"
        x-init="@this.on('{{$on}}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); })"
        x-show.transition.out.opacity.duration.1500ms="shown"
        x-transition:leave.opacity.duration.1500ms
        
        class="fixed top-10 right-10 shadow-xl z-20 flex justify-center">
            {{ $slot }}
    </div>