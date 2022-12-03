<x-portal-layout>
  <div class="rounded-b-lg bg-red-600 p-5 pb-20 text-white">
    <div class="mb-4 text-center"> 
      <h1 class="text-3xl font-semibold">Don Carlos Quick Response</h1>
    </div>
    <div class="space-y-2 text-center">
        <div class="text-2xl font-bold tracking-wider">
          Push SOS for Rescue
        </div>
        <div class="text-slate-200">
            <span class="activity-header">Report an incident through this web application. When you reporting an incident the assgined responders/department will we be notified.</span>
        </div>
    </div>
  </div>
  <section class="p-5 top-0 right-0">
    <div class="mb-3 mt-5 flex items-center justify-between">
      <h3 class="font-medium text-slate-500">Report Incident</h3>
    </div>
    <div class="space-y-2">
        @livewire('portal.submit-report')
    </div>
  </section>
  <div class="sticky bottom-0 w-full rounded-t-xl bg-white px-5 py-2 shadow-sm shadow-gray-300">
</x-portal-layout>