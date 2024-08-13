<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:agent',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', App\Livewire\Welcome::class)->name('dashboard');

    Route::get('/points', App\Livewire\Points\PointList::class)->name('point.points-list');
    Route::get('/point/add', App\Livewire\Points\PointAdd::class)->name('point.point-add');
});