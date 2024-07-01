<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightCheck extends Model
{
    use HasFactory;
    protected $table = 'flight_checks';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['flight_number', 'time', 'airplane_id'];

    public function airplane()
    {
        return $this->belongsTo(Airplane::class);
    }
       public function getTimeAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i:s');
    }
        public function beforeCategories()
    {
        return $this->hasMany(BeforeCategory::class, 'checklist_id', 'id');
    }

    public function afterCategories()
    {
        return $this->hasMany(AfterCategory::class,'checklist_id', 'id');
    }
}
