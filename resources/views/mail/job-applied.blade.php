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
                {{-- <img class="w-auto h-16 sm:h-16" src="{{ asset('images/companylogo.png') }}" alt=""> --}}
                <span style="
                font-size: 2.25rem; /* text-4xl */
                line-height: 2.5rem; /* text-4xl */
                font-weight: 700; /* font-bold */
                font-family: 'Roboto', sans-serif; /* font-roboto */
                background-image: linear-gradient(to right, #f59e0b, #b45309); /* bg-gradient-to-r from-amber-500 to-amber-700 */
                -webkit-background-clip: text; /* bg-clip-text */
                background-clip: text; /* bg-clip-text */
                color: transparent; /* text-transparent */
            " class=" text-4xl font-bold font-roboto bg-gradient-to-r from-amber-500 to-amber-700 bg-clip-text text-transparent">HRGWA</span>
            </a>
        </header>
    
        <main class="mt-8">
            <h2 class="text-gray-700 dark:text-gray-200 ">Hi <strong>{{ $applicant->first_name . ' ' . $applicant->last_name }},</strong></h2>
    
            <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                We have received your job application for the <strong>{{ $applicant->job_position }}</strong> position. <br> Please wait as we review your resume.
            </p>
            
            <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                Thank you for your interest in joining our team!
            </p>

            <p class="mt-5 text-gray-600 dark:text-gray-300">
                Thanks, <br>
                The <span class="font-bold">HRGWA</span> team
            </p>
        </main>
        
    
        <footer class="mt-8">
            <p class="mt-3 text-gray-500 dark:text-gray-400">© <strong>HRGWA</strong>. All Rights Reserved.</p>
        </footer>
    </section>
</body>
</html>