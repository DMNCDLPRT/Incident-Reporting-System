<h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Department - {{ $numbers->department->department }}</h3>
<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
    <table class="items-center w-full bg-transparent border-collapse">
        <thead>
            <tr>
                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Department</th>
                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Contact #</th>
                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Assigned Incident</th>
            </tr>
        </thead>
        <tbody lass="divide-y divide-gray-100">
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">{{ $numbers->department->department }}</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">{{ $numbers->number }} <br></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">@php($i = 0)
                        @foreach ($incidents as $incident)
                        <a class="hover:underline">{{ $incident[$i]->report_name }} | </a>
                        @php($i + 1)
                        @endforeach 
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    
</div>
