<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProController;
use App\Models\Report;
use App\Http\Controllers\ReportController;

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

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
// Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/feedback', [FeedbackController::class, 'Feedback_table'])->name('feedback');

    Route::get('view-feedback/{id}', [FeedbackController::class, 'viewFeedback'])->name('view.feeback');

    Route::get('edit-feedback/{id}', [FeedbackController::class, 'editFeedback'])->name('edit.feedback');
    
    Route::put('update-feedback/{id}', [FeedbackController::class, 'updateFeedback'])->name('update.feedback');


    Route::get('/feedback/{id}/delete', [FeedbackController::class, 'deleteFeedback'])->name('feedback.delete');

    Route::get('/user', function () {
        return view('user');
    });

    Route::get('/report', [ReportController::class, 'showReport'])->name('report');

    Route::get('view-report/{id}', [ReportController::class, 'viewReport'])->name('view.report');

    Route::get('/report/{id}/edit', [ReportController::class, 'editReport'])->name('report.edit');

    Route::post('/report/{id}', [ReportController::class, 'updateReport'])->name('report.update');

    route::get('/report/{id}/delete', [ReportController::class, 'deleteReport'])->name('report.delete');

    Route::get('/Feedback_Form', function () {
        return view('Feedback_Form');
    });





















    Route::get('/map', [FeedbackController::class, 'showMap'])->name('map');

    Route::get('/logout', [FeedbackController::class, 'destroy'])->name('logout.user');

    Route::get('/profile', [ProController::class, 'editProfile'])->name('profile.show');
});

require __DIR__ . '/auth.php';

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
// require __DIR__.'/auth.php';
