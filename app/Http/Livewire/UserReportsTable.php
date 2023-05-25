<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reports;
use App\Models\User;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class UserReportsTable extends Component
{
    /* public $reports;
    public $incidents;

    public function mount($reports, $incidents)
    {
        $this->reports = $reports;
        $this->incidents =$incidents;
    } */

    public function render(Request $request)
    {   
        $id = $request->id;
        $user = User::where('id', $id)->get();
        $count = Reports::where('userId', $id)->count();

        $reports = Reports::where('userId', $id)
            ->with('reports')
            ->latest()
            ->paginate(5);

        return view('livewire.admin.user-reports-table', compact('reports'));
    }
}
