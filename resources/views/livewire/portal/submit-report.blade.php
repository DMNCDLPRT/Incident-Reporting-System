<x-jet-form-section submit="submitForm">
  <x-slot name="title">
      {{ __('Submit a Report') }}
  </x-slot>
  <x-slot name="description">
      {{ __('You can Submit a report here. Just make sure to inclue the important details.') }}
  </x-slot>
  <x-slot name="form">

    {{-- Selection of which type of inccident occurs --}}

    @error('reportType')
      <span class="m" role="alert">
        <strong class="mt-4 text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
      </span>
    @enderror

    <label for="reportType" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Select type of Incident</label>
    <select id="reportType" name="reportType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Specific location of the incident..."  wire:model="report_id" autocomplete="reportType" autofocus>
        <option @disabled(true) @selected(true)>Select Type of Incident</option>
        @foreach ($incidents as $incident)
        <option name="{{ $incident->report_name }}" value="{{ $incident->id }}">{{ $incident->report_name }}</option>
        @endforeach
    </select>
    {{-- end of type of incident --}} 
    <div>
      {{-- <textarea id="description" rows="4" wire:model="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="description" placeholder="Describe the Incident (optional)..." autocomplete="description"></textarea> --}}
      <div class="flex">
        <div class="mr-4 grow">

          <label for="suspects" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-gray-500">No. of Suspect</label>
          <select id="suspects" name="suspects" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="suspects" autocomplete="suspects" autofocus>
            <option @disabled(true) @selected(true)>Select No. of Suspects</option>
            <?php
                for ($i=0; $i<=30; $i++)
                {
                    ?>
                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php
                }
            ?>
          </select>
        </div>
        <div class="grow">
          <label for="victims" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-gray-500">No. of Victims</label>
          <select id="victims" name="victims" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="victims" autocomplete="location" autofocus>
            <option @disabled(true) @selected(true)>Select No. of Victims</option>
            <?php
                for ($i=0; $i<=30; $i++)
                {
                    ?>
                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php
                }
            ?>
          </select>
        </div>
      </div>
    </div> 

   {{-- textfield for specific location of the incident --}}
   @error('event')
    <div class="mt-4 "></div>
    <span class="text-red-100 mt-5" role="alert">
      <strong class="text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
    </span>
    @enderror

    <div>
      <label for="event" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-gray-500">Description <span class="text-gray-400">(optional)</span></label>
      <textarea id="event" rows="4" wire:model="event" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description or other details of the incident ..." autocomplete="event"></textarea>
    </div>  
    {{-- end of textfield --}}  

    {{-- upload file --}} 

    @error('files')
      <div class="mt-4 "></div>
      <span class="text-red-100 mt-5" role="alert">
        <strong class="text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
      </span>
    @enderror
    <div class="mb-6 pt-4">
        <label class="mb-5 block text-m font-semibold text-[#07074D]">
          Upload File or use camera
        </label>
      
        <div class="mb-8">
          <input type="file" name="files" wire:model="files" id="files" class="sr-only" >
            <label for="files" class="relative flex min-h-[100px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-5 text-center">
              <div>
                <span class="mb-2 block text-m font-semibold text-[#07074D]">
                  Use Camera
                </span>
                <span class="mb-2 block text-base font-medium text-[#6B7280]">
                  Or
                </span>
                <span class="inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D]">
                  Browse
                </span>
              </div>
            </label>
        </div>
        
        @if ($files)
        <div class="mb-5 rounded-md bg-[#F5F7FB] py-4 px-8">
          <div class="flex items-center justify-between">
            <img src="{{ $files->temporaryUrl() }}" alt="" height="70" class="p-2">
          </div>
          <div class="flex items-center justify-between bg-[#e7e8ea] p-3 rounded-md">
            <span class="truncate pr-3 text-base font-medium text-[#07074D]">
              {{ $files->getClientOriginalName() }}
            </span>
            <button class="text-[#07074D]" id="onclickFile">
              <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.279337 0.279338C0.651787 -0.0931121 1.25565 -0.0931121 1.6281 0.279338L9.72066 8.3719C10.0931 8.74435 10.0931 9.34821 9.72066 9.72066C9.34821 10.0931 8.74435 10.0931 8.3719 9.72066L0.279337 1.6281C-0.0931125 1.25565 -0.0931125 0.651788 0.279337 0.279338Z" fill="currentColor"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.279337 9.72066C-0.0931125 9.34821 -0.0931125 8.74435 0.279337 8.3719L8.3719 0.279338C8.74435 -0.0931127 9.34821 -0.0931123 9.72066 0.279338C10.0931 0.651787 10.0931 1.25565 9.72066 1.6281L1.6281 9.72066C1.25565 10.0931 0.651787 10.0931 0.279337 9.72066Z" fill="currentColor"/>
              </svg>
            </button>
          </div>
        </div>
        @endif
        <script>
          $( "#onclickFile" ).click(function() {
            $files = [];
          });
        </script>

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
        @if(session()->has('message-verify'))

          <div class="bg-gray-800 text-sm text-white rounded-md shadow-lg dark:bg-gray-900 mt-3" id="output" role="alert">
            <div class="flex p-4">
              {{ session()->get('message-verify') }} 
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
          <a href="{{ route('profile.show') }}" type="button" class="inline-block px-6 py-2.5 bg-transparent text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-gray-100 focus:text-blue-700 focus:bg-gray-100 focus:outline-none focus:ring-0 active:bg-gray-200 active:text-blue-800 transition duration-300 ease-in-out mt-4">Veriy Phone number</a>
        @endif
        <script>
          $( "#onClickOutput" ).click(function() {
            $( "#output" ).slideUp();
          });
        </script>
    </div>
    
      <x-slot name="actions">
        <x-jet-button wire:loading.attr="disabled" onclick="return confirm('Confirm Report Incident?');">
            {{ __('Report Incident') }}
        </x-jet-button>   
      </x-slot>
      
  </x-slot>
</x-jet-form-section>