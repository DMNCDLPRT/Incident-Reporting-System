<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/49ffc3c21b.js" crossorigin="anonymous"></script>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased bg-white dark:bg-gray-900">
        <header>
            <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <img src="{{ asset('images/cross -logo.png') }}" class="mr-3 h-6 sm:h-9" alt="Logo" />
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Report Incident</span>
                    </a>
                    <div class="flex items-center lg:order-2">
                        @if (Route::has('login'))
                            @auth
                            @role('user')
                            <a href="{{ url('/portal/portal') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Portal</a>
                            @endrole

                            @role('admin|super-admin')
                            <a href="{{ url('/dashboard') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Home</a>
                            @endrole
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
                </div>
            </nav>
        </header>
        
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

        <div class="bg-white relative pt-32 dark:bg-gray-900 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative xl:container m-auto px-6 md:px-12 lg:px-6">
                <h1 class="sm:mx-auto sm:w-10/12 md:w-2/3 font-black text-blue-900 text-4xl text-center sm:text-5xl md:text-6xl lg:w-auto lg:text-left xl:text-6xl dark:text-white">Incident Reporting System<br class="lg:block hidden"> <span class="relative text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500 dark:from-blue-400 dark:to-cyan-300">Don Carlos, Bukidnon</span>.</h1>
                <div class="lg:flex">
                    <div class="relative space-y-8 sm:w-10/12  lg:ml-0 sm:mx-auto text-center lg:text-left lg:mr-auto">
                        <p class="sm:text-lg text-gray-700 dark:text-gray-300 lg:w-11/12">
                            Response to any unexpected or dangerous occurrence. 
                        </p>

                        <span class="block font-semibold text-gray-500 dark:text-gray-400">Aims to save lives and make surroundings safer.</span>

                        {{-- Dashboard/login --}}
                        <div class="grid grid-cols-3 space-x-4 md:space-x-6 md:flex md:justify-center lg:justify-start">
                            @if(Route::has('login'))
                                @auth
                                @role('admin|super-admin')
                                <a aria-label="add to zoom" href="{{ url('/dashboard') }}" class="p-4 border border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-lg duration-300 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-600/20 dark:hover:border-blue-300/30">
                                    <div class="flex justify-center items-center space-x-4">
                                        <i class="fa-sharp fa-solid fa-arrow-right fa-xl text-blue-400"></i>
                                        <span class="font-medium md:block dark:text-white">Home</span>
                                    </div>
                                </a> 
                                @endrole

                                @role('user')
                                <a aria-label="add to zoom" href="{{ url('/portal/portal') }}" class="p-4 border border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-lg duration-300 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-600/20 dark:hover:border-blue-300/30">
                                    <div class="flex justify-center items-center space-x-4">
                                        <i class="fa-sharp fa-solid fa-arrow-right fa-xl text-blue-400"></i>
                                        <span class="font-medium md:block dark:text-white">Portal</span>
                                    </div>
                                </a> 
                                @endrole
                                
                                @else
                                <a aria-label="add to zoom" href="{{ route('register') }}" class="p-4 border border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-lg duration-300 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-600/20 dark:hover:border-blue-300/30">
                                    <div class="flex justify-center items-center space-x-4">
                                        <i class="fa-sharp fa-solid fa-arrow-right fa-xl text-blue-400" alt="slack logo" loading="lazy" width="150" height="150"></i>
                                        <span class="font-medium md:block dark:text-white">Get Started</span>
                                    </div>
                                </a> 
                                    @if (Route::has('register'))
                                    <a aria-label="add to" href="{{ route('login') }}" class="p-4 border border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-lg duration-300 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-600/20 dark:hover:border-blue-300/30">
                                        <div class="flex justify-center items-center space-x-4">
                                            <i class="fa-solid fa-right-to-bracket fa-xl text-blue-400 " alt="slack logo" loading="lazy" width="150" height="150"></i>
                                            <span class="font-medium md:block dark:text-white">Log in</span>
                                        </div>
                                    </a> 
                                    @endif
                                @endauth
                            @endif
                        </div>
                        {{-- End Dashboard/login --}}
                        
                        <span class="block font-semibold text-gray-500 dark:text-gray-400">Our key partners</span>
                        <div class="grid grid-cols-4 space-x-4 md:space-x-6 md:flex md:justify-center lg:justify-start">
                            <a aria-label="add to slack" href="#" class="w-80 p-4 border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-lg duration-300 hover:border-cyan-400 hover:shadow-lg hover:shadow-cyan-600/20 dark:hover:border-cyan-300/30">
                                <div class="flex justify-center items-center space-x-4">
                                    <img class="w-6 h-6" src="{{ asset('images/don carlos logo.png') }}" alt="slack logo" loading="lazy" width="150" height="150">
                                    <span class="hidden font-medium md:block dark:text-white">Don Carlos</span>
                                </div>
                            </a>    
                            <a aria-label="add to chat" href="#" class="w-80 p-4 border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-lg duration-300 hover:border-green-400 hover:shadow-lg hover:shadow-lime-600/20 dark:hover:border-green-300/30">
                                <div class="flex justify-center items-center space-x-4">
                                    <img class="w-6 h-6" src="{{ asset('images/Philippine_National_Police_seal.svg') }}" alt="chat logo" loading="lazy" width="150" height="150">
                                    <span class="hidden font-medium md:block dark:text-white">PNP</span>
                                </div>
                            </a>   
                            <a aria-label="add to zoom" href="#" class="w-80 p-4 border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-lg duration-300 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-600/20 dark:hover:border-blue-300/30">
                                <div class="flex justify-center items-center space-x-4">
                                    <img class="w-6 h-6" src="{{ asset('images/Bureau_of_Fire_Protection.png') }}" alt="chat logo" loading="lazy" width="150" height="150">
                                    <span class="hidden font-medium md:block dark:text-white">BBFP</span>
                                </div>
                            </a>    
                            <a aria-label="add to zoom" href="#" class="w-80 p-4 border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-lg duration-300 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-600/20 dark:hover:border-blue-300/30">
                                <div class="flex justify-center items-center space-x-4">
                                    <img class="w-6 h-6" src="{{ asset('images/NDRRMC_logo.svg') }}" alt="chat logo" loading="lazy" width="150" height="150">
                                    <span class="hidden font-medium md:block dark:text-white">MDRRMC</span>
                                </div>
                            </a>  
                            <a aria-label="add to zoom" href="#" class="w-80 p-4 border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-lg duration-300 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-600/20 dark:hover:border-blue-300/30">
                                <div class="flex justify-center items-center space-x-4">
                                    <img class="w-6 h-6" src="{{ asset('images/quick-reponse-logo.png') }}" alt="chat logo" loading="lazy" width="150" height="150">
                                    <span class="hidden font-medium md:block dark:text-white">Traffic Section</span>
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