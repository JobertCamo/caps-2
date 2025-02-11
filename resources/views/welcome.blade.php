<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <wireui:scripts />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @livewireStyles
</head>
<body>
    
    @livewireScripts
</body>
</html>
<?php

Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('hr');
    $table->string('email')->unique();
    $table->timestamps();
});

Schema::create('tasks', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('details');
    $table->string('status')->unique();
    $table->timestamps();
});

Schema::create('employee_tasks', function (Blueprint $table) {
    $table->id();
    $table->foreignIDfor('employee');
    $table->string('title');
    $table->string('details');
    $table->string('status')->unique();
    $table->timestamps();
});



Schema::create('employee', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('department');
    $table->string('status')->unique();
    $table->timestamps();
});