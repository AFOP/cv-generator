<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PdfController;

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

Route::get('/', [ProfileController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'show']);

Route::get('/profile', [ProfileController::class, 'items']);

Route::post('/profile', [ProfileController::class, 'store'])->name('profile');

Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/item', [ItemController::class, 'show']);

Route::post('/item', [ItemController::class, 'store'])->name('item');

Route::get('/item', [ItemController::class, 'index'])->name('item.index');

Route::put('/item/{id}', [ItemController::class, 'update'])->name('item.update');

Route::delete('/item/{id}', [ItemController::class, 'destroy'])->name('item.destroy');

Route::get('/experience', [ExperienceController::class, 'show']);

Route::get('/experience', [ExperienceController::class, 'index']);

Route::post('/experience', [ExperienceController::class, 'store'])->name('experience');

Route::delete('/experience/{id}', [ExperienceController::class, 'destroy'])->name('experience.destroy');

Route::get('/education', [EducationController::class, 'show']);

Route::get('/education', [EducationController::class, 'index']);

Route::post('/education', [EducationController::class, 'store'])->name('education');

Route::delete('/education/{id}', [EducationController::class, 'destroy'])->name('education.destroy');

Route::get('/download-pdf', [PdfController::class, 'pdf'])->name('download-pdf');

Route::get('/contact', [ContactController::class, 'index']);

Route::post('/contact', [ContactController::class, 'store'])->name('contact');

Route::put('/contact/{id}', [ContactController::class, 'update'])->name('contact.update');
