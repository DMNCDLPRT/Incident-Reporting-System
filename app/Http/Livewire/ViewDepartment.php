<?php

namespace App\Http\Livewire;

use App\Models\AssignedDepartment;
use App\Models\CellNumber;
use Livewire\Component;

class ViewDepartment extends Component
{
    public $incident_ids = [];
    public $contact_ids = [];

    public $numbers;
    public $cell;
    public $incidents;

    public function mount($numbers, $incidents, $cell)
    {
        $this->numbers = $numbers;
        $this->incidents = $incidents;
        $this->cell = $cell;
    }

    public function deleteAssignedIncidents()
    {
        dd("assigned incidents");
        AssignedDepartment::whereIn('id', $this->incident_ids)->delete();
        $this->reset(['incident_ids']);
        session()->flash('message', 'The assigned incidents have been successfully removed.');
    }

    public function deleteAssignedContacts()
    {
        dd("contacts");
        CellNumber::whereIn('id', $this->contact_ids)->delete();
        $this->reset(['contact_ids']);
        session()->flash('message', 'The assigned emergency contact numbers have been successfully removed.');
    }

    public function render()
    {
        return view('livewire.admin.view-department');
    }
}
