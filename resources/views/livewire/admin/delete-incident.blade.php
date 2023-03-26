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