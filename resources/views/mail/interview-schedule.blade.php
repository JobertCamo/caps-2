<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
        <header>
            <a href="#" class="flex gap-2 items-center">
                <img class="w-auto h-16 sm:h-16" src="{{ asset('images/companylogo.png') }}" alt="">
                <span style="
                font-size: 2.25rem; /* text-4xl */
                line-height: 2.5rem; /* text-4xl */
                font-weight: 700; /* font-bold */
                font-family: 'Roboto', sans-serif; /* font-roboto */
                background-image: linear-gradient(to right, #f59e0b, #b45309); /* bg-gradient-to-r from-amber-500 to-amber-700 */
                -webkit-background-clip: text; /* bg-clip-text */
                background-clip: text; /* bg-clip-text */
                color: transparent; /* text-transparent */
            " class="text-4xl font-bold font-roboto bg-gradient-to-r from-amber-500 to-amber-700 bg-clip-text text-transparent">HRGWA</span>
            </a>
        </header>
    
        <main class="mt-8">
            <h2 class="text-gray-700 dark:text-gray-200 ">Hi <span style="font-weight: 700;" class="font-bold">{{ $jo->first_name }},</span></h2>

    
            <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                We are pleased to inform you that your interview for the <span style="font-weight: 700;" class="font-bold">{{ $jo->job_position }}</span> position has been scheduled. Please find the details below:
                <br>
                <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                    <span style="font-weight: 700;" class="font-bold">Interview Date:</span> {{ $date }} <br>
                    {{-- <span class="font-bold">Time:</span> 99:99 <br> --}}
                    <span style="font-weight: 700;" class="font-bold">Location:</span> {{ $location }} <br>
                    <span style="font-weight: 700;" class="font-bold">Interviewer:</span> {{ $interviewer }} 
                </p>
                <br>
                <p class="leading-loose text-gray-600 dark:text-gray-300">
                    Please make sure to be on time and come prepared. If you have any questions or need to reschedule, feel free to reach out to us.
                <br>
                    We look forward to meeting you!
                </p>
            </p>
            
            <p class="mt-8 text-gray-600 dark:text-gray-300">
                Best regards, <br>
                The <span class="font-bold" style="font-weight: 700;">HRGWA</span> team
            </p>
        </main>
        
    
        <footer class="mt-8">
            <p class="mt-3 text-gray-500 dark:text-gray-400">© <span style="font-weight: 700;" class="font-bold">HRGWA</span>. All Rights Reserved.</p>
        </footer>
    </section>
</body>
</html>