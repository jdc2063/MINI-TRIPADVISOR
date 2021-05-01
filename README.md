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

Ainsi, vous aurez installé des dossiers importants pour le bon fonctionnement du projet.

Vous devrez ensuite modifier le fichier .env afin de rentrer les informations de votre base de données qui se situe de la ligne 10 à 15.

Et enfin
- php artisan storage:link
- php artisan migrate:fresh --seed
- php artisan serv

## Information des pages

### Header

Toutes les pages ont le même header.
A gauche, vous avez un bouton pour aller à la page home.
A droite, les boutons changent selon si vous êtes connecté ou non:

- Si vous n'êtes pas connecté, Vous trouverez un bouton pour vous enregistrer et un autre pour vous connecter.
- Si vous êtes connecté, vous trouverez à la place un bouton pour avoir accès à votre profil et un bouton pour vous déconnecter.

### Profil

Vous voyez les informations d'un utilisateur. Si il s'agit du votre, une icone pour le modifier apparait à gauche de l'image.



### Home

Vous voyez la liste des établissements créés. Les établissements sans notes sont mis en avant et le reste sont triés par ordre décroissant par rapport à leur note. En appuyant sur les informations d'un établissement, vous êtes dirigé vers sa page.

Si vous êtes authentifié, un bouton "créer" apparait.

### Création d'établissement

Vous devez remplir obligatoirement remplir chaque information demandé excepté l'image, où il sera attribué une image par défaut si aucune image n'a été entrée.

### Affichage d'un établissement

Toutes les informations de l'établissement et ses commentaires sont affichés. Si vous êtes connecté, plusieurs boutons apparaissent et plusieurs actions vous sont permis:

- Vous pourrez modifier/supprimer l'établissement.$
- Vous pourrez ajouter un commentaire.
- Vous pourrez modifier/supprimer vos commentaires

A chaque ajout/modification/suppression d'un commentaire, la moyenne des notes est recalculée.

Vous pourrez voir le profil d'un utilisateur en appuyant sur son pseudo dans les commentaires.

### Modification de profil/d'établissement/de commentaire

Quelque soit ce que vous modifiez, les valeurs par défaut sont les valeurs de l'élément modifier. Toutes les informations sont obligatoires et ne pourront pas être vide. Pour ce qui est des images, elles ne sont pas obligatoires. Vous pouvez ne pas sélectionner d'image pour garder l'image actuelle, en choisir une pour la modifier ou même d'enlever l'image actuelle au profil de l'image par défaut.