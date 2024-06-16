<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
};
?>

<nav class="navbar bg-base-100 shadow-md">
    <div class="flex-1">
        <a href="{{ route('pokemon.list') }}" class="btn btn-ghost normal-case text-xl" wire:navigate>
            <x-application-logo class="block h-9 w-auto fill-current text-primary" />
        </a>
        <div class="hidden space-x-4 sm:flex ml-10">
            <a href="{{ route('dashboard') }}" class="btn btn-ghost" wire:navigate>
                {{ __('Dashboard') }}
            </a>
            <a href="{{ route('pokemon.create') }}" class="btn btn-ghost" wire:navigate>
                {{ __('Créer un Pokémon') }}
            </a>
            <a href="{{ route('create-attack') }}" class="btn btn-ghost" wire:navigate>
                {{ __('Créer une attaque') }}
            </a>
            <a href="{{ route('manage-attacks') }}" class="btn btn-ghost" wire:navigate>
                {{ __('Gérer les attaques') }}
            </a>
        </div>
    </div>
    <div class="flex-none">
        @if(auth()->check())
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost">
                    <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                    <svg class="fill-current ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </label>
                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="{{ route('profile') }}" wire:navigate>{{ __('Profile') }}</a></li>
                    <li><button wire:click="logout">{{ __('Log Out') }}</button></li>
                </ul>
            </div>
        @endif
        <div class="dropdown dropdown-end sm:hidden">
            <label tabindex="0" class="btn btn-square btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </label>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="{{ route('dashboard') }}" wire:navigate>{{ __('Dashboard') }}</a></li>
                <li><a href="{{ route('pokemon.create') }}" wire:navigate>{{ __('Créer un Pokémon') }}</a></li>
                <li><a href="{{ route('create-attack') }}" wire:navigate>{{ __('Créer une attaque') }}</a></li>
                <li><a href="{{ route('manage-attacks') }}" wire:navigate>{{ __('Gérer les attaques') }}</a></li>
                @if(auth()->check())
                    <li><a href="{{ route('profile') }}" wire:navigate>{{ __('Profile') }}</a></li>
                    <li><button wire:click="logout">{{ __('Log Out') }}</button></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
