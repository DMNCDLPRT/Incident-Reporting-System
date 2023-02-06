<h3 class="text-xl leading-none font-bold text-gray-900 mb-10">View Department</h3>
<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
    
    <x-jet-form-section submit="EditAssign">
        <x-slot name="form">
            <x-slot name="title">
                {{ $numbers->department->department }}
            </x-slot>
            <x-slot name="description" class="view:none">
                {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore repellendus quod exercitationem doloribus quae quam similique velit eligendi, ratione ducimus ad doloremque veritatis, ab ex modi dicta nam porro assumenda.') }}
            </x-slot>
            <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                    <tr>
                        <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Department</th>
                        <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Contact #</th>
                        <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Assigned Incident</th>
                    </tr>
                </thead>
                <tbody lass="divide-y divide-gray-100">
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $numbers->department->department }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                @foreach ($cell as $number)    
                                    <a href=" {{ route('edit', $number->id) }} " class="hover:underline hover:text-blue-700">{{ $number->number }}</a> </br>
                                @endforeach
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                @php($i = 0)
                                @php($x = 1)
                                @foreach ($incidents as $incident)
                                <div class="flex">
                                    <p class="text-gray-400">{{ $x }}.</p>
                                    <input id="vue-checkbox" 
                                        type="checkbox" value="{{ $incident[$i]->id }}" 
                                        class="ml-3 w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" 
                                        wire:model="incident_id"
                                    /> 
                                    <label for="vue-checkbox" 
                                        class=" text-gray-900 ml-2 hover:underline hover:text-blue-700">{{ $incident[$i]->report_name }}
                                    </label>
                                    <br>
                                </div>
                                
                                @php($i + 1)
                                @php($x = $x + 1)
                                @endforeach 
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <x-slot name="actions">
                <x-jet-button wire:loading.attr="disabled" onclick="return confirm('Are you sure you want to delete the assigned incidents?');">
                    {{ __('delete assign incident') }}
                </x-jet-button>   
            </x-slot>
        </x-slot>
    </x-jet-form-section>
</div>
