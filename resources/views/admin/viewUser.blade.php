<x-app-layout>
    <div class="flex overflow-hidden bg-white">
        @livewire('admin-side-panel')
    </div>
    <div id="main-content" class="h-full bg-gray-50 overflow-y-auto lg:ml-64">
        <main>
            <div class="pt-6 px-4 ">
                @livewire('view-user', ['user' => $user, 'count' => $count])
            </div>
            <div class="pt-6 px-4">
                @livewire('user-reports-table', ['reports' => $reports, 'location' => $location, 'incidents' => $incidents])
            </div>
        </main>
    </div>

</x-app-layout>