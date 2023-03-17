<?php

use App\Http\Controllers\DashboardControllers;
use App\Http\Controllers\PortefeuilleControllers;
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
Route::get('/portefeuille/portefeuille/index', [PortefeuilleControllers::class, 'portefeuille'])->name('portefeuille');
Route::post('/portefeuille/portefeuille/create', [PortefeuilleControllers::class, 'portefeuille_create'])->name('portefeuille.create');
Route::get('/portefeuille/position/index', [PortefeuilleControllers::class, 'position'])->name('position');
