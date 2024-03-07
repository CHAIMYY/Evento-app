<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/home', [EventController::class, 'index'])->name('index');
// Route::get('/home', [EventController::class, 'search'])->name('event.search');


// Route to display the form
// Route::get('/events', [EventController::class, 'index'])->name('events.create');
// // Route to handle form submission
// Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
// // Optional: Route to show individual events
// Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');


// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
// Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/Categories',[CategoryController::class, 'view'])->name('categories');
Route::post('/Categories',[CategoryController::class, 'create'])->name('addCategorie');
Route::put('/Categorie',[CategoryController::class, 'update'])->name('updateCategorie');
Route::delete('/Categories/{categorie}',[CategoryController::class, 'delete'])->name('deleteCategorie');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

require __DIR__.'/auth.php';
