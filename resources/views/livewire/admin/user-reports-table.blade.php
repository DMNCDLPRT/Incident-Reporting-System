<div class="mb-4">
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8">
        <div class="inline-block min-w-full shadow-xl shadow-cyan-500/50 rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">type of report</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">date</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 0)
                    @forelse ($reports as $report)
                    <tr>
                        <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $report->reports->report_name }}
                                
                            </p>
                        </td>
                        <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $report->created_at->format('d/m/Y') }}
                                <p class="text-xs font-semibold text-gray-600">{{$report->created_at->diffForHumans()}}</p>
                            </p>
                        </td>
                        <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm">
                            <span
                                class="relative inline-block px-3 py-1 font-semibold text-gray-900 leading-tight">
                                {{-- <span class="absolute inset-0 bg-{{$report->status_color}}-400 opacity-50 rounded-full"></span> --}}
                                @if ($report->status_color == 'red')
                                    <span aria-hidden class="absolute inset-0 bg-red-700 opacity-50 rounded-full"></span>
                                @elseif ($report->status_color == 'blue')
                                    <span aria-hidden class="absolute inset-0 bg-blue-700 opacity-50 rounded-full"></span>
                                @elseif ($report->status_color == 'green')
                                    <span aria-hidden class="absolute inset-0 bg-green-700 opacity-50 rounded-full"></span>
                                @else
                                    <span aria-hidden class="absolute inset-0 bg-gray-700 opacity-50 rounded-full"></span>
                                @endif
                            <span class="relative text-white"> {{ $report->status }} </span>
                            </span>
                        </td>
                        {{-- <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm">
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
                                        <div class="block px-4 py-2 text-xs text-gray-500">
                                            {{ __('Manage report') }}
                                        </div>
                                        <x-jet-dropdown-link href="{{ route('view.report', $report->id) }}">
                                            {{ __('View') }}
                                        </x-jet-dropdown-link>
                                        @role('Admin')
                                        <x-jet-dropdown-link href="{{ route('destroy.report', $report->id) }}">
                                            {{ __('Delete') }}
                                        </x-jet-dropdown-link>
                                        @endrole 
                                    </x-slot>
                                  </x-jet-dropdown>
                                </div>
                            </div>
                        </td> --}}
                        <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm">
                            {{-- <div class="flex flex-row items-center">
                                <div class="flex flex-col mb-2 ml-4 mt-1">
                                  <x-jet-dropdown align="left" width="48">
                                    <x-slot name="trigger">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                      </svg>
                                    </x-slot>
                                      <x-slot name="content">
                                        <!-- Report Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-500">
                                            {{ __('Manage report') }}
                                        </div>

                                        <x-jet-dropdown-link href="{{ route('view.report', $report->id) }}">
                                            {{ __('View') }}
                                        </x-jet-dropdown-link>
                                        @role('Admin')
                                        <x-jet-dropdown-link href="{{ route('destroy.report', $report->id) }}">
                                            {{ __('Delete') }}
                                        </x-jet-dropdown-link>
                                        @endrole
                                    </x-slot>
                                  </x-jet-dropdown>
                                </div>
                            </div> --}}
                            <a href="{{ route('view.report', $report->id) }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 uppercase text-xs font-bold rounded-lg px-4 py-1.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-emerald-400dark:focus:ring-blue-800">
                                View
                                <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
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
            <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                <nav id="Graphs">
                    @if (!$reports)
                        showing 0 out of 0
                    @else
                        {{ $reports->links() }}
                    @endif
                </nav>
            </div>
    </div>
</div>
</div>