<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Employee,
    Shift,
    Duty_Roster,
};
use Carbon\Carbon;

class Duty_Roster extends Model
{
    protected $fillable = ['employee_id', 'shift_id', 'date', 'locked'];
    use HasFactory;
    protected $table = 'duty_rosters';
    protected $dates = ['date'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }
    

public function lockRosterForMonth($month, $year)
{
    // Find duty roster records for the specified month and year
    $rosterRecords = Duty_Roster::whereMonth('date', $month)
                                ->whereYear('date', $year)
                                ->get();

    // Update 'locked' column to true for each roster record
    foreach ($rosterRecords as $record) {
        $record->locked = true;
        $record->save();
    }

    // Optionally, you can return a success message or redirect to another page
}

public function unlockRosterForMonth($month, $year)
{
    // Find duty roster records for the specified month and year
    $rosterRecords = Duty_Roster::whereMonth('date', $month)
                                ->whereYear('date', $year)
                                ->get();

    // Update 'locked' column to false for each roster record
    foreach ($rosterRecords as $record) {
        $record->locked = false;
        $record->save();
    }

    // Optionally, you can return a success message or redirect to another page
}

public static function deleteRosterForMonth($month, $year)
{
    // Find duty roster records for the specified month and year
    $rosterRecords = Duty_Roster::whereMonth('date', $month)
                                ->whereYear('date', $year)
                                ->get();
    

    // Update 'locked' column to true for each roster record
    foreach ($rosterRecords as $record) {
        $record->delete();
    }
    return redirect()->route('index_roster');
    // Optionally, you can return a success message or redirect to another page
}

}
