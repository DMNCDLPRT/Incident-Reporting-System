<x-portal-layout>
  <div class="rounded-b-lg mb-10 p-4">
    <div class="mb-4 text-center"> 
      <h1 class="text-3xl font-semibold">Don Carlos Incident Reporting System</h1>
    </div>
    <div class="space-y-2 text-center px-5">
      <span class="activity-header">The Don Carlos Incident Report System is a system for recording, documenting, and managing incidents that occur within Don Carlos, Bukidnon. This system is designed to provide a consistent and structured approach to incident reporting, and implement corrective actions to prevent future incidents from occurring. The Don Carlos Incident Report System may be used in a variety of settings, including healthcare facilities, and government agencies. It is an important tool for promoting safety, quality, and continuous improvement within the organization.</span>
    </div>
  </div>
  <section class="p-5 top-0 right-0">
    <div class="space-y-2">
        @livewire('portal.submit-report', ['incidents' => $incidents, 'locations' => $locations])
    </div>
  </section>
  <div class="sticky bottom-0 w-full rounded-t-xl bg-white px-5 py-2 shadow-sm shadow-gray-300">
</x-portal-layout>