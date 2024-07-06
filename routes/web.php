<?php

use App\Models\Report;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;

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
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'TotalReports'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/search', [DashboardController::class, 'searchReports'])->middleware(['auth', 'verified'])->name('dashboard.search');


Route::middleware(['auth','verified'])->group(function () {

    Route::get('/feedback', [FeedbackController::class, 'Feedback_table'])->name('feedback');

    Route::get('view-feedback/{id}', [FeedbackController::class, 'viewFeedback'])->name('view.feeback');

    Route::get('edit-feedback/{id}', [FeedbackController::class, 'editFeedback'])->name('edit.feedback');

    Route::put('update-feedback/{id}', [FeedbackController::class, 'updateFeedback'])->name('update.feedback');

    Route::get('/feedback/{id}/delete', [FeedbackController::class, 'deleteFeedback'])->name('feedback.delete');

    Route::get('feedback-form', [FeedbackController::class, 'showForm'])->name('feedback.form');

    Route::get('/feedback/search', [FeedbackController::class, 'searchFeedback'])->name('feedback.search');

    Route::post('/save-feedback', [FeedbackController::class, 'saveFeedback'])->name('feedback.save');

    Route::get('/user', function () {
        return view('user');
    });

    Route::get('/contact-us-table',[ContactUsController::class, 'ContactUs_table'])->name('contact_us_table');

    Route::get('view-contact/{id}', [ContactUsController::class, 'viewContact'])->name('view.contact');

    Route::get('/edit-contact/{id}/edit', [ContactUsController::class, 'editContact'])->name('edit.contact');

    Route::get('contact-form', [ContactUsController::class, 'showForm'])->name('contact.form');

    Route::post('/save-contact', [ContactUsController::class, 'saveContact'])->name('contact.save');

    Route::post('/update-contact/{id}', [ContactUsController::class, 'updateContact'])->name('update.contact');

    route::get('/contact/{id}/delete', [ContactUsController::class, 'deleteContact'])->name('delete.contact');

    Route::get('/contact/search', [ContactUsController::class, 'searchContact'])->name('contact.search');

    Route::get('/report', [ReportController::class, 'showReport'])->name('report');

    Route::get('/new-report', [ReportController::class, 'showNewReport'])->name('new.report');

    Route::get('/ongoing-report', [ReportController::class, 'showOngoingReport'])->name('ongoing.report');

    Route::get('/completed-report', [ReportController::class, 'showCompleteReport'])->name('completed.report');

    Route::get('view-report/{id}', [ReportController::class, 'viewReport'])->name('view.report');

    Route::get('/report/{id}/edit', [ReportController::class, 'editReport'])->name('report.edit');

    Route::post('/report/{id}', [ReportController::class, 'updateReport'])->name('report.update');

    route::get('/report/{id}/delete', [ReportController::class, 'deleteReport'])->name('report.delete');

    Route::get('/reports/{province}', [ReportController::class, 'showReportsByProvince'])->name('reports.by_province');

    Route::get('/report-form', [ReportController::class, 'ShowForm'])->name('report.form');

    Route::get('/search-reports', [ReportController::class, 'searchReports'])->name('search-reports');

    Route::get('/report/date/fliter', [ReportController::class, 'findDate'])->name('report.date.fliter');

    Route::post('/save-report-form', [ReportController::class, 'storeReport'])->name('report.store');

    Route::get('/Feedback_Form', function () {
        return view('Feedback_Form');
    });

    Route::get('/map', [ReportController::class, 'showMap'])->name('map');

    Route::get('/logout', [FeedbackController::class, 'destroy'])->name('logout.user');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    Route::post('/profile-save', [ProfileController::class, 'update'])->name('profile.update');

});
require __DIR__ . '/auth.php';


