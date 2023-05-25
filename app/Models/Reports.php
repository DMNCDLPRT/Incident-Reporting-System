<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\AssignedDepartment;

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

    public function getStatusColorAttribute(){
        return[
            'Accepted'       => 'green',
            'Processing'    => 'blue',
            'Rejected'      => 'red',
        ][$this->status]    ?? 'gray';
    }

    protected $table = 'reports';
    protected $primaryKey = 'id';

    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'userId',
        'report_id',
        // 'location_id',
        // 'specificLocation',
        'victims',
        'suspects',
        'event',
        'status',
        'files',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function reports()
    {
        return $this->belongsTo(ReportType::class, 'report_id');
    }

    public function locations()
    {
        return $this->hasMany(Location::class, 'id');
    }
    public function userReport()
    {
        return $this->belongsTo(User::class);
    }

    public function assigns()
    {
        return $this->hasMany(AssignedDepartment::class, 'incidents_id');
    }
    
}
