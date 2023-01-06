<?php

namespace App\Http\Livewire;

use App\Models\Location;
use App\Models\Reports;
use App\Models\User;
use Livewire\Component;

class AdminMainTable extends Component
{

    public $reports;
    public $location;
    public $incidents;

    public function mount($reports, $location, $incidents) 
    {
        $this->reports = $reports;
        $this->location = $location;
        $this->incidents = $incidents;
    }
    

    public function render()
    {
        return view('livewire.admin.admin-main-table');
    }
}
