<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
        <header>
            <a href="#" class="flex gap-2 items-center">
                {{-- <img class="w-auto h-16 sm:h-16" src="{{ asset('images/companylogo.png') }}" alt=""> --}}
                <span class="text-4xl font-bold font-roboto bg-gradient-to-r from-amber-500 to-amber-700 bg-clip-text text-transparent">HRGWA</span>
            </a>
        </header>
    
        <main class="mt-8">
            <h2 class="text-gray-700 dark:text-gray-200 ">Hi <span class="font-bold">Bordagol,</span></h2>

    
            <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                We are excited to inform you that you have been selected for the <strong>Fullstack Developer</strong> position at <strong>HRGWA!</strong> Congratulations!
                <br>
                <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                    We were very impressed with your skills, experience, and enthusiasm,
                     and we are confident you will be a great addition to our team. 
                     We look forward to working with you and seeing the contributions you'll make. 
                </p>
                <br>
                <p class="leading-loose text-gray-600 dark:text-gray-300">
                    Our HR team will be in touch with you soon to discuss the next steps, including the official offer details, onboarding process, and your start date.
                <br>
                Once again, congratulations, and welcome to the HRGWA family!
                </p>
            </p>
            
            <p class="mt-8 text-gray-600 dark:text-gray-300">
                Best regards, <br>
                The <strong>HRGWA</strong> team
            </p>
            <p>{{ url('/') }}</p>
        </main>
        
    
        <footer class="mt-8">
            <p class="mt-3 text-gray-500 dark:text-gray-400">© <strong>HRGWA</strong>. All Rights Reserved.</p>
        </footer>
    </section>
</body>
</html>