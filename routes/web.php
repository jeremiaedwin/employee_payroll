<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/department', [App\Http\Controllers\Master\DepartmentController::class, 'index'])->name('department');
Route::get('/departmentData', [App\Http\Controllers\Master\DepartmentController::class, 'getData'])->name('department.data');
Route::post('/department', [App\Http\Controllers\Master\DepartmentController::class, 'store'])->name('department.store');
Route::post('/department/update', [App\Http\Controllers\Master\DepartmentController::class, 'update'])->name('department.update');
Route::get('/department/{id}', [App\Http\Controllers\Master\DepartmentController::class, 'getDataById']);
Route::delete('/department/{id}', [App\Http\Controllers\Master\DepartmentController::class, 'destroy'])->name('department.destroy');


Route::get('position', [App\Http\Controllers\Master\PositionController::class, 'index'])->name('position');
Route::get('positionData', [App\Http\Controllers\Master\PositionController::class, 'getData'])->name('position.data');
Route::post('position', [App\Http\Controllers\Master\PositionController::class, 'store'])->name('position.store');
Route::post('position/update', [App\Http\Controllers\Master\PositionController::class, 'update'])->name('position.update');
Route::get('position/{id}', [App\Http\Controllers\Master\PositionController::class, 'getDataById']);
Route::delete('position/{id}', [App\Http\Controllers\Master\PositionController::class, 'destroy'])->name('position.destroy');