<?php

namespace App\Http\Livewire;

use App\Models\ReportType;
use Livewire\Component;

class AddIncident extends Component
{

    public $report_name;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string,mixed>
     */
    public function rules()
    {
        return [
            'report_name' => 'required|string'
        ]; 
    }

    public function addIncident()
    {
        $validated = $this->validate();

        ReportType::create($validated); 
        session()->flash('message-department', 'Emergency Department successfuly added');
    }

    public function render()
    {
        return view('livewire.admin.add-incident');
    }
}
