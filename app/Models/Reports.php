<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reports extends Model
{
    use HasFactory;

    /**
    * The name of the "created at" column.
    *
    * @var string
    */
    const CREATED_AT = 'reported_on';

    public function setDateAttribute( $value ) {
        $this->attributes['CREATED_AT'] = (new Carbon($value))->format('d/m/y');
    }

    protected $table = 'reports';
    protected $primaryKey = 'id';

    /* 
    Gaslighting myself into thingking
    i'm okay because honestly,
    i'm just tired of breaking down.
    */

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'reportType',
        'teamid',
        'location',
        'specificLocation',
        'status',
    ];
}


/* 
id number
type of report
date
location
status
*/