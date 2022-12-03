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
    const CREATED_ON = 'created_at';

    /**
    * The name of the "updated at" column.
    *
    * @var string
    */
    const UPDATED_ON = 'updated_at';

    public function setDateAttribute( $value ) {
        $this->attributes['CREATED_ON'] = (new Carbon($value))->format('d/m/y');

        $this->attributes['UPDATED_ON'] = (new Carbon($value))->format('d/m/y');
    }

    protected $table = 'reports';
    protected $primaryKey = 'id';

    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'reportType',
        'userId',
        'teamid',
        'location',
        'specificLocation',
        'status',
        'files',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
