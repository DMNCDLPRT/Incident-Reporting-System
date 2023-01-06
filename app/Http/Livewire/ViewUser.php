<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ViewUser extends Component
{

    public $user;
    public $count;


    public function mount($user, $count)
    {
        $this->user = $user;
        $this->count = $count;
    }

    public function render()
    {
        return view('livewire.admin.view-user');
    }
}
