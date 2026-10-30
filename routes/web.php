<?php

use App\Http\Controllers\SiteVisitController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Middleware\AdminResponseHeaders;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChannelPartnerController;
use App\Http\Controllers\PartnerWorkspaceController;
use App\Http\Controllers\PartnerPortalController;
use App\Http\Middleware\EnsureApprovedPartner;

Route::prefix('partners')->name('partners.')->middleware(AdminResponseHeaders::class)->group(function () {
    Route::get('/terms', [ChannelPartnerController::class, 'terms'])->name('terms');
    Route::get('/register', [ChannelPartnerController::class, 'create'])->name('register');
    Route::post('/register', [ChannelPartnerController::class, 'store'])->middleware('throttle:6,1,partner-registration')->name('store');
    Route::get('/login', [ChannelPartnerController::class, 'login'])->name('login');
    Route::post('/login', [ChannelPartnerController::class, 'authenticate'])->middleware('throttle:5,1,partner-login')->name('authenticate');
    Route::middleware(['auth', EnsureApprovedPartner::class])->group(function () {
        Route::get('/dashboard', [PartnerPortalController::class, 'dashboard'])->name('dashboard');
        Route::get('/leads', [PartnerPortalController::class, 'leads'])->name('leads.index');
        Route::get('/leads/create', [PartnerPortalController::class, 'createLead'])->name('leads.create');
        Route::get('/leads/{lead}', [PartnerPortalController::class, 'lead'])->name('leads.show');
        Route::get('/visits', [PartnerPortalController::class, 'visits'])->name('visits.index');
        Route::get('/bookings', [PartnerPortalController::class, 'bookings'])->name('bookings.index');
        Route::get('/commissions', [PartnerPortalController::class, 'commissions'])->name('commissions.index');
        foreach (['profile', 'resources', 'security', 'agreement'] as $page) {
            Route::get('/'.$page, [PartnerPortalController::class, 'account'])->name($page);
        }
        Route::post('/leads', [PartnerWorkspaceController::class, 'storeLead'])->middleware('throttle:20,1,partner-leads')->name('leads.store');
        Route::patch('/leads/{lead}/status', [PartnerWorkspaceController::class, 'updateProgress'])->middleware('throttle:30,1,partner-lead-status')->name('leads.status');
        Route::post('/leads/{lead}/visits', [PartnerWorkspaceController::class, 'requestVisit'])->middleware('throttle:10,1,partner-visits')->name('visits.store');
        Route::put('/password', [ChannelPartnerController::class, 'updatePassword'])->middleware('throttle:5,1,partner-password')->name('password.update');
    });
    Route::post('/logout', [ChannelPartnerController::class, 'logout'])->middleware('auth')->name('logout');
});

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
        Route::get('/partners', [ChannelPartnerController::class, 'index'])->name('partners.index');
        Route::get('/partners/{partner}', [PartnerWorkspaceController::class, 'show'])->name('partners.show');
        Route::patch('/partners/{partner}', [PartnerWorkspaceController::class, 'updatePartner'])->name('partners.update');
        Route::patch('/partners/{partner}/leads/{lead}', [PartnerWorkspaceController::class, 'updateLead'])->name('partners.leads.update');
        Route::patch('/partners/{partner}/visits/{visit}', [PartnerWorkspaceController::class, 'updateVisit'])->name('partners.visits.update');
        Route::put('/partners/{partner}/leads/{lead}/booking', [PartnerWorkspaceController::class, 'saveBooking'])->name('partners.bookings.save');
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
