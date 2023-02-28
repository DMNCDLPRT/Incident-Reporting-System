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
    <body class="antialiased bg-gray-200 dark:bg-gray-600">
        <header>
            <nav class="bg-gray-200 border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-700">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <a href="{{ url('/') }}" class="flex items-center">
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
                                <a href="{{ route('login') }}" class="text-gray-800 dark:text-white bg-slate-400 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                                    Sign-in 
                                </a>
                                @endif
                            @endauth 
                        @endif
                        <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-600 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-500 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                            <span class="sr-only">Main Menu</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                </div>
            </nav>
        </header>
        
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

        <div class="bg-white relative dark:bg-gray-600 mx-auto sm:px-6 lg:px-8">
            <div class="relative xl:container m-auto px-6 md:px-12 lg:px-6">
                <section class="py-8 px-4 md:px-8 lg:py-16 2xl:px-60 mx-auto grid grid-cols-1 gap-8 lg:grid-cols-12 relative">
                    <div class="col-span-6 xl:place-self-center mb-8 mt-8 xl:mt-0 lg:mb-0">
                        <h1 class="sm:mx-auto sm:w-10/12 md:w-2/3 font-black text-blue-900 text-4xl text-center sm:text-5xl md:text-6xl lg:w-auto lg:text-left xl:text-6xl dark:text-white">Incident Reporting System<br class="lg:block hidden"> <span class="relative text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500 dark:from-blue-400 dark:to-cyan-300">Don Carlos, Bukidnon</span></h1>
                        <p class="my-8 max-w-lg mx-auto lg:mx-0 text-center lg:text-left text-gray-400">
                            Welcome to the Incident Reporting System for Don Carlos, Bukidnon. This website is designed to provide residents of the municipality with an easy and efficient way to report incidents, such as accidents, crimes, and other emergencies, to the local authorities. By using this website, you can quickly and easily notify the appropriate parties of any incidents that occur in the area, helping to keep the community safe and secure.
                        </p>
                        <div class="flex flex-col lg:flex-row items-center">
                            @if(Route::has('login'))
                                @auth
                                    @role('Admin|Department')
                                        <a href="{{ url('/dashboard') }}" type="button" class="text-gray-900 dark:white w-full lg:w-max px-4 py-3 bg-emerald-500 hover:bg-emerald-600 hover:cursor-pointer font-medium rounded lg:mr-8 mb-4 lg:mb-0">
                                            Home
                                        </a>
                                    @endrole

                                    @role('User')
                                        <a href="{{ url('/portal/portal') }}" type="button" class="text-gray-900 dark:text-white w-full lg:w-max px-4 py-3 bg-emerald-500 hover:bg-emerald-600 hover:cursor-pointer font-medium rounded lg:mr-8 mb-4 lg:mb-0">
                                            Report Incident
                                        </a>
                                    @endrole 

                            @else
                                <a href="{{ route('register') }}" type="button" class="text-gray-900 dark:text-white w-full lg:w-max px-4 py-3 bg-emerald-500 hover:bg-emerald-600 hover:cursor-pointer font-medium rounded lg:mr-8 mb-4 lg:mb-0">
                                    Sign-up
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('login') }}" type="button" class="text-gray-900 dark:text-white w-full lg:w-max px-4 py-3 border border-slate-200 hover:cursor-pointer hover:bg-gray-100 hover:text-gray-900 font-medium rounded inline-flex items-center justify-center">
                                        Sign-in
                                    </a>
                                @endif
                                @endauth
                            @endif
                            
                        </div>

                    </div>
                    <div class="col-span-6 relative">
                        <img src="{{ asset('images/don carlos logo.png') }}" alt="">
                        {{-- <div class="relative xl:container m-auto px-6 md:px-12 lg:px-6 pt-10">
                            <div class="col-span-6 xl:place-self-center mb-8 mt-8 xl:mt-0 lg:mb-0"> 
                                <span class="md:block font-semibold text-gray-600 dark:text-gray-500 py-10">Our key partners</span>
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
                            </div>
                        </div> --}}
                    </div>

                    <a href="{{ route('portal-guest') }}" type="button" class="text-gray-900 dark:text-white w-full lg:w-max px-4 py-3 border hover:bg-gray-100 hover:text-gray-900 border-slate-200 hover:cursor-pointer font-medium rounded inline-flex items-center justify-center">
                        Report Incident - Report as Guest
                    </a>
                </section>
                    
                <footer class="md:flex md:items-center md:justify-between shadow rounded-lg p-4 md:p-6 xl:p-8 my-6 mx-4 dark:bg-gray-500">
                    <ul class="flex items-center flex-wrap mb-6 md:mb-0">
                       <li><a href="{{ route('terms.show') }}" class="text-sm font-normal text-gray-900 hover:underline mr-4 md:mr-6">Terms and conditions</a></li>
                       <li><a href="{{ route('policy.show') }}" class="text-sm font-normal text-gray-900 hover:underline mr-4 md:mr-6">Privacy Policy</a></li>
                       <li><a href="{{ route('faq') }}" class="text-sm font-normal text-gray-900 hover:underline mr-4 md:mr-6">FAQ</a></li>
                       <li><a href="https://www.facebook.com/LGUDonCarlos" class="text-sm font-normal text-gray-900 hover:underline">Contact</a></li>
                    </ul>
                    <div class="flex sm:justify-center space-x-6">
                       <a href="https://www.facebook.com/LGUDonCarlos" class="text-gray-900 hover:text-gray-900">
                          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                             <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                          </svg>
                       </a>
                       <a href="https://github.com/DMNCDLPRT/Quick-Emergency-Portal" class="text-gray-900 hover:text-gray-900">
                          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                             <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                          </svg>
                       </a>
                    </div>
                </footer>
                <p class="text-center text-sm text-gray-900 my-10">
                    &copy; 2022-2023 <a href="#" class="hover:underline" target="_blank">Quick-Respond</a>. All rights reserved.
                </p>
                </div>
            </div>
        </div> 
    </body>
</html>