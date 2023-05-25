<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AssignedDepartment;

class AssignedDepartments extends Component
{
    public $incidents;
    public $assigns;
    public $values;

    public function mount($incidents, $assigns, $values)
    {
        $this->incidents = $incidents;
        $this->assigns = $assigns;
        $this->values = $values;
    }
    
    public $incident_ids = [];

    public function deleteAssignedIncidents()
    {
        AssignedDepartment::whereIn('id', $this->incident_ids)->delete();
        $this->reset(['incident_ids']);
        session()->flash('message_incident', 'The assigned incidents have been successfully removed.');
    }

    public function render()
    {
        return view('livewire.admin.assigned-departments');
    }
}
