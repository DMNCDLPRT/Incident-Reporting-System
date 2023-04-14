<section class="p-5">
    <div class="mb-3 mt-5 flex items-center justify-between">
      <h3 class="font-medium text-slate-500">Departments</h3>
    </div>
    <div class="space-y-2">

      {{-- Police --}}
      <div class="flex space-x-4 rounded-xl bg-white p-3 shadow-sm">
        <img class="aspect-square w-16 rounded-lg bg-center object-scale-down" src="{{ asset('images/Philippine_National_Police_seal.svg') }}" alt="" />
        <div>
          <h4 class="font-semibold text-gray-600">Police</h4>
          <p class="text-sm text-slate-400">Report any crime happening in your area</p>
        </div>
        <div>
        </div>
      </div>
      {{-- End of Police --}}

      {{-- Health  --}}
      <div type="button" data-modal-toggle="default-modal">

        <div class="flex space-x-4 rounded-xl bg-white p-3 shadow-sm" type="button" data-modal-toggle="default-modal">
          <img class="aspect-square w-16 rounded-lg bg-center object-scale-down" src="{{ asset('images/Www.philhealth.gov.ph.png') }}" alt="" />
          <div>
            <h4 class="font-semibold text-gray-600">Health</h4>
            <p class="text-sm text-slate-400">Request Assistance to nearest health emergencies</p>
          </div>
          <div>
          </div>
        </div>
      </div>
      <div id="default-modal" data-modal-show="true" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <!-- Modal content -->
            <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                        Terms of Service
                    </h3>
                    <button type="button" class="text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="default-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <p class="text-gray-600 text-base leading-relaxed dark:text-gray-500">
                        With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                    </p>
                    <p class="text-gray-600 text-base leading-relaxed dark:text-gray-500">
                        The European Union's General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex space-x-2 items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-toggle="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-emerald-400dark:focus:ring-blue-800">I accept</button>
                    <button data-modal-toggle="default-modal" type="button" class="text-gray-600 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Decline</button>
                </div>
            </div>
        </div>
      </div>
      {{-- End of Health --}}

      {{-- Fire --}}
      <div class="flex space-x-4 rounded-xl bg-white p-3 shadow-sm">
        <img class="aspect-square w-16 rounded-lg bg-center object-scale-down" src="{{ asset('images/Bureau_of_Fire_Protection.png') }}" alt="" />
        <div>
          <h4 class="font-semibold text-gray-600">Fire</h4>
          <p class="text-sm text-slate-400">Request assistance to the nearests fire department</p>
        </div>
        <div>
        </div>
      </div>
      {{-- End of Fire --}}

      {{-- NDRRMC --}}
      <div class="flex space-x-4 rounded-xl bg-white p-3 shadow-sm">
        <img class="aspect-square w-16 rounded-lg bg-center object-scale-down" src="{{ asset('images/NDRRMC_logo.svg') }}" alt="" />
        <div>
          <h4 class="font-semibold text-gray-600">NDRRMC</h4>
          <p class="text-sm text-slate-400">The council is responsible for ensuring the protection and welfare of the people during disasters or emergencies.</p>
        </div>
        <div>
        </div>
      </div>
    </div>
    {{-- End of NDRRMC --}}
  </section>