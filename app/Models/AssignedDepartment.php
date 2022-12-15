<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedDepartment extends Model
{
    use HasFactory;

    protected $table = 'assigns';
    protected $primaryKey = 'id';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['departments_id', 'incidents_id', 'department_id'];

    public function assignedTo()
    {
        return $this->belongsTo(Departments::class, 'department_id');
    }

    public function incidents()
    {
        return $this->belongsTo(ReportType::class, 'incidents_id');
    }

    public function contact()
    {
        return $this->hasMany(cellNumber::class, 'department_id');
    }

}
