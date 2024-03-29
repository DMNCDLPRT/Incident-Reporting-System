<x-app-layout>
    <div class="flex overflow-hidden bg-white">
        @livewire('admin-side-panel')
    </div>
    <div id="main-content" class="h-full bg-gray-50 overflow-y-auto lg:ml-64">
        <main>
            <div class="pt-6 px-4">
                @livewire('departments', ['numbers' => $numbers])
                @livewire('add-incident')
                @livewire('assign-departments', ['numbers' => $numbers, 'incidents' => $incidents])
                @livewire('numbers-departmet', ['numbers' => $numbers, 'assigns' => $assigns])
            </div>
        </main>
        @livewire('footer')
    </div>

</x-app-layout>