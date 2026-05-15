<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LeadController;

#HOME ROUTE
Route::get('/', [PageController::class, 'home'])->name('home');

#LEAD ROUTE
Route::post('/lead', [LeadController::class, 'store'])->name('lead.store');

Route::post('/contact', [ContactController::class, 'send']);