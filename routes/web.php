<?php

use App\Http\Controllers\{ProfileController,CompanyController,UserController,ShortUrlController};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/', [AuthenticatedSessionController::class, 'create'])
                ->name('login');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
    Route::middleware(['is_super_admin'])->group(function(){
        Route::resource('companies', CompanyController::class);
    });

    Route::resource('users', UserController::class);
    
    Route::resource('short-urls', ShortUrlController::class);
    
    Route::get('/short_url/{short_code}', [ShortUrlController::class, 'redirect'])->name('short.redirect');
});

require __DIR__.'/auth.php';
