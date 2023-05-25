<?php

namespace App\Http\Livewire\Portal;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Reports;
use Illuminate\Support\Facades\DB as FacadesDB;

class Table extends Component
{
    use WithPagination;

    public function render()
    {
        $user = auth()->user();

        $reports = Reports::where('userId', $user->id)
            ->with('reports')
            ->latest()
            ->paginate(5);

        return view('livewire.portal.table', compact('reports'));
    }
}
