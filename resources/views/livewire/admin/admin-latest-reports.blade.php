<div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
   <div class="flex items-center justify-between mb-4">
      <h3 class="text-xl font-bold leading-none text-gray-900">Latest Report</h3>
      <a href="#Reports" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
      View all
      </a>
   </div>
   <div class="flow-root">
       @forelse ($reports as $report)
       <ul role="list" class="divide-y divide-gray-200">
          <li class="py-3 sm:py-4">
             <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                  {{-- <img src="{{ auth()->profile_photo_url }}" alt="{{ auth()->name }}" class="mx-auto rounded-full h-20 w-20 object-cover"> --}}
                  
                <div class="flex-1 min-w-0">
                   <p class="text-sm font-medium text-gray-900 truncate">
                      {{ $report->id }}
                      <p class="text-xs font-semibold text-gray-500">{{$report->created_at->diffForHumans()}}</p>
                   </p>
                   <p class="text-sm text-gray-500 truncate">
                      <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="17727a767e7b57607e7973646372653974787a">{{ $report->reported_on }}</a>
                   </p>
                </div>
             </div>
          </li>
       </ul>
       @empty
       <tr>
           <td>
               There Are no reports yet
           </td>
       </tr>
       @endforelse
   </div>
</div>

