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

Route::get('/user/create', [App\Http\Controllers\UsersController::class, 'create'])->name('user.create');
Route::post('/user/store', [App\Http\Controllers\UsersController::class, 'store'])->name('user.store');



//EMPLOYEE ROUTES
Route::get('/Employees/all-employees', [App\Http\Controllers\EmployeesController::class, 'index'])->name('all-employees');
Route::get('/Employees/add-employees', [App\Http\Controllers\EmployeesController::class, 'create'])->name('add-employees');
Route::post('/Employees/store-employee', [App\Http\Controllers\EmployeesController::class, 'store'])->name('store_employee');
Route::get('/Employees/employee-profile/{id}', [App\Http\Controllers\EmployeesController::class, 'show'])->name('employees-profile');
Route::get('/Employees/edit/{id}', [App\Http\Controllers\EmployeesController::class, 'edit'])->name('edit_employee');
Route::post('/Employees/update/{id}', [App\Http\Controllers\EmployeesController::class, 'update'])->name('update_employee');
Route::get('/Employees/edit/personal-info/{id}', [App\Http\Controllers\EmployeesController::class, 'edit_personal'])->name('edit_employee_personal');
Route::post('/Employees/update/personal-info/{id}', [App\Http\Controllers\EmployeesController::class, 'update_personal'])->name('update_employee_personal');
Route::get('/Employees/edit/emergency-contact/{id}', [App\Http\Controllers\EmployeesController::class, 'edit_emergency'])->name('edit_employee_emergency');
Route::post('/Employees/update/emergency-contact/{id}', [App\Http\Controllers\EmployeesController::class, 'update_emergency'])->name('update_employee_emergency');
Route::get('/Employees/edit/bank-info/{id}', [App\Http\Controllers\EmployeesController::class, 'edit_bank'])->name('edit_employee_bank');
Route::post('/Employees/update/bank-info/{id}', [App\Http\Controllers\EmployeesController::class, 'update_bank'])->name('update_employee_bank');
Route::get('/Employees/edit/profile-image/{id}', [App\Http\Controllers\EmployeesController::class, 'edit_pp'])->name('edit_profile_image');
Route::post('/Employees/update/profile-image/{id}', [App\Http\Controllers\EmployeesController::class, 'update_pp'])->name('update_profile_image');
Route::get('/Employees/delete/{id}', [App\Http\Controllers\EmployeesController::class, 'delete'])->name('delete_employee');
Route::post('/Employees/destroy/{id}', [App\Http\Controllers\EmployeesController::class, 'destroy'])->name('destroy_employee');

//HOLIDAY ROUTES
Route::get('/Employees/holidays', [App\Http\Controllers\HolidaysController::class, 'index'])->name('holidays');
Route::get('/Employees/Holidays/create-holiday', [App\Http\Controllers\HolidaysController::class, 'create'])->name('create-holiday');
Route::post('/Employees/Holidays/store-holiday', [App\Http\Controllers\HolidaysController::class, 'store'])->name('store_holiday');
Route::get('/Employees/Holidays/edit/{id}', [App\Http\Controllers\HolidaysController::class, 'edit'])->name('edit_holiday');
Route::post('/Employees/Holidays/update/{id}', [App\Http\Controllers\HolidaysController::class, 'update'])->name('update_holiday');
Route::get('/Employees/Holidays/delete/{id}', [App\Http\Controllers\HolidaysController::class, 'delete'])->name('delete_holiday');
Route::post('/Employees/Holidays/destroy/{id}', [App\Http\Controllers\HolidaysController::class, 'destroy'])->name('destroy_holiday');

Route::get('/Employees/admin-leaves', [App\Http\Controllers\EmployeesController::class, 'show_admin_leaves'])->name('show_admin_leaves');

//DEPARTMENT ROUTES
Route::get('/Employees/departments', [App\Http\Controllers\DepartmentsController::class, 'index'])->name('show_departments');
Route::get('/Employees/Departments/add-department', [App\Http\Controllers\DepartmentsController::class, 'create'])->name('add_department');
Route::post('/Employees/Departments/store-department', [App\Http\Controllers\DepartmentsController::class, 'store'])->name('store_department');
Route::get('/Employees/Departments/edit/{id}', [App\Http\Controllers\DepartmentsController::class, 'edit'])->name('edit_department');
Route::post('/Employees/Departments/update/{id}', [App\Http\Controllers\DepartmentsController::class, 'update'])->name('update_department');
Route::get('/Employees/Departments/delete/{id}', [App\Http\Controllers\DepartmentsController::class, 'delete'])->name('delete_department');
Route::post('/Employees/Departments/destroy/{id}', [App\Http\Controllers\DepartmentsController::class, 'destroy'])->name('destroy_department');


//DESIGNATION ROUTES
Route::get('/Employees/designations', [App\Http\Controllers\DesignationsController::class, 'index'])->name('show_designations');
Route::get('/Employees/designations/show/{id}', [App\Http\Controllers\DesignationsController::class, 'show'])->name('show_designation');
Route::get('/Employees/Designations/add-designation', [App\Http\Controllers\DesignationsController::class, 'create'])->name('add_designation');
Route::post('/Employees/Designations/store-designation', [App\Http\Controllers\DesignationsController::class, 'store'])->name('store_designation');
Route::get('/Employees/Designations/edit/{id}', [App\Http\Controllers\DesignationsController::class, 'edit'])->name('edit_designation');
Route::post('/Employees/Designations/update/{id}', [App\Http\Controllers\DesignationsController::class, 'update'])->name('update_designation');
Route::get('/Employees/Designations/delete/{id}', [App\Http\Controllers\DesignationsController::class, 'delete'])->name('delete_designation');
Route::post('/Employees/Designations/destroy/{id}', [App\Http\Controllers\DesignationsController::class, 'destroy'])->name('destroy_designation');

// /getDesignations/
Route::get('/getDesignations/{departmentId}', [App\Http\Controllers\EmployeesController::class, 'getDesignations'])->name('getDesignations');

//SHIFTS ROUTES
Route::get('/Time-Attendance/shifts', [App\Http\Controllers\ShiftsController::class, 'index'])->name('index_shifts');
Route::get('/Time-Attendance/Shifts/create-shifts', [App\Http\Controllers\ShiftsController::class, 'create'])->name('create_shift');
Route::post('/Time-Attendance/Shifts/store-shifts', [App\Http\Controllers\ShiftsController::class, 'store'])->name('store_shift');
Route::get('/Time-Attendance/Shifts/edit/{id}', [App\Http\Controllers\ShiftsController::class, 'edit'])->name('edit_shift');
Route::post('/Time-Attendance/Shifts/update/{id}', [App\Http\Controllers\ShiftsController::class, 'update'])->name('update_shift');
Route::get('/Employees/Shifts/delete/{id}', [App\Http\Controllers\ShiftsController::class, 'delete'])->name('delete_shift');
Route::post('/Employees/Shifts/destroy/{id}', [App\Http\Controllers\ShiftsController::class, 'destroy'])->name('destroy_shift');

//DUTY ROSTER ROUTES
Route::get('/Time-Attendance/roster', [App\Http\Controllers\DutyRosterController::class, 'index'])->name('index_roster');
Route::get('/Time-Attendance/Roster/create-roster/{year}/{month}', [App\Http\Controllers\DutyRosterController::class, 'create'])->name('create_roster');
Route::post('/Time-Attendance/Roster/store-roster', [App\Http\Controllers\DutyRosterController::class, 'store'])->name('store_roster');
Route::get('/Time-Attendance/Roster/edit-roster/{year}/{month}', [App\Http\Controllers\DutyRosterController::class, 'edit'])->name('edit_roster');
Route::post('/Employees/Roster/update/', [App\Http\Controllers\DutyRosterController::class, 'update'])->name('update_roster');
Route::post('/Time-Attendance/Roster/show-roster', [App\Http\Controllers\DutyRosterController::class, 'show'])->name('show_roster');
Route::get('/Time-Attendance/Roster/delete-roster/{year}/{month}', [App\Http\Controllers\DutyRosterController::class, 'delete'])->name('delete_roster');











Route::get('/create-order', [App\Http\Controllers\OrdersController::class, 'create'])->name('create-order');
Route::get('/edit-order/{id}', [App\Http\Controllers\OrdersController::class, 'edit'])->name('edit-order');
Route::get('/show-order/{id}', [App\Http\Controllers\OrdersController::class, 'show'])->name('show-order');

Route::get('/user/create', [App\Http\Controllers\UsersController::class, 'create'])->name('user.create');
Route::post('/user/store', [App\Http\Controllers\UsersController::class, 'store'])->name('user.store');

//LOGIN LOGOUT ROUTES
Route::get('/login', [App\Http\Controllers\UsersController::class, 'get_login'])->name('user.get_login');
Route::post('/login', [App\Http\Controllers\UsersController::class, 'login'])->name('user.login');
Route::get('/logout', [App\Http\Controllers\UsersController::class, 'logout'])->name('user.logout');