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
                            @role('User')
                            <a href="{{ url('/portal/portal') }}" class="text-white bg-emerald-500 hover:bg-emerald-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Report Incident
                            </a>
                            @endrole

                            @role('Admin|Department')
                            <a href="{{ url('/dashboard') }}" class="text-white bg-emerald-500 hover:bg-emerald-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Home
                            </a>
                            @endrole
                            @else
                            <a href="{{ route('register') }}" class="text-white bg-emerald-500 hover:bg-emerald-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Sign-up
                            </a>
                                @if (Route::has('register'))
                                <a href="{{ route('login') }}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                                    Sign-in
                                </a>
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

        <div class="bg-white relative dark:bg-gray-900 mx-auto sm:px-6 lg:px-8">
            <div class="relative xl:container m-auto px-6 md:px-12 lg:px-6">
                <section class="py-8 px-4 md:px-8 lg:py-16 2xl:px-60 mx-auto grid grid-cols-1 gap-8 lg:grid-cols-12 relative">
                    <div class="col-span-6 xl:place-self-center mb-8 mt-8 xl:mt-0 lg:mb-0">
                        <h1 class="sm:mx-auto sm:w-10/12 md:w-2/3 font-black text-blue-900 text-4xl text-center sm:text-5xl md:text-6xl lg:w-auto lg:text-left xl:text-6xl dark:text-white">Incident Reporting System<br class="lg:block hidden"> <span class="relative text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500 dark:from-blue-400 dark:to-cyan-300">Don Carlos, Bukidnon</span></h1>
                        <p class="my-8 max-w-lg mx-auto lg:mx-0 text-center lg:text-left text-white">
                            Welcome to the Incident Reporting System for Don Carlos, Bukidnon. This website is designed to provide residents and visitors of the municipality with an easy and efficient way to report incidents, such as accidents, crimes, and other emergencies, to the local authorities. By using this website, you can quickly and easily notify the appropriate parties of any incidents that occur in the area, helping to keep the community safe and secure. If you have any questions about how to use the website or need assistance with reporting an incident, please don't hesitate to contact the local authorities at the Municipal Hall of Don Carlos, Bukidnon.
                        </p>
                        <div class="flex flex-col lg:flex-row items-center">
                            @if(Route::has('login'))
                                @auth
                                    @role('Admin|Department')
                                        <a href="{{ url('/dashboard') }}" type="button" class="text-white w-full lg:w-max px-4 py-3 bg-emerald-500 hover:bg-emerald-600 hover:cursor-pointer font-medium rounded lg:mr-8 mb-4 lg:mb-0">
                                            Home
                                        </a>
                                    @endrole

                                    @role('User')
                                        <a href="{{ url('/portal/portal') }}" type="button" class="text-white w-full lg:w-max px-4 py-3 bg-emerald-500 hover:bg-emerald-600 hover:cursor-pointer font-medium rounded lg:mr-8 mb-4 lg:mb-0">
                                            Report Incident
                                        </a>
                                    @endrole 

                            @else
                                <a href="{{ route('register') }}" type="button" class="text-white w-full lg:w-max px-4 py-3 bg-emerald-500 hover:bg-emerald-600 hover:cursor-pointer font-medium rounded lg:mr-8 mb-4 lg:mb-0">
                                    Sign-up
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('login') }}" type="button" class="text-white w-full lg:w-max px-4 py-3 border border-slate-200 hover:cursor-pointer font-medium rounded inline-flex items-center justify-center">
                                        Sign-in
                                    </a>
                                @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                    <div class="col-span-6 relative">
                        <img src="{{ asset('images/don carlos logo.png') }}" alt="">
                    </div>
                </section>
                    <footer class="relative xl:container m-auto px-6 md:px-12 lg:px-6 pt-10">
                            <div class="col-span-6 xl:place-self-center mb-8 mt-8 xl:mt-0 lg:mb-0"> 
                                <span class="md:block font-semibold text-gray-500 dark:text-gray-400 py-10">Our key partners</span>
                                <div class="space-x-4 md:space-x-6 md:flex md:justify-center lg:justify-start">
                                    <span aria-label="add to slack" href="#" class="w-80 p-4 border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-lg duration-300 hover:border-cyan-400 hover:shadow-lg hover:shadow-cyan-600/20 dark:hover:border-cyan-300/30">
                                        <div class="flex justify-center items-center space-x-4">
                                            <img class="w-6 h-6" src="{{ asset('images/don carlos logo.png') }}" alt="slack logo" loading="lazy" width="150" height="150">
                                            <span class="hidden font-medium md:block dark:text-white">Don Carlos</span>
                                        </div>
                                    </span>    
                                    <span aria-label="add to chat" href="#" class="w-80 p-4 border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-lg duration-300 hover:border-green-400 hover:shadow-lg hover:shadow-lime-600/20 dark:hover:border-green-300/30">
                                        <div class="flex justify-center items-center space-x-4">
                                            <img class="w-6 h-6" src="{{ asset('images/Philippine_National_Police_seal.svg') }}" alt="chat logo" loading="lazy" width="150" height="150">
                                            <span class="hidden font-medium md:block dark:text-white">PNP</span>
                                        </div>
                                    </span>   
                                    <span aria-label="add to zoom" href="#" class="w-80 p-4 border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-lg duration-300 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-600/20 dark:hover:border-blue-300/30">
                                        <div class="flex justify-center items-center space-x-4">
                                            <img class="w-6 h-6" src="{{ asset('images/Bureau_of_Fire_Protection.png') }}" alt="chat logo" loading="lazy" width="150" height="150">
                                            <span class="hidden font-medium md:block dark:text-white">BBFP</span>
                                        </div>
                                    </span>    
                                    <span aria-label="add to zoom" href="#" class="w-80 p-4 border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-lg duration-300 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-600/20 dark:hover:border-blue-300/30">
                                        <div class="flex justify-center items-center space-x-4">
                                            <img class="w-6 h-6" src="{{ asset('images/NDRRMC_logo.svg') }}" alt="chat logo" loading="lazy" width="150" height="150">
                                            <span class="hidden font-medium md:block dark:text-white">MDRRMC</span>
                                        </div>
                                    </span>  
                                    <span aria-label="add to zoom" href="#" class="w-80 p-4 border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-lg duration-300 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-600/20 dark:hover:border-blue-300/30">
                                        <div class="flex justify-center items-center space-x-4">
                                            <img class="w-6 h-6" src="{{ asset('images/quick-reponse-logo.png') }}" alt="chat logo" loading="lazy" width="150" height="150">
                                            <span class="hidden font-medium md:block dark:text-white">2nd PMFC PNP</span>
                                        </div>
                                    </span>  
                                </div>
            
                                <div class="dark:text-gray-300 py-10">
                                    <span>Follow us on:</span> 
                                    <a href="https://www.facebook.com/LGUDonCarlos" class="font-semibold text-gray-700 dark:text-gray-200">Facebook</a>
                                </div>
                            </div>
                        </footer>
                </div>
            </div>
        </div> 
    </body>
</html>