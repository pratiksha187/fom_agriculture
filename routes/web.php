<?php

use App\Http\Controllers\SiteVisitController;
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
