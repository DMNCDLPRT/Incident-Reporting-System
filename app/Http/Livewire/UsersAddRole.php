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
                ->paginate(10);     

                //dd($users);

        return $users;
    }

    public function render()
    {
        $users = User::latest()->paginate(10);
        
        $query = new UsersAddRole();
        $query->search();

        // dd($query->search());
        if($query != null) {
            $users = $query->search();
        }

        return view('livewire.admin.users-add-role', ['users' => $users]);
    }
}
