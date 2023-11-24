<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Campany;
use App\Livewire\Construction;
use App\Livewire\Dashboard;
use App\Livewire\Fraud;
use App\Livewire\Member;
use App\Livewire\Past;
use App\Livewire\Register;
use App\Livewire\Test;
use App\Livewire\Top;
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

Route::get('/', Top::class)->name('top');
Route::get('/register', Register::class)->name('register');

Route::middleware('login')->group(function() {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/campany', Campany::class)->name('campany');
    Route::get('/member', Member::class)->name('member');
    Route::get('/construction', Construction::class)->name('construction');
    Route::get('/past/{id}', Past::class)->name('past');
});

Route::get('/fraud', Fraud::class)->name('fraud');
// Route::get('/', JimTop::class)->name('top');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
