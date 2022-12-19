<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminMainTable extends Component
{

    public $reports;
    public $location;
    public $incidents;

    public function mount($reports, $location, $incidents) 
    {
        $this->report = $reports;
        $this->location = $location;
        $this->incidents = $incidents;
    }
    

    public function render()
    {
        return view('livewire.admin.admin-main-table');
    }
}
