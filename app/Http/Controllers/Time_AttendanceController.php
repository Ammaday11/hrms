<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\Order;
// use App\Models\Status;

class Time_AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */


    

    
    public function show_roster()
    {
        return view('Time_Attendance.roster');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $status = Status::all();
        $order = Order::find($id);
        return view('admin.edit-order', compact('order', 'status'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
