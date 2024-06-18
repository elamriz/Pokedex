# Pokédex avec Laravel et TailwindCSS

Ce repository contient le code source d'un Pokédex dynamique développé avec Laravel, TailwindCSS, et Livewire. Ce projet permet de gérer et présenter des Pokémon avec une interface de gestion (backoffice) et une interface utilisateur (frontoffice).

## Fonctionnalités

### Frontoffice
- **Liste des Pokémon** : Affichage d'une liste de Pokémon avec possibilité de recherche et de filtrage par type.
- **Détails d'un Pokémon** : Affichage des détails tels que le type, le poids, la taille, les PV et les attaques disponibles.
- **Liste des Attaques** : Affichage d'une liste des attaques avec détails comme les dégâts et la description.
- **Pokémon par Attaque** : Visualisation des Pokémon pouvant exécuter une attaque spécifique.

### Backoffice
- **Gestion des Pokémon** : Ajout, modification, et suppression de Pokémon.
- **Gestion des Attaques** : Gestion complète des attaques, y compris l'ajout, la modification et la suppression.
- **Gestion des Types** : Ajout et modification des types de Pokémon.

## Installation

### Prérequis
- PHP 7.4 ou supérieur
- MySQL ou un système de gestion de base de données compatible
- Composer
- npm ou yarn

### Étapes
1. Cloner le dépôt :
   ```
   git clone https://github.com/elamriz/Pokedex
   cd Pokedex
   ```
2. Installer les dépendances :
   ```
   composer install
   npm install
   ```
3. Configurer l'environnement :
   ```
   cp .env.example .env
   php artisan key:generate
   ```
4. Configurer la base de données dans `.env`, puis exécuter les migrations et les seeders :
   ```
   php artisan migrate
   php artisan db:seed
   ```
5. Lancer le serveur de développement :
   ```
   php artisan serve
   ```

## Contribution
Les contributions sont les bienvenues. Pour contribuer, veuillez forker le dépôt, créer une nouvelle branche pour vos modifications et soumettre une pull request.

## Liens Utiles
- [Documentation Laravel](https://laravel.com/docs)
- [Laracasts](https://laracasts.com)
- [Laravel News](https://laravel-news.com)
- [Stack Overflow](https://stackoverflow.com/questions/tagged/laravel)
- [Projet en ligne](https://pokedex.fun)
