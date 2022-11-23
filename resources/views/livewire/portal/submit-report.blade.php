<x-jet-form-section submit="submitForm">
  <x-slot name="title">
      {{ __('Submit a Report') }}
  </x-slot>
  <x-slot name="description">
      {{ __('You can Submit a report here. Just make sure to inclue the specific location, so that our responders can locate the incident quickly') }}
  </x-slot>
  <x-slot name="form">
    {{-- Selection of which type of inccident occurs --}}
    <label for="incidentType" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select type of Incident</label>
    <select id="incidentType" wire.model="reportType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option disabled>Select Type of Incident</option>
        <option value="Traffic Accident">Traffic Accident</option>
        <option value="Fire incident">Fire incident</option>
        <option value="Shooting Incident">Shooting Incident</option>
        <option value="Hacking Incident">Hacking Incident</option>
        <option value="Stabbing Incident">Stabbing Incident</option>
        <option value="Alarm and Scandal">Alarm and Scandal</option>
        <option value="Ambush">Ambush</option>
        <option value="Carnapping/Motornapping">Carnapping/Motornapping</option>
        <option value="Cellphone Snatching">Cellphone Snatching</option>
        <option value="Flood - Natural Disaster">Flood - Natural Disaster</option>
        <option value="Rape Incident">Rape Incident</option>
        <option value="Suicide">Suicide</option>
        <option value="Theft/Robbery">Theft/Robbery</option>
    </select>
    {{-- end of type of incident --
    {{-- Selection of where the incident take place --}}
    <label for="location" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-gray-400">Location/Barangay</label>
    <select id="location" wire.model="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option disabled>Select Location</option>
        <option value="Cabadiangan">Cabadiangan</option>
        <option value="Bocboc">Bocboc</option>
        <option value="Buyot">Buyot</option>
        <option value="Calaocalao">Calaocalao</option>
        <option value="Don Carlos Norte">Don Carlos Norte</option>
        <option value="Embayao">Embayao</option>
        <option value="Kalubihon">Kalubihon</option>
        <option value="Kasigkot">Kasigkot</option>
        <option value="Kawilihan">Kawilihan</option>
        <option value="Kiara">Kiara</option>
        <option value="Kibatang">Kibatang</option>
        <option value="Mahayahay">Mahayahay</option>
        <option value="Manlamonay">Manlamonay</option>
        <option value="Maraymaray">Maraymaray</option>
        <option value="Mauswagon">Mauswagon</option>
        <option value="Minsalagan">Minsalagan</option>
        <option value="New Nongnongan - Masimag">New Nongnongan - Masimag</option>
        <option value="New Visayas">New Visayas</option>
        <option value="Old Nongnongan">Old Nongnongan</option>
        <option value="Pinamaloy">Pinamaloy</option>
        <option value="Don Carlos Sur - Poblacion">Don Carlos Sur - Poblacion</option>
        <option value="Pualas">Pualas</option>
        <option value="San Antonio East">San Antonio East</option>
        <option value="San Antonio West">San Antonio West</option>
        <option value="San Francisco">San Francisco</option>
        <option value="San Nicolas - Banban">San Nicolas - Banban</option>
        <option value="San Roque">San Roque</option>
        <option value="Sinangguyan">Sinangguyan</option>
        <option value="Bismartz">Bismartz</option>
    </select>
    {{-- end of selection of location --}}

    {{-- textfield for specific location of the incident --}}
    <div>
      <label for="message" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-gray-400">Specific location</label>
      <textarea id="message" rows="4" wire.type="specificLocation" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Specific location of the incident..."></textarea>
    </div>  
    {{-- end of textfield --}}  

    {{-- upload file --}} 
    <div class="mb-6 pt-4">
        <label class="mb-5 block text-xl font-semibold text-[#07074D]">
          Upload File
        </label>
      
        <div class="mb-8">
          <input type="file" name="file" wire.model="file" id="file" class="sr-only" />
          <label for="file" class="relative flex min-h-[100px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-5 text-center">
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
        @error('photo') <span class="error">{{ $message }}</span> @enderror 
        {{-- <div wire:loading wire:taget="file" wire:key="file">  
          <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
          Uploading...
        </div> --}} 
        @if ($file)
        <div class="mb-5 rounded-md bg-[#F5F7FB] py-4 px-8">
          <div class="flex items-center justify-between">
            <img src="{{ $file->temporaryUrl() }}" alt="" height="70" class="p-2">
            <span class="truncate pr-3 text-base font-medium text-[#07074D]">
              {{ $file->temporaryUrl() }}
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
    {{-- end of upload file --}}
  </x-slot>

  <x-slot name="actions">
      <x-jet-button wire:loading >
          {{ __('Report incident') }}
      </x-jet-button>
  </x-slot>

</x-jet-form-section>