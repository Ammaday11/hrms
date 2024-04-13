<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Employee,
    Shift,
    Duty_Roster,
};

class Shift extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'short_code', 'start_time', 'end_time', 'hasOT'];

    public function employees(){
        return $this->belongsToMany(Employee::class, 'Duty_Roster')->withPivot('date');
    }
}
