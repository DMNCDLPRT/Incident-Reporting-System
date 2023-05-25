<x-portal-layout>
    <section class="p-5 top-0 right-0">
      <div class="space-y-2">
        @livewire('portal.user-profile', ['user' => $user, 'reports' => $reports])
      </div>
      <div class="space-y-2">
        @livewire('portal.table', ['user' => $user, 'reports' => $reports, 'location' => $location, 'incidents' => $incidents])
      </div>
    </section>
</x-portal-layout>