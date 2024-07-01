<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeforeCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'checklist_id',
        'name',
        'requirement',
        'method',
        'result',
        'evaluation',
        'note'
    ];
       public function checklist()
    {
        return $this->belongsTo(FlightCheck::class);
    }
}
