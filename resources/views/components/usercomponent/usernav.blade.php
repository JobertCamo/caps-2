<nav class="flex items-cente justify-between  h-16 px-4 cursor-pointer drop-shadow-xl bg-white">
    <div class="flex items-center text-black justify-center space-x-2 rightnav">
        <a wire:navigate href="{{ url('/jobpost') }}"><x-icon name="chevron-double-left" class="size-6"/></a>
        <a href="/jobpost" wire:navigate.hover class=" text-[15px]">Back</a>
    </div>
    <div class="flex items-center  text-black space-x-2 leftnav">
        <h1 class="text-xl font-bold">Job Search</h1>
    </div>
</nav>
