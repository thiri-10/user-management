<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Middleware\isAuthenticated;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', function () {
//     return view('dashboard');
// });

Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware(isAuthenticated::class)->group(function()
{
    Route::get('/users',[AdminUserController::class,'index'])->name('user.index');
Route::get('/users/create',[AdminUserController::class,'create'])->name('user.create');
Route::post('/users',[AdminUserController::class,'store'])->name('user.store');
Route::get('/users/{id}',[AdminUserController::class,'show'])->name('user.show');
Route::get('/users/{id}/edit',[AdminUserController::class,'edit'])->name('user.edit');
Route::put('/users/{id}',[AdminUserController::class,'update'])->name('user.update');
Route::delete('/users/destroy/{id}',[AdminUserController::class,'destroy'])->name('user.destroy');

Route::get('/roles',[RoleController::class,'index'])->name('role.index');
Route::get('/roles/create',[RoleController::class,'create'])->name('role.create');
Route::post('/roles',[RoleController::class,'store'])->name('role.store');
Route::get('/roles/edit/{id}',[RoleController::class,'edit'])->name('role.edit');
Route::put('/roles/{id}',[RoleController::class,'update'])->name('role.update');
Route::delete('/roles/destroy/{id}',[RoleController::class,'destroy'])->name('role.destroy');
});







