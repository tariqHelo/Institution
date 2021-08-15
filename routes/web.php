<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;

use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\BeneficiariesController;



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
    return view('layouts.admin');
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/* Start Admin Route */
// Permissions
Route::resource('permissions', PermissionsController::class);
// Roles
Route::resource('roles', RolesController::class);
// Users
Route::resource('users', UsersController::class);
Route::resource('dealers', DealersController::class);
/* End Admin Route */
Route::resource('exchange', ExchangeController::class);
Route::resource('basket', BasketController::class);

Route::resource('repository', RepositoryController::class);
Route::resource('reports', ReportsController::class);

Route::resource('beneficiaries', BeneficiariesController::class);

Route::get('/basket/delete/{id}', [BasketController::class , 'destroy'])->name('basket.delete');
