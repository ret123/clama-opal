<?php

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
    $company = request()->session()->get('company');
    return view('companies.step-one',compact('company'));
});

// Registration first step
// Route::get('companies/first-step',[\App\Http\Controllers\CompanyController::class,'firstStep'])->name('companies.first.step');
Route::post('companies/store',[\App\Http\Controllers\CompanyController::class,'store'])->name('companies.post');

// Registration second step

Route::get('organizations/create',[\App\Http\Controllers\CompanyController::class,'createOrganizationForm'])->name('companies.organizations.create.form');
Route::post('organizations/store',[\App\Http\Controllers\CompanyController::class,'storeOrganizations'])->name('companies.organizations.post');

// Registration third step
Route::get('projects/create',[\App\Http\Controllers\ProjectController::class,'createForm'])->name('projects.create.form');
Route::post('projects/store',[\App\Http\Controllers\ProjectController::class,'store'])->name('projects.post');

// Registration fourth step
Route::get('milestones/create',[\App\Http\Controllers\MilestoneController::class,'createForm'])->name('milestones.create.form');
Route::post('milestones/store',[\App\Http\Controllers\MilestoneController::class,'store'])->name('milestones.post');

// Registration fifth step
Route::get('finances/create',[\App\Http\Controllers\FinanceController::class,'createForm'])->name('finance.create.form');
Route::post('finances/store',[\App\Http\Controllers\FinanceController::class,'store'])->name('finance.post');

