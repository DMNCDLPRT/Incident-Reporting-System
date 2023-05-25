<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departments;
use App\Models\cellNumber;

class TextLog extends Model
{
    use HasFactory;

    protected $table = 'text_log';
    protected $primaryKey = 'id';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['department_id', 'number', 'log'];

    public function department()
    {
        return $this->belongsTo(Departments::class);
    }

    public function cell()
    {
        return $this->belongsTo(cellNumber::class, 'number');
    }

    
}
