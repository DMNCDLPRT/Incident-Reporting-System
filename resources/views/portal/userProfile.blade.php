<x-portal-layout>
    <section class="p-5 top-0 right-0">
      <div class="space-y-2">
        @livewire('portal.user-profile', ['data' => $data])
      </div>
      <div class="space-y-2">
        @livewire('portal.table', ['data' => $data])
      </div>
    </section>
    <div class="sticky bottom-0 w-full rounded-t-xl bg-white px-5 py-2 shadow-sm shadow-gray-300">
</x-portal-layout>