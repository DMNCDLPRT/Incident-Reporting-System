<?php

namespace App\Models;

use App\Http\Livewire\AssignDepartments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportType extends Model
{
    use HasFactory;

    protected $table = 'report_types';
    protected $primaryKey = 'id';


    public $timestamp = true;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['report_id', 'report_name'];

    public function type()
   {
       return $this->belongsTo(Reports::class);
   }

   public function assign()
   {
        return $this->belongsTo(AssignDepartments::class);
   }

   /* public function reports()
    {
        return $this->hasMany(Reports::class, 'id');
    } */
    public function reportTypes()
    {
        return $this->hasMany(ReportType::class, 'id');
    }
 
}
