<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and will be assigned to the
| "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    // Affichage du tableau de bord
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

    // Ajout de tâches
    Route::post('/tasks', [TaskController::class, 'addTask'])->name('tasks.add');

    // Marquage comme accompli
    Route::put('/tasks/{task}/complete', [TaskController::class, 'completeTask'])->name('tasks.complete');

    // Suppression de tâches
    Route::delete('/tasks/{task}', [TaskController::class, 'deleteTask'])->name('tasks.delete');

    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    
    Route::post('/tasks/{task}/add-users', [TaskController::class, 'addUsers'])->name('tasks.addUsers');

});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
