<x-app-layout>
    <div class="flex overflow-hidden bg-white">
        @livewire('admin-side-panel')
    </div>
    <div id="main-content" class="h-full bg-gray-50 overflow-y-auto lg:ml-64">
        <div class="pt-6 px-4">
            @livewire('delete-incident', ['incidents' => $incidents])
        </div>
    </div>
</x-app-layout>