# Introduction

ForgeCore is an AI-powered content generation API that helps you create, manage, and optimize social media posts. It provides:

- **AI Post Generation**: Generate posts using blueprints (tone, platform, structure rules) and raw input content
- **Blueprint Management**: Define content templates with tone, platform targeting, structure rules, and style guidelines
- **Input Management**: Store and organize source content for post generation
- **AI Chat**: Interact with an AI assistant to refine and improve your posts
- **Global Search**: Search across all your resources from a single endpoint

## Authentication

The API uses Laravel Sanctum token-based authentication. Include your token in the `Authorization` header:

```
Authorization: Bearer your-api-token-here
```

## Rate Limiting

- **Auth endpoints**: 5 requests per minute
- **API endpoints**: 60 requests per minute
- **Conversation send**: 10 requests per minute

## Error Responses

All errors return consistent JSON responses:

```json
{
  "message": "Error description",
  "errors": {}
}
```

## Base URL

All endpoints are prefixed with `/api/v1/`.
