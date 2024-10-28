<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProjectController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Show registeration form
Route::get('/', [IndexController::class, 'index'])->name('user.register');
// Handle registration
Route::post('/register', [IndexController::class, 'registerUser'])->name('register.user');


// Show login form
Route::get('login', [IndexController::class, 'login'])->name('login');

// Handle login
Route::post('login', [IndexController::class, 'loginUser'])->name('login.user');



Route::middleware('auth.admin')->group(function() {
    // Dashboard route
    Route::get('/dashboard', [IndexController::class, 'dashboard'])->name('admin.dashboard');

    // Auth route
    Route::any('/logout', [IndexController::class, 'logout'])->name('logout');

    // Project routes
    Route::prefix('projects')->group(function() {
        Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/{project}', [ProjectController::class, 'show'])->name('projects.show');
        Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');

        Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    // Tasks routes
    Route::prefix('projects')->group(function () {
        Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
        Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
        Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
        Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
        Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    });


    });
});
