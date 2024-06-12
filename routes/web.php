<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ShowPokemon;
use App\Livewire\PokemonList;
use App\Livewire\PokemonManager;

Route::get('/pokemon/{pokemon}', ShowPokemon::class)->name('pokemon.show');
Route::get('/pokemons', PokemonList::class)->name('pokemon.list');

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/pokemon-manager', PokemonManager::class)->name('pokemon.manager');
});

require __DIR__.'/auth.php';
