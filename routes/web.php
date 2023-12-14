<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfilePageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RequestJoinController;
use App\Http\Controllers\InvitedController;

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
    Route::get('/homepage/discover', 'showDiscover')->name('homepage.discover');
});

// Projects
Route::controller(ProjectController::class)->group(function () {
    Route::get('/project/{id}', 'show');
    Route::get('/projects/stuff', 'showHomepage');
    Route::get('/projects/create',  'create')->name('projects.create');
    Route::post('/projects',  'store')->name('projects.store');
    Route::get('/project/{id}/edit', 'edit')->name('projects.edit');
    Route::put('/projects/{id}', 'update')->name('projects.update');
    Route::delete('/projects/{id}', 'destroy')->name('projects.destroy');
    Route::get('/project/{id}/tasks', 'tasks')->name('projects.tasks');
    Route::get('/project/{id}/team', 'showTeam')->name('projects.team');

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
    Route::put('/task/{id}', 'update')->name('tasks.update');
    Route::delete('/tasks/{id}', 'destroy')->name('tasks.destroy');
    Route::put('/tasks/{id}/update-completion', 'updateCompletion');
    Route::put('/tasks/{id}/update-assign', 'updateAssign')->name('tasks.updateAssign');
});

// Profile Page
Route::controller(ProfilePageController::class)->group(function () {
    Route::get('/user/{id}', 'show')->name('profile.show');
    Route::get('/user/{id}/profile', 'showProfile');
    Route::get('/user/{id}/edit', 'editShow');
    Route::get('/user/{id}/invitations', 'showInvitations');
});

// User
Route::controller(UserController::class)->group(function () {
    Route::put('/user/{id}', 'update')->name('user.update');
});

// Admin
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'show')->name('admin.show');
    Route::get('/admin/users', 'showUsers')->name('admin.showUsers');
    Route::get('/admin/projects', 'showProjects')->name('admin.showProjects');
});

// Comments
Route::controller(CommentController::class)->group(function () {
    Route::post('/comments/task/{id}',  'store')->name('comments.store');
    Route::delete('/comments/{id}',  'destroy')->name('comments.destroy');
});

// Join Requests
Route::controller(RequestJoinController::class)->group(function () {
    Route::post('/request/{id_user}/{id_project}',  'requestJoin')->name('project.request');
    Route::post('/requests/accept/{id_user}/{id_project}',  'accept')->name('requests.accept');
    Route::post('/requests/refuse/{id_user}/{id_project}',  'refuse')->name('requests.refuse');
});

// Invites
Route::controller(InvitedController::class)->group(function () {
    Route::post('/invite/{id_user}/{id_project}',  'invite')->name('project.invite');
    Route::post('/invite/accept/{id_user}/{id_project}',  'accept')->name('invite.accept');
    Route::post('/invite/refuse/{id_user}/{id_project}',  'refuse')->name('invite.refuse');
});