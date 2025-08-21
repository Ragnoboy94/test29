# test29 — Laravel 12 API (Brands, Models, Cars) + Sanctum + Swagger

REST API для управления автопарком:
- Марки (`brands`)
- Модели (`car_models`)
- Авто (`cars`) — CRUD
- Доступ к авто только владельцу (Sanctum + Policy)

## Стек
- Laravel 12 (PHP 8.3)
- PostgreSQL 16
- Docker (php-fpm + nginx + postgres)
- Аутентификация: Laravel Sanctum (Bearer token)
- Документация API: Swagger UI (l5-swagger)

## Быстрый старт

```powershell
git clone https://gitlab.com/ragnoboy94/test29.git
cd test29

docker compose up -d pg php web
docker compose exec php composer install --no-interaction --prefer-dist
Скопировать .env.example .env

# .env ключевые параметры:
APP_URL=http://127.0.0.1:6080
DB_CONNECTION=pgsql
DB_HOST=pg
DB_PORT=5432
DB_DATABASE=test29
DB_USERNAME=test29
DB_PASSWORD=test29

docker compose exec php php artisan key:generate
docker compose exec php php artisan migrate --force
docker compose exec php php artisan db:seed --force

```
## Ссылка на документацию свагер
http://localhost:6080/api/documentation

## Дополнительные команды
```
docker compose exec php php artisan l5-swagger:generate
```
