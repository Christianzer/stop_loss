<?php

use App\Http\Controllers\DashboardControllers;
use App\Http\Controllers\PortefeuilleControllers;
use App\Http\Controllers\PostionControllers;
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

Route::get('/', [DashboardControllers::class, 'index']);
Route::get('/tableau_bord', [DashboardControllers::class, 'dashboard'])->name('dashboard');
Route::get('/portefeuille/portefeuille/index', [PortefeuilleControllers::class, 'index'])->name('portefeuille');
Route::get('/portefeuille/portefeuille/modifier/{id}', [PortefeuilleControllers::class, 'portefeuille_edit'])->name('portefeuille.modifier');
Route::post('/portefeuille/portefeuille/create', [PortefeuilleControllers::class, 'portefeuille_create'])->name('portefeuille.create');
Route::post('/portefeuille/portefeuille/edit/{id}', [PortefeuilleControllers::class, 'portefeuille_update'])->name('portefeuille.update');
Route::post('/portefeuille/portefeuille/delete', [PortefeuilleControllers::class, 'portefeuille_delete'])->name('portefeuille.delete');



Route::get('/portefeuille/position/index', [PostionControllers::class, 'index'])->name('position');
Route::get('/portefeuille/position/modifier/{id}', [PostionControllers::class, 'position_edit'])->name('position.modifier');
Route::post('/portefeuille/position/create', [PostionControllers::class, 'position_create'])->name('position.create');
Route::post('/portefeuille/position/edit/{id}', [PostionControllers::class, 'position_update'])->name('position.update');
Route::post('/portefeuille/position/delete', [PostionControllers::class, 'position_delete'])->name('position.delete');
