@props(['name'])
<p class="text-sm text-red-500">
    @error($name)
        {{ $message }}
    @enderror
</p>