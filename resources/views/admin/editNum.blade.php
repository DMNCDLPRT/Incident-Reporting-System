<x-app-layout>
    <div class="flex overflow-hidden bg-white">
        @livewire('admin-side-panel')
    </div>
    <div id="main-content" class="h-full bg-gray-50 overflow-y-auto lg:ml-64">
        <main>
            <div class="pt-6 px-4">
                    @livewire('update-cell-num', ['numbers' => $numbers])
            </div>
        </main>
    </div>

</x-app-layout>