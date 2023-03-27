<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeductionController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PositionController;
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

Route::get('/position', [PositionController::class, 'list'])->name('position-list');
Route::post('/position-save', [PositionController::class, 'save'])->name('position-save');

Route::get('/deduction', [DeductionController::class, 'list'])->name('deduction-list');
Route::post('/deduction-save', [DeductionController::class, 'save'])->name('deduction-save');


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