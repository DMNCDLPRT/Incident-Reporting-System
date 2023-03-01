<h3 class="text-xl leading-none font-bold text-gray-900 mb-10 pl-4">View Department</h3>
<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
    

            {{ $numbers->department->department }}

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
                            <form wire:submit.prevent="delete_assigned_contact">
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
                                                autofocus />
                                            <label for="{{ $number->id }}" class=" text-gray-900 ml-2 hover:underline hover:text-blue-700">
                                                <a href=" {{ route('edit', $number->id) }} " class="hover:underline hover:text-blue-700">{{ $number->number }}</a> </br>
                                            </label>
                                        @endforeach
                                    @endif
                                   
                                </p>
                                <x-jet-button wire:loading.attr="disabled" class="top-0" 
                                    wire:click.prevent="delete_assigned_contact" 
                                    onclick="return confirm('Are you sure you want to delete the selected cell numbers?');">
                                    {{ __('delete contact number') }}
                                </x-jet-button>  
                            </form>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <form wire:submit.prevent="delete_assigned_incidents">
                                @error('reportType')
                                    <span class="m" role="alert">
                                        <strong class="mt-4 text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
                                    </span>
                                @enderror
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
                                <x-jet-button wire:loading.attr="disabled" class="" 
                                    wire:click.prevent="delete_assigned_incidents" 
                                    onclick="return confirm('Are you sure you want to delete the selected assigned incidents?');">
                                    {{ __('delete assigned incident') }}
                                </x-jet-button>  
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
</div>
