<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="antialiased w-full h-full font-inter p-10">
        <div class="bg-white overflow-hidden shadow-xl rounded-lg">
            <x-jet-welcome />
        </div>
    </div>
    @livewire('footer')
</x-app-layout>
