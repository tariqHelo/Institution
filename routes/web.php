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
use App\Http\Controllers\AnothorExchangeController;



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
})->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard', function () {
//        return view('layouts.admin');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/* Start Admin Route */
// Permissions
Route::resource('permissions', PermissionsController::class);
// Roles
Route::resource('roles', RolesController::class);
// Users
Route::resource('users', UsersController::class);
/* End Admin Route */
Route::resource('exchange', ExchangeController::class);
Route::get('exchange/delete/{id}', [ExchangeController::class , 'destroy'])->name('exchange.delete');

Route::resource('basket', BasketController::class);

Route::resource('anothor', AnothorExchangeController::class);
Route::get('anothor/delete/{id}', [AnothorExchangeController::class , 'destroy'])->name('ss');


Route::resource('repository', RepositoryController::class);
Route::get('repository/delete/{id}', [RepositoryController::class , 'destroy'])->name('repository.delete');

Route::resource('reports', ReportsController::class);

Route::resource('beneficiaries', BeneficiariesController::class);
//Route::get('beneficiaries/delete/{id}', [BeneficiariesController::class , 'destroy'])->name('beneficiaries.destroy');

Route::get('/basket/delete/{id}', [BasketController::class , 'destroy'])->name('basket.delete');
