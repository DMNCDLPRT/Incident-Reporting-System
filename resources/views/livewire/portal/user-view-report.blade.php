
<div class="bg-white p-8 rounded-md w-full">
    <h3 class="text-xl h-full leading-none font-bold text-gray-900 mb-10">Your Report</h3>
    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
        <div class="block w-full overflow-x-auto">
            <div class="mb-5 rounded-md bg-[#F5F7FB] py-4 px-8">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                    <h4 class="text-xl text-gray-900 font-bold">Incident Report Info</h4>
                    <div class="flex ">
                        <p class="text-gray-600 text-sm pr-2">
                            {{ $report->created_at->diffForHumans() }} |
                        </p>
                        <p class="text-{{$report->status_color}}-500 text-sm pr-2">
                            {{ $report->status }}
                        </p>
                    </div>
                    <ul class="mt-4 text-gray-700">
                        <li class="flex border-y py-2 hover:bg-slate-100">
                            <span class="font-bold w-48">Report ID:</span>
                            <span class="text-gray-700">{{ $report->id}}</span>
                        </li>
                        <li class="flex border-b py-2 hover:bg-slate-100">
                            <span class="font-bold w-48">Reported by:</span>
                            <span class="text-gray-700">{{ $reporter[0]->name }}</span>
                        </li>
                        <li class="flex border-b py-2 hover:bg-slate-100">
                            <span class="font-bold w-48">Type of Incident:</span>
                            <span class="text-gray-700">{{ $incident[0]->report_name }}</span>
                        </li>
                        <li class="flex border-b py-2 hover:bg-slate-100">
                            <span class="font-bold w-48">Description:</span>
                            <span class="text-gray-700">{{ $report->description }}</span>
                        </li>
                        <li class="flex border-b py-2 hover:bg-slate-100">
                            <span class="font-bold w-48">Date:</span>
                            <span class="text-gray-700">{{$report->created_at->format('d/m/Y') }}</span>
                        </li>
                    </ul>
                </div>
                <div class="flex justify-center">
                    <div class="mt-8">
                        <img src="{{ asset('storage/reports/'. $report->files) }}" alt="{{ $report->files }}">
                        <div class="flex items-center justify-between bg-[#e7e8ea] p-3 rounded-md mt-4">
                            <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                {{ $report->files }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
