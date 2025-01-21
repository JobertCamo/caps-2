<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <wireui:scripts />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @livewireStyles
</head>
<body class="h-screen flex justify-center bg-black/15">
    <div class="mx-auto my-auto bg-white w-[95%] h-[95%] flex gap-14 items-center overflow-hidden rounded-xl relative shadow-2xl" style="">
        <div class="lg:block hidden h-[500px]">
            <img src="{{ asset('images/waves2.png') }}" alt="">
            
        </div>
        <div class="absolute -left-48 ml-4 lg:block hidden">
            <img src="{{ asset('images/applic.gif') }}" alt="">
        </div>
        <div class="space-y-5 text-center mx-auto  lg:w-[17%]">
            <div class="text-2xl font-bold">LOGIN</div>
            <livewire:guest.login />
        </div>
    </div>  
    @livewireScripts
</body>
</html>