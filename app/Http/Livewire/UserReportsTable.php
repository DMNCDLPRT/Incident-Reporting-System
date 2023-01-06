<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserReportsTable extends Component
{
    public $reports;
    public $location;
    public $incidents;

    public function mount($reports, $location, $incidents)
    {
        $this->reports = $reports;
        $this->location = $location;
        $this->incidents =$incidents;
    }

    public function render()
    {
        return view('livewire.admin.user-reports-table');
    }
}
