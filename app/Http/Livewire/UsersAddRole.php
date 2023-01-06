<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;


class UsersAddRole extends Component
{

    public $users;

    public $query;

    public function search()
    {
        $this->users = User::where('name', 'like', "%{$this->query}%")
                            ->orWhere('email', 'like', "%{$this->query}%")
                            ->orWhere('id', 'like', "%{$this->query}%")
                            ->get();
    }

    public function render()
    {
        return view('livewire.admin.users-add-role');
    }
}
