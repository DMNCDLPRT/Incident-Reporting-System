<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 min-h-screen">
    <h3 class="text-xl h-full leading-none font-bold text-gray-900 mb-10">Types of reports by %</h3>
    <div class="block w-full overflow-x-auto">
       <table class="items-center w-full bg-transparent border-collapse">
          <thead>
             <tr>
                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Reports</th>
                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">#of Reports</th>
                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">% by Reports</th>
             </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            @php($i = 0)
            @forelse (array_unique($incidents) as $incident)
               <tr class="text-gray-600">
                  <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $incident[0]->report_name }}</th>
                  <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ $count[$i] }}</td>
                  <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                     <div class="flex items-center">
                        <span class="mr-2 text-xs font-medium">{{ $count[$i] / $sum * 100 }}</span>
                        <div class="relative w-full">
                           <div class="w-full bg-gray-200 rounded-sm h-2">
                              <div class="bg-cyan-600 h-2 rounded-sm" style="width: {{ $count[$i] / $sum * 100 }}%"></div>
                           </div>
                        </div>
                     </div>
                  </td>
            </tr>
            @php($i = $i + 1)
            @empty
               <tr>
                  <td>
                     There Are no reports yet
                  </td>
               </tr>
            @endforelse
          </tbody>
       </table>
    </div>
  </div>
  