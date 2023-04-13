<x-app-layout>
    <div class="flex overflow-hidden bg-white" style="background: linear-gradient(196deg, rgba(22,28,30,1) 0%, rgba(20, 142, 160, 0.88) 92%);">
        @livewire('admin-side-panel')
        <div id="main-content" class="h-full w-full overflow-y-auto lg:ml-64">
            <main>
                <div class="pt-6 px-4">
                    @livewire('view-report', ['report' => $report, 'incident' => $incident, 'location' => $location, 'reporter' => $reporter])
                </div>
            </main>
            <footer>
                @livewire('footer')
            </footer>
        </div>
    </div>

</x-app-layout>