<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> {{ config('app.name', 'Laravel') }}</title>
      <!-- Fonts -->
      <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      
      {{-- <script src="https://kit.fontawesome.com/49ffc3c21b.js" crossorigin="anonymous"></script> --}}
      @vite(['resources/css/app.css', 'resources/js/app.js'])

      @livewireStyles
  </head>

  <body class="antialiased bg-white dark:bg-gray-900">
    <main>
      <!-- component -->
      <div class="mx-auto max-w-[800px]"> 
        <div class="h-full bg-gray-50">
          <nav class="p-2 pl-5 pr-5 flex flex-grow justify-between z-10 items-center mx-auto h-18 mb-8 bg-slate-100">
            <div class="inline-flex">
              <a href="/">
                <div class="flex justify-center items-center space-x-4">
                  <img src="{{ asset('images/cross -logo.png') }}" alt="Logo" class=" w-11 ">
                  <h4 class="text-xl font-semibold  leading-tight truncate">Report Incident</h4> 
                </div>
              </a>
            </div>
            <div class="flex-initial">
              <div class="flex justify-end items-center relative">
                <div class="block flex-grow-0 flex-shrink-0">
                  <div class="inline relative">
                    @if (Auth()->user())
                    <x-jet-dropdown>
                      <x-slot name="trigger">
                        <div class="flex justify-center items-center space-x-4">
                          <h4>{{ Auth()->user()->name }}</h4>
                          <img src="{{ Auth()->user()->profile_photo_url }}" alt="{{ Auth()->user()->name }}" class="mx-auto rounded-full h-10 w-10 object-cover">
                        </div>
                      </x-slot>
                      <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-500">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                          {{ __('Settings') }}
                        </x-jet-dropdown-link>
      
                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                        @endif
      
                        <div class="border-t border-gray-100"></div>
      
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
      
                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                      </x-slot>
                    </x-jet-dropdown>
                    @endif
                    <div class="flex items-center lg:order-2">
                     {{--  @if (Route::has('login'))
                          @auth
                          @else
                          <a href="{{ route('register') }}" class="text-white bg-emerald-500 hover:bg-emerald-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-emerald-400focus:outline-none dark:focus:ring-blue-800">
                              Sign-up
                          </a>
                              @if (Route::has('register'))
                              <a href="{{ route('login') }}" class="text-gray-800 dark:text-white bg-slate-400 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                                  Sign-in
                              </a>
                              @endif
                          @endauth 
                      @endif --}}
                    </div>
                  </div>
                </div>
              </div>
            </nav>
        <!-- livewire -->
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <!-- end -->
          <div class="sticky bottom-0 w-full rounded-t-xl bg-white px-5 py-2 shadow-sm shadow-gray-300">
            
            <nav class="flex justify-around text-gray-900">
              {{-- Home --}}
              @if (Auth()->user())
                <x-jet-nav-link  href="{{ route('portal') }}" :active="request()->routeIs('portal')">
                  <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </x-jet-nav-link>
              @endif
              @if (Auth()->user() == null)
                <x-jet-nav-link  href="{{ route('portal-guest') }}" :active="request()->routeIs('portal')">
                  <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </x-jet-nav-link>
              @endif
              {{-- Button 3 --}}
              @role('Admin|Department')
                <x-jet-nav-link  href="{{ route('adminDashboard') }}" :active="request()->routeIs('adminDashboard')">
                  <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </x-jet-nav-link>
                @endrole
                
                {{-- Reports --}}
                @if (Auth()->user())
                  <x-jet-nav-link href="{{ route('reports') }}" :active="request()->routeIs('reports')">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                  </x-jet-nav-link>
                @endif
                {{-- Reports Guest --}}
                @if (Auth()->user() == null)
                  <x-jet-nav-link href="{{ route('reports-guest') }}" :active="request()->routeIs('reports')">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                  </x-jet-nav-link>
                @endif  

                {{-- User --}}
                @if (Auth()->user())    
                <x-jet-nav-link  href="{{ route('user-Profile') }}" :active="request()->routeIs('user-Profile')">
                  {{-- <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg> --}}
                  Profile
                </x-jet-nav-link>
                @endif
              </nav>
            
          </div>
        </div>
      </div>
    </main>

    @livewireScripts

  </body>

</html>
