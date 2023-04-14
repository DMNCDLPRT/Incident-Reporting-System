<x-portal-layout>
  <div style="background: linear-gradient(199deg, rgb(255 255 255 / 68%) 32%, rgb(22 135 79 / 66%) 76%);">
    <div class="rounded-b-lg mb-10 p-4">
      <div class="mb-4 text-center"> 
        <h1 class="text-3xl font-semibold">Incident Reporting System</h1>
      </div>
      <div class="space-y-2 text-center px-5">
        <span class="activity-header">This Incident Report System is a system for recording, documenting, and managing incidents that occur within Don Carlos, Bukidnon. This system is designed to provide a consistent and structured approach to incident reporting, and implement corrective actions to prevent future incidents from occurring. It is an important tool for promoting safety, quality, and continuous improvement within Don Carlos, Bukindnon.</span>
      </div>
    </div>
    <section class="p-5 top-0 right-0">
      <div class="space-y-2">
        @livewire('portal.submit-report', ['incidents' => $incidents, 'locations' => $locations])
      </div>
    </section>
  </div>
</x-portal-layout>