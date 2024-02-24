<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\Order;
// use App\Models\Status;

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
        
        return view('Employees.all-employees');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Employees.add-employee');
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


    public function show()
    {
        // $order = Order::find($id);
        return view('Employees.employee-profile');
    }

    public function show_holidays()
    {
        return view('Employees.holidays');
    }
    
    public function create_holidays()
    {
        return view('Employees.add-holiday');
    }
    public function show_admin_leaves()
    {
        return view('Employees.leaves-admin');
    }
    public function show_departments()
    {
        return view('Employees.departments');
    }
    public function test()
    {
        return view('admin.show-order');
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
