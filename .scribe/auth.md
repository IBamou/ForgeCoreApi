# Authentication

ForgeCore uses **token-based authentication** via [Laravel Sanctum](https://laravel.com/docs/sanctum).

## How to get a token

**Register a new account:**

```bash
curl -X POST http://forgecoreapi.test/api/v1/register \
  -H "Content-Type: application/json" \
  -d '{"name":"John Doe","email":"john@example.com","password":"your-password"}'
```

**Or log in with existing credentials:**

```bash
curl -X POST http://forgecoreapi.test/api/v1/login \
  -H "Content-Type: application/json" \
  -d '{"email":"john@example.com","password":"your-password"}'
```

Both endpoints return:

```json
{
  "token": "1|abc123def456...",
  "user": {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com"
  }
}
```

## How to use your token

Include the token in the `Authorization` header of every request:

```
Authorization: Bearer 1|abc123def456...
```

Example:

```bash
curl http://forgecoreapi.test/api/v1/posts \
  -H "Authorization: Bearer 1|abc123def456..."
```

## Token lifecycle

- Tokens remain valid until you explicitly **log out**
- Up to **10 active tokens** per user (oldest are revoked when limit is exceeded)
- To revoke a token, call `POST /api/v1/logout`

> **Note:** Most endpoints require authentication. Unauthenticated requests receive a `401 Unauthorized` response.
