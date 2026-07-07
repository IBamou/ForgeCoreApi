<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ForgeCore API</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #0f172a;
            color: #e2e8f0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            text-align: center;
        }
        .logo {
            font-size: 3rem;
            font-weight: 800;
            letter-spacing: -0.025em;
        }
        .logo span { color: #f97316; }
        .subtitle {
            font-size: 1.125rem;
            color: #64748b;
            margin-top: 0.75rem;
        }
        .status {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 2rem;
            padding: 0.5rem 1.25rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            background: #166534;
            color: #bbf7d0;
        }
        .status::before {
            content: '';
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #22c55e;
        }
        .footer {
            margin-top: 3rem;
            font-size: 0.875rem;
            color: #475569;
        }
        .footer a { color: #f97316; text-decoration: none; }
        .footer a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="logo">Forge<span>Core</span></div>
    <div class="subtitle">AI-Powered Content Generation API</div>
    <div class="status">All systems operational</div>
    <div class="footer">
        <a href="https://github.com/IBamou/ForgeCoreApi">GitHub</a>
    </div>
</body>
</html>
