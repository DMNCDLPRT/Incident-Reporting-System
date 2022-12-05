<x-jet-form-section submit="submitForm">
  <x-slot name="title">
      {{ __('Submit a Report') }}
  </x-slot>
  <x-slot name="description">
      {{ __('You can Submit a report here. Just make sure to inclue the specific location, so that our responders can locate the incident quickly') }}
  </x-slot>
  <x-slot name="form">

    {{-- Selection of which type of inccident occurs --}}

    @error('reportType')
      <span class="m" role="alert">
        <strong class="mt-4 text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
      </span>
    @enderror

    <label for="reportType" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select type of Incident</label>
    <select id="reportType" name="reportType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  wire:model="reportType" autocomplete="reportType" autofocus>
        <option disabled selected>Select Type of Incident</option>
        <option name="reportType" value="Traffic Accident">Traffic Accident</option>
        <option name="reportType" value="Fire incident">Fire incident</option>
        <option name="reportType" value="Shooting Incident">Shooting Incident</option>
        <option name="reportType" value="Hacking Incident">Hacking Incident</option>
        <option name="reportType" value="Stabbing Incident">Stabbing Incident</option>
        <option name="reportType" value="Alarm and Scandal">Alarm and Scandal</option>
        <option name="reportType" value="Ambush">Ambush</option>
        <option name="reportType" value="Carnapping/Motornapping">Carnapping/Motornapping</option>
        <option name="reportType" value="Cellphone Snatching">Cellphone Snatching</option>
        <option name="reportType" value="Flood - Natural Disaster">Flood - Natural Disaster</option>
        <option name="reportType" value="Rape Incident">Rape Incident</option>
        <option name="reportType" value="Suicide">Suicide</option>
        <option name="reportType" value="Theft/Robbery">Theft/Robbery</option>
    </select>
    {{-- end of type of incident --}} 

    {{-- Selection of where the incident take place --}}

    @error('location')
    <div class="mt-4"></div>
      <span class="text-red-100 mt-5" role="alert">
        <strong class="text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
      </span>
    @enderror

    <label for="location" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-gray-400">Location/Barangay</label>
    <select id="location" name="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="location" autocomplete="location" autofocus>
        <option disabled selected>Select Location</option>
        <option name="location" value="Cabadiangan">Cabadiangan</option>
        <option name="location" value="Bocboc">Bocboc</option>
        <option name="location" value="Buyot">Buyot</option>
        <option name="location" value="Calaocalao">Calaocalao</option>
        <option name="location" value="Don Carlos Norte">Don Carlos Norte</option>
        <option name="location" value="Embayao">Embayao</option>
        <option name="location" value="Kalubihon">Kalubihon</option>
        <option name="location" value="Kasigkot">Kasigkot</option>
        <option name="location" value="Kawilihan">Kawilihan</option>
        <option name="location" value="Kiara">Kiara</option>
        <option name="location" value="Kibatang">Kibatang</option>
        <option name="location" value="Mahayahay">Mahayahay</option>
        <option name="location" value="Manlamonay">Manlamonay</option>
        <option name="location" value="Maraymaray">Maraymaray</option>
        <option name="location" value="Mauswagon">Mauswagon</option>
        <option name="location" value="Minsalagan">Minsalagan</option>
        <option name="location" value="New Nongnongan - Masimag">New Nongnongan - Masimag</option>
        <option name="location" value="New Visayas">New Visayas</option>
        <option name="location" value="Old Nongnongan">Old Nongnongan</option>
        <option name="location" value="Pinamaloy">Pinamaloy</option>
        <option name="location" value="Don Carlos Sur - Poblacion">Don Carlos Sur - Poblacion</option>
        <option name="location" value="Pualas">Pualas</option>
        <option name="location" value="San Antonio East">San Antonio East</option>
        <option name="location" value="San Antonio West">San Antonio West</option>
        <option name="location" value="San Francisco">San Francisco</option>
        <option name="location" value="San Nicolas - Banban">San Nicolas - Banban</option>
        <option name="location" value="San Roque">San Roque</option>
        <option name="location" value="Sinangguyan">Sinangguyan</option>
        <option name="location" value="Bismartz">Bismartz</option>
    </select>
    {{-- end of selection of location --}}

    {{-- textfield for specific location of the incident --}}
    @error('specificLocation')
      <div class="mt-4 "></div>
      <span class="text-red-100 mt-5" role="alert">
        <strong class="text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
      </span>
    @enderror

    <div>
      <label for="message" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-gray-400">Specific location</label>
      <textarea id="specificLocation" rows="4" wire:model="specificLocation" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="specificLocation" placeholder="Specific location of the incident..." autocomplete="specificLocation"></textarea>

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
        <label class="mb-5 block text-xl font-semibold text-[#07074D]">
          Upload File
        </label>
      
        <div class="mb-8">
          <input type="file" name="files" wire:model="files" id="files" class="sr-only" />
          <label for="files" class="relative flex min-h-[100px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-5 text-center">
            <div>
              <span class="mb-2 block text-xl font-semibold text-[#07074D]">
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
            <span class="truncate pr-3 text-base font-medium text-[#07074D]">
              {{ $files->temporaryUrl() }}
            </span>
            <button class="text-[#07074D]">
              <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.279337 0.279338C0.651787 -0.0931121 1.25565 -0.0931121 1.6281 0.279338L9.72066 8.3719C10.0931 8.74435 10.0931 9.34821 9.72066 9.72066C9.34821 10.0931 8.74435 10.0931 8.3719 9.72066L0.279337 1.6281C-0.0931125 1.25565 -0.0931125 0.651788 0.279337 0.279338Z" fill="currentColor"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.279337 9.72066C-0.0931125 9.34821 -0.0931125 8.74435 0.279337 8.3719L8.3719 0.279338C8.74435 -0.0931127 9.34821 -0.0931123 9.72066 0.279338C10.0931 0.651787 10.0931 1.25565 9.72066 1.6281L1.6281 9.72066C1.25565 10.0931 0.651787 10.0931 0.279337 9.72066Z" fill="currentColor"/>
              </svg>
            </button>
          </div>
        </div>
        @endif
    </div>
      <x-slot name="actions">
        <x-jet-button wire:loading.attr="disabled" onclick="return confirm('Confirm Report Incident?');">
            {{ __('Report Incident') }}
        </x-jet-button>   
      </x-slot>
    {{-- end of upload file --}}
  </x-slot>
</x-jet-form-section>