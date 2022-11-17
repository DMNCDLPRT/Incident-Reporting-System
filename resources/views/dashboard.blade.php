<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="antialiased w-full h-full bg-black text-gray-400 font-inter p-10">
        <div class="bg-white overflow-hidden shadow-xl">
            <x-jet-welcome />
        </div>
    </div>
</x-app-layout>
