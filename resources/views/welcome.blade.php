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
        }
        .container {
            max-width: 720px;
            width: 100%;
            text-align: center;
        }
        .logo {
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: -0.025em;
            margin-bottom: 0.5rem;
        }
        .logo span { color: #f97316; }
        .subtitle {
            font-size: 1.125rem;
            color: #94a3b8;
            margin-bottom: 3rem;
        }
        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .badge-green { background: #166534; color: #bbf7d0; }
        .badge-blue { background: #1e3a5f; color: #93c5fd; }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin: 2rem 0 3rem;
        }
        .card {
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 0.75rem;
            padding: 1.5rem;
            text-align: left;
            transition: border-color 0.2s;
        }
        .card:hover { border-color: #f97316; }
        .card h3 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .card p {
            font-size: 0.875rem;
            color: #94a3b8;
            margin-bottom: 1rem;
        }
        .card .method {
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.125rem 0.5rem;
            border-radius: 0.25rem;
        }
        .method-get { background: #166534; color: #bbf7d0; }
        .method-post { background: #1e40af; color: #bfdbfe; }
        .method-put { background: #92400e; color: #fde68a; }
        .method-delete { background: #991b1b; color: #fecaca; }
        code {
            font-family: 'JetBrains Mono', 'Fira Code', monospace;
            font-size: 0.8125rem;
            color: #e2e8f0;
        }
        .endpoint {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.25rem;
        }
        .endpoint code { color: #cbd5e1; }
        .footer {
            margin-top: 3rem;
            font-size: 0.875rem;
            color: #64748b;
        }
        .footer a { color: #f97316; text-decoration: none; }
        .footer a:hover { text-decoration: underline; }
        .version {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">Forge<span>Core</span></div>
        <div class="subtitle">AI-Powered Content Generation API</div>

        <div class="version">
            <span class="badge badge-green">v{{ app()->version() }}</span>
            <span class="badge badge-blue">API</span>
            <span style="color:#94a3b8;">Laravel {{ app()->version() }}</span>
        </div>

        <div class="cards">
            <div class="card">
                <h3>Authentication</h3>
                <p>Register and manage API access</p>
                <div class="endpoint">
                    <span class="method method-post">POST</span>
                    <code>/api/v1/register</code>
                </div>
                <div class="endpoint">
                    <span class="method method-post">POST</span>
                    <code>/api/v1/login</code>
                </div>
            </div>

            <div class="card">
                <h3>Posts</h3>
                <p>Create and manage content posts</p>
                <div class="endpoint">
                    <span class="method method-get">GET</span>
                    <code>/api/v1/posts</code>
                </div>
                <div class="endpoint">
                    <span class="method method-post">POST</span>
                    <code>/api/v1/posts</code>
                </div>
            </div>

            <div class="card">
                <h3>Agents</h3>
                <p>Configure AI generation agents</p>
                <div class="endpoint">
                    <span class="method method-get">GET</span>
                    <code>/api/v1/agents</code>
                </div>
                <div class="endpoint">
                    <span class="method method-post">POST</span>
                    <code>/api/v1/agents</code>
                </div>
            </div>
        </div>

        <p style="color:#64748b;font-size:0.875rem;">
            <span style="display:inline-block;width:8px;height:8px;border-radius:50%;background:#22c55e;margin-right:0.5rem;"></span>
            All systems operational
        </p>

        <div class="footer">
            ForgeCore API &mdash; <a href="https://github.com/IBamou/ForgeCoreApi">GitHub</a>
        </div>
    </div>
</body>
</html>
