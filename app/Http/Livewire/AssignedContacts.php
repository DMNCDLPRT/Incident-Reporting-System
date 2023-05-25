<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\cellNumber;

class AssignedContacts extends Component
{
    public $cell;
    
    public function mount($cell)
    {
        $this->cell = $cell;
    }
    
    public $contact_ids = [];

    public function deleteAssignedContacts()
    {
        cellNumber::whereIn('id', $this->contact_ids)->delete();
        $this->reset(['contact_ids']);
        session()->flash('message_contact', 'The assigned emergency contact numbers have been successfully removed.');
    }

    public function render()
    {
        return view('livewire.admin.assigned-contacts');
    }
}


