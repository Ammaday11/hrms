<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Http\Controllers\{
    OrdersController,
    UsersController,
    DepartmentsController,
};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

//Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/blank', function () {
//     return view('admin.blank');
// });

// Route::get('/login', function () {
//     return view('User.login');
// });

// Route::get('/sign-up', function () {
//     return view('User.sign-up');
// });

// Route::get('/new-order', function () {
//     return view('admin.new-order');
// });

// Route::get('/edit-order', function () {
//     return view('admin.edit-order');
// });

//Route::resource('orders', App\Http\Controllers\OrdersController::class);

Route::get('/', [App\Http\Controllers\OrdersController::class, 'index'])->name('home');
Route::get('/login', [App\Http\Controllers\UsersController::class, 'get_login'])->name('user.get_login');
Route::post('/login', [App\Http\Controllers\UsersController::class, 'login'])->name('user.login');

Route::get('/user/create', [App\Http\Controllers\UsersController::class, 'create'])->name('user.create');
Route::post('/user/store', [App\Http\Controllers\UsersController::class, 'store'])->name('user.store');



Route::get('/Employees/all-employees', [App\Http\Controllers\EmployeesController::class, 'index'])->name('all-employees');
Route::get('/Employees/add-employees', [App\Http\Controllers\EmployeesController::class, 'create'])->name('add-employees');
Route::get('/Employees/employee-profile', [App\Http\Controllers\EmployeesController::class, 'show'])->name('employees-profile');
Route::get('/Employees/holidays', [App\Http\Controllers\EmployeesController::class, 'show_holidays'])->name('holidays');
Route::get('/Employees/Holidays/add-holiday', [App\Http\Controllers\EmployeesController::class, 'create_holidays'])->name('add-holiday');
Route::get('/Employees/admin-leaves', [App\Http\Controllers\EmployeesController::class, 'show_admin_leaves'])->name('show_admin_leaves');

Route::get('/Employees/departments', [App\Http\Controllers\DepartmentsController::class, 'show'])->name('show_departments');
Route::get('/Employees/Departments/add-department', [App\Http\Controllers\DepartmentsController::class, 'create'])->name('add_department');
Route::post('/Employees/Departments/store-department', [App\Http\Controllers\DepartmentsController::class, 'store'])->name('store_department');
Route::get('/Employees/Departments/edit/{id}', [App\Http\Controllers\DepartmentsController::class, 'edit'])->name('edit_department');
Route::post('/Employees/Departments/update/{id}', [App\Http\Controllers\DepartmentsController::class, 'update'])->name('update_department');
Route::get('/Employees/Departments/delete/{id}', [App\Http\Controllers\DepartmentsController::class, 'delete'])->name('delete_department');
Route::post('/Employees/Departments/destroy/{id}', [App\Http\Controllers\DepartmentsController::class, 'destroy'])->name('destroy_department');

Route::get('/Employees/designations', [App\Http\Controllers\EmployeesController::class, 'show_designations'])->name('show_designations');


Route::get('/Time-Attendance/shifts', [App\Http\Controllers\Time_AttendanceController::class, 'show_shifts'])->name('show_shifts');
Route::get('/Time-Attendance/add-shifts', [App\Http\Controllers\Time_AttendanceController::class, 'create_shift'])->name('create_shift');
Route::get('/Time-Attendance/roster', [App\Http\Controllers\Time_AttendanceController::class, 'show_roster'])->name('show_roster');

Route::get('/create-order', [App\Http\Controllers\OrdersController::class, 'create'])->name('create-order');
Route::get('/edit-order/{id}', [App\Http\Controllers\OrdersController::class, 'edit'])->name('edit-order');
Route::get('/show-order/{id}', [App\Http\Controllers\OrdersController::class, 'show'])->name('show-order');

Route::get('/user/create', [App\Http\Controllers\UsersController::class, 'create'])->name('user.create');
Route::post('/user/store', [App\Http\Controllers\UsersController::class, 'store'])->name('user.store');

Route::get('/logout', [App\Http\Controllers\UsersController::class, 'logout'])->name('user.logout');