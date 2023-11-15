<?php

use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'welcome'])->name('welcome');
Route::post('/export', [IndexController::class, 'export'])->name('export');
Route::post('/import', [IndexController::class, 'import'])->name('import');
