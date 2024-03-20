<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Department,
    Designation,
    Employee_Profile,
};
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory;
    
    //protected $gurded = ['id'];
    protected $fillable = ['employeeID', 'password', 'fname', 'lname', 'email', 'phone', 'department_id', 'designation_id', 'employee_profile_id', 'joined_date','NID', 'parmanant_address', 'nationality', 'religion', 'marital_status', 'no_kids', 'emg_name1', 'emg_relation1', 
    'emg_phone1', 'emg_name2', 'emg_relation2', 'emg_phone2', 'bank_name','bank_acc_name', 'bank_acc', 'image'];


    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function designation(){
        return $this->belongsTo(Designation::class);
    }
    // public function employee_profile(){
    //     return $this->belongsTo(Employee_Profile::class);
    // }
}