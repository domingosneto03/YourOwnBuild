<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SearchController;

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

// Search
Route::controller(SearchController::class)->group(function () {
    Route::get('/search', 'index');
});

// Tasks
Route::controller(TaskController::class)->group(function () {
    Route::get('/task/{id}', 'show')->name('tasks.show');
    Route::get('/tasks/create/{id}',  'create')->name('tasks.create');
    Route::post('/tasks',  'store')->name('tasks.store');
    Route::get('/task/{id}/edit', 'edit')->name('tasks.edit');
    Route::put('/task/{id}', 'update')->name('tasks.update');
    Route::delete('/tasks/{id}', 'destroy')->name('tasks.destroy');
    Route::put('/tasks/{id}/update-completion', 'updateCompletion');
});



// Cena para mudar depois
Route::get('/fetch-content', 'YourController@fetchContent');