<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ViewDepartment extends Component
{
    public $numbers;
    public $incidents;

    public function mount($numbers, $incidents){
        $this->numbers = $numbers;
        $this->incidents = $incidents;
    }

    public function render()
    {
        return view('livewire.admin.view-department');
    }
}
