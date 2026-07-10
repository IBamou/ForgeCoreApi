# ForgeCore API

AI-powered content generation API for creating and managing social media posts.

## Overview

ForgeCore generates social media content using AI (Groq API). Users define **Blueprints** (post templates with tone, platform, length rules) and **Inputs** (raw content), then generate **Posts** via AI. Conversations with an AI agent help refine posts.

- **AI Engine:** Groq (Llama 4 Scout 17B)
- **Queue:** Database-driven (Supervisor workers)
- **Auth:** Laravel Sanctum tokens
- **Docs:** Scribe — visit `/docs` after deployment

## Tech Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 13 / PHP 8.4 |
| Database | MySQL 8.0 |
| Cache | Database (configurable to Redis) |
| Queue | Database |
| Queue Worker | Supervisor (2 processes) |
| AI Provider | Groq API |
| Server | Ubuntu 24.04 / Nginx / PHP-FPM |
| CI/CD | GitHub Actions (Pint → Tests → Deploy) |

## Prerequisites

- PHP 8.4+
- Composer
- MySQL 8.0+
- Redis (optional, for cache)
- Node.js & npm (for Vite/assets)

## Local Setup

```bash
# 1. Clone the repository
git clone https://github.com/IBamou/ForgeCoreApi.git
cd ForgeCoreApi

# 2. Install PHP dependencies
composer install

# 3. Environment configuration
cp .env.example .env
php artisan key:generate

# 4. Configure .env
#    - Set DB_DATABASE, DB_USERNAME, DB_PASSWORD
#    - Set GROQ_API_KEY (get one at https://console.groq.com)

# 5. Run migrations
php artisan migrate

# 6. Start the development server
php artisan serve
```

## Environment Variables

| Variable | Description | Default |
|---|---|---|
| `APP_ENV` | Environment mode | `local` |
| `APP_DEBUG` | Debug mode | `true` |
| `APP_URL` | Application URL | `http://localhost` |
| `DB_CONNECTION` | Database driver | `mysql` |
| `DB_DATABASE` | Database name | `forgecoreapi` |
| `QUEUE_CONNECTION` | Queue driver | `database` |
| `GROQ_API_KEY` | Groq API key | — |
| `GROQ_MODEL` | AI model | `meta-llama/llama-4-scout-17b-16e-instruct` |
| `GROQ_BASE_URL` | Groq API endpoint | `https://api.groq.com/openai/v1` |

## Queue Workers

Posts are generated asynchronously via the queue. Run the worker locally:

```bash
php artisan queue:work
```

In production, Supervisor manages 2 workers:

```bash
sudo supervisorctl status forgecore-worker:*
```

## API Endpoints

Full documentation is available at `/docs` when the app is running.

### Authentication

| Method | Endpoint | Description |
|---|---|---|
| POST | `/api/v1/register` | Create account (returns token) |
| POST | `/api/v1/login` | Login (returns token) |

All other endpoints require `Authorization: Bearer {token}`.

### Posts

| Method | Endpoint | Description |
|---|---|---|
| GET | `/api/v1/posts` | List posts |
| POST | `/api/v1/posts/store` | Generate a new post |
| GET | `/api/v1/posts/{id}` | Get post details |
| PUT | `/api/v1/posts/{id}/update` | Update post |
| DELETE | `/api/v1/posts/{id}/archive` | Archive post |
| POST | `/api/v1/posts/{id}/retry` | Retry failed generation |

### Blueprints

| Method | Endpoint | Description |
|---|---|---|
| GET | `/api/v1/blueprints` | List blueprints |
| POST | `/api/v1/blueprints/store` | Create blueprint |
| GET | `/api/v1/blueprints/{id}` | Get blueprint |
| PUT | `/api/v1/blueprints/{id}/update` | Update blueprint |

### Inputs

| Method | Endpoint | Description |
|---|---|---|
| GET | `/api/v1/inputs` | List inputs |
| POST | `/api/v1/inputs/store` | Create input |
| GET | `/api/v1/inputs/{id}` | Get input |

### Conversations (AI Chat)

| Method | Endpoint | Description |
|---|---|---|
| GET | `/api/v1/conversations` | List conversations |
| POST | `/api/v1/conversations/store` | Create conversation |
| POST | `/api/v1/conversations/{id}/send` | Send message (gets AI reply) |

## Deployment

### Production Server (Azure VM)

The server runs Ubuntu 24.04 with:
- **Nginx** serving `/var/www/ForgeCoreApi/public`
- **PHP-FPM** 8.4
- **MySQL** 8.0
- **Supervisor** managing queue workers
- **Redis** (optional)

**SSH access:**
```bash
ssh -i "path/to/key.pem" ibamou@68.221.142.46
```

### CI/CD Pipeline

On push to `main`, GitHub Actions:
1. **Lint:** Runs `pint --test` (code style)
2. **Tests:** Runs `php artisan test` with MySQL service
3. **Deploy:** SSHs into the VM, pulls changes, installs deps, migrates, caches, restarts workers

### Manual Deploy

```bash
ssh -i "path/to/key.pem" ibamou@68.221.142.46
cd /var/www/ForgeCoreApi
git pull origin main
composer install --no-dev --optimize-autoloader --no-interaction
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
sudo supervisorctl restart forgecore-worker:*
```

## License

MIT
