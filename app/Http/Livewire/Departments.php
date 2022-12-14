<?php

namespace App\Http\Livewire;

use App\Models\Departments as ModelsDepartments;
use Livewire\Component;

class Departments extends Component
{

    public $department;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string,mixed>
     */
    public function rules()
    {
        return [
            'department' => 'required|unique:departments',
        ]; 
    }


    public function addDepartment()
    {
        $validated = $this->validate();
        $validated['departments_id'] = null;

        ModelsDepartments::create([
            'department' => $validated['department'],
            'departments_id' => $validated['departments_id']
        ]); 

        session()->flash('message-department', 'Emergency Department successfuly added');
    }

    public function render()
    {
        return view('livewire.admin.departments');
    }
}
