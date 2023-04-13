<x-app-layout>
   <div class="flex overflow-hidde" style="background: linear-gradient(196deg, rgba(22,28,30,1) 0%, rgba(20, 142, 160, 0.88) 92%);">
      @livewire('admin-side-panel')
      <div id="main-content" class="h-full w-full overflow-y-auto lg:ml-64">
         <main>
            <div class="px-4">
               {{-- <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                  @livewire('admin-reports-this-day', ['reports' => $reports])
                  @livewire('admin-reports-this-week', ['reports' => $reports])
                  @livewire('admin-responds-this-month', ['reports' => $reports])
               </div> --}}
               @livewire('admin-main-table', ['reports' => $reports, 'location' => $location, 'incidents' => $incidents])
            </div>
            <div class="px-4">
               <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-4">
                  @livewire('admin-latest-reports', ['reports' => $reports])
                  @livewire('department-chart', ['departments' => $departments, 'count' => $count, 'sum' => $sum])
               </div>
               <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-4">
                  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                     @livewire('admin-reports-this-day', ['reports' => $reports])
                     @livewire('admin-reports-this-week', ['reports' => $reports])
                     @livewire('admin-responds-this-month', ['reports' => $reports])
                  </div>
                  @livewire('admin-types-of-report-by-percent', ['count' => $count, 'incident' => $incident, 'sum' => $sum])
                  {{-- @livewire('reports-in-every-location', ['count' => $count, 'incident' => $incident, 'sum' => $sum]) --}}
               </div>
            </div>
         </main>
         @livewire('footer')
      </div>
   </div>
</x-app-layout>