<?php

use App\Http\Controllers\ListContainerController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('list')->group(function(){
    Route::post('/', [ListContainerController::class, 'create']);
    Route::get('/', [ListContainerController::class, 'read'])->name('list.view');
    Route::patch('/{list}', [ListContainerController::class, 'update'])->name('list.update');
    Route::get('/{list}/edit', [ListContainerController::class, 'edit'])->name('list.edit');
    Route::delete('/{list}', [ListContainerController::class, 'delete'])->name('list.delete');
    Route::get('/create', [ListContainerController::class, 'createView']);
});