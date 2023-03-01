<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
class UsersAddRole extends Component
{

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
