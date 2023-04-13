
<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 mb-4">
    <div class="sm-mx-4 sm:-mx-8 px-4 sm:px-8 pt-4 pb-7">
        <div class=" flex items-center justify-between">
            <div class="">
                <h2 class="text-gray-700 font-bold text-lg">Delete Incidents</h2>
                <span class="text-blue-400 mb-4 text-sm font-normal">Select incident to delete</span>
            </div>
        </div>
        <div class="inline-block min-w-full shadow-xl bg-slate-100 shadow-gray-500/50 rounded-lg overflow-hidden py-4 px-4">
            <form wire:submit.prevent="deleteIncident">
                <p class="text-gray-900 whitespace-no-wrap">
                    <div class="pb-2">
                        @foreach ($incidents as $incident)
                            <input class="ml-3 w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" 
                                type="checkbox" 
                                wire:model="incident_ids"
                                value="{{ $incident->id }}" 
                                id="{{ $incident->id }}"
                                name="{{ $incident->id }}"
                                autofocus /> 
                            <label for="{{ $incident->id }}" 
                                class=" text-gray-900 ml-2 hover:underline hover:text-blue-700">{{ $incident->report_name }}
                            </label>
                            <br>
                        @endforeach 
                    </div>
                </p>
                <x-jet-button 
                    wire:loading.attr="disabled" 
                    class="top-0" 
                    onclick="return confirm('Are you sure you want to delete the selected assigned incidents?');">
                    {{ __('Delete Incident') }}
                </x-jet-button>  
            </form>
        </div>
    </div>
</div>
