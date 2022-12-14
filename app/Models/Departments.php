<?php

namespace App\Models;

use App\Http\Livewire\AssignDepartments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $primaryKey = 'id';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['department'];

    /* public function assign()
    {
        return $this->hasManyThrough(ReportType::class, AssignedDepartment::class);
    } */

    public function cellnum()
    {
        return $this->hasMany(cellNumber::class);
    }

    public function assignedTo()
    {
        return $this->hasManyThrough(AssignedDepartment::class, ReportType::class, 'assignedTo', 'reports_id');
    }
}
