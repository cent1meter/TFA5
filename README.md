# SwiftPOS — IT0049 TFA5

Laravel 13 implementation of **From Zero to Four Pages, Again**.
Rebuilt from the supplied CodeIgniter POS project; preserves its styling and sample records.

## Requirements

PHP 8.3 or newer, Composer 2, and PHP extensions required by Laravel (including
mbstring, DOM, XML, cURL, OpenSSL and PDO). Enable pdo_sqlite for the optional
migration/seeder and database tests. Node, npm and MySQL are not needed.
If your XAMPP uses PHP 8.2, it cannot run this Laravel 13 project; install PHP 8.3+.
Check `php -v` and `composer --version` before continuing.

## Run locally on Windows (PowerShell)

Open a terminal in this directory, where `artisan` and `composer.json` are located:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
php artisan route:list
php artisan serve
```

Open http://127.0.0.1:8000 and visit `/about`, `/customers`, and `/users`.
Keep that terminal open. Use a second terminal in the same directory for tests.
On macOS/Linux, use `cp .env.example .env` instead of `Copy-Item`.
No database setup is required to view the four pages.

## Test and check for bugs

```powershell
composer test
php artisan view:cache
php artisan route:cache
php artisan optimize:clear
```

The tests check HTTP responses, navigation links, both complete record lists,
a missing-page 404, and repeatable database seeding. Database tests use temporary
in-memory SQLite, not your local data. Also open every navigation link on desktop
and phone widths, check that CSS loads, and scroll the two tables horizontally on a narrow screen.

## Optional database export equivalent

The assignment requires a database export OR migration and seeder files; both
migration and seeder files are included. The account pages intentionally keep
using static PHP arrays in the controllers, as required by TFA5.

```powershell
php -r "is_file('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate --seed
```

This creates `customers` and `staff_users`, with five records each. The seed
reuses the controller arrays, so the sample data stays consistent. These are
sample account listings, not an authentication or sales transaction system.

## Deploy to Render using Docker

1. Create a GitHub repository, then upload the CONTENTS of this folder at the repository root, including `composer.json`, `artisan`, `Dockerfile`, `deploy/`, and the configuration files. Do not upload `.env` or `vendor/`.
2. After `composer install` succeeds locally, commit the generated `composer.lock` to make future dependency installs reproducible. This package has no lock file because dependency downloads were unavailable in the preparation environment.
3. In Render choose **New > Web Service**, connect the GitHub repository, and select **Docker** as the runtime. The included Dockerfile builds PHP 8.3 with Apache and serves only `public/`.
4. Set these environment variables:

| Variable | Value |
| --- | --- |
| APP_ENV | production |
| APP_DEBUG | false |
| APP_KEY | Output of `php artisan key:generate --show` run locally |
| APP_URL | Your Render service's full HTTPS URL |
| LOG_CHANNEL | stderr |
| SESSION_DRIVER | file |
| CACHE_STORE | file |

5. Use `/up` as the health check path. Deploy and inspect the build and service logs. If the service URL is only assigned after creation, update APP_URL to that exact URL and redeploy.
6. Open all four page URLs and verify the CSS over HTTPS, five customer rows, five user rows, navigation, and `/missing-page` returning 404.

No production database is required for this static-array activity. Local session
and cache files can be lost on redeploy without losing the source records.
The Docker startup validates APP_KEY/APP_URL, caches config/routes/views, and
binds Apache to Render's PORT variable. Do not use Artisan's development server
as your production web server.

For a different PHP host, point its document root to `public/`, install production
dependencies with `composer install --no-dev --optimize-autoloader`, set the
production environment, and make `storage/` and `bootstrap/cache/` writable.

## TFA5 requirement map

| Requirement | Implementation |
| --- | --- |
| Landing `/` and about `/about` | PageController and pages Blade templates |
| Customer Accounts `/customers` | CustomerController, five static PHP records |
| User Accounts `/users` | UserController, five static PHP records |
| Four route definitions | routes/web.php |
| Blade @foreach listing loops | resources/views/customers/index.blade.php and users/index.blade.php |
| Navigation between all four pages | resources/views/layouts/app.blade.php |
| Migration and seeder | database/migrations and database/seeders |
| Tests | tests/Feature and GitHub Actions workflow |

## Submission checklist

- Fill in your name, section, professor, and group details on the activity sheet.
- Submit your actual GitHub repository URL with raw project files and migrations/seeder.
- Submit your actual hosted HTTPS URL after testing all four pages.
- Confirm the hosted site matches the submitted repository commit.

## Verification status

Source structure, route/controller/view references, five-record arrays, Blade
loops, local assets and markup were checked during preparation. PHP, Composer
and Docker were not available; external dependency downloads returned HTTP 403.
Consequently PHPUnit, Artisan, dependency resolution and the Docker build have
NOT been run here. No live deployment or GitHub repository was created; the
connected publishing integrations are disabled by the account administrator.
Run the commands above or the included GitHub Actions checks before submission.

Official references:
- https://laravel.com/docs/13.x/deployment
- https://laravel.com/docs/13.x/routing
- https://laravel.com/docs/13.x/blade
- https://render.com/docs/web-services
- https://render.com/docs/deploy-php-laravel-docker
