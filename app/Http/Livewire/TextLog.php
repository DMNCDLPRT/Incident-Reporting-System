<?php

namespace App\Http\Livewire;

use App\Models\TextLog as Log;
use Livewire\Component;
use Livewire\WithPagination;

class TextLog extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $textlogs = Log::with(['department', 'cell'])
            ->when($this->search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('log', 'like', '%'.$search.'%')
                          ->orwhere('id', 'like', '%'.$search.'%')
                          ->orWhereHas('department', function ($query) use ($search) {
                              $query->where('department', 'like', '%'.$search.'%');
                          })
                          ->orWhereHas('cell', function ($query) use ($search) {
                              $query->where('number', 'like', '%'.$search.'%');
                          });
                });
            })
            ->latest()
            ->paginate(15);

        return view('livewire.admin.text-log', [
            'textlogs' => $textlogs
        ]);
    }
}