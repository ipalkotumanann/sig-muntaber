<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\BlogController as HomeBlogController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ClinicController;
use App\Http\Controllers\Dashboard\CaseController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DistrictController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [MapController::class, 'index'])->name('home.map');
Route::get('/blog/{slug?}', [HomeBlogController::class, 'index'])->name('home.blog');
Route::get('/map', [MapController::class, 'index'])->name('home.map');
Route::get('/stats', [HomeController::class, 'stats'])->name('home.stats');
Route::get('/map/fetch', [MapController::class, 'fetch'])->name('home.map.fetch');
Route::get('/stats/fetch', [MapController::class, 'stats'])->name('home.stats.fetch');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
//Auth::routes();
//
Route::prefix('dashboard')
    ->middleware(['auth'])
    ->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/fetch-chart', [DashboardController::class, 'fetch'])->name('dashboard.fetch');

    // District
    Route::prefix('/district')->group(function () {
        Route::get('/', [DistrictController::class, 'index'])->name('dashboard.district');
        Route::get('/create', [DistrictController::class, 'create'])->name('dashboard.district.create');
        Route::get('/edit/{id}', [DistrictController::class, 'edit'])->name('dashboard.district.edit');
        Route::get('/delete/{id}', [DistrictController::class, 'destroy'])->name('dashboard.district.delete');

        Route::post('/store', [DistrictController::class, 'store'])->name('dashboard.district.store');
        Route::patch('/update/{id}', [DistrictController::class, 'update'])->name('dashboard.district.update');
    });

    // Category
    Route::prefix('/category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('dashboard.category');
        Route::get('/create', [CategoryController::class, 'create'])->name('dashboard.category.create');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('dashboard.category.edit');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('dashboard.category.delete');

        Route::post('/store', [CategoryController::class, 'store'])->name('dashboard.category.store');
        Route::patch('/update/{id}', [CategoryController::class, 'update'])->name('dashboard.category.update');
    });

    // User
    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('dashboard.user');
        Route::get('/create', [UserController::class, 'create'])->name('dashboard.user.create');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('dashboard.user.edit');
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('dashboard.user.delete');

        Route::post('/store', [UserController::class, 'store'])->name('dashboard.user.store');
        Route::patch('/update/{id}', [UserController::class, 'update'])->name('dashboard.user.update');
    });

    // Page
    Route::prefix('/page')->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('dashboard.page');
        Route::get('/create', [PageController::class, 'create'])->name('dashboard.page.create');
        Route::get('/edit/{id}', [PageController::class, 'edit'])->name('dashboard.page.edit');
        Route::get('/delete/{id}', [PageController::class, 'destroy'])->name('dashboard.page.delete');

        Route::post('/store', [PageController::class, 'store'])->name('dashboard.page.store');
        Route::patch('/update/{id}', [PageController::class, 'update'])->name('dashboard.page.update');
    });

    // Blog
    Route::prefix('/blog')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('dashboard.blog');
        Route::get('/create', [BlogController::class, 'create'])->name('dashboard.blog.create');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('dashboard.blog.edit');
        Route::get('/delete/{id}', [BlogController::class, 'destroy'])->name('dashboard.blog.delete');

        Route::post('/store', [BlogController::class, 'store'])->name('dashboard.blog.store');
        Route::patch('/update/{id}', [BlogController::class, 'update'])->name('dashboard.blog.update');
    });

    // Clinic
    Route::prefix('/clinic')->group(function () {
        Route::get('/', [ClinicController::class, 'index'])->name('dashboard.clinic');
        Route::get('/create', [ClinicController::class, 'create'])->name('dashboard.clinic.create');
        Route::get('/edit/{id}', [ClinicController::class, 'edit'])->name('dashboard.clinic.edit');
        Route::get('/delete/{id}', [ClinicController::class, 'destroy'])->name('dashboard.clinic.delete');

        Route::post('/store', [ClinicController::class, 'store'])->name('dashboard.clinic.store');
        Route::patch('/update/{id}', [ClinicController::class, 'update'])->name('dashboard.clinic.update');
    });

    // Cases
    Route::prefix('/cases')->group(function () {
        Route::get('/', [CaseController::class, 'index'])->name('dashboard.case');
        Route::get('/create', [CaseController::class, 'create'])->name('dashboard.case.create');
        Route::get('/fetch/{year}', [CaseController::class, 'fetch'])->name('dashboard.case.fetch');
        Route::get('/edit/{id}', [CaseController::class, 'edit'])->name('dashboard.case.edit');
        Route::get('/delete/{id}', [CaseController::class, 'destroy'])->name('dashboard.case.delete');

        Route::post('/store', [CaseController::class, 'store'])->name('dashboard.case.store');
        Route::patch('/update/{id}', [CaseController::class, 'update'])->name('dashboard.case.update');
    });
});

Route::get('/{slug?}', [HomeController::class, 'index'])->name('home');
