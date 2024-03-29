<x-app-layout>
    <div class="flex overflow-hidden bg-white">
        @livewire('admin-side-panel')
    </div>
    <div id="main-content" class="h-full bg-gray-50 overflow-y-auto lg:ml-64">
        <main class="h-screen">
            <div class="pt-6 px-4">
                @livewire('users-add-role', ['users' => $users])
            </div>
        </main>
    </div>

</x-app-layout>