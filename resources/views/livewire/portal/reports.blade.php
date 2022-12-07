<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
    <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Types of reports by %</h3>
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
            @forelse ($reports as $report)
               <tr class="text-gray-500">
                  <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $report->report_id }}</th>
                  <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ $report->report_name }}</td>
                  <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                     <div class="flex items-center">
                        <span class="mr-2 text-xs font-medium">30%</span>
                        <div class="relative w-full">
                           <div class="w-full bg-gray-200 rounded-sm h-2">
                              <div class="bg-cyan-600 h-2 rounded-sm" style="width: 30%"></div>
                           </div>
                        </div>
                     </div>
                  </td>
            </tr>
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
  