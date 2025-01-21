<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <wireui:scripts />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @livewireStyles
</head>
<body class="h-screen">
    <div class="h-full flex justify-center items-center">
        <div>
            <div class="text-center text-2xl font-bold">GWAMERCHANDISE</div>
            <form class="mt-6 max-w-[400px] px-5 py-3 space-y-5 border border-black/25 rounded-md">
                <div class="space-y-2">
                    <div class="text-xl">
                        Create an Account
                    </div>
                    <div class="text-[10px]">
                        By creating an account or signing in, you understand and agree to GWA's Terms. You also acknowledge 
                        our Cookie and Privacy policies. You will receive marketing messages from GWA's and may opt 
                        out at any time by following the unsubscribe link in our messages, or as detailed in our terms.
                    </div>
                </div>
                <div>
                    <x-input label="Name"/>
                </div>
                <div>
                    <x-input label="Email"/>
                </div>
                <div>
                    <x-input label="Password"/>
                </div>
                <div>
                    <x-input label="Confirm Password"/>
                </div>
                <div>
                    <x-button rose label="Create Account" class="w-full" />
                </div>
            </form>
        </div>
    </div>
    @livewireScripts
</body>
</html>