<x-app-layout>
    <div class="flex overflow-hidden bg-white">
        @livewire('admin-side-panel')
    </div>
    <div id="main-content" class="h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
        <main>
            <div class="pt-6 px-4 dark:bg-gray-900">
                @livewire('numbers-departmet', ['numbers' => $numbers, 'assigns' => $assigns])
                @livewire('departments', ['numbers' => $numbers])
                @livewire('add-incident')
                @livewire('assign-departments', ['numbers' => $numbers, 'incidents' => $incidents])
            </div>
        </main>
        @livewire('footer')
    </div>

</x-app-layout>