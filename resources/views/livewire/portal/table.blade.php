<div>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">type of report</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">date</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">location</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Specific Location</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 0)
                    @forelse ($reports as $report)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $incidents[$i][0]->report_name }}
                                
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $report->created_at->format('d/m/Y') }}
                                <p class="text-xs font-semibold text-gray-500">{{$report->created_at->diffForHumans()}}</p>
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $location[$i][0]->location_name }}
                                @php($i = $i + 1)
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ Str::limit($report->specificLocation, 20)}}
                                {{-- Str::limit($your_string, 50) --}}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <span
                                class="relative inline-block px-3 py-1 font-semibold text-gray-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-{{$report->status_color}}-200 opacity-50 rounded-full"></span>
                            <span class="relative"> {{ $report->status }} </span>
                            </span>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex flex-row items-center">
                                <div class="flex flex-col mb-2 ml-4 mt-1">
                                  <x-jet-dropdown align="left" width="48">
                                    <x-slot name="trigger">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                      </svg>
                                    </x-slot>
                                      <x-slot name="content">
                                        <!-- Report Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage report') }}
                                        </div>
                                        <x-jet-dropdown-link href="{{ route('user.view.report', $report->id) }}">
                                            {{ __('View') }}
                                        </x-jet-dropdown-link>
                                        <x-jet-dropdown-link href="{{ route('destroy.report', $report->id) }}">
                                            {{ __('Delete') }}
                                        </x-jet-dropdown-link>
                                    </x-slot>
                                  </x-jet-dropdown>
                                </div>
                            </div>
                        </td>
                    </tr>
                            
                    @empty
                        <tr>
                            <td class="p-2">
                                There are no reports yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div
                class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                <span class="text-xs xs:text-sm text-gray-900">
                    Showing 1 to 4 of 50 Entries
                </span>
                <div class="inline-flex mt-2 xs:mt-0">
                    <button
                        class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l">
                        Prev
                    </button>
                    &nbsp; &nbsp;
                    <button
                        class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-r">
                        Next
                    </button>
                </div>
            </div>
    </div>
</div>