<div class="bg-white p-8 rounded-md w-full">
    
    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
        <div class="block w-full overflow-x-auto">
            <x-jet-action-section>
                <x-slot name="title">
                    {{ __('View Report') }}
                </x-slot>
                <x-slot name="description">
                    {{ __('This Report was reported on') }}
                </x-slot>
                <x-slot name="content">
                    @if(session()->has('flash_message'))
                        <div class="bg-gray-800 text-sm text-white rounded-md shadow-lg dark:bg-gray-900 mb-3" role="alert">
                            <div class="flex p-4">
                            {{ session()->get('flash_message') }}
                        
                            <div class="ml-auto">
                                <button type="button" class="inline-flex flex-shrink-0 justify-center items-center h-4 w-4 rounded-md text-white/[.5] hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-gray-600 transition-all text-sm dark:focus:ring-offset-gray-900 dark:focus:ring-gray-800">
                                <span class="sr-only">Close</span>
                                <svg class="w-3.5 h-3.5" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.92524 0.687069C1.126 0.486219 1.39823 0.373377 1.68209 0.373377C1.96597 0.373377 2.2382 0.486219 2.43894 0.687069L8.10514 6.35813L13.7714 0.687069C13.8701 0.584748 13.9882 0.503105 14.1188 0.446962C14.2494 0.39082 14.3899 0.361248 14.5321 0.360026C14.6742 0.358783 14.8151 0.38589 14.9468 0.439762C15.0782 0.493633 15.1977 0.573197 15.2983 0.673783C15.3987 0.774389 15.4784 0.894026 15.5321 1.02568C15.5859 1.15736 15.6131 1.29845 15.6118 1.44071C15.6105 1.58297 15.5809 1.72357 15.5248 1.85428C15.4688 1.98499 15.3872 2.10324 15.2851 2.20206L9.61883 7.87312L15.2851 13.5441C15.4801 13.7462 15.588 14.0168 15.5854 14.2977C15.5831 14.5787 15.4705 14.8474 15.272 15.046C15.0735 15.2449 14.805 15.3574 14.5244 15.3599C14.2437 15.3623 13.9733 15.2543 13.7714 15.0591L8.10514 9.38812L2.43894 15.0591C2.23704 15.2543 1.96663 15.3623 1.68594 15.3599C1.40526 15.3574 1.13677 15.2449 0.938279 15.046C0.739807 14.8474 0.627232 14.5787 0.624791 14.2977C0.62235 14.0168 0.730236 13.7462 0.92524 13.5441L6.59144 7.87312L0.92524 2.20206C0.724562 2.00115 0.611816 1.72867 0.611816 1.44457C0.611816 1.16047 0.724562 0.887983 0.92524 0.687069Z" fill="currentColor"/>
                                </svg>
                                </button>
                            </div>
                            </div>
                        </div>
                    @endif
                   <div class="mb-5 rounded-md bg-[#F5F7FB] py-4 px-8">
                        <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                            <div class="flex justify-between content-center">
                                <h4 class="text-xl text-gray-900 font-bold">Incident Report Info</h4>
                                <a class="text-sm font-normal whitespace-nowrap  text-blue-400 hover:text-blue-600 mb-4" href=" {{ route('download.pdf.individual.report', $report->id) }} ">Publish as PDF</a>
                            </div>
                            <div class="flex content-start">
                                <p class="text-gray-600 text-sm pr-2">
                                    {{ $report->created_at->diffForHumans() }} |
                                </p>
                                <p class="text-{{$report->status_color}}-500 text-sm pr-2">
                                    {{ $report->status }}
                                </p>
                                <x-jet-dropdown align="left" width="48">
                                    <x-slot name="trigger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                    </svg>
                                    </x-slot>
                                    <x-slot name="content">
                                        <!-- Report Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-500">
                                            {{ __('Change Report Status') }}
                                        </div>
                                        <x-jet-dropdown-link href="{{ route('status.pending', $report->id) }}">
                                            {{ __('Accepted') }}
                                        </x-jet-dropdown-link>
                                        <x-jet-dropdown-link href="{{ route('status.processing', $report->id) }}">
                                            {{ __('Processing') }}
                                        </x-jet-dropdown-link>
                                        <x-jet-dropdown-link href="{{ route('status.rejected', $report->id) }}">
                                            {{ __('Rejected') }}
                                    </x-jet-dropdown-link>
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                            <ul class="mt-4 m-2 text-gray-700">
                                    <li class="flex border-b py-2 hover:bg-slate-100 grow justify-between">
                                        <span class="font-bold ">Report ID:</span>
                                        <span class="text-gray-700">{{ $report->id }}</span>
                                    </li>
                                    @if ($reporter == null)
                                        <li class="flex border-b py-2 hover:bg-slate-100 grow justify-between">
                                            <span class="font-bold ">Reported by:</span>
                                            <span class="text-gray-700">Guest</span>
                                        </li>
                                    @else
                                        
                                        <a class="hover:" href="{{ route('view.user', $reporter[0]->id) }}">
                                            <li class="flex border-b py-2 hover:bg-slate-100 justify-between">
                                                <span class="font-bold ">Reported by:</span>
                                               <span class="text-gray-700">{{ $reporter[0]->name }}</span>
                                           </li>
                                        </a>
                                    @endif
                                <li class="flex border-b py-2 hover:bg-slate-100 grow justify-between">
                                    <span class="font-bold ">Type of Incident</span>
                                    <span class="text-gray-700">{{ $incident[0]->report_name }}</span>
                                </li>
                                    <li class="flex border-b py-2 hover:bg-slate-100 grow justify-between">
                                        <span class="font-bold ">Victims:</span>
                                        <span class="text-gray-700">{{ $report->victims }}</span>
                                    </li>
                                    <li class="flex border-b py-2 hover:bg-slate-100 grow justify-between">
                                        <span class="font-bold ">Suspects:</span>
                                        <span class="text-gray-700">{{ $report->suspects }}</span>
                                    </li>
                                <li>
                                    <li class="flex border-b py-2 hover:bg-slate-100 justify-between">
                                        <span class="font-bold ">Description:</span>
                                       <span class="text-gray-700">{{ $report->event }}</span>
                                   </li>
                                </li>
                                <li class="flex border-b py-2 hover:bg-slate-100 justify-between">
                                    <span class="font-bold ">Date:</span>
                                    <span class="text-gray-700">{{$report->created_at->format('d/m/Y') }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="flex justify-center">
                            <div class="mt-8">
                                @if ($report->files == null)
                                  No photo were uploaded  
                                @else
                                    
                                <img src="{{ asset('storage/reports/'. $report->files) }}" alt="{{ $report->files }}">
                                <div class="flex items-center justify-between bg-[#e7e8ea] p-3 rounded-md mt-4">
                                    <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                        {{ $report->files }}
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </x-slot>
            </x-jet-action-section>
        </div>
    </div>
</div>
