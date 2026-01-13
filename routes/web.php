<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Mail;

#HOME ROUTE
Route::get('/', [PageController::class, 'home'])->name('home');

#MOCKUPS ROUTES
#resto
Route::get('/mockups/restaurant', fn () => view('templates.resto.index') )->name('mock.resto');
Route::prefix('legal')->group(function () {
    Route::view('/mentions-legales', 'templates.resto.legal.mentions')->name('legal.mentions');
    Route::view('/cgv', 'templates.resto.legal.cgv')->name('legal.cgv');
    Route::view('/confidentialite', 'templates.resto.legal.privacy')->name('legal.privacy');
});

#coach
Route::get('/mockups/coach', fn () => view('templates.coach.index') )->name('mock.coach');
Route::prefix('coach/legal')->group(function () {
    Route::view('/mentions-legales', 'templates.coach.legal.mentions')->name('legal.mentions');
    Route::view('/cgv', 'templates.coach.legal.cgv')->name('legal.cgv');
    Route::view('/confidentialite', 'templates.coach.legal.privacy')->name('legal.privacy');
});
Route::post('/api/bookings', function (Illuminate\Http\Request $request) {
    // Envoyer un email au coach
    Mail::send('emails.booking-confirmation', $request->all(), function ($mail) {
        $mail->to('coach@example.com');
    });
    
    return response()->json(['success' => true]);
});

#artisan
Route::get('/mockups/artisan', fn () => view('templates.artisan.index') )->name('mock.artisan');


#LEAD FORM SUBMISSION
Route::middleware(['throttle:10,1'])->group(function () {
    Route::post('/lead', [LeadController::class, 'store'])->name('lead.store');
});