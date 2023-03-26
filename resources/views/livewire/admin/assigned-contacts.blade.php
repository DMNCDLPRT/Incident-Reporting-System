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