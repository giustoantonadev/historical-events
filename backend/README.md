# Backend

Laravel backend for the Historical Events application.

## Prerequisites

- PHP 8.2+
- Composer
- Node.js + npm (for building assets)
- A database (MySQL, PostgreSQL, or SQLite)

## Quick start

1. Install PHP dependencies:

```
cd backend
composer install
```

2. Install Node dependencies (for backend assets):

```
npm install
```

3. Copy the environment file and generate an app key:

```
cp .env.example .env
php artisan key:generate
```

On Windows (CMD):

```
copy .env.example .env
php artisan key:generate
```

4. Configure your database in `.env`, then run migrations and seeders:

```
php artisan migrate --seed
# or to reset and reseed
php artisan migrate:fresh --seed
```

5. Run the application locally:

```
php artisan serve
# default: http://127.0.0.1:8000
```

6. Frontend assets

- The backend contains a small Vite-based asset pipeline. To run it during development:

```
npm run dev
```

- This project also contains a separate React frontend in the `frontend/` folder. To run that app:

```
cd ../frontend
npm install
npm run dev
```

## Build for production

- Build backend assets:

```
npm run build
```

- Build the React frontend (from the `frontend` folder):

```
cd ../frontend
npm run build
```

To serve the frontend from Laravel, copy the React `dist/` output into `backend/public` or configure your server to serve both apps.

## Tests

- Run the test suite:

```
php artisan test
# or
vendor/bin/phpunit
```

## Useful artisan commands

- `php artisan storage:link`
- `php artisan config:cache`
- `php artisan route:cache`
- `php artisan queue:work` (if using queues)

## Environment variables

Set database settings (`DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) and mail settings in `.env`. If the React frontend is used, set `VITE_API_URL` in the frontend `.env` to point to this backend (for example `http://localhost:8000`).

## Project layout (important paths)

- `app/` — application code (Controllers, Models)
- `routes/` — `web.php`, `api.php`
- `database/` — migrations, seeders, factories
- `tests/` — feature and unit tests
- `public/` — web root for built assets
- `composer.json` and `package.json` — dependency lists and npm scripts

## Notes

- Composer `post-create-project-cmd` in `composer.json` will run `php artisan key:generate` and `php artisan migrate` when creating a new project from the skeleton. See `composer.json` for more details.
- If you prefer Docker-based local development, the repo includes `laravel/sail` as a dev dependency — consult Laravel Sail docs to run with Docker.
