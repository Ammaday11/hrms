<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Department,
    Designation,
    Employee,
};
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Employee_Profile extends Model
{
    protected $table = 'employee_profiles';
    use HasFactory;
    protected $fillable = ['NID', 'parmanant_address', 'nationality', 'religion', 'marital_status', 'no_kids', 'emg_name1', 'emg_relation1', 
    'emg_phone1', 'emg_name2', 'emg_relation2', 'emg_phone2', 'bank_name', 'bank_acc', 'image'];

    // public function employee(){
    //     return $this->belongsTo(Employee::class);
    // }
}

