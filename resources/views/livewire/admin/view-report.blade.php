<div class="bg-white p-8 rounded-md w-full">
    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
        
        <div class="block w-full overflow-x-auto">
            <x-jet-action-section>
                <x-slot name="title">
                    {{ __('View Report') }}
                </x-slot>
            
                <x-slot name="description">
                    {{ __('This Report was reported on') }}
                </x-slot>
            
                <x-slot name="content">
                   <div class="mb-5 rounded-md bg-[#F5F7FB] py-4 px-8">
                    <div class="items-center ">
                      <img src="{{ asset('storage/images/quick-reponse-logo-nb.png') }}" alt="" class="p-2">
                      <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                        {{ $report[0]->files }}
                      </span>
                      <button class="text-[#07074D]">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M0.279337 0.279338C0.651787 -0.0931121 1.25565 -0.0931121 1.6281 0.279338L9.72066 8.3719C10.0931 8.74435 10.0931 9.34821 9.72066 9.72066C9.34821 10.0931 8.74435 10.0931 8.3719 9.72066L0.279337 1.6281C-0.0931125 1.25565 -0.0931125 0.651788 0.279337 0.279338Z" fill="currentColor"/>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M0.279337 9.72066C-0.0931125 9.34821 -0.0931125 8.74435 0.279337 8.3719L8.3719 0.279338C8.74435 -0.0931127 9.34821 -0.0931123 9.72066 0.279338C10.0931 0.651787 10.0931 1.25565 9.72066 1.6281L1.6281 9.72066C1.25565 10.0931 0.651787 10.0931 0.279337 9.72066Z" fill="currentColor"/>
                        </svg>
                      </button>
                    </div>
                  </div>
                </x-slot>
            </x-jet-action-section>
        </div>
    </div>
</div>
