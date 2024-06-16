<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ShowPokemon;
use App\Livewire\PokemonList;
use App\Livewire\PokemonManager;
use App\Livewire\ManageAttacks;
use App\Livewire\TypeManager;
use App\Livewire\EditAttack;


Route::get('/pokemon/{pokemon}', ShowPokemon::class)->name('pokemon.show');
Route::get('/pokemons', PokemonList::class)->name('pokemon.list');
Route::get('/pokemon/edit/{pokemon}', \App\Livewire\EditPokemon::class)->name('pokemon.edit');
Route::get('/pokemon-create', \App\Livewire\CreatePokemon::class)->name('pokemon.create');

Route::get('/manage-attacks', ManageAttacks::class)->name('manage-attacks');
Route::get('/edit-attack/{id}', EditAttack::class)->name('edit-attack');
Route::get('/create-attack', \App\Livewire\CreateAttack::class)->name('create-attack');


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
    Route::get('/attack-manager', ManageAttacks::class)->name('manage.attack');
    Route::get('/type-manager', TypeManager::class)->name('type.manager');


});

require __DIR__.'/auth.php';
