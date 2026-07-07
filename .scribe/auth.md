# Authenticating requests

To authenticate requests, include an **`Authorization`** header with the value **`"Bearer {YOUR_AUTH_TOKEN}"`**.

All authenticated endpoints are marked with a `requires authentication` badge in the documentation below.

    You can obtain a token by registering a new account or logging in:
    - `POST /api/v1/register` — Create account and receive token
    - `POST /api/v1/login` — Login and receive token

    Include the token in the `Authorization` header:
    ```
    Authorization: Bearer your-token-here
    ```
