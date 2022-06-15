<?php
/** Web Routes */
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Controllers\Web\WelcomeController;
use App\Http\Controllers\Web\PricingPageController;

/** Home page route */
Route::get('/', WelcomeController::class)
    ->name('welcome');

/** Pages routes */
Route::prefix('/pages')
    ->group(function () {
        /** Pricing page route */
        Route::get('/pricing', PricingPageController::class)
            ->name('pages.pricing');
    }
);

/** Dashboard route */
Route::redirect('/dashboard', '/management/dashboard')
    ->middleware('auth')
    ->name('dashboard');

/** Authentication routes */
Route::prefix('auth')
    ->group(function () {
        /** Login route */
        Route::get('/login', Login::class)
            ->middleware('guest')
            ->name('login');

        /** Register route */
        Route::get('/register', Register::class)
            ->middleware(['guest', 'signed'])
            ->name('register');

        /** Forgot password route */
        Route::get('/forgot-password', ForgotPassword::class)
            ->middleware('guest')
            ->name('password.request');

        /** Reset password route */
        Route::get('/reset-password/{token}', ResetPassword::class)
            ->middleware('guest')
            ->name('password.reset');
    }
);
