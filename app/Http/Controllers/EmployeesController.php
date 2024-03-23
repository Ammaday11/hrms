<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    Employee,
    Department,
    Designation,
};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        // $orders = Order::all();
        // $totalCovers = 0;
        // foreach ($orders as $order) {
        //     $totalCovers += $order->Cover;
        // }
        // $user = Auth::user();
        
        $employees = Employee::with('department','designation')->get();
        return view('Employees.all-employees', compact('employees'));
        
        //return view('Employees.all-employees');
        // return view('Employees.employees');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::All();
        $designations = Designation::All();
    
        return view('Employees.add-employee', compact('departments','designations'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $data)
    {
        $this->validator($data->all())->validate();
        $department = Department::find($data->department_id);
        if(!$department){
            return redirect()->route('add-employees')->with('error', 'Failed to add Employee! Please try again');
        }
        $designation = Designation::find($data->designation_id);
        if(!$designation){
            return redirect()->route('add-employees')->with('error', 'Failed to add Employee! Please try again');
        }
        
        $joined_date=date("Y-m-d ", strtotime($data->joined_date));
        $employee = Employee::create([
            'employeeID' => $data['employeeID'],
            'password' => Hash::make('password'),
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'joined_date' => $joined_date,
            'department_id' => $department->id,
            'designation_id' => $designation->id,
        ]);
        if(!$employee){
            return redirect()->route('add-employees')->with('error', 'Failed to add Designation! Please try again');
        }
        return redirect()->route('all-employees')->with('success', 'New Employee added successfully!');
    }

    /**
     * Display the specified resource.
     */


    public function show(string $id)
    {
        $employee = Employee::find($id);
        //dd($employee->image);
        return view('Employees.employee-profile', compact('employee'));
    }

    public function show_admin_leaves()
    {
        return view('Employees.leaves-admin');
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departments = Department::All();
        $designations = Designation::All();
        $employee = Employee::with('department')->find($id);
        return view('Employees.edit-employee', compact('employee', 'departments', 'designations'));
    }
    
    public function update(Request $data, string $id)
    {
        $employee = Employee::find($id);
        $department = Department::find($data->department_id);
        if(!$department){
            return redirect()->route('edit_employee', ['id' => $employee->id])->with('error', 'Failed to edit Employee! Please try again');
        }
        $designation = Designation::find($data->designation_id);
        if(!$designation){
            return redirect()->route('edit_employee', ['id' => $employee->id])->with('error', 'Failed to edit Employee! Please try again');
        }
        if(!$data->joined_date){
            $joined_date = $employee->joined_date;
        }else{
            $joined_date = date("Y-m-d ", strtotime($data['joined_date']));
        }
        //$joined_date=date("Y-m-d ", strtotime($joined_date));
        if ($employee){
            $this->edit_validator($data->all())->validate();
            $employee->fname = $data['fname'];
            $employee->lname = $data['lname'];
            $employee->email = $data['email'];
            $employee->phone = $data['phone'];
            $employee->joined_date = $joined_date;
            $employee->department_id = $department->id;
            $employee->designation_id = $designation->id;
            $employee->update();
            return redirect()->route('employees-profile', ['id' => $employee->id])->with('success', 'Employee information updated successfully!');
            
        }
        
        $employees = Employee::with('department','designation')->get();
        return view('Employees.all-employees', compact('employees'));
    }

    public function edit_personal(string $id)
    {
        $employee = Employee::find($id);
        return view('Employees.edit-employee-personal', compact('employee'));
    }
    public function update_personal(Request $data, string $id)
    {
        $employee = Employee::find($id);
        //$dob=date("Y-m-d ", strtotime($data->dob));
        if ($employee){
            $this->personal_validator($data->all())->validate();
            if($employee->NID){
                $employee->NID = $employee->NID;
            }else{
                $employee->NID = $data['NID'];
            }
            if($employee->email){
                $employee->email = $employee->email;
            }else{
                $employee->email = $data['email'];
            }
            $employee->phone = $data['phone'];
            $employee->dob = date('Y-m-d', strtotime($data['dob']));
            $employee->parmanant_address = $data['parmanant_address'];
            $employee->nationality = $data['nationality'];
            $employee->religion = $data['religion'];
            $employee->marital_status = $data['marital_status'];
            $employee->no_kids = $data['no_kids']; 
            $employee->update();
            return redirect()->route('employees-profile', ['id' => $employee->id])->with('success', 'Employee profile information updated successfully!');
            
        }
        return view('Employees.edit-employee-personal', compact('employee'));
    }

    
    public function edit_emergency(string $id)
    {
        $employee = Employee::find($id);
        return view('Employees.edit-employee-emergency', compact('employee'));
    }
    public function update_emergency(Request $data, string $id)
    {
        $employee = Employee::find($id);
        if ($employee){
            $this->emergency_validator($data->all())->validate();
            $employee->emg_name1 = $data['emg_name1'];
            $employee->emg_relation1 = $data['emg_relation1'];
            $employee->emg_phone1 = $data['emg_phone1'];
            $employee->emg_name2 = $data['emg_name2'];
            $employee->emg_relation2 = $data['emg_relation2'];
            $employee->emg_phone2 = $data['emg_phone2'];
            $employee->update();
            return redirect()->route('employees-profile', ['id' => $employee->id])->with('success', 'Employee profile information updated successfully!');
            
        }
        return view('Employees.edit-employee-personal', compact('employee'));
    }

    public function edit_bank(string $id)
    {
        $employee = Employee::find($id);
        return view('Employees.edit-employee-bank', compact('employee'));
    }
    public function update_bank(Request $data, string $id)
    {
        $employee = Employee::find($id);
        if ($employee){
            $this->bank_validator($data->all())->validate();
            $employee->bank_name = $data['bank_name'];
            $employee->bank_acc_name = $data['bank_acc_name'];
            $employee->bank_acc = $data['bank_acc'];
            $employee->update();
            return redirect()->route('employees-profile', ['id' => $employee->id])->with('success', 'Employee profile information updated successfully!');
            
        }
        return view('Employees.edit-employee-personal', compact('employee'));
    }

    public function edit_pp(string $id)
    {
        $employee = Employee::find($id);
        return view('Employees.edit-employee-profile-image', compact('employee'));
    }
    public function update_pp(Request $data, string $id)
    {
        $employee = Employee::find($id);
        $data->validate([
            'image' => 'required|mimes:jpg,png|max:2048',
        ]);
        if ($data->hasFile('image')){
            // Validate the uploaded file
            $data->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max file size if needed
            ]);

            // Store the file in the public/profile_images folder
            $image = $data->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile_images'), $imageName);

            $employee->image = '/' . 'profile_images/' . $imageName;
            $employee->save();
            return redirect()->route('employees-profile', ['id' => $employee->id])->with('success', 'Employee profile image updated successfully!');
            
        }
        return view('Employees.edit-employee-personal', compact('employee'));
    }
    
    public function delete(string $id)
    {
        $employee = Employee::find($id);
        return view('Employees.delete-employee', compact('employee'));
    }

    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        if($employee){
            $employee->destroy($employee->id);
            return redirect()->route('all-employees')->with('success', 'Employee deleted successfully!');
        }
        
        return redirect()->route('delete_employee')->with('error', 'Failed to delete Employee! Please try again');
    }







    //getDesignations based on selected department
    public function getDesignations($departmentId)
    {
        try {
            
            $designations = Designation::where('department_id', $departmentId)->get();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the department is not found
            $designations = [];
        }
        return response()->json($designations);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'employeeID' => 'required|string|max:255|unique:employees,employeeID',
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees'],
            'phone' => ['required', 'string', 'max:255'],
            'joined_date' => ['required', 'date','before:now'],
            'department_id' => ['required'],
            'designation_id' => ['required'],
        ]);
    }

    protected function edit_validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'joined_date' => ['required', 'date'],
             'department_id' => ['required'],
             'designation_id' => ['required'],
        ]);
    }

    protected function personal_validator(array $data)
    {
        return Validator::make($data, [
            'NID' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'dob' => ['date','before:-17 years'],
            'parmanant_address' => ['string', 'max:255'],
            'nationality' => ['string', 'max:255'],
            'religion' => ['string', 'max:255'],
            'marital_status' => ['string', 'max:255'],
            'no_kids' => ['string', 'max:255'],
        ]);
    }
    protected function emergency_validator(array $data)
    {
        return Validator::make($data, [
            'emg_name1' => 'string|max:255',
            'emg_relation1' => ['string', 'max:255'],
            'emg_phone1' => ['string', 'max:255'],
            'emg_name2' => 'string|max:255',
            'emg_relation2' => ['string', 'max:255'],
            'emg_phone2' => ['string', 'max:255'],
        ]);
    }
    protected function bank_validator(array $data)
    {
        return Validator::make($data, [
            'bank_name' => 'string|max:255',
            'bank_acc_name' => ['string', 'max:255'],
            'bank_acc' => ['string', 'max:255'],
        ]);
    }
}
