<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LeadController;

#HOME ROUTE
Route::get('/', [PageController::class, 'home'])->name('home');

#LEAD FORM SUBMISSION
Route::middleware(['throttle:10,1'])->group(function () {
    Route::post('/lead', [LeadController::class, 'store'])->name('lead.store');
});