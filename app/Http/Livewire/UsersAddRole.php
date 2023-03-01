<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
class UsersAddRole extends Component
{
/*     use WithPagination;
    public $query = '';

    public function search()
    {
        $users = User::query()
            ->when($this->query, function ($query) {
                $query->where('name', 'like', '%' . $this->query . '%')
                    ->orWhere('email', 'like', '%' . $this->query . '%')
                    ->orWhere('id', 'like', '%' . $this->query . '%');
            })
            ->latest()
            ->paginate(10);  

                //dd($users);

        return $users;
    }

    public function render()
    {        
        $query = new UsersAddRole();
        $query->search();

        if($query != null) {
            $users = $query->search();
            return view('livewire.admin.users-add-role', ['users' => $users]);
        }

        $users = User::latest()->paginate(10);

        return view('livewire.admin.users-add-role', ['users' => $users]);
    } */

    use WithPagination;

    public $search = '';

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('id', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        if(!$users) {
            session()->flash('message', 'No User found');
        }
        return view('livewire.admin.users-add-role', compact('users'));
    }
}
