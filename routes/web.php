<?php

use App\Http\Controllers\AllowanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeductionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PositionController;
use App\Models\Allowance;
use Illuminate\Support\Facades\Auth;
use Mockery\Generator\StringManipulationGenerator;

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
Auth::routes();
Route::get('/forgotPass', [LoginRegisterController::class,"forgotPass"])->name('forgotPass');
Route::post('/loginUser',[LoginRegisterController::class, 'loginUser'])->name('login.user');
Route::get('/logout',[LoginRegisterController::class, 'logoutUser'])->name('logout.user');
Route::get('/signup',[LoginRegisterController::class, 'signup'])->name('signup');
Route::get('/',[LoginRegisterController::class, 'login'])->name('signIn');

//All HR Users Routes List
Route::middleware(['auth', 'user-access:hr'])->group(function () {
Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard');

Route::get('/department', [DepartmentController::class, 'list'])->name('department-list');
Route::post('/department-save', [DepartmentController::class, 'save'])->name('department-save');
Route::get('/department-modal/{id}', [DepartmentController::class, 'modal'])->name('department-modal');
Route::post('/department-update', [DepartmentController::class, 'update'])->name('department-update');
Route::get('/department-deletemodal/{id}', [DepartmentController::class, 'deleteModal']);
Route::post('/department-delete', [DepartmentController::class, 'delete']);


Route::get('/position', [PositionController::class, 'list'])->name('position-list');
Route::post('/position-save', [PositionController::class, 'save'])->name('position-save');
Route::get('/position-modal/{id}', [PositionController::class, 'modal'])->name('position-modal');
Route::post('/position-update', [PositionController::class, 'update'])->name('position-update');
Route::get('/position-deletemodal/{id}', [PositionController::class, 'deleteModal']);
Route::post('/position-delete', [PositionController::class, 'delete'])->name('position-update');


Route::get('/deduction', [DeductionController::class, 'list'])->name('deduction-list');
Route::post('/deduction-save', [DeductionController::class, 'save'])->name('deduction-save');
Route::get('/deduction-modal/{id}', [DeductionController::class, 'modal'])->name('deduction-modal');
Route::post('/deduction-update', [DeductionController::class, 'update'])->name('deduction-modal');
Route::get('/deduction-deletemodal/{id}', [DeductionController::class, 'deleteModal']);
Route::post('/deduction-delete', [DeductionController::class, 'delete'])->name('deduction-modal');


Route::get('/employee', [EmployeeController::class, 'list'])->name('employee-list');
Route::post('/employee-save', [EmployeeController::class, 'saveEmployee'])->name('employee-save');
Route::get('/employee-modal/{id}', [EmployeeController::class, 'modal'])->name('employee-modal');
Route::post('/employee-update', [EmployeeController::class, 'updateEmployee'])->name('employee-update');
Route::get('/employee-deletemodal/{id}', [EmployeeController::class, 'deleteModal']);
Route::post('/employee-delete', [EmployeeController::class, 'deleteEmployee']);
Route::get('/employee-archive', [EmployeeController::class, 'archive']);


Route::get('/allowance', [AllowanceController::class, 'list'])->name('allowance-list');
Route::post('/allowance-save', [AllowanceController::class, 'saveAllowance'])->name('allowance-save');
Route::get('/allowance-modal/{id}', [AllowanceController::class, 'modal'])->name('allowance-modal');
Route::post('/allowance-update', [AllowanceController::class, 'update'])->name('allowance-modal');
Route::get('/allowance-deletemodal/{id}', [AllowanceController::class, 'deleteModal']);
Route::post('/allowance-delete', [AllowanceController::class, 'delete']);


Route::get('payroll', [PayrollController::class, 'list'])->name('payroll-list');
Route::get('payroll-save', [PayrollController::class, 'savePayroll'])->name('payroll-save');
Route::get('/monthlyrate-modal/{id}', [PayrollController::class, 'monthlyratemodal']);
Route::post('/monthlyrate_update', [PayrollController::class, 'mrateupdate']);


Route::get('check/deduc/{id}',[PayrollController::class, 'deduc']);
Route::post('add/deduc', [EmployeeController::class, 'empDeduction']);

Route::get('/practice', [HomeController::class, 'practice']);
});
  
//All Developer Routes List
Route::middleware(['auth', 'user-access:1'])->group(function () {
  

    Route::post('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
  







// //Optionallangto
// Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
//     Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
// });