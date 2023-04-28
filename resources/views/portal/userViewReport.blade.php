<x-portal-layout>
    <section class="p-5 top-0 right-0">
      <div class="space-y-2">
        @livewire('portal.user-view-report', ['report' => $report, 'incident' => $incident, 'reporter' => $reporter])
      </div>
    </section>
</x-portal-layout>