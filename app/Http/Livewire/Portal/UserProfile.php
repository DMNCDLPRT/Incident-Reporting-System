<?php

namespace App\Http\Livewire\Portal;

use Livewire\Component;

class UserProfile extends Component
{
    public $user;
    public $reports;
    
    public function mount($user, $reports) 
    {
        $this->user = $user;
        $this->reports = $reports;
    }

    public function render()
    {
        return view('livewire.portal.user-profile');
    }
}
