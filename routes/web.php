<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:web',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', App\Livewire\Welcome::class)->name('dashboard');

    Route::get('/units', App\Livewire\Units\UnitList::class)->name('unit.units-list');
    Route::get('/unit/add', App\Livewire\Units\UnitAdd::class)->name('unit.unit-add');
    Route::get('/unit/{id}/edit', App\Livewire\Units\UnitEdit::class)->name('unit.unit-edit');

    Route::get('/agents', App\Livewire\Agents\AgentList::class)->name('agent.agents-list');
    Route::get('/agent/add', App\Livewire\Agents\AgentAdd::class)->name('agent.agent-add');
    Route::get('/agent/{id}/edit', App\Livewire\Agents\AgentEdit::class)->name('agent.agent-edit');

    Route::get('unit/{id}/unit-agent', App\Livewire\Agents\AgentUnit::class)->name('unit.unit-agents');

    Route::get('/points', App\Livewire\Points\PointList::class)->name('point.points-list');
});