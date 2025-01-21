<div class="bg-white  shadow-2xl border-black/20 border-2 flex justify-center items-center p-3 rounded-2xl">
    <div @click.away="schedModal = false" class="items-center">
        {{ $slot }}
    </div>

</div>
