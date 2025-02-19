<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <wireui:scripts />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @livewireStyles
    <title>Document</title>
</head>
<body class="h-screen flex justify-center items-center">
    <div class="">
        <livewire:token />
    </div>
    @livewireScripts
</body>
</html>