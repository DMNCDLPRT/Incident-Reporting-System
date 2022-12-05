<?php

namespace App\Http\Livewire\Portal;

use Livewire\Component;

class Table extends Component
{
    public $data;
    
    public function mount($data) 
    {
        $this->user = $data;
    }

    public function render()
    {
        return view('livewire.portal.table');
    }
}
