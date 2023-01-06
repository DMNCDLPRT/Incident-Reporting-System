<x-portal-layout>
  <div class="rounded-b-lg mb-10 p-4">
    <div class="mb-4 text-center"> 
      <h1 class="text-3xl font-semibold">Don Carlos Incident Report System</h1>
    </div>
    <div class="space-y-2 text-center">
      <span class="activity-header">Report an incident through this web application. When you report an incident the assgined responders/department will we be notified through text message. Your Report will be collected.</span>
    </div>
  </div>
  <section class="p-5 top-0 right-0">
    <div class="space-y-2">
        @livewire('portal.submit-report', ['incidents' => $incidents, 'locations' => $locations])
    </div>
  </section>
  <div class="sticky bottom-0 w-full rounded-t-xl bg-white px-5 py-2 shadow-sm shadow-gray-300">
</x-portal-layout>