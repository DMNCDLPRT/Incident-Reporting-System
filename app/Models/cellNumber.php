<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TextLog;

class cellNumber extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $primaryKey = 'id';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['department_id', 'departments_id', 'number'];

    public function department()
    {
        return $this->belongsTo(Departments::class);
    }

    public function incident()
    {
        return $this->belongsTo(Departments::class);
    }
    public function textLogs()
    {
        return $this->hasMany(TextLog::class, 'number');
    }
}
