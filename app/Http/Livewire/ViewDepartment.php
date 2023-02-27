<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ViewDepartment extends Component {

    public $incident_id = [];

    public $contact_id = [];

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string,mixed>
    */
    public function incident_rules()
    {
        return[
            'incident_id' => 'required'
        ];
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string,mixed>
    */
    public function contact_rules()
    {
        return[
            'contact_id' => 'required'
        ];
    }

    public function delete_assigned_incidents() 
    {
        // dd($contact_id);
        $validated = $this->validate();
        
        foreach ($validated['incident_id'] as $incident) {
            AssignDepartments::destroy($incident);
        }
       
        $this->reset('incident_id');
        session()->flash('message', 'The assigned incidents are succesfully removed');
    }

    public function delete_assigned_contact() 
    {
        dd('hehehehehe');
        $validated = $this->validate();
        
        foreach ($validated['incident_id'] as $incident) {
            AssignDepartments::destroy($incident);
        }
       
        $this->reset('incident_id');
        session()->flash('message', 'The assigned incidents are succesfully removed');
    }

    public $numbers;
    public $cell;
    public $incidents;

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
