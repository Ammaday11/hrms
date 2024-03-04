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


class DepartmentsController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required','unique:departments', 'string', 'max:255'],
        ]);
    }

    public function show()
    {
        $departments = Department::all();
        return view('Employees.Department.departments', compact('departments'));
    }
    public function create()
    {
        return view('Employees.Department.add-department');
    }
    public function store(Request $data)
    {
        //dd($data);
        $this->validator($data->all())->validate();

        $department = Department::create([
            'name' => $data['name'],
        ]);
        if(!$department){
            return redirect()->route('add_department')->with('error', 'Failed to add Department! Please try again');
        }
        return redirect()->route('show_departments')->with('success', 'New Department created successfully!');
    }

    public function edit(string $id)
    {
        $department = Department::find($id);
        return view('Employees.Department.edit-department', compact('department'));
    }

    public function update(Request $data, string $id)
    {
        $this->validator($data->all())->validate();

        $department = Department::find($id);
        if($department){
            $department->name =$data['name'];
            $department->update();
            return redirect()->route('show_departments')->with('success', 'Department updated successfully!');
        }
        
        return redirect()->route('edit_department')->with('error', 'Failed to update Department! Please try again');
    }

    public function delete(string $id)
    {
        $department = Department::find($id);
        return view('Employees.Department.delete-department', compact('department'));
    }

    public function destroy(string $id)
    {
        $department = Department::find($id);
        if($department){
            $department->destroy($department->id);
            return redirect()->route('show_departments')->with('success', 'Department deleted successfully!');
        }
        
        return redirect()->route('delete_department')->with('error', 'Failed to delete Department! Please try again');
    }

}
