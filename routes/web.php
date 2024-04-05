<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailChimpController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AnnouncementController::class, 'homepage'])->name('homepage');
Route::get('/about-us', [AnnouncementController::class, 'about'])->name('about');
Route::resource('announcements', AnnouncementController::class);
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/user/profile', [UserController::class, 'profile'])->name('auth.profile');

Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::put('/accept/announcement/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('accept_announcement');
Route::put('/reject/announcement/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('reject_announcement');

Route::get('/revisor/becomeRevisor', [RevisorController::class, 'workWithUs'])->middleware('auth')->name('workWithUs.revisor');
Route::post('/revisor/becomeRevisor', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/revisor/makeRevisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
Route::get('search/announcement', [AnnouncementController::class, 'searchAnnouncements'])->name('announcements.search');

Route::get('/contact/{announcement}/contactSeller', [AnnouncementController::class, 'contactForm'])->name('announcements.formSeller');
Route::post('/contact/{announcement}/contactSeller', [AnnouncementController::class, 'contactSeller'])->name('announcements.contactSeller');

//Rotte Socialite
Route::get('/google/redirect', [App\Http\Controllers\SocialController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\SocialController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('auth/facebook', [SocialController::class, 'redirectToFacebook'])->name('facebook.redirect');
Route::get('auth/facebook/callback', [SocialController::class, 'handleFacebookCallback'])->name('facebook.callback');

Route::get('auth/linkedin', [SocialController::class, 'linkedinRedirect'])->name('linkedin.redirect');
Route::get('auth/linkedin/callback', [SocialController::class, 'linkedinCallback'])->name('linkedin.callback');

Route::post('/lingua/{lang}', [AnnouncementController::class,'setLocale'])->name('setLocale');

//Newsletter
Route::post('/subscribe-to-newsletter', [MailChimpController::class, 'subscribe'])->name('subscribe');