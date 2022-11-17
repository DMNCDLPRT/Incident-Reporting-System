<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/49ffc3c21b.js" crossorigin="anonymous"></script>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased bg-white dark:bg-gray-900">
        <header>
            <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <a href="#" class="flex items-center">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Quick-Portal</span>
                    </a>
                    <div class="flex items-center lg:order-2">
                        @if (Route::has('login'))
                            @auth
                            <a href="{{ url('/dashboard') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Dashboard</a>
                            @else
                            <a href="{{ route('register') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Get started</a>
                                @if (Route::has('register'))
                                <a href="{{ route('login') }}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a>
                                @endif
                            @endauth 
                        @endif
                        <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                            <span class="sr-only">Main Menu</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                        <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-white rounded bg-blue-700 lg:bg-transparent lg:text-blue-700 lg:p-0 dark:text-white" aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About Us</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Learn more</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Features</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Team</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

        <div class="bg-white relative pt-32 dark:bg-gray-900 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative xl:container m-auto px-6 md:px-12 lg:px-6">
                <h1 class="sm:mx-auto sm:w-10/12 md:w-2/3 font-black text-blue-900 text-4xl text-center sm:text-5xl md:text-6xl lg:w-auto lg:text-left xl:text-6xl dark:text-white">Quck Response Portal<br class="lg:block hidden"> <span class="relative text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500 dark:from-blue-400 dark:to-cyan-300">Don Carlos, Bukidnon</span>.</h1>
                <div class="lg:flex">
                    <div class="relative space-y-8 sm:w-10/12 md:w-2/3 lg:ml-0 sm:mx-auto text-center lg:text-left lg:mr-auto lg:w-7/12">
                        <p class="sm:text-lg text-gray-700 dark:text-gray-300 lg:w-11/12">
                            Response to any unexpected or dangerous occurrence. The goal of this emergency response procedure is to mitigate the impact of the event on people and the environment.
                        </p>

                        {{-- Dashboard/login --}}
                        <div class="grid grid-cols-3 space-x-4 md:space-x-6 md:flex md:justify-center lg:justify-start">
                            @if(Route::has('login'))
                                @auth
                                <a aria-label="add to zoom" href="{{ url('/dashboard') }}" class="p-4 border border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-full duration-300 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-600/20 dark:hover:border-blue-300/30">
                                    <div class="flex justify-center space-x-4">
                                        <i class="fa-sharp fa-solid fa-arrow-right fa-xl text-blue-400"></i>
                                        <span class="hidden font-medium md:block dark:text-white">Dashboard</span>
                                    </div>
                                </a> 
                                @else
                                <a aria-label="add to zoom" href="{{ route('register') }}" class="p-4 border border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-full duration-300 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-600/20 dark:hover:border-blue-300/30">
                                    <div class="flex justify-center space-x-4">
                                        <i class="fa-sharp fa-solid fa-arrow-right fa-xl text-blue-400"></i>
                                        <span class="hidden font-medium md:block dark:text-white">Get Started</span>
                                    </div>
                                </a> 
                                    @if (Route::has('register'))
                                    <a aria-label="add to" href="{{ route('login') }}" class="p-4 border border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-full duration-300 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-600/20 dark:hover:border-blue-300/30">
                                        <div class="flex justify-center space-x-4">
                                            <i class="fa-solid fa-right-to-bracket fa-xl text-blue-400"></i>
                                            <span class="hidden font-medium md:block dark:text-white">Log in</span>
                                        </div>
                                    </a> 
                                    @endif
                                @endauth
                            @endif
                        </div>
                        {{-- End Dashboard/login --}}

                        <span class="block font-semibold text-gray-500 dark:text-gray-400">Aims to save lives and make surroundings safer.</span>
                        <div class="grid grid-cols-3 space-x-4 md:space-x-6 md:flex md:justify-center lg:justify-start">
                            <a aria-label="add to slack" href="#" class="p-4 border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-full duration-300 hover:border-cyan-400 hover:shadow-lg hover:shadow-cyan-600/20 dark:hover:border-cyan-300/30">
                                <div class="flex justify-center space-x-4">
                                    <img class="w-6 h-6" src="https://tailus.io/sources/blocks/tech-startup/preview/images/slack.png" alt="slack logo" loading="lazy" width="128" height="128">
                                    <span class="hidden font-medium md:block dark:text-white">Slack</span>
                                </div>
                            </a>    
                            <a aria-label="add to chat" href="#" class="p-4 border border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-full duration-300 hover:border-green-400 hover:shadow-lg hover:shadow-lime-600/20 dark:hover:border-green-300/30">
                                <div class="flex justify-center space-x-4">
                                    <img class="w-6 h-6" src="https://tailus.io/sources/blocks/tech-startup/preview/images/chat.png" alt="chat logo" loading="lazy" width="128" height="128">
                                    <span class="hidden font-medium md:block dark:text-white">Google Chat</span>
                                </div>
                            </a>   
                            <a aria-label="add to zoom" href="#" class="p-4 border border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-full duration-300 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-600/20 dark:hover:border-blue-300/30">
                                <div class="flex justify-center space-x-4">
                                    <img class="w-6 h-6" src="https://tailus.io/sources/blocks/tech-startup/preview/images/zoom.png" alt="chat logo" loading="lazy" width="128" height="128">
                                    <span class="hidden font-medium md:block dark:text-white">Zoom</span>
                                </div>
                            </a>    
                        </div>
    
                        <div class="dark:text-gray-300">
                            <span>Follow us on:</span> 
                            <a href="#" class="font-semibold text-gray-700 dark:text-gray-200">Facebook,</a>
                            <a href="#" class="font-semibold text-gray-700 dark:text-gray-200">Instagram,</a>
                            <a href="#" class="font-semibold text-gray-700 dark:text-gray-200">Twitter,</a>
                            <a href="#" class="font-semibold text-gray-700 dark:text-gray-200">TickTok</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
</html>