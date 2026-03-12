# ⚙️ LDMS Backend — Laravel REST API

## Setup Locally

```bash
# 1. Create Laravel project
composer create-project laravel/laravel ldms-api

# 2. Copy all files from this folder into ldms-api/
#    (controllers, models, migrations, routes, config, bootstrap)

# 3. Install Sanctum
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

# 4. Setup .env
cp .env.example .env
php artisan key:generate

# 5. Set DB in .env then:
php artisan migrate --seed

# 6. Run
php artisan serve
# API available at: http://localhost:8000/api
```

## Deploy to Railway (Free)

1. Push `backend/` folder to a GitHub repo
2. Go to https://railway.app → New Project → Deploy from GitHub
3. Set environment variables (same as .env):
   - `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` (from Railway MySQL plugin)
   - `APP_KEY` (run `php artisan key:generate --show` locally)
4. After deploy, your API URL will be: `https://xxxx.up.railway.app/api`

## Files to Copy

| From `backend/`                        | To `ldms-api/`                          |
|----------------------------------------|-----------------------------------------|
| `app/Http/Controllers/*.php`           | `app/Http/Controllers/`                 |
| `app/Http/Middleware/RoleMiddleware.php`| `app/Http/Middleware/`                  |
| `app/Models/*.php`                     | `app/Models/`                           |
| `database/migrations/*.php`            | `database/migrations/`                  |
| `database/seeders/DatabaseSeeder.php`  | `database/seeders/`                     |
| `routes/api.php`                       | `routes/api.php`                        |
| `bootstrap/app.php`                    | `bootstrap/app.php`                     |
| `config/cors.php`                      | `config/cors.php`                       |

## API Endpoints

| Method | Endpoint | Auth | Description |
|--------|----------|------|-------------|
| POST | /api/login | No | Login → returns token |
| POST | /api/register | No | Register seller |
| POST | /api/logout | Yes | Logout |
| GET | /api/admin/dashboard | Admin | Stats & charts |
| GET | /api/admin/users | Admin | List users |
| POST | /api/admin/users | Admin | Create user |
| POST | /api/admin/users/{id}/toggle | Admin | Toggle active |
| GET | /api/admin/orders | Admin | All orders |
| GET | /api/admin/orders/{id} | Admin | Order detail |
| POST | /api/admin/orders/{id}/assign | Admin | Assign driver |
| POST | /api/admin/orders/{id}/status | Admin | Update status |
| GET | /api/admin/reports | Admin | Reports |
| GET | /api/seller/dashboard | Seller | My stats |
| GET | /api/seller/orders | Seller | My orders |
| POST | /api/seller/orders | Seller | Create order |
| GET | /api/seller/orders/{id} | Seller | Order detail |
| PUT | /api/seller/orders/{id} | Seller | Edit (pending only) |
| GET | /api/driver/dashboard | Driver | My stats |
| GET | /api/driver/deliveries | Driver | Active deliveries |
| GET | /api/driver/deliveries/history | Driver | Completed |
| GET | /api/driver/deliveries/{id} | Driver | Detail |
| POST | /api/driver/deliveries/{id}/status | Driver | Update status |

## Default Users (after seeding)

| Email | Password | Role |
|-------|----------|------|
| admin@ldms.com | password | Admin |
| sara@ldms.com | password | Seller |
| ali@ldms.com | password | Driver |
