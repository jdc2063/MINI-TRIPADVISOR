# MINI-TRIPADVISOR

# Installation

## Prérequis

Vous aurez besoin de composer afin d'installer les dépendances de Laravel

## Commandes

Une fois que vous aurez cloné le projet git, entrez dans le projet puis voici ce que vous devrez faire.

- cd laravel/
- composer install
- cp .env.example .env
- php artisan key:generate

Vous devrez ensuite modifier le fichier .env afin de rentrer les informations de votre base de données.

Et enfin
- php artisan migrate:fresh --seed
- php artisan serv