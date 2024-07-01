<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    use HasFactory;
    protected $table = 'airplanes';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'code', 'count_fly',];

    public function flightChecks()
    {
        return $this->hasMany(FlightCheck::class);
    }
}