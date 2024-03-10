# README: Gestion et Réservation des Places d'Événements "Evento"

## Description du Projet

Le projet "Evento" vise à développer une plateforme de gestion et de réservation des places d'événements. Il s'agit d'une plateforme innovante qui offre une expérience utilisateur optimale aux participants, organisateurs et administrateurs. Les utilisateurs peuvent découvrir, réserver et générer des tickets pour une variété d'événements, tandis que les organisateurs peuvent créer et gérer leurs propres événements.

## Fonctionnalités Requises

### Utilisateur :
- Inscription et connexion à la plateforme.
- Réinitialisation de mot de passe.
- Consultation de la liste des événements avec pagination et filtrage.
- Recherche d'événements par catégorie ou par titre.
- Visualisation des détails d'un événement et réservation de places.
- Génération de tickets une fois la réservation confirmée.

### Organisateur :
- Création et gestion d'événements.
- Accès aux statistiques sur les réservations.
- Choix entre acceptation automatique ou validation manuelle des réservations.

### Administrateur :
- Gestion des utilisateurs et des catégories d'événements.
- Validation des événements créés par les organisateurs.
- Accès aux statistiques globales.

## Clonage et Utilisation du Projet

### Clonage du Projet

1. Assurez-vous d'avoir Git installé sur votre machine.
2. Ouvrez votre terminal.
3. Naviguez jusqu'au répertoire où vous souhaitez cloner le projet.
4. Exécutez la commande suivante :

```bash
git clone https://github.com/Youcode-Classe-E-2023-2024/Med-El-Bachiri_evento.git
```

### Configuration du Projet

1. Assurez-vous d'avoir PHP, Composer et Laravel installés sur votre machine.
2. Naviguez jusqu'au répertoire du projet cloné.
3. Renommez le fichier `.env.example` en `.env`.
4. Configurez les paramètres de base de données dans le fichier `.env`.
5. Exécutez la commande suivante pour installer les dépendances :

```bash
composer install
```

6. Générez la clé d'application Laravel en exécutant :

```bash
php artisan key:generate
```

7. Exécutez les migrations pour créer les tables de la base de données :

```bash
php artisan migrate
```

8. Exécutez les seeders pour peupler la base de données avec des données de test :

```bash
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=CitySeeder
php artisan db:seed --class=EventSeeder
php artisan db:seed --class=RoleSeeder
```

### Lancement du Serveur

Une fois que vous avez configuré le projet, vous pouvez le démarrer en exécutant la commande suivante :

```bash
php artisan serve
```

Cela lancera un serveur de développement local. Vous pouvez accéder à votre application en ouvrant votre navigateur et en visitant l'URL suivante : `http://localhost:8000`.

Assurez-vous que le serveur est en cours d'exécution à chaque fois que vous souhaitez accéder à l'application.

---
Ce README inclut désormais des instructions sur la façon de cloner et d'utiliser le projet, ainsi que des commandes pour exécuter les seeders pour les catégories, les villes, les événements et les rôles, fournissant un guide complet pour la configuration et l'utilisation du projet "Evento".
