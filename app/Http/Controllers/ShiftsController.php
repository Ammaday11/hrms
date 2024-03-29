<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    Employee,
    Department,
    Designation,
    Holiday,
    Shift
};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Session;

class ShiftsController extends Controller
{
    public function index()
    {
        $shifts = Shift::All();
        return view('Time_Attendance.Shifts.shifts', compact('shifts'));
    }
    
    public function create()
    {
        return view('Time_Attendance.Shifts.create-shift');
    }
    
    public function store(Request $data){
        $this->validator($data->all())->validate();
        if($data->hasOT == "on"){
                $has_ot = True;
        }else{
            $has_ot = False;
        }
        $shift = Shift::create([
            'name' => $data['name'],
            'short_code' => $data['short_code'],
            'start_time' => Carbon::createFromFormat('g:i A', $data->start_time)->format('H:i:s'),
            'end_time' => Carbon::createFromFormat('g:i A', $data->end_time)->format('H:i:s'),
            'hasOT' => $has_ot,
        ]);
        if(!$shift){
            return redirect()->route('create_shift')->with('error', 'Failed to create Shift! Please try again');
        }
        return redirect()->route('index_shifts')->with('success', 'New Shift created successfully!');
    }

    public function edit(string $id)
    {
        $shift = Shift::find($id);
        return view('Time_Attendance.Shifts.edit-shift', compact('shift'));
    }

    public function update(Request $data, string $id)
    {
        $shift = Shift::find($id);
        if ($shift){
            if($data->hasOT == "1"){
                $has_ot = True;
            }else{
                $has_ot = False;
            }
            $this->edit_validator($data->all())->validate();
            $shift->name = $data['name'];
            $shift->start_time = Carbon::createFromFormat('g:i A', $data->start_time)->format('H:i:s');
            $shift->end_time = Carbon::createFromFormat('g:i A', $data->end_time)->format('H:i:s');
            $shift->hasOT = $has_ot;
            $shift->update();
            return redirect()->route('index_shifts')->with('success', 'Shift updated successfully!');
        }
        return redirect()->route('edit_shift', ['id' => $shift->id])->with('error', 'Failed to modify Shift! Please try again');
    }

    public function delete(string $id)
    {
        $shift = Shift::find($id);
        return view('Time_Attendance.Shifts.delete-shift', compact('shift'));
    }

    public function destroy(string $id)
    {
        $shift = Shift::find($id);
        if($shift){
            $shift->destroy($shift->id);
            return redirect()->route('index_shifts')->with('success', 'Shift deleted successfully!');
        }
        
        return redirect()->route('delete_shift')->with('error', 'Failed to delete Shift! Please try again');
    }





    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string',
            'short_code' => 'required|string|unique:shifts',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
    }
    protected function edit_validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
    }
}
