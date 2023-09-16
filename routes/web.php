<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\ProfileController;
use Faker\Guesser\Name;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// route::get('/', [HomeController::class, 'index']);

Route::get('/', [KalkulatorController::class, 'index']);
Route::post('/kalkulator/hitung', [KalkulatorController::class, 'hitung']);
// Route::post('', 'KalkulatorController@hitung');



Route::middleware('admin')->group(function () {
    // Route::get('/admin', function () {
    //     return 'Hello Admin';
    // })->name('admin');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/view', [AdminController::class, 'view'])->name('admin.view');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    route::put('admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    route::delete('admin/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
