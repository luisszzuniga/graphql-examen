# Laravel et GraphQL

## Prérequis

PHP 8.1 ou supérieur, MySQL ou MariaDB, Composer.

## Installation

Copier le fichier `.env.example` en `.env` et modifier les informations de connexion à la base de données (MySQL ou MariaDB).

Ensuite, installer les dépendances avec la commande `composer install`.

Lancer les commandes suivantes :

- php artisan key:generate
- php artisan migrate
- php artisan db:seed

## GraphQL

Pour tester les requêtes GraphQL, il faut aller sur l'URL /graphiql

Le schéma de GraphQL est dans graphql/schema.graphql

Les modèles sont dans app/Models

Les mutations particulière sont dans app/GraphQL/Mutations