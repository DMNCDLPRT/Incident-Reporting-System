<x-app-layout>
    <div class="flex overflow-hidden bg-white" style="background: linear-gradient(196deg, rgba(22,28,30,1) 0%, rgba(20, 142, 160, 0.88) 92%);">
        @livewire('admin-side-panel')
        <div id="main-content" class="h-full w-full overflow-y-auto lg:ml-64">
            <main>
                <div class="pt-6 px-4 ">
                    @livewire('view-user', ['user' => $user, 'count' => $count])
                </div>
                <div class="pt-6 px-4">
                    @livewire('user-reports-table', ['reports' => $reports, 'location' => $location, 'incidents' => $incidents])
                </div>
            </main>
        </div>
    </div>

</x-app-layout>