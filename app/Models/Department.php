<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Designation,
    Employee,
};
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\HasMany;


class Department extends Model
{
    use HasFactory;
    //protected $gurded = ['id'];
    protected $fillable = ['name'];

    public function employee(){
        return $this->hasMany(Employee::class);
    }
    public function designation(){
        return $this->hasMany(Designation::class);
    }
}
