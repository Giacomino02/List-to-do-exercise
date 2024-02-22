<?php

use App\Http\Controllers\ListContainerController;
use App\Models\ListContainer;
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

Route::prefix('list')->group(function(){
    Route::post('/', [ListContainerController::class, 'create']);
    Route::get('/', [ListContainerController::class, 'read'])->name('list.view');
    Route::patch('/{list}', [ListContainerController::class, 'update'])->name('list.update');
    Route::get('/{list}/edit', [ListContainerController::class, 'edit'])->name('list.edit');
    Route::delete('/{list}', [ListContainerController::class, 'delete'])->name('list.delete');
    Route::get('/create', [ListContainerController::class, 'createView']);
});