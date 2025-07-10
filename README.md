# Laravel URL Shortener

## Présentation
Ce projet est un raccourcisseur d’URL développé avec Laravel. Il permet de générer des liens courts, de rediriger vers l’URL d’origine et de suivre les statistiques de clics.

## Fonctionnalités principales
- **Raccourcissement d’URL** : Génère un code court unique pour chaque URL longue.
- **Redirection** : Redirige automatiquement vers l’URL d’origine lorsqu’on accède à l’URL courte.
- **Statistiques** : Compte le nombre de clics et enregistre la date/heure de chaque clic.

## Endpoints API
- `POST /api/shorten` : Raccourcir une URL
  - Body : `{ "url": "https://exemple.com/long/url" }`
  - Réponse : `{ "short_url": "http://localhost/abc123", "original_url": "...", "short_code": "abc123" }`

- `GET /{short_code}` : Redirige vers l’URL d’origine et incrémente le compteur

- `GET /api/stats/{short_code}` : Affiche les statistiques d’une URL
  - Réponse : `{ "original_url": "...", "short_code": "...", "click_count": 5, "created_at": "..." }`



## Structure du projet
- `app/Http/Controllers/UrlShortenerController.php` : Contrôleur principal
- `routes/api.php` : Routes API (raccourcissement, stats)
- `routes/web.php` : Routes web (redirection)
- `app/Models/Url.php` : Modèle Eloquent pour les URLs
- `app/Models/Click.php` : Modèle Eloquent pour les clics
- `database/migrations/` : Migrations pour la base de données

## Installation & Lancement
1. Cloner le dépôt
2. Installer les dépendances : `composer install`
3. Configurer `.env` pour la base de données
4. Lancer les migrations : `php artisan migrate`
5. Démarrer le serveur : `php artisan serve`

## Prochaines étapes
- Tester les endpoints avec Postman ou curl
- Ajouter la documentation détaillée de l’API
- Ajouter des fonctionnalités bonus si le temps le permet

---

*Ce fichier README est mis à jour au fur et à mesure de l’avancement du projet.*
