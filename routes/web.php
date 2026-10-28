<?php

use App\Http\Controllers\SiteVisitController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Middleware\AdminResponseHeaders;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome', ['project' => config('project')]))->name('home');
Route::get('/download-brochure', function () {
    return response()->download(public_path('pdf/Brochure.pdf'), 'Foothills-of-Mahabaleshwar-Project-Profile.pdf');
})->name('brochure');
Route::post('/site-visit', SiteVisitController::class)->middleware('throttle:6,1')->name('site-visit');
Route::get('/enquiry-attachment/{file}', [SiteVisitController::class, 'attachment'])
    ->where('file', '[A-Za-z0-9]+\.(pdf|jpg|jpeg|png)')
    ->middleware(['signed', 'throttle:30,1'])
    ->name('enquiry-attachment');

Route::prefix('admin')->name('admin.')->middleware(AdminResponseHeaders::class)->group(function () {
    Route::get('/login', [AuthController::class, 'create'])->name('login');
    Route::post('/login', [AuthController::class, 'store'])->middleware('throttle:5,1')->name('login.store');
    Route::middleware(['auth', EnsureAdmin::class])->group(function () {
        Route::get('/', [EnquiryController::class, 'index'])->name('enquiries.index');
        Route::get('/enquiries/{enquiry}', [EnquiryController::class, 'show'])->name('enquiries.show');
        Route::patch('/enquiries/{enquiry}', [EnquiryController::class, 'update'])->name('enquiries.update');
        Route::post('/enquiries/{enquiry}/documents', [EnquiryController::class, 'uploadDocuments'])->middleware('throttle:20,1')->name('documents.store');
        Route::get('/enquiries/{enquiry}/documents/{document}', [EnquiryController::class, 'download'])->name('documents.download');
        Route::get('/account', [AuthController::class, 'editPassword'])->name('account');
        Route::put('/account/password', [AuthController::class, 'updatePassword'])->middleware('throttle:5,1')->name('password.update');
        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
    });
});
