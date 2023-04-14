<div class="bg-white p-8 rounded-md w-full" id="numbers-department">
<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
    
    <div class="block w-full overflow-x-auto">
        <div class="mb-10">
            <x-jet-form-section submit="addCellNum">
                <x-slot name="form">
                    <x-slot name="title">
                        {{ __('Add Emergency Contact Number') }}
                    </x-slot>
                    <x-slot name="description">
                        {{ __('Assign a contact number to an emergency department, which will receive crucial information about any reported emergency on your website. This feature can help ensure that emergencies are addressed promptly, providing an added layer of safety for your users.') }}
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
                        <select required id="department_id" name="department_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="department_id" autocomplete="department_id" autofocus>
                            <option name="department_id" value="">Select Department</option>
                            @forelse($numbers as $number)
                                <option name="department_id" value="{{ $number->id }}"> {{ $number->department }} </option>
                            @empty
                                <option @disabled(true) @selected(true)>Add Emergency Department First </option>>
                            @endforelse
                        </select>

                    </div>

                    <div class="mt-2">
                        @error('number')
                            <div class="mt-4"></div>
                            <span class="text-red-100 mt-5" role="alert">
                                <strong class="text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
                            </span>
                        @enderror
                        <x-jet-label for="number" value="{{ __('Cell Number') }}" />
                        <x-jet-input id="number" wire:model="number" class="block mt-1 w-full" type="number" name="number" :value="old('number')" placeholder="Add Contact Number..." autofocus />
                    </div>

                    <x-slot name="actions">
                        <x-jet-button wire:loading.attr="disabled" onclick="return confirm('Confirm add Cell Number?');">
                            {{ __('Add Contact Number') }}
                        </x-jet-button>   
                      </x-slot>
                </x-slot>

            </x-jet-form-section>
        </div>

        <hr id="Assigned-Contact-Numbers">

        <h3 class="text-xl leading-none font-bold text-gray-900 mb-10 mt-10">Assigned Contact Numbers</h3>
        @if(session()->has('message-edit'))
            <div class="bg-gray-800 text-sm text-white rounded-md shadow-lg dark:bg-gray-900 mb-3" role="alert">
                <div class="flex p-4">
                {{ session()->get('message-edit') }}
            
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
        @if(session()->has('updated'))
            <div>
              <div class="max-w-xs bg-gray-800 text-sm text-white rounded-md shadow-lg dark:bg-gray-900 mb-3 ml-3" role="alert">
                <div class="flex p-4">
                  {{ session()->get('updated') }}
            
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
            </div>
        @endif
        <table class="items-center w-full bg-transparent border-collapse">
            <thead>
                <tr>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Department</th>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Cellphone Number</th>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Created</th>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Updated</th>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($numbers as $numbers)
                <tr>
                    <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm">
                        <a href="{{ route('view', $numbers->id) }}" class="text-gray-900 whitespace-no-wrap hover:underline hover:text-blue-500">{{ $numbers->department }}</a>
                    </td>
                    <td class="px-4 py-3 border-b border-gray-300 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            @php($i = 1)
                            @forelse ($numbers->cellnum as $cellnum)
                            <div class="flex">
                                <p class="mr-2 text-gray-500">{{ $i }}.</p>
                                <a href="{{ route('edit', $cellnum->id) }}" class="hover:underline hover:text-blue-500">{{ $cellnum->number }} </a> <br>
                            </div>
                            @php($i = $i + 1)
                            @empty
                                Not assigned yet
                            @endforelse
                        </p>
                    </td>
                    <td>
                        <p class="text-xs font-semibold text-gray-600">{{ $numbers->created_at->diffForHumans() }}</p>
                    </td>
                    <td>
                        <p class="text-xs font-semibold text-gray-600">{{ $numbers->updated_at->diffForHumans() }}</p>
                    </td>
                    <td>
                        {{-- <div class="flex flex-row items-center">
                            <div class="flex flex-col mb-2 ml-4 mt-1">
                              <x-jet-dropdown align="left" width="16">
                                <x-slot name="trigger">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                  </svg>
                                </x-slot>
                                  <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-500">
                                        {{ __('Manage Department') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('view', $numbers->id) }}">
                                        {{ __('View') }}
                                      </x-jet-dropdown-link>
                  
                                    <x-jet-dropdown-link href="{{ route('delete', $numbers->id) }}" onclick="return confirm('Are you sure you want to delete - {{ $numbers->department }}?');">
                                      {{ __('Delete') }}
                                    </x-jet-dropdown-link>
                                </x-slot>
                              </x-jet-dropdown>
                            </div>
                        </div> --}}
                        <a href="{{ route('view', $numbers->id) }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-emerald-400dark:focus:ring-blue-800">
                            View
                            <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </td>
                    
                </tr>
                        
                @empty
                    <tr>
                        <td>
                            There Are no numbers yet
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
  </div>
</div>
  