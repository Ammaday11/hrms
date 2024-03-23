<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    Employee,
    Department,
    Designation,
    Holiday,
};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class HolidaysController extends Controller
{
    
    public function index()
    {
        
        $holidays = Holiday::orderByDesc('holiday_date')->get();
        return view('Employees.Holiday.holidays', compact('holidays'));
    }
    
    public function create()
    {
        return view('Employees.Holiday.create-holiday');
    }

    public function store(Request $data){
        try {
            $this->validator($data->all())->validate();
            $holiday_date=date("Y-m-d ", strtotime($data->holiday_date));
            $holiday = Holiday::create([
                'title' => $data['title'],
                'holiday_date' => $holiday_date,
                'holiday_type' => $data['holiday_type'],
            ]);
            if(!$holiday){
                return redirect()->route('create-holiday')->with('error', 'Failed to create Holiday! Please try again');
            }
            return redirect()->route('holidays')->with('success', 'New Holiday created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('create-holiday')->with('error', 'Holiday already exists, please try with another date!');
        }
    }

    public function edit(string $id)
    {
        $holiday = Holiday::find($id);
        return view('Employees.Holiday.edit-holiday', compact('holiday'));
    }
    public function update(Request $data, string $id)
    {
        try {
            $holiday = Holiday::find($id);
            if ($holiday){
                $this->validator($data->all())->validate();
                $holiday->title = $data['title'];
                $holiday->holiday_date = date('Y-m-d', strtotime($data['holiday_date']));
                $holiday->holiday_type = $data['holiday_type'];
                $holiday->update();
                return redirect()->route('holidays')->with('success', 'Holiday updated successfully!');
            }
        } catch (\Exception $e) {
            dd(response()->json(['success' => false, 'message' => $e->getMessage()], 500));
            return redirect()->route('edit_holiday', ['id' => $holiday->id])->with('error', 'Failed to modify Holiday! Please try again');
        }
    }

    public function delete(string $id)
    {
        $holiday = Holiday::find($id);
        return view('Employees.Holiday.delete-holiday', compact('holiday'));
    }

    public function destroy(string $id)
    {
        $holiday = Holiday::find($id);
        if($holiday){
            $holiday->destroy($holiday->id);
            return redirect()->route('holidays')->with('success', 'Holiday deleted successfully!');
        }
        
        return redirect()->route('delete_holiday')->with('error', 'Failed to delete Holiday! Please try again');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'holiday_date' => ['required', 'date', 'unique:holidays'],
            'holiday_type' => ['required', 'string', 'max:255'],
        ]);
    }
}
