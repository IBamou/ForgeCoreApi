# Authenticating requests

Authenticate requests by including a **Bearer token** in the `Authorization` header.

```
Authorization: Bearer 1|abc123...
```

## Obtaining a Token

Register a new account or login to receive an API token:

- `POST /api/v1/register` — Create an account and get a token
- `POST /api/v1/login` — Login and get a token

The token is returned in the response body:

```json
{
  "token": "1|abc123...",
  "user": { ... }
}
```

## Token Usage

Include the token in subsequent requests as a Bearer token in the `Authorization` header. Tokens are valid until explicitly revoked (via logout).

**Important**: Most API endpoints require authentication. Unauthenticated requests will receive a `401 Unauthorized` response.
