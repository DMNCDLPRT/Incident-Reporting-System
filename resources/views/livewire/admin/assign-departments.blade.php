<div class="bg-white p-8 rounded-md w-full mt-4" id="Assign-Department">
    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
        <div class="block w-full overflow-x-auto">
            <div>
                <x-jet-form-section submit="addDepartment">
                    <x-slot name="form">
                        <x-slot name="title">
                            {{ __('Assign Department') }}
                        </x-slot>
                        <x-slot name="description">
                            {{ __('The "Assign Department" feature enables you to categorize tasks, incidents, or reports into different departments, making it easier to manage and prioritize your workflow. By assigning specific departments to each task, you can ensure that the right team or individual is responsible for handling it, streamlining the process and improving efficiency. This feature can help you stay organized and on top of your workload, while also ensuring that important tasks are not overlooked or delayed.') }}
                        </x-slot>
                        <div>
                            @if(session()->has('message'))
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
                            @error('department')
                                <div class="mt-4"></div>
                                <span class="text-red-100 mt-5" role="alert">
                                    <strong class="text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
                                </span>
                            @enderror
                            <x-jet-label for="department" value="{{ __('Department') }}"/>
                            <select id="department_id" wire:model="department_id" name="department_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="department_id" autocomplete="department_id" autofocus>
                                @forelse($numbers as $number)
                                    <option name="department_id" value="{{ $number->id }}"> {{ $number->department }} </option>
                                @empty
                                    <option @disabled(true) @selected(true)>Add Emergency Department First</option>>
                                @endforelse
                            </select>
                            <div class="flex justify-between p-4">
                                <h3 class="font-semibold text-gray-900">Incidents</h3>
                                <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                                    type="button"
                                    href="{{ route("remove.incident") }}"
                                >
                                    Edit Incidents
                                </a>
                            </div>
                            <ul class=" text-sm font-medium text-gray-900 bg-white  rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                           
                                @forelse ($incidents as $incident)
                                <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="{{ $incident->id }}" name="{{ $incident->id  }}" type="checkbox" wire:model="incidents_id" value="{{ $incident->id }}"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="{{ $incident->id }}" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{{ $incident->report_name }}</label>
                                    </div>
                                </li>
                                @empty
                                    <i>No incidents</i>
                                @endforelse
                            </ul>
                        </div>

                        <x-slot name="actions">
                            <x-jet-button wire:loading.attr="disabled" onclick="return confirm('Confirm Assign Department?');">
                                {{ __('Assign Department') }}
                            </x-jet-button>   
                        </x-slot>
                    </x-slot>
                </x-jet-form-section>
            </div>
        </div>
    </div>
</div>
      