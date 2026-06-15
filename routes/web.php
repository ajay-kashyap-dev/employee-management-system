<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('landing');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/employees/list', [App\Http\Controllers\HomeController::class, 'employees_list'])->name('employees.list');

Route::get('/employees/add', [App\Http\Controllers\HomeController::class, 'add_employee'])->name('employee.add');

Route::post('/employees/save', [App\Http\Controllers\HomeController::class, 'save_employee'])->name('employee.save');

Route::get('/employee/show/{id}', [App\Http\Controllers\HomeController::class, 'get_employee'])->name('employee.show');

Route::patch('/employee/update', [App\Http\Controllers\HomeController::class, 'update_employee'])->name('employee.update');

Route::delete('/employee/delete', [App\Http\Controllers\HomeController::class, 'delete_employee'])->name('employee.delete');

