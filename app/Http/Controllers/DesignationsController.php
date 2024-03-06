<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    Employee,
    Department,
    Designation,
};
use Illuminate\Support\Facades\Validator;
use Session;


class DesignationsController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'designation' => ['required','unique:designations','string', 'max:255'],
            'salary' => ['required','string', 'max:255'],
        ]);
    }


    public function index()
    {
        $designations = Designation::with('department')->get();
        return view('Employees.Designation.designations', compact('designations'));
    }

    public function show(string $id)
    {
        $designation = Designation::find($id);
        return view('Employees.Designation.show-designation', compact('designation'));
    }

    public function create()
    {
        $departments = Department::All();
        return view('Employees.Designation.add-designation', compact('departments'));
    }

    public function store(Request $data)
    {
        $this->validator($data->all())->validate();
        $department = Department::find($data->department_id);
        if(!$department){
            return redirect()->route('add_designation')->with('error', 'Failed to add Designation! Please try again');
        }
        $designation = Designation::create([
            'designation' => $data['designation'],
            'department_id' => $department->id,
            'salary' => $data['salary'],
        ]);
        if(!$designation){
            return redirect()->route('add_designation')->with('error', 'Failed to add Designation! Please try again');
        }
        return redirect()->route('show_designations')->with('success', 'New Designation created successfully!');
    }
    
    public function edit(string $id)
    {
        $departments = Department::All();
        $designation = Designation::find($id);
        return view('Employees.Designation.edit-designation', compact('designation', 'departments'));
    }

    public function update(Request $data, string $id)
    {
        //dd($data['salary']);
        //$this->validator($data->salary)->validate();

        $designation = Designation::find($id);
        $department = Department::find($data->department_id);
        if($designation){
            // $designation->designation = $data['designation'];
            $designation->salary = $data['salary'];
            $designation->update();
            return redirect()->route('show_designations')->with('success', 'Designation updated successfully!');
        }
        
        return redirect()->route('edit_designation')->with('error', 'Failed to update Designation! Please try again');
    }

    public function delete(string $id)
    {
        $designation = Designation::find($id);
        if($designation){
            return view('Employees.Designation.delete-designation', compact('designation'));
        }
        
        return redirect()->route('show_designations')->with('error', 'Failed to delete Designation!');
    }

    public function destroy(string $id)
    {
        $designation = Designation::find($id);
        if($designation){
            $designation->destroy($designation->id);
            return redirect()->route('show_designations')->with('success', 'Designation deleted successfully!');
        }
        
        return redirect()->route('delete_designation')->with('error', 'Failed to delete Designation! Please try again');
    }

}
