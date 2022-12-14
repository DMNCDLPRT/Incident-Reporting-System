<?php

namespace App\Http\Livewire;

use App\Models\cellNumber;
use Livewire\Component;

class NumbersDepartmet extends Component
{
    public $department_id;

    public $number;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string,mixed>
     */
    public function rules()
    {
        return [
            'number' => 'required|max:11',
            'department_id' => 'required'
        ]; 
    }
    
    public function addCellNum()
    {

        $addcellnum = $this->validate();
        $addcellnum['departments_id'] = $this->department_id;

        cellNumber::create($addcellnum); 

        session()->flash('message', 'Cellphone number successfuly added');
    }

    public $numbers;

    public $assigned;

    public function mount($numbers, $assigned) 
    {
        $this->report = $numbers;
        $this->assigned = $assigned;
    }

    public function render()
    {
        return view('livewire.admin.numbers-departmet');
    }
}
