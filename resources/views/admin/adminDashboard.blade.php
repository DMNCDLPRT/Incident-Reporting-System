<x-app-layout>
   <div class="flex overflow-hidden dark:bg-gray-900">
      @livewire('admin-side-panel')
      <div id="main-content" class="h-full w-full overflow-y-auto lg:ml-64">
         <main>
         <div class="pt-6 px-4">
            <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
               @livewire('admin-reports-this-day', ['reports' => $reports])
               @livewire('admin-reports-this-week', ['reports' => $reports])
               @livewire('admin-responds-this-month', ['reports' => $reports])
            </div>
            <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">
               <div>
                  @livewire('admin-latest-reports', ['reports' => $reports])
                  @livewire('department-chart', ['departments' => $departments, 'count' => $count, 'sum' => $sum])
               </div>
               @livewire('admin-types-of-report-by-percent', ['count' => $count, 'incident' => $incident, 'sum' => $sum])
            </div>
         </div>
         @livewire('admin-main-table', ['reports' => $reports, 'location' => $location, 'incidents' => $incidents])
      </main>
      @livewire('footer')
   </div>
</x-app-layout>