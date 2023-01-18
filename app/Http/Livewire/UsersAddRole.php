<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class UsersAddRole extends Component
{
    use WithPagination;
    public $query;

    public function search()
    {
        $users = User::where('name', 'like', "%{$this->query}%")
                            ->orWhere('email', 'like', "%{$this->query}%")
                            ->orWhere('id', 'like', "%{$this->query}%")
                            ->latest()
                            ->paginate(5);

        return view('livewire.admin.users-add-role', ['users' => $users]);              
    }

    public function render()
    {
        if($this->query == null){
            $users = User::latest()->paginate(5);
            return view('livewire.admin.users-add-role', ['users' => $users]);
        }

        $query = new UsersAddRole();
        return $query->search();
    }
}
