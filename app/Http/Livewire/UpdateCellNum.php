<?php

namespace App\Http\Livewire;

use App\Models\cellNumber;
use Livewire\Component;

class UpdateCellNum extends Component
{
    public $department;

    public $number;

    public $numbers;

    public function mount($numbers) 
    {
        $this->report = $numbers;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string,mixed>
     */
    public function rules()
    {
        return [
            'department' => 'required|unique:cell_numbers',
            'number' => 'required|max:11'
        ]; 
    }

    public function updateCellNum()
    {

        $addcellnum = $this->validate();

        $edit = cellNumber::find($this->numbers->id);

        $edit->update($addcellnum);
        
        return redirect(route('admin'))->with('updated', 'cellphone number successfully updated');
    }

    public function render()
    {
        return view('livewire.admin.update-cell-num');
    }
}
