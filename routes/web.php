<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
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
  
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

    Route::post('/tasks/{project}', [TaskController::class, 'addTask'])->name('tasks.add');

    Route::put('/tasks/{task}/complete/{project}', [TaskController::class, 'completeTask'])->name('tasks.complete');

    Route::delete('/tasks/{task}/{project}', [TaskController::class, 'deleteTask'])->name('tasks.delete');

    Route::get('/tasks/{task}/edit/{project}', [TaskController::class, 'edit'])->name('tasks.edit');

    Route::put('/tasks/{task}/{project}', [TaskController::class, 'update'])->name('tasks.update');

    Route::post('/tasks/{task}/add-users/{project}', [TaskController::class, 'addUsers'])->name('tasks.addUsers');
    
    // ... d'autres routes

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::put('/projects/{project}/complete', [ProjectController::class, 'complete'])->name('projects.complete');
    Route::post('/projects/{project}/add-users', [ProjectController::class, 'addUsers'])->name('projects.addUsers');
    Route::get('/projects/{project}/showt', [ProjectController::class, 'showt'])->name('projects.showt');

    // Ajoutez cette route pour lier une tâche à un projet
    Route::post('/projects/{project}/tasks/add', [TaskController::class, 'addTask'])->name('projects.tasks.add');
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
