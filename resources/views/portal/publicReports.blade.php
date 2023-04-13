<x-portal-layout>
    <section class="p-5 top-0 right-0">
      <div class="space-y-2">
        @livewire('portal.reports', ['reports' => $reports, 'count' => $count, 'incidents' => $incidents, 'sum' => $sum])
      </div>
    </section>
</x-portal-layout>