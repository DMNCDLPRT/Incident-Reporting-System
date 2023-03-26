<x-app-layout>
    <div class="flex overflow-hidden bg-white">
        @livewire('admin-side-panel')
    </div>
    <div id="main-content" class="h-full bg-gray-50 overflow-y-auto lg:ml-64">
        <div class="pt-6 px-4">
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                {{ $department->department }}
                <table class="items-center w-full bg-transparent border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Contact #</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Assigned Incident</th>
                        </tr>
                    </thead>
                    <tbody lass="divide-y divide-gray-100">
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                @livewire('assigned-contacts', ['cell' => $cell])
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                @livewire('assigned-departments', ['assigns' => $assigns, 'values' => $values, 'incidents' => $incidents])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>