<?php

use App\Models\User;
use Livewire\Volt\Volt;
use App\Mail\JobApplied;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Validation\ValidationException;


Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    return redirect('/');
});

Volt::route('/application/{job}', 'guest.app-form');
Volt::route('/job-result/{tag}', 'guest.job-result')->name('job-result');

Route::middleware('auth')->group(function() {
    Route::view('/create-job', 'pages-hr.job-creation')->can('view-page');                        
    Volt::route('/edit-job/{job}', 'hr.job-edit')->can('view-page');
    Route::view('/candidate-list', 'pages-hr.all-applicant')->can('view-page');
    Route::view('/applicants', 'pages-hr.priority-applicant')->can('view-page');
    Volt::route('/employees', 'hr.employee-list')->can('view-page');
    Route::view('/hr-task', 'pages-hr.task-management');
    Route::view('/offboarding', 'pages-hr.offboarding')->can('view-page');
    Volt::route('/profile/{applicant}', 'hr.applicant-profile')->can('view-page');
    Route::view('/wall', 'pages-employee.freedom-wall');
    Route::view('/task-list', 'pages-employee.task-list')->can('view-page-employee');
    Route::view('/employee-dashboard', 'pages-employee.dashboard')->can('view-page-employee');
    Volt::route('/profile-edit/{user}', 'employee.profile');
    Volt::route('/change-profile/{user}', 'employee.change-profile');
    Route::view('/token', 'token')->can('view-page');
    Route::view('/failed-applicants', 'pages-hr.failed-applicants')->can('view-page');
    // Route::view('/employee-task', 'julsfolder.hr-portal');
    Volt::route('/resignation', 'employee.resignation-form');
});
Volt::route('/jobpost', 'guest.job-post');
// Route::middleware('guest')->group(function() {
//     Route::view('/', 'user.login')->name('login');
// });

Route::get('/', function () {
    if (auth()->check()) {
        if(Auth::user()->role === 'hr'){
            return redirect('/candidate-list');
        }elseif(Auth::user()->role === 'emp'){
            return redirect('/employee-dashboard');
        }
    }
    return view('user.login');
})->name('login');

Route::view('/docs', 'api-docs');


                     