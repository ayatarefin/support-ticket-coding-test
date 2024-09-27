<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {
    // Check user's auth
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return view('auth.login');
    }
});

// dashboard
Route::get('/dashboard', [TicketController::class, 'index'])->name('dashboard');

// Ticket routes
Route::middleware('auth')->group(function () {
    Route::get('tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('tickets/create', [TicketController::class, 'create'])->name('tickets.create');    
    Route::post('tickets', [TicketController::class, 'store'])->name('tickets.store');   
    Route::post('/tickets/close/{ticket}', [TicketController::class, 'close'])->name('tickets.close');    
    Route::post('tickets/{ticket}/open', [TicketController::class, 'open'])->name('tickets.open');
});
Route::get('/tickets/close/{ticket}', [TicketController::class, 'close'])->name('tickets.close')->middleware('signed');



require __DIR__ . '/auth.php';
