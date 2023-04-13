<x-app-layout>
    <div class="flex overflow-hidden bg-white" style="background: linear-gradient(196deg, rgba(22,28,30,1) 0%, rgba(20, 142, 160, 0.88) 92%);">
        @livewire('admin-side-panel')
        <div id="main-content" class="h-full w-full overflow-y-auto lg:ml-64">
            <main>
                <div class="pt-6 px-4">
                    @livewire('numbers-departmet', ['numbers' => $numbers, 'assigns' => $assigns])
                    @livewire('departments', ['numbers' => $numbers])
                    @livewire('add-incident')
                    @livewire('assign-departments', ['numbers' => $numbers, 'incidents' => $incidents])
                </div>
            </main>
            @livewire('footer')
        </div>
    </div>

</x-app-layout>