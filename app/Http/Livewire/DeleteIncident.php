<?php

namespace App\Http\Livewire;

use App\Models\ReportType;
use Livewire\Component;

class DeleteIncident extends Component
{
    public $incidents;

    public function mount($incidents)
    {
        $this->incidents = $incidents;
    }

    public $incident_ids = [];

    public function deleteIncident()
    {
        ReportType::whereIn('id', $this->incident_ids)->delete();
        $this->reset(['incident_ids']);
        session()->flash('message_contact', 'Incidents have been successfully removed.');
    }

    public function render()
    {
        return view('livewire.admin.delete-incident');
    }
}
