<?php

namespace App\Http\Livewire;

use App\Models\AssignedDepartment;
use App\Models\Departments;
use Livewire\Component;

class ViewDepartment extends Component {
    public $numbers;
    public $incidents;
    public $cell;

    public $incident = [];

    public function EditAssign($incident) {

        dd($incident);
        foreach ($incident as $inci) {
            AssignDepartments::destroy($inci);
        }
        
    }

    public function mount($numbers, $incidents, $cell){
        $this->numbers = $numbers;
        $this->incidents = $incidents;
        $this->cell = $cell;
    }

    public function render()
    {
        return view('livewire.admin.view-department');
    }
}
