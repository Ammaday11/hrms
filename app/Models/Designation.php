<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Department,
    Employee,
};
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\HasMany;


class Designation extends Model
{
    use HasFactory;

    //protected $gurded = ['id'];
    protected $fillable = ['department_id', 'designation', 'salary'];

    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function employee(){
        return $this->hasMany(Employee::class);
    }
}
