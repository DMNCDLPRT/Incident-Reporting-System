{{--     <h3 class="text-xl leading-none font-bold text-gray-900 mb-10 pl-4">View Department</h3>
    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
        {{ $department->department }}
        
        @if(session()->has('message_incident'))
            <div class="bg-gray-800 text-sm text-white rounded-md shadow-lg dark:bg-gray-900 mb-3" role="alert">
                <div class="flex p-4">
                {{ session()->get('message') }}
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
        @if(session()->has('message_contact'))
            <div class="bg-gray-800 text-sm text-white rounded-md shadow-lg dark:bg-gray-900 mb-3" role="alert">
                <div class="flex p-4">
                {{ session()->get('message') }}
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
        <table class="items-center w-full bg-transparent border-collapse">
            <thead>
                <tr>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Contact #</th>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Assigned Incident</th>
                </tr>
            </thead>
            <tbody lass="divide-y divide-gray-100">
                <tr>
                    <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm">
                        <form wire:submit.prevent="deleteAssignedContacts">
                            <p class="text-gray-900 whitespace-no-wrap">
                                @if ($cell == null)
                                    <i class="text-gray-400">No Assigned Emergency Contact Number/s</i>
                                @else
                                    @foreach ($cell as $number)    
                                        <input id="{{ $number->id }}" 
                                            type="checkbox" 
                                            class="ml-3 w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" 
                                            wire:model="contact_ids"
                                            value="{{ $number->id }}" 
                                            name="{{ $number->id }}"
                                            autofocus 
                                        />
                                        <label for="{{ $number->id }}" class=" text-gray-900 ml-2 hover:underline hover:text-blue-700">
                                            <a href=" {{ route('edit', $number->id) }} " class="hover:underline hover:text-blue-700">{{ $number->number }}</a> </br>
                                        </label>
                                    @endforeach
                                @endif
                                
                            </p>
                            <x-jet-button 
                                wire:loading.attr="disabled" 
                                class="top-0" 
                                onclick="return confirm('Are you sure you want to delete the selected cell numbers?');">
                                {{ __('Delete Contact Number') }}
                            </x-jet-button>
                        </form>
                    </td>
                    
                    <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm">
                        <form wire:submit.prevent="deleteAssignedIncidents">
                            <p class="text-gray-900 whitespace-no-wrap">
                                @php($i = 0)
                                @php($x = 1)
                                @foreach ($incidents as $incident)
                                <div class="flex pb-2">
                                    <input id="{{ $incident[$i]->id }}" 
                                        type="checkbox" 
                                        class="ml-3 w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" 
                                        wire:model="incident_ids"
                                        value="{{ $incident[$i]->id }}" 
                                        name="{{ $incident[$i]->id }}"
                                        autofocus
                                    /> 
                                    <label for="{{ $incident[$i]->id }}" 
                                        class=" text-gray-900 ml-2 hover:underline hover:text-blue-700">{{ $incident[$i]->report_name }}
                                    </label>
                                    <br>
                                </div>
                                @php($i + 1)
                                @php($x = $x + 1)
                                @endforeach 
                            </p>
                            <x-jet-button 
                                wire:loading.attr="disabled" 
                                class="" 
                                onclick="return confirm('Are you sure you want to delete the selected assigned incidents?');">
                                {{ __('Delete Assigned Incident') }}
                            </x-jet-button>  
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div> --}}

    <form wire:submit.prevent="deleteAssignedContacts">
                            <p class="text-gray-900 whitespace-no-wrap">
                                @if ($cell == null)
                                    <i class="text-gray-400">No Assigned Emergency Contact Number/s</i>
                                @else
                                    @foreach ($cell as $number)    
                                        <input id="{{ $number->id }}" 
                                            type="checkbox" 
                                            class="ml-3 w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" 
                                            wire:model="contact_ids"
                                            value="{{ $number->id }}" 
                                            name="{{ $number->id }}"
                                            autofocus 
                                        />
                                        <label for="{{ $number->id }}" class=" text-gray-900 ml-2 hover:underline hover:text-blue-700">
                                            <a href=" {{ route('edit', $number->id) }} " class="hover:underline hover:text-blue-700">{{ $number->number }}</a> </br>
                                        </label>
                                    @endforeach
                                @endif
                                
                            </p>
                            <x-jet-button 
                                wire:loading.attr="disabled" 
                                class="top-0" 
                                onclick="return confirm('Are you sure you want to delete the selected cell numbers?');">
                                {{ __('Delete Contact Number') }}
                            </x-jet-button>
                        </form>