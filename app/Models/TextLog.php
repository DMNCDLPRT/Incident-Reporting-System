<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextLog extends Model
{
    use HasFactory;

    protected $table = ['department_id', 'number','log'];
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
}
