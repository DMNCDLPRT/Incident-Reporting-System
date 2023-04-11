<div>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class=" flex items-center justify-between pb-6">
            <div class="w-3/5">
                <h2 class="text-gray-700 font-bold text-lg">Text Logs</h2>
                <span class="text-blue-400 mb-4 text-sm font-normal">Text logs of incident reports contain information such as the number of departments assigned to the incident, department names, and a description of the incident, which is essential for tracking progress and ensuring relevant parties are aware of the situation.</span>
            </div>
            <div class="w-2/5">
                <div class="flex bg-gray-50 items-center p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                    <input class="bg-gray-50 outline-none ml-1 block rounded-md w-full" type="text" name="" id="" wire:model="search" placeholder="Search Incidents...">
                </div>
            </div>
        </div>
        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Log ID</th>
                        <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Department</th>
                        <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Cell Number</th>
                        <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Description</th>
                        <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Created</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($textlogs as $logs)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $logs->id }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $logs->department->department }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $logs->cell->number }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $logs->log }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ \Carbon\Carbon::parse($logs->created_at)->format('F d, Y') }}</p>
                                <p class="text-xs font-semibold text-gray-600">{{ $logs->created_at->diffForHumans() }}</p>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="p-2">
                                There are no Logs yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                <nav id="Graphs">
                    @if ($textlogs->count())
                        {{ $textlogs->links() }}
                    @else
                        Showing 0 out of 0 logs
                    @endif
                </nav>
            </div>
    </div>
</div>