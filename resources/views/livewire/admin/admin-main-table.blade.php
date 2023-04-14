<div id="Reports" class="mt-4">
    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8" id="Main"> 
        <div class=" flex items-center justify-between">
            <span>
                <h2 class="text-gray-700 font-bold text-lg">Main Dashboard</h2>
                <span class="text-blue-400 mb-4 text-sm font-normal whitespace-nowrap">Incidents Reported</span>
            </span>
            <span>
                <div class="flex items-center p-2 shadow-md rounded-md bg-slate-100 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                    <input class="bg-gray-50 outline-none ml-1 block rounded-md w-full" type="text" name="" id="" wire:model="search" placeholder="Search Incidents...">
                </div>
                <i class="text-[12px] pl-8">when searching for date try using this format YYY-MM-DD (e.g. 2023-03-01)</i>
            </span>
        </div>
        @if(session()->has('message'))
          <div class="bg-gray-800 text-sm text-white rounded-md shadow-lg dark:bg-gray-900 mt-3" id="output" role="alert">
            <div class="flex p-4">
              {{ session()->get('message') }}
        
              <div class="ml-auto">
                <button type="button" id="onClickOutput" class="inline-flex flex-shrink-0 justify-center items-center h-4 w-4 rounded-md text-white/[.5] hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-gray-600 transition-all text-sm dark:focus:ring-offset-gray-900 dark:focus:ring-gray-800">
                  <span class="sr-only">Close</span>
                  <svg class="w-3.5 h-3.5" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.92524 0.687069C1.126 0.486219 1.39823 0.373377 1.68209 0.373377C1.96597 0.373377 2.2382 0.486219 2.43894 0.687069L8.10514 6.35813L13.7714 0.687069C13.8701 0.584748 13.9882 0.503105 14.1188 0.446962C14.2494 0.39082 14.3899 0.361248 14.5321 0.360026C14.6742 0.358783 14.8151 0.38589 14.9468 0.439762C15.0782 0.493633 15.1977 0.573197 15.2983 0.673783C15.3987 0.774389 15.4784 0.894026 15.5321 1.02568C15.5859 1.15736 15.6131 1.29845 15.6118 1.44071C15.6105 1.58297 15.5809 1.72357 15.5248 1.85428C15.4688 1.98499 15.3872 2.10324 15.2851 2.20206L9.61883 7.87312L15.2851 13.5441C15.4801 13.7462 15.588 14.0168 15.5854 14.2977C15.5831 14.5787 15.4705 14.8474 15.272 15.046C15.0735 15.2449 14.805 15.3574 14.5244 15.3599C14.2437 15.3623 13.9733 15.2543 13.7714 15.0591L8.10514 9.38812L2.43894 15.0591C2.23704 15.2543 1.96663 15.3623 1.68594 15.3599C1.40526 15.3574 1.13677 15.2449 0.938279 15.046C0.739807 14.8474 0.627232 14.5787 0.624791 14.2977C0.62235 14.0168 0.730236 13.7462 0.92524 13.5441L6.59144 7.87312L0.92524 2.20206C0.724562 2.00115 0.611816 1.72867 0.611816 1.44457C0.611816 1.16047 0.724562 0.887983 0.92524 0.687069Z" fill="currentColor"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        @endif
            <div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 pt-4 pb-7 overflow-x-auto">
                    <div class="inline-block min-w-full shadow-xl shadow-gray-400 rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-300 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">#</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-300 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Reporter ID</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-300 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Incident</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-300 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Victims</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-300 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Suspects</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-300 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Description</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-300 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-300 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Date</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-300 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 0)
                                @php($num = 1)
                                @forelse ($reports as $key => $report)
                                <tr>
                                    <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm ">
                                        <p class="hover:text-red-400 font-bold">
                                            {{ $num }}.
                                        </p>
                                    </td>
                                    <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm">
                                        @if ($report->userId == null)
                                            <p class="hover:text-red-400">Guest</p>
                                        @else
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <a class="hover:text-blue-400" href="{{ route('view.user', $report->userId) }}">
                                                        {{ $report->userId }}
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $incidents[$i][0]->report_name }}
                                        </p>
                                    </td>
                                    <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $report->victims }}
                                        </p>
                                    </td>
                                    <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $report->suspects }}
                                        </p>
                                    </td>
                                    <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            @if ($report->event == null)
                                               <i class="text-gray-500"> no other info provided </i>
                                            @else
                                                {{ Str::limit($report->event, 60) }}
                                            @endif
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
                                            @elseif ($report->status_color == 'yellow')
                                                <span aria-hidden class="absolute inset-0 bg-yellow-700 opacity-50 rounded-full"></span>
                                            @else
                                                <span aria-hidden class="absolute inset-0 bg-gray-700 opacity-50 rounded-full"></span>
                                            @endif
                                        <span class="relative text-white"> {{ $report->status }} </span>
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ \Carbon\Carbon::parse($report->created_at)->format('F d, Y') }}
                                            <p class="text-xs font-semibold text-gray-600">{{$report->created_at->diffForHumans()}}</p>
                                        </p>
                                    </td>
                                    
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
                                @php($i = $i + 1)
                                @php($num++)
                                @empty
                                    <tr>
                                        <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm">
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
    </div>
</div>