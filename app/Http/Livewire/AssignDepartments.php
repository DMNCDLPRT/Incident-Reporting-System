<?php

namespace App\Http\Livewire;

use App\Models\AssignedDepartment;
use App\Models\Departments;
use Livewire\Component;
use stdClass;

class AssignDepartments extends Component
{
    public $department_id;
    public $incidents_id = [];

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string,mixed>
    */
    public function rules()
    {
        return [
            'department_id' => 'required',
            'incidents_id' => 'required|array'
        ]; 
    }
    

    public function addDepartment()
    {
        $validated = $this->validate();
        foreach($validated['incidents_id'] as $incident){

            AssignedDepartment::create([
                'departments_id' => $this->department_id,
                'incidents_id' => $incident,
                'department_id' => $this->department_id
            ]); 
        }

        session()->flash('message', 'Department successfuly assigned to incidents');
        return $incidents_id = "";
    }

    public $numbers;
    public $incidents;

    public function mount($numbers, $incidents) 
    {
        $this->numbers = $numbers;
        $this->incidents = $incidents;
    }

    public function render()
    {
        return view('livewire.admin.assign-departments');
    }
}
