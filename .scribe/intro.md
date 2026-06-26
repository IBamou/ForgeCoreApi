# Welcome to ForgeCore

ForgeCore is an **AI-powered content generation platform** that helps you create, manage, and optimize social media posts at scale.

## What you can do

| Feature | Description |
|---------|-------------|
| 🤖 **AI Post Generation** | Generate posts using blueprints (tone, platform, structure) and raw source content |
| 📐 **Blueprints** | Create content templates with tone targeting, platform settings, and style rules |
| 📝 **Inputs** | Store and organize your source materials for post generation |
| 💬 **AI Chat** | Refine and improve posts through conversation with the AI assistant |
| 🔍 **Global Search** | Search across all your resources from a single endpoint |

## Quick start

```bash
# 1. Register an account
curl -X POST http://forgecoreapi.test/api/v1/register \
  -H "Content-Type: application/json" \
  -d '{"name":"Your Name","email":"you@example.com","password":"your-password"}'

# 2. Use the returned token in subsequent requests
curl http://forgecoreapi.test/api/v1/posts \
  -H "Authorization: Bearer your-token-here"
```

## Base URL

All API endpoints are prefixed with `/api/v1/`.

## Rate limiting

| Endpoint group | Limit |
|---------------|-------|
| Authentication (`/login`, `/register`, etc.) | 5 requests/minute |
| Conversation messages (`/send`) | 10 requests/minute |
| General API | 60 requests/minute |

## Error format

All errors return a consistent JSON structure:

```json
{
  "message": "Error description",
  "errors": {}
}
```

## Additional resources

- [Postman Collection](/docs.postman) — import into Postman
- [OpenAPI Spec](/docs.openapi) — use with your API client
