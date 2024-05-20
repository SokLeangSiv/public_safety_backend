<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
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

Route::middleware('auth')->group(function(){
    Route::get('/feedback', [FeedbackController::class, 'Feedbackpage']);
    Route::get('/user', function () {
        return view('user');
    });
    Route::get('/report', function () {
        return view('crime_report');
    });
    Route::get('/Feedback_Form', function () {
        return view('Feedback_Form');
    });
    Route::get('/logout', [FeedbackController::class, 'destroy'])->name('logout.user');
    require __DIR__.'/auth.php';
})

// Route::get('/feedback', [FeedbackController::class, 'Feedbackpage']);

// Route::get('/user', function () {
//     return view('user');
// });

// Route::get('/report', function () {
//     return view('crime_report');
// });
// Route::get('/Feedback_Form', function () {
//     return view('Feedback_Form');
// });

// Route::get('/logout', [FeedbackController::class, 'destroy'])->name('logout.user');
require __DIR__.'/auth.php';
