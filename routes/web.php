<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\BetaSignupController;
use App\Http\Controllers\Backend\ContactMessageController;
use App\Http\Controllers\Backend\DeletionRequestController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\FeatureController;
use App\Http\Controllers\Backend\PlanController;
use App\Http\Controllers\Backend\ScreenshotController;
use App\Http\Controllers\Backend\SecurityPointController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\TrustItemController;
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\Backend\StepController;
use App\Http\Controllers\Backend\VoiceCommandController;
use App\Http\Controllers\Frontend\AccountDeletionController;
use App\Http\Controllers\Frontend\BetaController;
use App\Http\Controllers\Frontend\ContactController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.home');
// })->name('home');

// Route::get('/', function () {
//     return view('pages.contact');
// })->name('contact');

// Route::get('/conditions', function () {
//     return view('pages.conditions');
// })->name('conditions');

// Route::get('/mentions-legales', function () {
//     return view('pages.mentions-legales');
// })->name('mentions-legales');

// Route::get('/confidentialite', function () {
//     return view('pages.confidentialite');
// })->name('confidentialite');


Route::get('/', [SiteController::class, 'home'])->name('home');


Route::get('/contact', [SiteController::class, 'contact'])->name('contact');

Route::get('/conditions', [SiteController::class, 'conditions'])->name('conditions');

Route::get('/confidentialite', [SiteController::class, 'confidentialite'])->name('confidentialite');

Route::get('/mentions-legales', [SiteController::class, 'mentions'])->name('mentions-legales');

Route::get('/supprimer-compte', [SiteController::class, 'supprimerCompte'])->name('supprimer-compte');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:5,1');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


Route::post('/beta', [BetaController::class, 'store'])->middleware('throttle:5,10')->name('beta.signup');


Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,10')->name('contact.send');

Route::post('/supprimer-compte', [AccountDeletionController::class, 'store'])
    ->middleware('throttle:3,10')->name('supprimer-compte.send');



Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('faqs', FaqController::class)->except('show');
    Route::get('faqs/{faq}/active', [FaqController::class, 'active'])->name('faqs.active');
    Route::resource('trust-items', TrustItemController::class)->except('show');
    Route::get('trust-items/{trustItem}/active', [TrustItemController::class, 'active'])->name('trust-items.active');
    Route::resource('steps', StepController::class)->except('show');
    Route::get('steps/{step}/active', [StepController::class, 'active'])->name('steps.active');
    Route::resource('features', FeatureController::class)->except('show');
    Route::get('features/{feature}/active', [FeatureController::class, 'active'])->name('features.active');
    Route::resource('screenshots', ScreenshotController::class)->except('show');
    Route::get('screenshots/{screenshot}/active', [ScreenshotController::class, 'active'])->name('screenshots.active');
    Route::resource('voice-commands', VoiceCommandController::class)->except('show');
    Route::get('voice-commands/{voiceCommand}/active', [VoiceCommandController::class, 'active'])->name('voice-commands.active');
    Route::resource('security-points', SecurityPointController::class)->except('show');
    Route::get('security-points/{securityPoint}/active', [SecurityPointController::class, 'active'])->name('security-points.active');
    Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    Route::resource('plans', PlanController::class)->except(['show', 'destroy']);
    Route::get('plans/{plan}/active', [PlanController::class, 'active'])->name('plans.active');
    Route::get('contact-messages', [ContactMessageController::class, 'index'])->name('contact-messages.index');
    Route::get('contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])->name('contact-messages.show');
    Route::patch('contact-messages/{contactMessage}/handled', [ContactMessageController::class, 'handled'])->name('contact-messages.handled');

    Route::get('deletion-requests', [DeletionRequestController::class, 'index'])->name('deletion-requests.index');
    Route::patch('deletion-requests/{deletionRequest}/handled', [DeletionRequestController::class, 'handled'])->name('deletion-requests.handled');
    Route::get('beta-signups', [BetaSignupController::class, 'index'])->name('beta-signups.index');
});