<?php

use App\Http\Controllers\SupportAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function() 
{
    return redirect()->route(
        Auth::guard('support')->check() ? 'support.panel.index' : 'support.login-view'
    );
});

Route::middleware('guest:support')->group(function() 
{
    Route::view('/login', 'support.login')->name('support.login-view');
    Route::post('/login', [SupportAuthController::class, 'login'])->name('support.login');
});

Route::middleware('auth:support')->group(function() 
{
    Route::post('/logout', [SupportAuthController::class, 'logout'])->name('support.logout');

    Route::prefix('/panel')->group(function() 
    {
        Route::view('/', 'support.panel.index')
            ->name('support.panel.index');

        Route::view('/users', 'support.panel.users.index')
            ->middleware('can:view-users')
            ->name('support.panel.users.index');

        Route::view('/tickets', 'support.panel.tickets.index')
            ->middleware('can:view-tickets')
            ->name('support.panel.tickets.index');
    });
}); 