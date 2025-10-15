<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllergeenController;
use App\Http\Controllers\LeverancierController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

//allergenen index

Route::get('/allergeen', [AllergeenController::class, 'index'])->name('allergeen.index');

//allergenen create

Route::get('/allergeen/create',
 [AllergeenController::class, 'create'])->name('allergeen.create');

//allergenen store

Route::post('allergeen',
 [AllergeenController::class, 'store'])->name('allergeen.store');

 //allergenen delete

Route::delete('allergeen/{Id}',
 [AllergeenController::class, 'destroy'])->name('allergeen.destroy');

 //allergenen edit

Route::get('/allergeen/{id}/edit', 
[AllergeenController::class, 'edit'])->name('allergeen.edit');

//allergenen update

Route::put('/allergeen/{id}', 
[AllergeenController::class, 'update'])->name('allergeen.update');

//leveranciers index

Route::get('/leverancier', [LeverancierController::class, 'index'])->name('leverancier.index');

//producten index
Route::get('products',[ProductController::class, 'index'])->name('products.index');





Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
