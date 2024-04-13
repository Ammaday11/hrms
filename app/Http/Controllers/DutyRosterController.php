<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Employee,
    Department,
    Designation,
    Duty_Roster,
    Shift
};
use Carbon\Carbon;

class DutyRosterController extends Controller
{
    public function index(){
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        //dd($currentMonth);
        $rosterData = Duty_Roster::whereYear('date', $currentYear)
                            ->whereMonth('date', $currentMonth)
                            ->with('employee', 'shift')
                            ->get();
        
        //$employees = Employee::where('department_id', 3)->get();
        $employees = Employee::with('department')->get();
        return view('Time_Attendance.Duty_Roster.roster', compact('rosterData', 'employees', 'currentYear', 'currentMonth'));

        //return view('Time_Attendance.Duty_Roster.roster', compact('employees', 'shifts', 'currentYear', 'currentMonth'));
    }

    public function create($currentYear, $currentMonth){
        //$employees = Employee::where('department_id', 3)->get();
        $employees = Employee::with('department')->get();
        $shifts = Shift::all();
        //$currentYear = date('Y');
        //$currentMonth = date('m');

        return view('Time_Attendance.Duty_Roster.create-roster', compact('employees', 'shifts', 'currentYear', 'currentMonth'));
    }


    public function store(Request $request){
        $year = $request->input('year');
        $month = $request->input('month');
        $shifts = $request->input('shifts');
        // Loop through each employee
        foreach ($shifts as $employeeId => $employeeShifts) {
            // Loop through each day's shift for the employee
            foreach ($employeeShifts as $day => $shiftId) {
                // Create roster entry for each day
                Duty_Roster::create([
                    'employee_id' => $employeeId,
                    'date' => "$year-$month-$day",
                    'shift_id' => $shiftId,
                    'locked' => false
                ]);
            }
        }

        return redirect()->route('index_roster')->with('success', 'Roster for the month created successfully.');
    }

    public function edit($currentYear, $currentMonth){
        // Retrieve roster data for the specified year and month
        $rosterData = Duty_Roster::whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->get();

        // Retrieve all employees
        $employees = Employee::with('department')->get();

        // Retrieve all shifts
        $shifts = Shift::all();

        return view('Time_Attendance.Duty_Roster.edit-roster', compact('currentYear', 'currentMonth', 'rosterData', 'employees', 'shifts'));
    }

    public function update(Request $request){
    $month = $request->input('month');
    $year = $request->input('year');
    $roster = $request->input('roster');
            //dd($request);
    // Loop through the roster data and update each entry
    foreach ($roster as $employeeId => $rosterData) {
        foreach ($rosterData as $day => $shiftId) {
            // Find or create the roster entry for the employee and date
            $rosterEntry = Duty_Roster::updateOrCreate(
                [
                    'employee_id' => $employeeId,
                    'date' => \Carbon\Carbon::createFromDate($year, $month, $day)->toDateString(),
                ],
                ['shift_id' => $shiftId]
            );
            // Optionally, you can perform any additional operations here
        }
    }

    // Optionally, you can redirect back or return a response
    return redirect()->route('index_roster')->with('success', 'Roster updated successfully.');
    }

    public function show(Request $request)
    {
        $roster_month_date = $_POST["roster_month_date"];
        if($roster_month_date){
            // Split the date string into month and year
            list($month, $year) = explode('/', $roster_month_date);
            // Convert month and year to integers
            $currentMonth = intval($month);
            $currentYear = intval($year);
            $rosterData = Duty_Roster::whereYear('date', $currentYear)
                                ->whereMonth('date', $currentMonth)
                                ->with('employee', 'shift')
                                ->get();
            
            //$employees = Employee::where('department_id', 3)->get();
            $employees = Employee::with('department')->get();
            return view('Time_Attendance.Duty_Roster.roster', compact('rosterData', 'employees', 'currentYear', 'currentMonth'));
        }
        return redirect()->route('index_roster');
    }

    public function delete($currentYear, $currentMonth)
    {
        // $holiday = Holiday::find($id);
        // return view('Employees.Holiday.delete-holiday', compact('holiday'));
        Duty_Roster::deleteRosterForMonth($currentMonth,  $currentYear);
        return redirect()->route('index_roster');
    }

    public function destroy($currentYear, $currentMonth)
    {
        
        
        // $holiday = Holiday::find($id);
        // if($holiday){
        //     $holiday->destroy($holiday->id);
        //     return redirect()->route('holidays')->with('success', 'Holiday deleted successfully!');
        // }
        
        // return redirect()->route('delete_holiday')->with('error', 'Failed to delete Holiday! Please try again');
    }
}