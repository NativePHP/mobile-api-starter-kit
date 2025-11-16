<?php

use App\Livewire\Auth\Check;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Home;
use App\Livewire\News;
use App\Livewire\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('/', Check::class)->name('auth-check');

Route::middleware(['mobile.auth'])->group(function () {
    Route::get('/home', Home::class)->name('home');
    Route::get('/news', News::class)->lazy()->name('news');
    Route::get('/profile', Profile::class)->name('profile');
});
