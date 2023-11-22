<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

// Home
Route::redirect('/', '/login');

// Cards
Route::controller(CardController::class)->group(function () {
    Route::get('/cards', 'list')->name('cards');
    Route::get('/cards/{id}', 'show');
});


// API
Route::controller(CardController::class)->group(function () {
    Route::put('/api/cards', 'create');
    Route::delete('/api/cards/{card_id}', 'delete');
});

Route::controller(ItemController::class)->group(function () {
    Route::put('/api/cards/{card_id}', 'create');
    Route::post('/api/item/{id}', 'update');
    Route::delete('/api/item/{id}', 'delete');
});


// Authentication
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register');
});

// Homepage
Route::controller(HomepageController::class)->group(function () {
    Route::get('/homepage', 'show')->name('homepage');
});

// Projects
Route::controller(ProjectController::class)->group(function () {
    Route::get('/project/{id}', 'show');
    Route::get('/projects/create',  'create')->name('projects.create');
    Route::post('/projects',  'store')->name('projects.store');
    Route::get('/project/{id}/edit', 'edit')->name('projects.edit');
    Route::put('/projects/{id}', 'update')->name('projects.update');
    Route::delete('/projects/{id}', 'destroy')->name('projects.destroy');

});

// Tasks
Route::controller(TaskController::class)->group(function () {
    Route::get('/task/{id}', 'show')->name('tasks.show');
    Route::get('/tasks/create/{id}',  'create')->name('tasks.create');
    Route::post('/tasks',  'store')->name('tasks.store');
});