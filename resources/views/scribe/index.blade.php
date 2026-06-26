<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>ForgeCore API Documentation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-elements.style.css") }}" media="screen">
    <link rel="stylesheet" href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/github-dark.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/languages/http.min.js"></script>
    <script>hljs.highlightAll();</script>
    <style>
        *, *::before, *::after { box-sizing: border-box; }

        :root {
            --bg: #f8fafc;
            --card: #ffffff;
            --hover: #f1f5f9;
            --border: #e2e8f0;
            --border-light: #f1f5f9;
            --text: #0f172a;
            --text-secondary: #475569;
            --text-muted: #94a3b8;
            --brand: #2563eb;
            --get-bg: #dcfce7;
            --get-text: #166534;
            --get-border: #86efac;
            --post-bg: #dbeafe;
            --post-text: #1e40af;
            --post-border: #93c5fd;
            --put-bg: #fff7ed;
            --put-text: #9a3412;
            --put-border: #fdba74;
            --delete-bg: #fef2f2;
            --delete-text: #991b1b;
            --delete-border: #fca5a5;
            --radius: 10px;
            --radius-sm: 6px;
            --sans: 'Inter', system-ui, sans-serif;
            --mono: 'JetBrains Mono', 'Fira Code', monospace;
            --sidebar-w: 280px;
        }
        @media (prefers-color-scheme: dark) {
            :root {
                --bg: #0b1121; --card: #111827; --hover: #1e293b;
                --border: #1e293b; --border-light: #1e293b;
                --text: #f1f5f9; --text-secondary: #94a3b8; --text-muted: #475569;
                --get-bg: #052e16; --get-text: #86efac; --get-border: #166534;
                --post-bg: #1e3a5f; --post-text: #93c5fd; --post-border: #1e40af;
                --put-bg: #431407; --put-text: #fdba74; --put-border: #9a3412;
                --delete-bg: #450a0a; --delete-text: #fca5a5; --delete-border: #991b1b;
            }
        }

        /* ---- Stable scrollbar (prevents layout shift) ---- */
        html { scrollbar-gutter: stable; }

        body {
            margin: 0;
            padding: 0;
            font-family: var(--sans);
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
            min-height: 100vh;
            overflow-y: auto;
        }

        /* ---- Suppress Scribe framework background patterns ---- */
        body::before, body::after,
        .sl-bg-dots::before, .sl-bg-grid::before, .sl-bg-cross-hatch::before {
            display: none !important;
            content: none !important;
        }
        .sl-border-l, .sl-border-r, .sl-border-t, .sl-border-b {
            border-color: transparent !important;
        }

        /* ---- Grid layout: sidebar | main ---- */
        #app {
            display: grid;
            grid-template-columns: var(--sidebar-w) minmax(0, 1fr);
            width: 100%;
            min-height: 100vh;
        }

        /* ---- Sidebar ---- */
        #sidebar {
            width: var(--sidebar-w);
            min-width: var(--sidebar-w);
            max-width: var(--sidebar-w);
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            background: var(--card);
            border-right: 1px solid var(--border);
            z-index: 10;
        }

        /* ---- Main content ---- */
        #main {
            min-width: 0;
            width: 100%;
            max-width: 100%;
            overflow: visible;
            padding: 32px 48px 80px;
        }

        @media (max-width: 1024px) {
            #sidebar { display: none; }
            #app { grid-template-columns: 1fr; }
            #main { padding: 20px 20px 60px; }
        }
        @media (max-width: 640px) {
            #main { padding: 16px 12px 40px; }
        }

        /* ---- Typography ---- */
        h1 { font-size: 1.75rem; font-weight: 700; margin: 0 0 8px; }
        h2 { font-size: 1.375rem; font-weight: 600; margin: 40px 0 16px; }
        h3 { font-size: 1.125rem; font-weight: 600; margin: 24px 0 8px; }
        h4 { font-size: 1rem; font-weight: 600; margin: 16px 0 8px; }
        p { color: var(--text-secondary); margin: 0 0 12px; line-height: 1.7; }
        a { color: var(--brand); text-decoration: none; }
        a:hover { text-decoration: underline; }

        .docs-header { margin-bottom: 40px; }
        .docs-header p { max-width: 640px; }

        /* ---- Cards ---- */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            margin-bottom: 24px;
        }
        .card-header {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            padding: 14px 20px;
            border-bottom: 1px solid var(--border);
            font-weight: 600;
            font-size: 14px;
        }
        .card-body { padding: 20px; }

        /* ---- Badges ---- */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 999px;
            font-family: var(--mono);
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .4px;
            text-transform: uppercase;
            white-space: nowrap;
            border: 1px solid transparent;
        }
        .badge-get { background: var(--get-bg); color: var(--get-text); border-color: var(--get-border); }
        .badge-post { background: var(--post-bg); color: var(--post-text); border-color: var(--post-border); }
        .badge-put, .badge-patch { background: var(--put-bg); color: var(--put-text); border-color: var(--put-border); }
        .badge-delete { background: var(--delete-bg); color: var(--delete-text); border-color: var(--delete-border); }

        /* ---- Endpoint URL ---- */
        .endpoint-url {
            font-family: var(--mono);
            font-size: 13px;
            font-weight: 500;
            word-break: break-all;
            overflow-wrap: break-word;
            max-width: 100%;
            overflow-x: auto;
        }

        /* ---- Parameters ---- */
        .param-name {
            font-family: var(--mono);
            font-weight: 600;
            font-size: 13px;
            color: var(--brand);
            word-break: normal;
        }
        .param-type { font-family: var(--mono); font-size: 12px; color: var(--text-muted); }
        .param-required { color: #ef4444; font-size: 12px; font-weight: 600; }

        .param-row:not(:last-child) {
            padding-bottom: 12px;
            margin-bottom: 12px;
            border-bottom: 1px solid var(--border-light);
        }

        /* ---- Details boxes (auth, headers) ---- */
        .details-box {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            margin-bottom: 16px;
            overflow: hidden;
        }
        .details-title {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: .4px;
            background: var(--hover);
            cursor: pointer;
            border-bottom: 1px solid var(--border);
        }
        .details-body { padding: 14px; }

        /* ---- Tables ---- */
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        th { text-align: left; font-weight: 600; padding: 8px 12px;
             background: var(--hover); border-bottom: 1px solid var(--border); }
        td { padding: 8px 12px; border-bottom: 1px solid var(--border-light);
             vertical-align: top; word-break: normal; overflow-wrap: break-word; }

        /* ---- Code blocks ---- */
        pre {
            background: #0d1117;
            color: #c9d1d9;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 14px;
            overflow-x: auto;
            margin: 0;
            font-family: var(--mono);
            font-size: 13px;
            line-height: 1.6;
            max-width: 100%;
        }
        code {
            background: var(--hover);
            padding: 2px 5px;
            border-radius: 3px;
            font-family: var(--mono);
            font-size: 12px;
            color: var(--brand);
            word-break: normal;
        }
        pre code { background: none; padding: 0; color: inherit; font-size: inherit; }

        /* ---- Sections ---- */
        .auth-section { margin-bottom: 32px; }

        .endpoint-section {
            margin-bottom: 48px;
            padding-bottom: 48px;
            border-bottom: 1px solid var(--border-light);
        }
        .endpoint-section:last-child { border-bottom: none; }

        /* ---- Sidebar internals ---- */
        .sidebar-inner { padding: 0 12px 24px; }
        .sidebar-search { padding: 16px 16px 0; }
        .sidebar-search input {
            width: 100%;
            padding: 8px 12px;
            font-size: 13px;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            background: var(--bg);
            color: var(--text);
            font-family: var(--sans);
            outline: none;
            transition: border-color .15s;
        }
        .sidebar-search input:focus { border-color: var(--brand); }

        .sidebar-header {
            padding: 20px 16px 16px;
            border-bottom: 1px solid var(--border);
        }
        .sidebar-header .title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .sidebar-header .title img { height: 24px; width: auto; }

        .nav-group { margin-bottom: 4px; }
        .nav-group-title {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 7px 10px;
            font-size: 11px;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: .6px;
            border-radius: var(--radius-sm);
            text-decoration: none;
        }
        .nav-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 5px 10px;
            font-size: 13px;
            color: var(--text-secondary);
            border-radius: var(--radius-sm);
            text-decoration: none;
            margin: 1px 0;
        }
        .nav-item:hover { background: var(--hover); color: var(--text); }
        .nav-item .badge { font-size: 9px; padding: 1px 5px; min-width: 36px; text-align: center; }
        .nav-item .label { white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

        /* ---- Try It Out ---- */
        .try-it-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 20px;
            font-size: 13px;
            font-weight: 600;
            color: white;
            background: var(--brand);
            border: none;
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: opacity .15s;
        }
        .try-it-btn:hover { opacity: .9; }
        .try-it-btn:disabled { opacity: .5; cursor: not-allowed; }

        input, textarea, select {
            width: 100%;
            box-sizing: border-box;
            padding: 8px 12px;
            font-size: 13px;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            background: var(--bg);
            color: var(--text);
            font-family: var(--mono);
            outline: none;
            transition: border-color .15s;
            min-width: 0;
            max-width: 100%;
        }
        input:focus, textarea:focus, select:focus {
            border-color: var(--brand);
        }
        label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 4px;
        }
        .try-it-field { margin-bottom: 12px; }

        /* ---- Endpoint layout grid: docs | try-it ---- */
        .endpoint-content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 360px;
            gap: 24px;
            align-items: start;
        }
        .endpoint-docs {
            min-width: 0;
        }
        .endpoint-tryit {
            min-width: 0;
        }
        .endpoint-tryit .card {
            margin-bottom: 0;
        }

        @media (max-width: 1200px) {
            .endpoint-content-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ---- Prevent letter-by-letter text wrapping on examples ---- */
        .param-example,
        code.inline-example {
            word-break: normal;
            overflow-wrap: break-word;
            white-space: normal;
            display: inline-block;
            min-width: 60px;
            max-width: 100%;
        }

        /* ---- Scrollbar ---- */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--border); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--text-muted); }
    </style>
</head>
<body>
<div id="app">
    <nav id="sidebar">
        <div class="sidebar-header">
            <div class="title">
                                <span>ForgeCore API Documentation</span>
            </div>
                            <div style="margin-top:8px;">
                    <a href="#" onclick="document.querySelector('.auth-section').scrollIntoView({behavior:'smooth'});return false;"
                       style="font-size:12px;color:var(--brand);display:inline-flex;align-items:center;gap:4px;">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        Authentication
                    </a>
                </div>
                    </div>
        <div class="sidebar-search">
            <input type="text" id="sidebar-search" placeholder="Search endpoints..." oninput="filterSidebar(this.value)">
        </div>
        <div class="sidebar-inner" id="sidebar-nav">
                            <div class="nav-group">
                    <a href="#group-authentication" class="nav-group-title">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                                                        <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                                    </svg>
                        Authentication
                    </a>
                                            <a href="#authentication-POSTapi-v1-login" class="nav-item">
                            <span class="badge badge-post">POST</span>
                            <span class="label">Login</span>
                        </a>
                                            <a href="#authentication-POSTapi-v1-register" class="nav-item">
                            <span class="badge badge-post">POST</span>
                            <span class="label">Register a new user</span>
                        </a>
                                            <a href="#authentication-POSTapi-v1-forgot-password" class="nav-item">
                            <span class="badge badge-post">POST</span>
                            <span class="label">Forgot password</span>
                        </a>
                                            <a href="#authentication-POSTapi-v1-reset-password" class="nav-item">
                            <span class="badge badge-post">POST</span>
                            <span class="label">Reset password</span>
                        </a>
                                            <a href="#authentication-GETapi-v1-email-verify--id---hash-" class="nav-item">
                            <span class="badge badge-get">GET</span>
                            <span class="label">Verify email</span>
                        </a>
                                            <a href="#authentication-POSTapi-v1-logout" class="nav-item">
                            <span class="badge badge-post">POST</span>
                            <span class="label">Logout</span>
                        </a>
                                            <a href="#authentication-POSTapi-v1-email-verification-notification" class="nav-item">
                            <span class="badge badge-post">POST</span>
                            <span class="label">Send email verification notification</span>
                        </a>
                                    </div>
                            <div class="nav-group">
                    <a href="#group-profile" class="nav-group-title">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                                                    </svg>
                        Profile
                    </a>
                                            <a href="#profile-GETapi-v1-profile" class="nav-item">
                            <span class="badge badge-get">GET</span>
                            <span class="label">Show profile</span>
                        </a>
                                    </div>
                            <div class="nav-group">
                    <a href="#group-posts" class="nav-group-title">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                                                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/>
                                                    </svg>
                        Posts
                    </a>
                                            <a href="#posts-GETapi-v1-posts" class="nav-item">
                            <span class="badge badge-get">GET</span>
                            <span class="label">List posts</span>
                        </a>
                                            <a href="#posts-GETapi-v1-posts-archived" class="nav-item">
                            <span class="badge badge-get">GET</span>
                            <span class="label">List archived posts</span>
                        </a>
                                            <a href="#posts-POSTapi-v1-posts-store" class="nav-item">
                            <span class="badge badge-post">POST</span>
                            <span class="label">Create a post</span>
                        </a>
                                            <a href="#posts-GETapi-v1-posts--id-" class="nav-item">
                            <span class="badge badge-get">GET</span>
                            <span class="label">Show a post</span>
                        </a>
                                            <a href="#posts-PUTapi-v1-posts--id--update" class="nav-item">
                            <span class="badge badge-put">PUT</span>
                            <span class="label">Update a post</span>
                        </a>
                                            <a href="#posts-PATCHapi-v1-posts--post_id--updateStatus" class="nav-item">
                            <span class="badge badge-patch">PATCH</span>
                            <span class="label">Update post status</span>
                        </a>
                                            <a href="#posts-DELETEapi-v1-posts--post_id--archive" class="nav-item">
                            <span class="badge badge-delete">DELETE</span>
                            <span class="label">Archive a post</span>
                        </a>
                                            <a href="#posts-POSTapi-v1-posts--post_id--restore" class="nav-item">
                            <span class="badge badge-post">POST</span>
                            <span class="label">Restore a post</span>
                        </a>
                                            <a href="#posts-DELETEapi-v1-posts--post_id--forceDelete" class="nav-item">
                            <span class="badge badge-delete">DELETE</span>
                            <span class="label">Permanently delete a post</span>
                        </a>
                                            <a href="#posts-POSTapi-v1-posts--post_id--retry" class="nav-item">
                            <span class="badge badge-post">POST</span>
                            <span class="label">Retry post generation</span>
                        </a>
                                    </div>
                            <div class="nav-group">
                    <a href="#group-blueprints" class="nav-group-title">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                                                        <rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/>
                                                    </svg>
                        Blueprints
                    </a>
                                            <a href="#blueprints-GETapi-v1-blueprints" class="nav-item">
                            <span class="badge badge-get">GET</span>
                            <span class="label">List blueprints</span>
                        </a>
                                            <a href="#blueprints-GETapi-v1-blueprints-archived" class="nav-item">
                            <span class="badge badge-get">GET</span>
                            <span class="label">List archived blueprints</span>
                        </a>
                                            <a href="#blueprints-POSTapi-v1-blueprints-store" class="nav-item">
                            <span class="badge badge-post">POST</span>
                            <span class="label">Create a blueprint</span>
                        </a>
                                            <a href="#blueprints-GETapi-v1-blueprints--id-" class="nav-item">
                            <span class="badge badge-get">GET</span>
                            <span class="label">Show a blueprint</span>
                        </a>
                                            <a href="#blueprints-PUTapi-v1-blueprints--id--update" class="nav-item">
                            <span class="badge badge-put">PUT</span>
                            <span class="label">Update a blueprint</span>
                        </a>
                                            <a href="#blueprints-DELETEapi-v1-blueprints--blueprint_id--archive" class="nav-item">
                            <span class="badge badge-delete">DELETE</span>
                            <span class="label">Archive a blueprint</span>
                        </a>
                                            <a href="#blueprints-POSTapi-v1-blueprints--blueprint_id--restore" class="nav-item">
                            <span class="badge badge-post">POST</span>
                            <span class="label">Restore a blueprint</span>
                        </a>
                                            <a href="#blueprints-DELETEapi-v1-blueprints--blueprint_id--forceDelete" class="nav-item">
                            <span class="badge badge-delete">DELETE</span>
                            <span class="label">Permanently delete a blueprint</span>
                        </a>
                                    </div>
                            <div class="nav-group">
                    <a href="#group-inputs" class="nav-group-title">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                                                        <path d="M4 7V4a2 2 0 0 1 2-2h8.5L20 7.5V20a2 2 0 0 1-2 2h-8"/><polyline points="14 2 14 8 20 8"/><path d="M5 17h2M8 13h4"/>
                                                    </svg>
                        Inputs
                    </a>
                                            <a href="#inputs-GETapi-v1-inputs" class="nav-item">
                            <span class="badge badge-get">GET</span>
                            <span class="label">List inputs</span>
                        </a>
                                            <a href="#inputs-GETapi-v1-inputs-archived" class="nav-item">
                            <span class="badge badge-get">GET</span>
                            <span class="label">List archived inputs</span>
                        </a>
                                            <a href="#inputs-POSTapi-v1-inputs-store" class="nav-item">
                            <span class="badge badge-post">POST</span>
                            <span class="label">Create an input</span>
                        </a>
                                            <a href="#inputs-GETapi-v1-inputs--id-" class="nav-item">
                            <span class="badge badge-get">GET</span>
                            <span class="label">Show an input</span>
                        </a>
                                            <a href="#inputs-PUTapi-v1-inputs--id--update" class="nav-item">
                            <span class="badge badge-put">PUT</span>
                            <span class="label">Update an input</span>
                        </a>
                                            <a href="#inputs-DELETEapi-v1-inputs--input_id--archive" class="nav-item">
                            <span class="badge badge-delete">DELETE</span>
                            <span class="label">Archive an input</span>
                        </a>
                                            <a href="#inputs-POSTapi-v1-inputs--input_id--restore" class="nav-item">
                            <span class="badge badge-post">POST</span>
                            <span class="label">Restore an input</span>
                        </a>
                                            <a href="#inputs-DELETEapi-v1-inputs--input_id--forceDelete" class="nav-item">
                            <span class="badge badge-delete">DELETE</span>
                            <span class="label">Permanently delete an input</span>
                        </a>
                                    </div>
                            <div class="nav-group">
                    <a href="#group-conversations" class="nav-group-title">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                                    </svg>
                        Conversations
                    </a>
                                            <a href="#conversations-GETapi-v1-conversations" class="nav-item">
                            <span class="badge badge-get">GET</span>
                            <span class="label">List conversations</span>
                        </a>
                                            <a href="#conversations-GETapi-v1-conversations-archived" class="nav-item">
                            <span class="badge badge-get">GET</span>
                            <span class="label">List archived conversations</span>
                        </a>
                                            <a href="#conversations-POSTapi-v1-conversations-store" class="nav-item">
                            <span class="badge badge-post">POST</span>
                            <span class="label">Create a conversation</span>
                        </a>
                                            <a href="#conversations-GETapi-v1-conversations--id-" class="nav-item">
                            <span class="badge badge-get">GET</span>
                            <span class="label">Show a conversation</span>
                        </a>
                                            <a href="#conversations-DELETEapi-v1-conversations--conversation_id--archive" class="nav-item">
                            <span class="badge badge-delete">DELETE</span>
                            <span class="label">Archive a conversation</span>
                        </a>
                                            <a href="#conversations-POSTapi-v1-conversations--conversation_id--restore" class="nav-item">
                            <span class="badge badge-post">POST</span>
                            <span class="label">Restore a conversation</span>
                        </a>
                                            <a href="#conversations-DELETEapi-v1-conversations--conversation_id--forceDelete" class="nav-item">
                            <span class="badge badge-delete">DELETE</span>
                            <span class="label">Permanently delete a conversation</span>
                        </a>
                                            <a href="#conversations-POSTapi-v1-conversations--conversation_id--send" class="nav-item">
                            <span class="badge badge-post">POST</span>
                            <span class="label">Send a message</span>
                        </a>
                                    </div>
                            <div class="nav-group">
                    <a href="#group-search" class="nav-group-title">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                                                        <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                                    </svg>
                        Search
                    </a>
                                            <a href="#search-GETapi-v1-search" class="nav-item">
                            <span class="badge badge-get">GET</span>
                            <span class="label">Global search</span>
                        </a>
                                    </div>
                            <div class="nav-group">
                    <a href="#group-endpoints" class="nav-group-title">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                                                        <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                                                    </svg>
                        Endpoints
                    </a>
                                            <a href="#endpoints-GETapi-v1-health" class="nav-item">
                            <span class="badge badge-get">GET</span>
                            <span class="label">GET api/v1/health</span>
                        </a>
                                    </div>
                    </div>
    </nav>

    <main id="main">
        <header class="docs-header">
            <h1>ForgeCore API Documentation</h1>
                            <p style="font-size:13px;color:var(--text-muted);margin-bottom:8px;">Last updated: June 26, 2026</p>
                    </header>

                    <div class="auth-section">
                <div class="details-box">
                    <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        Authentication / Authorization
                    </div>
                    <div class="details-body">
                        <h1 id="authentication">Authentication</h1>
<p>ForgeCore uses <strong>token-based authentication</strong> via <a href="https://laravel.com/docs/sanctum">Laravel Sanctum</a>.</p>
<h2 id="how-to-get-a-token">How to get a token</h2>
<p><strong>Register a new account:</strong></p>
<pre><code class="language-bash">curl -X POST http://forgecoreapi.test/api/v1/register \
  -H "Content-Type: application/json" \
  -d '{"name":"John Doe","email":"john@example.com","password":"your-password"}'</code></pre>
<p><strong>Or log in with existing credentials:</strong></p>
<pre><code class="language-bash">curl -X POST http://forgecoreapi.test/api/v1/login \
  -H "Content-Type: application/json" \
  -d '{"email":"john@example.com","password":"your-password"}'</code></pre>
<p>Both endpoints return:</p>
<pre><code class="language-json">{
  "token": "1|abc123def456...",
  "user": {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com"
  }
}</code></pre>
<h2 id="how-to-use-your-token">How to use your token</h2>
<p>Include the token in the <code>Authorization</code> header of every request:</p>
<pre><code>Authorization: Bearer 1|abc123def456...</code></pre>
<p>Example:</p>
<pre><code class="language-bash">curl http://forgecoreapi.test/api/v1/posts \
  -H "Authorization: Bearer 1|abc123def456..."</code></pre>
<h2 id="token-lifecycle">Token lifecycle</h2>
<ul>
<li>Tokens remain valid until you explicitly <strong>log out</strong></li>
<li>Up to <strong>10 active tokens</strong> per user (oldest are revoked when limit is exceeded)</li>
<li>To revoke a token, call <code>POST /api/v1/logout</code></li>
</ul>
<blockquote>
<p><strong>Note:</strong> Most endpoints require authentication. Unauthenticated requests receive a <code>401 Unauthorized</code> response.</p>
</blockquote>
                    </div>
                </div>
            </div>
        
                    <div style="max-width:680px;margin-bottom:40px;">
                <h1 id="welcome-to-forgecore">Welcome to ForgeCore</h1>
<p>ForgeCore is an <strong>AI-powered content generation platform</strong> that helps you create, manage, and optimize social media posts at scale.</p>
<h2 id="what-you-can-do">What you can do</h2>
<table>
<thead>
<tr>
<th>Feature</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td>🤖 <strong>AI Post Generation</strong></td>
<td>Generate posts using blueprints (tone, platform, structure) and raw source content</td>
</tr>
<tr>
<td>📐 <strong>Blueprints</strong></td>
<td>Create content templates with tone targeting, platform settings, and style rules</td>
</tr>
<tr>
<td>📝 <strong>Inputs</strong></td>
<td>Store and organize your source materials for post generation</td>
</tr>
<tr>
<td>💬 <strong>AI Chat</strong></td>
<td>Refine and improve posts through conversation with the AI assistant</td>
</tr>
<tr>
<td>🔍 <strong>Global Search</strong></td>
<td>Search across all your resources from a single endpoint</td>
</tr>
</tbody>
</table>
<h2 id="quick-start">Quick start</h2>
<pre><code class="language-bash"># 1. Register an account
curl -X POST http://forgecoreapi.test/api/v1/register \
  -H "Content-Type: application/json" \
  -d '{"name":"Your Name","email":"you@example.com","password":"your-password"}'

# 2. Use the returned token in subsequent requests
curl http://forgecoreapi.test/api/v1/posts \
  -H "Authorization: Bearer your-token-here"</code></pre>
<h2 id="base-url">Base URL</h2>
<p>All API endpoints are prefixed with <code>/api/v1/</code>.</p>
<h2 id="rate-limiting">Rate limiting</h2>
<table>
<thead>
<tr>
<th>Endpoint group</th>
<th>Limit</th>
</tr>
</thead>
<tbody>
<tr>
<td>Authentication (<code>/login</code>, <code>/register</code>, etc.)</td>
<td>5 requests/minute</td>
</tr>
<tr>
<td>Conversation messages (<code>/send</code>)</td>
<td>10 requests/minute</td>
</tr>
<tr>
<td>General API</td>
<td>60 requests/minute</td>
</tr>
</tbody>
</table>
<h2 id="error-format">Error format</h2>
<p>All errors return a consistent JSON structure:</p>
<pre><code class="language-json">{
  "message": "Error description",
  "errors": {}
}</code></pre>
<h2 id="additional-resources">Additional resources</h2>
<ul>
<li><a href="/docs.postman">Postman Collection</a> — import into Postman</li>
<li><a href="/docs.openapi">OpenAPI Spec</a> — use with your API client</li>
</ul>
            </div>
        
                    <div class="endpoint-section" id="group-authentication">
    <h2 style="display:flex;align-items:center;gap:10px;">
        Authentication
    </h2>
            <div style="color:var(--text-secondary);font-size:14px;margin-bottom:24px;max-width:680px;">
            <p>Endpoints for user registration, login, logout, email verification, and password reset.
These are the only public endpoints that don't require a bearer token.</p>
        </div>
    
            <div class="endpoint-section" id="authentication-POSTapi-v1-login">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-post">POST</span>
                                        <span class="endpoint-url">api/v1/login</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Login</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Authenticates a user and returns an API token.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/login</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Body Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">email</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The user's email address. Must be a valid email address.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">john@example.com</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">password</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The user's password.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">secret123</code>
            </div>
            
    </div>
                                            </div>
                </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid var(--border-light);">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;token&quot;: &quot;1|abc123...&quot;,
  &quot;user&quot;: {&quot;id&quot;: 1, &quot;name&quot;: &quot;John Doe&quot;, &quot;email&quot;: &quot;john@example.com&quot;, &quot;created_at&quot;: &quot;2026-01-01T00:00:00.000000Z&quot;}
}</code></pre>
                                                            </div>
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-delete" style="font-size:11px;padding:2px 8px;">401</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">invalid credentials</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Invalid credentials&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-POSTapi-v1-login">Authorization Token</label>
            <input type="text" id="auth-POSTapi-v1-login" placeholder="Enter your Bearer token">
        </div>

        
        
                    <div class="try-it-field">
                <label>email</label>
                                    <input type="text" data-body-param="email" placeholder="john@example.com">
                            </div>
                    <div class="try-it-field">
                <label>password</label>
                                    <input type="text" data-body-param="password" placeholder="secret123">
                            </div>
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('POST', 'api/v1/login', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="authentication-POSTapi-v1-register">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-post">POST</span>
                                        <span class="endpoint-url">api/v1/register</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Register a new user</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Creates a new user account and returns an API token.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/register</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Body Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">name</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The user's full name.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">John Doe</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">email</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The user's email address. Must be a valid email address.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">john@example.com</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">password</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The user's password.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">secret123</code>
            </div>
            
    </div>
                                            </div>
                </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid var(--border-light);">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">201</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;token&quot;: &quot;1|abc123...&quot;,
  &quot;user&quot;: {&quot;id&quot;: 1, &quot;name&quot;: &quot;John Doe&quot;, &quot;email&quot;: &quot;john@example.com&quot;, &quot;created_at&quot;: &quot;2026-01-01T00:00:00.000000Z&quot;}
}</code></pre>
                                                            </div>
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-delete" style="font-size:11px;padding:2px 8px;">422</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">validation error</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;message&quot;: &quot;Validation failed.&quot;,
  &quot;errors&quot;: {&quot;email&quot;: [&quot;This email is already registered.&quot;]}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-POSTapi-v1-register">Authorization Token</label>
            <input type="text" id="auth-POSTapi-v1-register" placeholder="Enter your Bearer token">
        </div>

        
        
                    <div class="try-it-field">
                <label>name</label>
                                    <input type="text" data-body-param="name" placeholder="John Doe">
                            </div>
                    <div class="try-it-field">
                <label>email</label>
                                    <input type="text" data-body-param="email" placeholder="john@example.com">
                            </div>
                    <div class="try-it-field">
                <label>password</label>
                                    <input type="text" data-body-param="password" placeholder="secret123">
                            </div>
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('POST', 'api/v1/register', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="authentication-POSTapi-v1-forgot-password">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-post">POST</span>
                                        <span class="endpoint-url">api/v1/forgot-password</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Forgot password</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Sends a password reset link to the given email address.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/forgot-password</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Body Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">email</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The user's email address.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">john@example.com</code>
            </div>
            
    </div>
                                            </div>
                </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid var(--border-light);">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Password reset link sent.&quot;}</code></pre>
                                                            </div>
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-delete" style="font-size:11px;padding:2px 8px;">422</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;We can&#039;t find a user with that email address.&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-POSTapi-v1-forgot-password">Authorization Token</label>
            <input type="text" id="auth-POSTapi-v1-forgot-password" placeholder="Enter your Bearer token">
        </div>

        
        
                    <div class="try-it-field">
                <label>email</label>
                                    <input type="text" data-body-param="email" placeholder="john@example.com">
                            </div>
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('POST', 'api/v1/forgot-password', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="authentication-POSTapi-v1-reset-password">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-post">POST</span>
                                        <span class="endpoint-url">api/v1/reset-password</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Reset password</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Resets the user's password using a valid token.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/reset-password</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Body Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">token</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The password reset token.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">abc123def456</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">email</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The user's email address.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">john@example.com</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">password</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The new password (min 8 characters).</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">new-secret-123</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">password_confirmation</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>Must match the new password.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">new-secret-123</code>
            </div>
            
    </div>
                                            </div>
                </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid var(--border-light);">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Password reset successfully.&quot;}</code></pre>
                                                            </div>
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-delete" style="font-size:11px;padding:2px 8px;">422</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;This password reset token is invalid.&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-POSTapi-v1-reset-password">Authorization Token</label>
            <input type="text" id="auth-POSTapi-v1-reset-password" placeholder="Enter your Bearer token">
        </div>

        
        
                    <div class="try-it-field">
                <label>token</label>
                                    <input type="text" data-body-param="token" placeholder="abc123def456">
                            </div>
                    <div class="try-it-field">
                <label>email</label>
                                    <input type="text" data-body-param="email" placeholder="john@example.com">
                            </div>
                    <div class="try-it-field">
                <label>password</label>
                                    <input type="text" data-body-param="password" placeholder="new-secret-123">
                            </div>
                    <div class="try-it-field">
                <label>password_confirmation</label>
                                    <input type="text" data-body-param="password_confirmation" placeholder="new-secret-123">
                            </div>
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('POST', 'api/v1/reset-password', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="authentication-GETapi-v1-email-verify--id---hash-">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-get">GET</span>
                                        <span class="endpoint-url">api/v1/email/verify/{id}/{hash}</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Verify email</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Verifies a user's email address using the signed URL from the verification email.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/email/verify/1/abc123def456...</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The user's ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">hash</span>
                                    <span class="param-type">string</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The verification hash.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">abc123def456...</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid var(--border-light);">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Email verified successfully.&quot;}</code></pre>
                                                            </div>
                                                    <div style="margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid var(--border-light);">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">already verified</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Email already verified.&quot;}</code></pre>
                                                            </div>
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-delete" style="font-size:11px;padding:2px 8px;">403</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Invalid verification link.&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-GETapi-v1-email-verify--id---hash-">Authorization Token</label>
            <input type="text" id="auth-GETapi-v1-email-verify--id---hash-" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>hash <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="hash" placeholder="abc123def456...">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('GET', 'api/v1/email/verify/1/abc123def456...', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="authentication-POSTapi-v1-logout">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-post">POST</span>
                                        <span class="endpoint-url">api/v1/logout</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Logout</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Revokes the current API token.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/logout</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Logged out&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-POSTapi-v1-logout">Authorization Token</label>
            <input type="text" id="auth-POSTapi-v1-logout" placeholder="Enter your Bearer token">
        </div>

        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('POST', 'api/v1/logout', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="authentication-POSTapi-v1-email-verification-notification">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-post">POST</span>
                                        <span class="endpoint-url">api/v1/email/verification-notification</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Send email verification notification</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Resends the email verification link to the authenticated user.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/email/verification-notification</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Verification link sent.&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-POSTapi-v1-email-verification-notification">Authorization Token</label>
            <input type="text" id="auth-POSTapi-v1-email-verification-notification" placeholder="Enter your Bearer token">
        </div>

        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('POST', 'api/v1/email/verification-notification', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
    </div>
                    <div class="endpoint-section" id="group-profile">
    <h2 style="display:flex;align-items:center;gap:10px;">
        Profile
    </h2>
            <div style="color:var(--text-secondary);font-size:14px;margin-bottom:24px;max-width:680px;">
            <p>View and update the authenticated user's account details, including name, email, and password.</p>
        </div>
    
            <div class="endpoint-section" id="profile-GETapi-v1-profile">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-get">GET</span>
                                        <span class="endpoint-url">api/v1/profile</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Show profile</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Returns the authenticated user's profile information.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/profile</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;user&quot;: {&quot;id&quot;: 1, &quot;name&quot;: &quot;John Doe&quot;, &quot;email&quot;: &quot;john@example.com&quot;, &quot;created_at&quot;: &quot;2026-01-01T00:00:00.000000Z&quot;}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-GETapi-v1-profile">Authorization Token</label>
            <input type="text" id="auth-GETapi-v1-profile" placeholder="Enter your Bearer token">
        </div>

        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('GET', 'api/v1/profile', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
    </div>
                    <div class="endpoint-section" id="group-posts">
    <h2 style="display:flex;align-items:center;gap:10px;">
        Posts
    </h2>
            <div style="color:var(--text-secondary);font-size:14px;margin-bottom:24px;max-width:680px;">
            <p>Manage AI-generated posts — create, update, archive, retry generation, and change status.
Posts are the core output of ForgeCore, combining a blueprint (tone + platform) with input content.</p>
        </div>
    
            <div class="endpoint-section" id="posts-GETapi-v1-posts">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-get">GET</span>
                                        <span class="endpoint-url">api/v1/posts</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">List posts</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Returns a paginated list of posts for the authenticated user.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/posts</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        Query Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">page</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Page number.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">per_page</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Items per page (1-100).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">15</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">search</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Search by title, hook proposal or body points.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">AI</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">status</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Filter by status (in_review, draft, posted, archived).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">draft</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">process_status</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Filter by process status (pending, processing, completed, failed).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">completed</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">sort</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Sort by field (created_at, updated_at, title, status).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">created_at</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">direction</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Sort direction (asc, desc).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">desc</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;posts&quot;: [{&quot;id&quot;: 1, &quot;title&quot;: &quot;My Post&quot;, ...}],
  &quot;meta&quot;: {&quot;current_page&quot;: 1, &quot;last_page&quot;: 1, &quot;per_page&quot;: 15, &quot;total&quot;: 1}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-GETapi-v1-posts">Authorization Token</label>
            <input type="text" id="auth-GETapi-v1-posts" placeholder="Enter your Bearer token">
        </div>

        
                    <div class="try-it-field">
                <label>page</label>
                <input type="text" data-query-param="page" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>per_page</label>
                <input type="text" data-query-param="per_page" placeholder="15">
            </div>
                    <div class="try-it-field">
                <label>search</label>
                <input type="text" data-query-param="search" placeholder="AI">
            </div>
                    <div class="try-it-field">
                <label>status</label>
                <input type="text" data-query-param="status" placeholder="draft">
            </div>
                    <div class="try-it-field">
                <label>process_status</label>
                <input type="text" data-query-param="process_status" placeholder="completed">
            </div>
                    <div class="try-it-field">
                <label>sort</label>
                <input type="text" data-query-param="sort" placeholder="created_at">
            </div>
                    <div class="try-it-field">
                <label>direction</label>
                <input type="text" data-query-param="direction" placeholder="desc">
            </div>
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('GET', 'api/v1/posts', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="posts-GETapi-v1-posts-archived">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-get">GET</span>
                                        <span class="endpoint-url">api/v1/posts/archived</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">List archived posts</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Returns a paginated list of soft-deleted posts for the authenticated user.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/posts/archived</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        Query Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">page</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Page number.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">per_page</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Items per page (1-100).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">15</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">search</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Search by title, hook proposal or body points.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">AI</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">sort</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Sort by field (created_at, updated_at, title).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">created_at</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">direction</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Sort direction (asc, desc).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">desc</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;posts&quot;: [{&quot;id&quot;: 1, &quot;title&quot;: &quot;My Post&quot;, ...}],
  &quot;meta&quot;: {&quot;current_page&quot;: 1, &quot;last_page&quot;: 1, &quot;per_page&quot;: 15, &quot;total&quot;: 1}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-GETapi-v1-posts-archived">Authorization Token</label>
            <input type="text" id="auth-GETapi-v1-posts-archived" placeholder="Enter your Bearer token">
        </div>

        
                    <div class="try-it-field">
                <label>page</label>
                <input type="text" data-query-param="page" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>per_page</label>
                <input type="text" data-query-param="per_page" placeholder="15">
            </div>
                    <div class="try-it-field">
                <label>search</label>
                <input type="text" data-query-param="search" placeholder="AI">
            </div>
                    <div class="try-it-field">
                <label>sort</label>
                <input type="text" data-query-param="sort" placeholder="created_at">
            </div>
                    <div class="try-it-field">
                <label>direction</label>
                <input type="text" data-query-param="direction" placeholder="desc">
            </div>
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('GET', 'api/v1/posts/archived', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="posts-POSTapi-v1-posts-store">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-post">POST</span>
                                        <span class="endpoint-url">api/v1/posts/store</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Create a post</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Creates a new post with a blueprint and input, then queues AI generation.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/posts/store</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Body Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">title</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The post title.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">Understanding AI in Healthcare</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">blueprint_id</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The ID of an active blueprint belonging to the user.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">1</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">input_id</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The ID of an input belonging to the user.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">1</code>
            </div>
            
    </div>
                                            </div>
                </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid var(--border-light);">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">201</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;message&quot;: &quot;Post created successfully.&quot;,
  &quot;configuration&quot;: {&quot;id&quot;: 1, &quot;blueprint_id&quot;: 1, &quot;input_id&quot;: 1, ...},
  &quot;post&quot;: {&quot;id&quot;: 1, &quot;title&quot;: &quot;My Post&quot;, &quot;process_status&quot;: &quot;pending&quot;, &quot;status&quot;: &quot;in_review&quot;, ...}
}</code></pre>
                                                            </div>
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-delete" style="font-size:11px;padding:2px 8px;">422</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">validation error</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;message&quot;: &quot;Validation failed.&quot;,
  &quot;errors&quot;: {&quot;blueprint_id&quot;: [&quot;The selected blueprint is invalid or not active.&quot;]}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-POSTapi-v1-posts-store">Authorization Token</label>
            <input type="text" id="auth-POSTapi-v1-posts-store" placeholder="Enter your Bearer token">
        </div>

        
        
                    <div class="try-it-field">
                <label>title</label>
                                    <input type="text" data-body-param="title" placeholder="Understanding AI in Healthcare">
                            </div>
                    <div class="try-it-field">
                <label>blueprint_id</label>
                                    <input type="text" data-body-param="blueprint_id" placeholder="1">
                            </div>
                    <div class="try-it-field">
                <label>input_id</label>
                                    <input type="text" data-body-param="input_id" placeholder="1">
                            </div>
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('POST', 'api/v1/posts/store', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="posts-GETapi-v1-posts--id-">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-get">GET</span>
                                        <span class="endpoint-url">api/v1/posts/{id}</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Show a post</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Returns the details of a specific post.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/posts/1</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the post.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">post</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The post ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid var(--border-light);">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;post&quot;: {&quot;id&quot;: 1, &quot;title&quot;: &quot;My Post&quot;, &quot;process_status&quot;: &quot;completed&quot;, ...}
}</code></pre>
                                                            </div>
                                                    <div style="margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid var(--border-light);">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-delete" style="font-size:11px;padding:2px 8px;">403</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Forbidden.&quot;}</code></pre>
                                                            </div>
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-delete" style="font-size:11px;padding:2px 8px;">404</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Resource not found.&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-GETapi-v1-posts--id-">Authorization Token</label>
            <input type="text" id="auth-GETapi-v1-posts--id-" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>post <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="post" placeholder="1">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('GET', 'api/v1/posts/1', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="posts-PUTapi-v1-posts--id--update">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-put">PUT</span>
                                        <span class="endpoint-url">api/v1/posts/{id}/update</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Update a post</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Updates the content fields of a specific post.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/posts/1/update</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the post.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">post</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The post ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Body Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">title</span>
                            <span class="param-type">string</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The post title.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">The Future of AI in Healthcare</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">hook_proposal</span>
                            <span class="param-type">string</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>A hook or opening line for the post. Must not be greater than 500 characters.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">Did you know AI can detect diseases earlier than doctors?</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">body_points</span>
                            <span class="param-type">string[]</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>Must not be greater than 1000 characters.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">[&quot;b&quot;]</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">suggested_hashtags</span>
                            <span class="param-type">string[]</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>Must not be greater than 50 characters.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">[&quot;n&quot;]</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">technical_readability_score</span>
                            <span class="param-type">integer</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>A score from 0 to 100 indicating technical complexity. Must be at least 0. Must not be greater than 100.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">65</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">tone_compliance_justification</span>
                            <span class="param-type">string</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>Explanation of how the post complies with the blueprint tone.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">The post uses professional language with technical depth as required.</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">status</span>
                            <span class="param-type">string</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The post status.</p>
        </div>
    
            <div style="margin-top:4px;font-size:13px;color:var(--text-secondary);">
            Must be one of:
            <ul style="list-style-position:inside;margin:4px 0;">
                                    <li><code>in_review</code></li>
                                    <li><code>draft</code></li>
                                    <li><code>posted</code></li>
                                    <li><code>archived</code></li>
                            </ul>
        </div>
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">draft</code>
            </div>
            
    </div>
                                            </div>
                </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Post updated successfully.&quot;, &quot;post&quot;: {&quot;id&quot;: 1, ...}}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-PUTapi-v1-posts--id--update">Authorization Token</label>
            <input type="text" id="auth-PUTapi-v1-posts--id--update" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>post <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="post" placeholder="1">
            </div>
        
        
                    <div class="try-it-field">
                <label>title</label>
                                    <input type="text" data-body-param="title" placeholder="The Future of AI in Healthcare">
                            </div>
                    <div class="try-it-field">
                <label>hook_proposal</label>
                                    <input type="text" data-body-param="hook_proposal" placeholder="Did you know AI can detect diseases earlier than doctors?">
                            </div>
                    <div class="try-it-field">
                <label>body_points</label>
                                    <textarea data-body-param="body_points" rows="3">[
    &quot;b&quot;
]</textarea>
                            </div>
                    <div class="try-it-field">
                <label>suggested_hashtags</label>
                                    <textarea data-body-param="suggested_hashtags" rows="3">[
    &quot;n&quot;
]</textarea>
                            </div>
                    <div class="try-it-field">
                <label>technical_readability_score</label>
                                    <input type="text" data-body-param="technical_readability_score" placeholder="65">
                            </div>
                    <div class="try-it-field">
                <label>tone_compliance_justification</label>
                                    <input type="text" data-body-param="tone_compliance_justification" placeholder="The post uses professional language with technical depth as required.">
                            </div>
                    <div class="try-it-field">
                <label>status</label>
                                    <input type="text" data-body-param="status" placeholder="draft">
                            </div>
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('PUT', 'api/v1/posts/1/update', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="posts-PATCHapi-v1-posts--post_id--updateStatus">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-patch">PATCH</span>
                                        <span class="endpoint-url">api/v1/posts/{post_id}/updateStatus</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Update post status</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Updates only the status of a specific post.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/posts/1/updateStatus</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">post_id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the post.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">post</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The post ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Body Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">status</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The new post status. Must be a valid PostStatus enum value.</p>
        </div>
    
            <div style="margin-top:4px;font-size:13px;color:var(--text-secondary);">
            Must be one of:
            <ul style="list-style-position:inside;margin:4px 0;">
                                    <li><code>in_review</code></li>
                                    <li><code>draft</code></li>
                                    <li><code>posted</code></li>
                                    <li><code>archived</code></li>
                            </ul>
        </div>
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">draft</code>
            </div>
            
    </div>
                                            </div>
                </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Post status updated successfully.&quot;, &quot;post&quot;: {&quot;id&quot;: 1, ...}}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-PATCHapi-v1-posts--post_id--updateStatus">Authorization Token</label>
            <input type="text" id="auth-PATCHapi-v1-posts--post_id--updateStatus" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>post_id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="post_id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>post <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="post" placeholder="1">
            </div>
        
        
                    <div class="try-it-field">
                <label>status</label>
                                    <input type="text" data-body-param="status" placeholder="draft">
                            </div>
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('PATCH', 'api/v1/posts/1/updateStatus', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="posts-DELETEapi-v1-posts--post_id--archive">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-delete">DELETE</span>
                                        <span class="endpoint-url">api/v1/posts/{post_id}/archive</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Archive a post</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Soft-deletes a specific post.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/posts/1/archive</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">post_id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the post.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">post</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The post ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Post archived successfully.&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-DELETEapi-v1-posts--post_id--archive">Authorization Token</label>
            <input type="text" id="auth-DELETEapi-v1-posts--post_id--archive" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>post_id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="post_id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>post <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="post" placeholder="1">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('DELETE', 'api/v1/posts/1/archive', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="posts-POSTapi-v1-posts--post_id--restore">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-post">POST</span>
                                        <span class="endpoint-url">api/v1/posts/{post_id}/restore</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Restore a post</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Restores a soft-deleted post.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/posts/1/restore</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">post_id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the post.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">post</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The post ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Post restored successfully.&quot;, &quot;post&quot;: {&quot;id&quot;: 1, ...}}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-POSTapi-v1-posts--post_id--restore">Authorization Token</label>
            <input type="text" id="auth-POSTapi-v1-posts--post_id--restore" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>post_id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="post_id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>post <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="post" placeholder="1">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('POST', 'api/v1/posts/1/restore', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="posts-DELETEapi-v1-posts--post_id--forceDelete">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-delete">DELETE</span>
                                        <span class="endpoint-url">api/v1/posts/{post_id}/forceDelete</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Permanently delete a post</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Force-deletes a post from the database.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/posts/1/forceDelete</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">post_id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the post.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">post</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The post ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Post permanently deleted.&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-DELETEapi-v1-posts--post_id--forceDelete">Authorization Token</label>
            <input type="text" id="auth-DELETEapi-v1-posts--post_id--forceDelete" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>post_id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="post_id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>post <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="post" placeholder="1">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('DELETE', 'api/v1/posts/1/forceDelete', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="posts-POSTapi-v1-posts--post_id--retry">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-post">POST</span>
                                        <span class="endpoint-url">api/v1/posts/{post_id}/retry</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Retry post generation</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Resets the process status to pending and re-queues AI generation.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/posts/1/retry</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">post_id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the post.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">post</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The post ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">201</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Post queued for regeneration.&quot;, &quot;post&quot;: {&quot;id&quot;: 1, ...}}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-POSTapi-v1-posts--post_id--retry">Authorization Token</label>
            <input type="text" id="auth-POSTapi-v1-posts--post_id--retry" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>post_id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="post_id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>post <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="post" placeholder="1">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('POST', 'api/v1/posts/1/retry', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
    </div>
                    <div class="endpoint-section" id="group-blueprints">
    <h2 style="display:flex;align-items:center;gap:10px;">
        Blueprints
    </h2>
            <div style="color:var(--text-secondary);font-size:14px;margin-bottom:24px;max-width:680px;">
            <p>Define reusable content templates that control tone, target platform, length, and style of generated posts.
Blueprints act as the instruction set for the AI, ensuring consistent brand voice across all content.</p>
        </div>
    
            <div class="endpoint-section" id="blueprints-GETapi-v1-blueprints">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-get">GET</span>
                                        <span class="endpoint-url">api/v1/blueprints</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">List blueprints</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Returns a paginated list of blueprints for the authenticated user.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/blueprints</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        Query Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">page</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Page number.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">per_page</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Items per page (1-100).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">15</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">search</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Search by name, description, tone or target platform.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">tech</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">is_active</span>
                                    <span class="param-type">boolean</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Filter by active status.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">target_platform</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Filter by platform (x, linkedin).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">linkedin</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">sort</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Sort by field (created_at, updated_at, name, tone).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">created_at</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">direction</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Sort direction (asc, desc).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">desc</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;blueprints&quot;: [{&quot;id&quot;: 1, &quot;name&quot;: &quot;Tech Blog&quot;, ...}],
  &quot;meta&quot;: {&quot;current_page&quot;: 1, &quot;last_page&quot;: 1, &quot;per_page&quot;: 15, &quot;total&quot;: 1}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-GETapi-v1-blueprints">Authorization Token</label>
            <input type="text" id="auth-GETapi-v1-blueprints" placeholder="Enter your Bearer token">
        </div>

        
                    <div class="try-it-field">
                <label>page</label>
                <input type="text" data-query-param="page" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>per_page</label>
                <input type="text" data-query-param="per_page" placeholder="15">
            </div>
                    <div class="try-it-field">
                <label>search</label>
                <input type="text" data-query-param="search" placeholder="tech">
            </div>
                    <div class="try-it-field">
                <label>is_active</label>
                <input type="text" data-query-param="is_active" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>target_platform</label>
                <input type="text" data-query-param="target_platform" placeholder="linkedin">
            </div>
                    <div class="try-it-field">
                <label>sort</label>
                <input type="text" data-query-param="sort" placeholder="created_at">
            </div>
                    <div class="try-it-field">
                <label>direction</label>
                <input type="text" data-query-param="direction" placeholder="desc">
            </div>
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('GET', 'api/v1/blueprints', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="blueprints-GETapi-v1-blueprints-archived">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-get">GET</span>
                                        <span class="endpoint-url">api/v1/blueprints/archived</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">List archived blueprints</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Returns a paginated list of soft-deleted blueprints.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/blueprints/archived</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        Query Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">page</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Page number.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">per_page</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Items per page (1-100).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">15</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">search</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Search by name or description.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">tech</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">sort</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Sort by field (created_at, updated_at, name).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">created_at</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">direction</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Sort direction (asc, desc).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">desc</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;blueprints&quot;: [{&quot;id&quot;: 1, &quot;name&quot;: &quot;Tech Blog&quot;, ...}],
  &quot;meta&quot;: {&quot;current_page&quot;: 1, &quot;last_page&quot;: 1, &quot;per_page&quot;: 15, &quot;total&quot;: 1}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-GETapi-v1-blueprints-archived">Authorization Token</label>
            <input type="text" id="auth-GETapi-v1-blueprints-archived" placeholder="Enter your Bearer token">
        </div>

        
                    <div class="try-it-field">
                <label>page</label>
                <input type="text" data-query-param="page" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>per_page</label>
                <input type="text" data-query-param="per_page" placeholder="15">
            </div>
                    <div class="try-it-field">
                <label>search</label>
                <input type="text" data-query-param="search" placeholder="tech">
            </div>
                    <div class="try-it-field">
                <label>sort</label>
                <input type="text" data-query-param="sort" placeholder="created_at">
            </div>
                    <div class="try-it-field">
                <label>direction</label>
                <input type="text" data-query-param="direction" placeholder="desc">
            </div>
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('GET', 'api/v1/blueprints/archived', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="blueprints-POSTapi-v1-blueprints-store">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-post">POST</span>
                                        <span class="endpoint-url">api/v1/blueprints/store</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Create a blueprint</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Creates a new content blueprint.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/blueprints/store</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Body Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">name</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>A name for the blueprint. Must not be greater than 255 characters.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">Tech Thought Leadership</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">description</span>
                            <span class="param-type">string</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>An optional description of the blueprint.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">Blueprint for technical thought leadership posts on LinkedIn.</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">tone</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The writing tone.</p>
        </div>
    
            <div style="margin-top:4px;font-size:13px;color:var(--text-secondary);">
            Must be one of:
            <ul style="list-style-position:inside;margin:4px 0;">
                                    <li><code>professional</code></li>
                                    <li><code>casual</code></li>
                                    <li><code>technical</code></li>
                                    <li><code>educational</code></li>
                                    <li><code>persuasive</code></li>
                            </ul>
        </div>
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">technical</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">target_platform</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The target social media platform.</p>
        </div>
    
            <div style="margin-top:4px;font-size:13px;color:var(--text-secondary);">
            Must be one of:
            <ul style="list-style-position:inside;margin:4px 0;">
                                    <li><code>x</code></li>
                                    <li><code>linkedin</code></li>
                            </ul>
        </div>
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">linkedin</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">max_length</span>
                            <span class="param-type">integer</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>Maximum post length in characters. Must be at least 50. Must not be greater than 5000.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">1500</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">structure_rules</span>
                            <span class="param-type">string[]</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>Must not be greater than 100 characters.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">[&quot;b&quot;]</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">style_rules</span>
                            <span class="param-type">string[]</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>Must not be greater than 255 characters.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">[&quot;n&quot;]</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">hashtag_strategy</span>
                            <span class="param-type">string[]</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>Must not be greater than 100 characters.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">[&quot;g&quot;]</code>
            </div>
            
    </div>
                                            </div>
                </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">201</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;message&quot;: &quot;Blueprint created successfully.&quot;,
  &quot;blueprint&quot;: {&quot;id&quot;: 1, &quot;name&quot;: &quot;Tech Blog&quot;, &quot;tone&quot;: &quot;technical&quot;, ...}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-POSTapi-v1-blueprints-store">Authorization Token</label>
            <input type="text" id="auth-POSTapi-v1-blueprints-store" placeholder="Enter your Bearer token">
        </div>

        
        
                    <div class="try-it-field">
                <label>name</label>
                                    <input type="text" data-body-param="name" placeholder="Tech Thought Leadership">
                            </div>
                    <div class="try-it-field">
                <label>description</label>
                                    <input type="text" data-body-param="description" placeholder="Blueprint for technical thought leadership posts on LinkedIn.">
                            </div>
                    <div class="try-it-field">
                <label>tone</label>
                                    <input type="text" data-body-param="tone" placeholder="technical">
                            </div>
                    <div class="try-it-field">
                <label>target_platform</label>
                                    <input type="text" data-body-param="target_platform" placeholder="linkedin">
                            </div>
                    <div class="try-it-field">
                <label>max_length</label>
                                    <input type="text" data-body-param="max_length" placeholder="1500">
                            </div>
                    <div class="try-it-field">
                <label>structure_rules</label>
                                    <textarea data-body-param="structure_rules" rows="3">[
    &quot;b&quot;
]</textarea>
                            </div>
                    <div class="try-it-field">
                <label>style_rules</label>
                                    <textarea data-body-param="style_rules" rows="3">[
    &quot;n&quot;
]</textarea>
                            </div>
                    <div class="try-it-field">
                <label>hashtag_strategy</label>
                                    <textarea data-body-param="hashtag_strategy" rows="3">[
    &quot;g&quot;
]</textarea>
                            </div>
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('POST', 'api/v1/blueprints/store', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="blueprints-GETapi-v1-blueprints--id-">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-get">GET</span>
                                        <span class="endpoint-url">api/v1/blueprints/{id}</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Show a blueprint</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Returns the details of a specific blueprint.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/blueprints/1</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the blueprint.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">blueprint</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The blueprint ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;blueprint&quot;: {&quot;id&quot;: 1, &quot;name&quot;: &quot;Tech Blog&quot;, &quot;tone&quot;: &quot;technical&quot;, ...}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-GETapi-v1-blueprints--id-">Authorization Token</label>
            <input type="text" id="auth-GETapi-v1-blueprints--id-" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>blueprint <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="blueprint" placeholder="1">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('GET', 'api/v1/blueprints/1', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="blueprints-PUTapi-v1-blueprints--id--update">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-put">PUT</span>
                                        <span class="endpoint-url">api/v1/blueprints/{id}/update</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Update a blueprint</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Updates the fields of a specific blueprint.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/blueprints/1/update</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the blueprint.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">blueprint</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The blueprint ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Body Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">name</span>
                            <span class="param-type">string</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The blueprint name. Must not be greater than 255 characters.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">Updated Tech Blueprint</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">description</span>
                            <span class="param-type">string</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The blueprint description.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">Updated description for the blueprint.</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">tone</span>
                            <span class="param-type">string</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The writing tone. Must not be greater than 50 characters.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">professional</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">target_platform</span>
                            <span class="param-type">string</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The target platform.</p>
        </div>
    
            <div style="margin-top:4px;font-size:13px;color:var(--text-secondary);">
            Must be one of:
            <ul style="list-style-position:inside;margin:4px 0;">
                                    <li><code>x</code></li>
                                    <li><code>linkedin</code></li>
                            </ul>
        </div>
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">x</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">max_length</span>
                            <span class="param-type">integer</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>Maximum post length. Must be at least 50. Must not be greater than 5000.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">2000</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">structure_rules</span>
                            <span class="param-type">string[]</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>Must not be greater than 100 characters.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">[&quot;b&quot;]</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">style_rules</span>
                            <span class="param-type">string[]</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>Must not be greater than 255 characters.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">[&quot;n&quot;]</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">hashtag_strategy</span>
                            <span class="param-type">string[]</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>Must not be greater than 100 characters.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">[&quot;g&quot;]</code>
            </div>
            
    </div>
                                            </div>
                </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Blueprint updated successfully.&quot;, &quot;blueprint&quot;: {&quot;id&quot;: 1, ...}}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-PUTapi-v1-blueprints--id--update">Authorization Token</label>
            <input type="text" id="auth-PUTapi-v1-blueprints--id--update" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>blueprint <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="blueprint" placeholder="1">
            </div>
        
        
                    <div class="try-it-field">
                <label>name</label>
                                    <input type="text" data-body-param="name" placeholder="Updated Tech Blueprint">
                            </div>
                    <div class="try-it-field">
                <label>description</label>
                                    <input type="text" data-body-param="description" placeholder="Updated description for the blueprint.">
                            </div>
                    <div class="try-it-field">
                <label>tone</label>
                                    <input type="text" data-body-param="tone" placeholder="professional">
                            </div>
                    <div class="try-it-field">
                <label>target_platform</label>
                                    <input type="text" data-body-param="target_platform" placeholder="x">
                            </div>
                    <div class="try-it-field">
                <label>max_length</label>
                                    <input type="text" data-body-param="max_length" placeholder="2000">
                            </div>
                    <div class="try-it-field">
                <label>structure_rules</label>
                                    <textarea data-body-param="structure_rules" rows="3">[
    &quot;b&quot;
]</textarea>
                            </div>
                    <div class="try-it-field">
                <label>style_rules</label>
                                    <textarea data-body-param="style_rules" rows="3">[
    &quot;n&quot;
]</textarea>
                            </div>
                    <div class="try-it-field">
                <label>hashtag_strategy</label>
                                    <textarea data-body-param="hashtag_strategy" rows="3">[
    &quot;g&quot;
]</textarea>
                            </div>
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('PUT', 'api/v1/blueprints/1/update', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="blueprints-DELETEapi-v1-blueprints--blueprint_id--archive">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-delete">DELETE</span>
                                        <span class="endpoint-url">api/v1/blueprints/{blueprint_id}/archive</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Archive a blueprint</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Soft-deletes a specific blueprint.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/blueprints/1/archive</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">blueprint_id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the blueprint.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">blueprint</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The blueprint ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Blueprint archived successfully.&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-DELETEapi-v1-blueprints--blueprint_id--archive">Authorization Token</label>
            <input type="text" id="auth-DELETEapi-v1-blueprints--blueprint_id--archive" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>blueprint_id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="blueprint_id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>blueprint <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="blueprint" placeholder="1">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('DELETE', 'api/v1/blueprints/1/archive', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="blueprints-POSTapi-v1-blueprints--blueprint_id--restore">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-post">POST</span>
                                        <span class="endpoint-url">api/v1/blueprints/{blueprint_id}/restore</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Restore a blueprint</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Restores a soft-deleted blueprint.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/blueprints/1/restore</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">blueprint_id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the blueprint.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">blueprint</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The blueprint ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Blueprint restored successfully.&quot;, &quot;blueprint&quot;: {&quot;id&quot;: 1, ...}}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-POSTapi-v1-blueprints--blueprint_id--restore">Authorization Token</label>
            <input type="text" id="auth-POSTapi-v1-blueprints--blueprint_id--restore" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>blueprint_id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="blueprint_id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>blueprint <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="blueprint" placeholder="1">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('POST', 'api/v1/blueprints/1/restore', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="blueprints-DELETEapi-v1-blueprints--blueprint_id--forceDelete">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-delete">DELETE</span>
                                        <span class="endpoint-url">api/v1/blueprints/{blueprint_id}/forceDelete</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Permanently delete a blueprint</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Force-deletes a blueprint from the database.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/blueprints/1/forceDelete</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">blueprint_id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the blueprint.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">blueprint</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The blueprint ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Blueprint permanently deleted.&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-DELETEapi-v1-blueprints--blueprint_id--forceDelete">Authorization Token</label>
            <input type="text" id="auth-DELETEapi-v1-blueprints--blueprint_id--forceDelete" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>blueprint_id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="blueprint_id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>blueprint <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="blueprint" placeholder="1">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('DELETE', 'api/v1/blueprints/1/forceDelete', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
    </div>
                    <div class="endpoint-section" id="group-inputs">
    <h2 style="display:flex;align-items:center;gap:10px;">
        Inputs
    </h2>
            <div style="color:var(--text-secondary);font-size:14px;margin-bottom:24px;max-width:680px;">
            <p>Store and organize source materials (articles, notes, transcripts) that the AI uses as reference
when generating posts. Inputs are combined with a blueprint to produce the final output.</p>
        </div>
    
            <div class="endpoint-section" id="inputs-GETapi-v1-inputs">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-get">GET</span>
                                        <span class="endpoint-url">api/v1/inputs</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">List inputs</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Returns a paginated list of inputs for the authenticated user.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/inputs</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        Query Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">page</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Page number.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">per_page</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Items per page (1-100).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">15</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">search</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Search by title or raw input content.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">article</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">sort</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Sort by field (created_at, updated_at, title).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">created_at</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">direction</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Sort direction (asc, desc).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">desc</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;inputs&quot;: [{&quot;id&quot;: 1, &quot;title&quot;: &quot;My Input&quot;, &quot;raw_input&quot;: &quot;Content...&quot;, ...}],
  &quot;meta&quot;: {&quot;current_page&quot;: 1, &quot;last_page&quot;: 1, &quot;per_page&quot;: 15, &quot;total&quot;: 1}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-GETapi-v1-inputs">Authorization Token</label>
            <input type="text" id="auth-GETapi-v1-inputs" placeholder="Enter your Bearer token">
        </div>

        
                    <div class="try-it-field">
                <label>page</label>
                <input type="text" data-query-param="page" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>per_page</label>
                <input type="text" data-query-param="per_page" placeholder="15">
            </div>
                    <div class="try-it-field">
                <label>search</label>
                <input type="text" data-query-param="search" placeholder="article">
            </div>
                    <div class="try-it-field">
                <label>sort</label>
                <input type="text" data-query-param="sort" placeholder="created_at">
            </div>
                    <div class="try-it-field">
                <label>direction</label>
                <input type="text" data-query-param="direction" placeholder="desc">
            </div>
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('GET', 'api/v1/inputs', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="inputs-GETapi-v1-inputs-archived">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-get">GET</span>
                                        <span class="endpoint-url">api/v1/inputs/archived</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">List archived inputs</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Returns a paginated list of soft-deleted inputs.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/inputs/archived</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        Query Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">page</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Page number.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">per_page</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Items per page (1-100).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">15</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">search</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Search by title or raw input.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">article</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">sort</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Sort by field (created_at, updated_at, title).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">created_at</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">direction</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Sort direction (asc, desc).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">desc</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;inputs&quot;: [{&quot;id&quot;: 1, &quot;title&quot;: &quot;My Input&quot;, ...}],
  &quot;meta&quot;: {&quot;current_page&quot;: 1, &quot;last_page&quot;: 1, &quot;per_page&quot;: 15, &quot;total&quot;: 1}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-GETapi-v1-inputs-archived">Authorization Token</label>
            <input type="text" id="auth-GETapi-v1-inputs-archived" placeholder="Enter your Bearer token">
        </div>

        
                    <div class="try-it-field">
                <label>page</label>
                <input type="text" data-query-param="page" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>per_page</label>
                <input type="text" data-query-param="per_page" placeholder="15">
            </div>
                    <div class="try-it-field">
                <label>search</label>
                <input type="text" data-query-param="search" placeholder="article">
            </div>
                    <div class="try-it-field">
                <label>sort</label>
                <input type="text" data-query-param="sort" placeholder="created_at">
            </div>
                    <div class="try-it-field">
                <label>direction</label>
                <input type="text" data-query-param="direction" placeholder="desc">
            </div>
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('GET', 'api/v1/inputs/archived', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="inputs-POSTapi-v1-inputs-store">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-post">POST</span>
                                        <span class="endpoint-url">api/v1/inputs/store</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Create an input</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Creates a new raw content input.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/inputs/store</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Body Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">title</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>A descriptive title for the input.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">Article about Machine Learning</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">raw_input</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The raw content or source material.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">Machine learning is a subset of artificial intelligence that enables systems to learn and improve from experience...</code>
            </div>
            
    </div>
                                            </div>
                </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">201</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;message&quot;: &quot;Input created successfully.&quot;,
  &quot;input&quot;: {&quot;id&quot;: 1, &quot;title&quot;: &quot;My Input&quot;, &quot;raw_input&quot;: &quot;Content...&quot;, ...}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-POSTapi-v1-inputs-store">Authorization Token</label>
            <input type="text" id="auth-POSTapi-v1-inputs-store" placeholder="Enter your Bearer token">
        </div>

        
        
                    <div class="try-it-field">
                <label>title</label>
                                    <input type="text" data-body-param="title" placeholder="Article about Machine Learning">
                            </div>
                    <div class="try-it-field">
                <label>raw_input</label>
                                    <input type="text" data-body-param="raw_input" placeholder="Machine learning is a subset of artificial intelligence that enables systems to learn and improve from experience...">
                            </div>
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('POST', 'api/v1/inputs/store', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="inputs-GETapi-v1-inputs--id-">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-get">GET</span>
                                        <span class="endpoint-url">api/v1/inputs/{id}</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Show an input</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Returns the details of a specific input.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/inputs/1</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the input.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">input</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The input ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;input&quot;: {&quot;id&quot;: 1, &quot;title&quot;: &quot;My Input&quot;, &quot;raw_input&quot;: &quot;Content...&quot;, ...}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-GETapi-v1-inputs--id-">Authorization Token</label>
            <input type="text" id="auth-GETapi-v1-inputs--id-" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>input <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="input" placeholder="1">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('GET', 'api/v1/inputs/1', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="inputs-PUTapi-v1-inputs--id--update">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-put">PUT</span>
                                        <span class="endpoint-url">api/v1/inputs/{id}/update</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Update an input</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Updates the fields of a specific input.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/inputs/1/update</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the input.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">input</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The input ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Body Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">title</span>
                            <span class="param-type">string</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The input title.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">Updated ML Article</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">raw_input</span>
                            <span class="param-type">string</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The raw content or source material.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">Updated content about machine learning techniques...</code>
            </div>
            
    </div>
                                            </div>
                </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Input updated successfully.&quot;, &quot;input&quot;: {&quot;id&quot;: 1, ...}}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-PUTapi-v1-inputs--id--update">Authorization Token</label>
            <input type="text" id="auth-PUTapi-v1-inputs--id--update" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>input <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="input" placeholder="1">
            </div>
        
        
                    <div class="try-it-field">
                <label>title</label>
                                    <input type="text" data-body-param="title" placeholder="Updated ML Article">
                            </div>
                    <div class="try-it-field">
                <label>raw_input</label>
                                    <input type="text" data-body-param="raw_input" placeholder="Updated content about machine learning techniques...">
                            </div>
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('PUT', 'api/v1/inputs/1/update', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="inputs-DELETEapi-v1-inputs--input_id--archive">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-delete">DELETE</span>
                                        <span class="endpoint-url">api/v1/inputs/{input_id}/archive</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Archive an input</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Soft-deletes a specific input.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/inputs/1/archive</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">input_id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the input.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">input</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The input ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Input archived successfully.&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-DELETEapi-v1-inputs--input_id--archive">Authorization Token</label>
            <input type="text" id="auth-DELETEapi-v1-inputs--input_id--archive" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>input_id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="input_id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>input <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="input" placeholder="1">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('DELETE', 'api/v1/inputs/1/archive', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="inputs-POSTapi-v1-inputs--input_id--restore">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-post">POST</span>
                                        <span class="endpoint-url">api/v1/inputs/{input_id}/restore</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Restore an input</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Restores a soft-deleted input.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/inputs/1/restore</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">input_id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the input.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">input</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The input ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Input restored successfully.&quot;, &quot;input&quot;: {&quot;id&quot;: 1, ...}}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-POSTapi-v1-inputs--input_id--restore">Authorization Token</label>
            <input type="text" id="auth-POSTapi-v1-inputs--input_id--restore" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>input_id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="input_id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>input <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="input" placeholder="1">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('POST', 'api/v1/inputs/1/restore', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="inputs-DELETEapi-v1-inputs--input_id--forceDelete">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-delete">DELETE</span>
                                        <span class="endpoint-url">api/v1/inputs/{input_id}/forceDelete</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Permanently delete an input</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Force-deletes an input from the database.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/inputs/1/forceDelete</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">input_id</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the input.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">input</span>
                                    <span class="param-type">integer</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The input ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Input permanently deleted.&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-DELETEapi-v1-inputs--input_id--forceDelete">Authorization Token</label>
            <input type="text" id="auth-DELETEapi-v1-inputs--input_id--forceDelete" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>input_id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="input_id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>input <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="input" placeholder="1">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('DELETE', 'api/v1/inputs/1/forceDelete', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
    </div>
                    <div class="endpoint-section" id="group-conversations">
    <h2 style="display:flex;align-items:center;gap:10px;">
        Conversations
    </h2>
            <div style="color:var(--text-secondary);font-size:14px;margin-bottom:24px;max-width:680px;">
            <p>Chat with the AI assistant to refine and iterate on your post content.
Conversations are tied to a specific post and allow back-and-forth editing of hooks, body points, and hashtags.</p>
        </div>
    
            <div class="endpoint-section" id="conversations-GETapi-v1-conversations">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-get">GET</span>
                                        <span class="endpoint-url">api/v1/conversations</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">List conversations</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Returns a paginated list of conversations for the authenticated user.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/conversations</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        Query Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">page</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Page number.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">per_page</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Items per page (1-100).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">15</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">search</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Search by title.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">My Chat</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">post_id</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Filter by associated post ID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">sort</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Sort by field (created_at, updated_at, title).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">created_at</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">direction</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Sort direction (asc, desc).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">desc</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;conversations&quot;: [{&quot;id&quot;: &quot;uuid&quot;, &quot;title&quot;: &quot;My Chat&quot;, ...}],
  &quot;meta&quot;: {&quot;current_page&quot;: 1, &quot;last_page&quot;: 1, &quot;per_page&quot;: 15, &quot;total&quot;: 1}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-GETapi-v1-conversations">Authorization Token</label>
            <input type="text" id="auth-GETapi-v1-conversations" placeholder="Enter your Bearer token">
        </div>

        
                    <div class="try-it-field">
                <label>page</label>
                <input type="text" data-query-param="page" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>per_page</label>
                <input type="text" data-query-param="per_page" placeholder="15">
            </div>
                    <div class="try-it-field">
                <label>search</label>
                <input type="text" data-query-param="search" placeholder="My Chat">
            </div>
                    <div class="try-it-field">
                <label>post_id</label>
                <input type="text" data-query-param="post_id" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>sort</label>
                <input type="text" data-query-param="sort" placeholder="created_at">
            </div>
                    <div class="try-it-field">
                <label>direction</label>
                <input type="text" data-query-param="direction" placeholder="desc">
            </div>
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('GET', 'api/v1/conversations', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="conversations-GETapi-v1-conversations-archived">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-get">GET</span>
                                        <span class="endpoint-url">api/v1/conversations/archived</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">List archived conversations</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Returns a paginated list of soft-deleted conversations.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/conversations/archived</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        Query Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">page</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Page number.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">per_page</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Items per page (1-100).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">15</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">search</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Search by title.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">My Chat</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">sort</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Sort by field (created_at, updated_at, title).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">created_at</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">direction</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Sort direction (asc, desc).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">desc</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;conversations&quot;: [{&quot;id&quot;: &quot;uuid&quot;, &quot;title&quot;: &quot;My Chat&quot;, ...}],
  &quot;meta&quot;: {&quot;current_page&quot;: 1, &quot;last_page&quot;: 1, &quot;per_page&quot;: 15, &quot;total&quot;: 1}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-GETapi-v1-conversations-archived">Authorization Token</label>
            <input type="text" id="auth-GETapi-v1-conversations-archived" placeholder="Enter your Bearer token">
        </div>

        
                    <div class="try-it-field">
                <label>page</label>
                <input type="text" data-query-param="page" placeholder="1">
            </div>
                    <div class="try-it-field">
                <label>per_page</label>
                <input type="text" data-query-param="per_page" placeholder="15">
            </div>
                    <div class="try-it-field">
                <label>search</label>
                <input type="text" data-query-param="search" placeholder="My Chat">
            </div>
                    <div class="try-it-field">
                <label>sort</label>
                <input type="text" data-query-param="sort" placeholder="created_at">
            </div>
                    <div class="try-it-field">
                <label>direction</label>
                <input type="text" data-query-param="direction" placeholder="desc">
            </div>
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('GET', 'api/v1/conversations/archived', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="conversations-POSTapi-v1-conversations-store">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-post">POST</span>
                                        <span class="endpoint-url">api/v1/conversations/store</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Create a conversation</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Creates a new conversation for AI chat.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/conversations/store</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Body Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">title</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>A title for the conversation.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">Drafting my AI post</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">post_id</span>
                            <span class="param-type">integer</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The ID of an associated post (optional). Must match an existing stored value.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">1</code>
            </div>
            
    </div>
                                            </div>
                </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">201</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;message&quot;: &quot;Conversation created successfully.&quot;,
  &quot;conversation&quot;: {&quot;id&quot;: &quot;uuid&quot;, &quot;title&quot;: &quot;My Chat&quot;, ...}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-POSTapi-v1-conversations-store">Authorization Token</label>
            <input type="text" id="auth-POSTapi-v1-conversations-store" placeholder="Enter your Bearer token">
        </div>

        
        
                    <div class="try-it-field">
                <label>title</label>
                                    <input type="text" data-body-param="title" placeholder="Drafting my AI post">
                            </div>
                    <div class="try-it-field">
                <label>post_id</label>
                                    <input type="text" data-body-param="post_id" placeholder="1">
                            </div>
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('POST', 'api/v1/conversations/store', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="conversations-GETapi-v1-conversations--id-">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-get">GET</span>
                                        <span class="endpoint-url">api/v1/conversations/{id}</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Show a conversation</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Returns the details and messages of a specific conversation.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">id</span>
                                    <span class="param-type">string</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the conversation.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1d7562ac-ae68-4be2-930f-2456d1222dc8</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">conversation</span>
                                    <span class="param-type">string</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The conversation UUID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">550e8400-e29b-41d4-a716-446655440000</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;conversation&quot;: {&quot;id&quot;: &quot;uuid&quot;, &quot;title&quot;: &quot;My Chat&quot;, &quot;messages&quot;: [...], ...}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-GETapi-v1-conversations--id-">Authorization Token</label>
            <input type="text" id="auth-GETapi-v1-conversations--id-" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="id" placeholder="1d7562ac-ae68-4be2-930f-2456d1222dc8">
            </div>
                    <div class="try-it-field">
                <label>conversation <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="conversation" placeholder="550e8400-e29b-41d4-a716-446655440000">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('GET', 'api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="conversations-DELETEapi-v1-conversations--conversation_id--archive">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-delete">DELETE</span>
                                        <span class="endpoint-url">api/v1/conversations/{conversation_id}/archive</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Archive a conversation</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Soft-deletes a specific conversation.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8/archive</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">conversation_id</span>
                                    <span class="param-type">string</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the conversation.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1d7562ac-ae68-4be2-930f-2456d1222dc8</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">conversation</span>
                                    <span class="param-type">string</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The conversation UUID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">550e8400-e29b-41d4-a716-446655440000</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Conversation archived successfully.&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-DELETEapi-v1-conversations--conversation_id--archive">Authorization Token</label>
            <input type="text" id="auth-DELETEapi-v1-conversations--conversation_id--archive" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>conversation_id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="conversation_id" placeholder="1d7562ac-ae68-4be2-930f-2456d1222dc8">
            </div>
                    <div class="try-it-field">
                <label>conversation <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="conversation" placeholder="550e8400-e29b-41d4-a716-446655440000">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('DELETE', 'api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8/archive', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="conversations-POSTapi-v1-conversations--conversation_id--restore">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-post">POST</span>
                                        <span class="endpoint-url">api/v1/conversations/{conversation_id}/restore</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Restore a conversation</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Restores a soft-deleted conversation.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8/restore</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">conversation_id</span>
                                    <span class="param-type">string</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the conversation.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1d7562ac-ae68-4be2-930f-2456d1222dc8</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">conversation</span>
                                    <span class="param-type">string</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The conversation UUID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">550e8400-e29b-41d4-a716-446655440000</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Conversation restored successfully.&quot;, &quot;conversation&quot;: {&quot;id&quot;: &quot;uuid&quot;, ...}}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-POSTapi-v1-conversations--conversation_id--restore">Authorization Token</label>
            <input type="text" id="auth-POSTapi-v1-conversations--conversation_id--restore" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>conversation_id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="conversation_id" placeholder="1d7562ac-ae68-4be2-930f-2456d1222dc8">
            </div>
                    <div class="try-it-field">
                <label>conversation <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="conversation" placeholder="550e8400-e29b-41d4-a716-446655440000">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('POST', 'api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8/restore', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="conversations-DELETEapi-v1-conversations--conversation_id--forceDelete">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-delete">DELETE</span>
                                        <span class="endpoint-url">api/v1/conversations/{conversation_id}/forceDelete</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Permanently delete a conversation</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Force-deletes a conversation from the database.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8/forceDelete</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">conversation_id</span>
                                    <span class="param-type">string</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the conversation.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1d7562ac-ae68-4be2-930f-2456d1222dc8</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">conversation</span>
                                    <span class="param-type">string</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The conversation UUID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">550e8400-e29b-41d4-a716-446655440000</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;Conversation permanently deleted.&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-DELETEapi-v1-conversations--conversation_id--forceDelete">Authorization Token</label>
            <input type="text" id="auth-DELETEapi-v1-conversations--conversation_id--forceDelete" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>conversation_id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="conversation_id" placeholder="1d7562ac-ae68-4be2-930f-2456d1222dc8">
            </div>
                    <div class="try-it-field">
                <label>conversation <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="conversation" placeholder="550e8400-e29b-41d4-a716-446655440000">
            </div>
        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('DELETE', 'api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8/forceDelete', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
            <div class="endpoint-section" id="conversations-POSTapi-v1-conversations--conversation_id--send">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-post">POST</span>
                                        <span class="endpoint-url">api/v1/conversations/{conversation_id}/send</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Send a message</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Sends a message in a conversation and gets an AI-generated reply.</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8/send</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">conversation_id</span>
                                    <span class="param-type">string</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The ID of the conversation.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">1d7562ac-ae68-4be2-930f-2456d1222dc8</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">conversation</span>
                                    <span class="param-type">string</span>
                                    <span class="param-required">REQUIRED</span>                                </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>The conversation UUID.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">550e8400-e29b-41d4-a716-446655440000</code>
                                                            </div>
                                            </div>
                </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Body Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">content</span>
                            <span class="param-type">string</span>
                                        <span class="param-required">REQUIRED</span>
                                    </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>The message content to send to the AI assistant.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">Can you help me improve the hook of my post?</code>
            </div>
            
    </div>
                                            </div>
                </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid var(--border-light);">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">201</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;message&quot;: &quot;Message sent successfully.&quot;,
  &quot;user_message&quot;: {&quot;id&quot;: &quot;uuid&quot;, &quot;role&quot;: &quot;user&quot;, &quot;content&quot;: &quot;Hello&quot;, ...},
  &quot;assistant_message&quot;: {&quot;id&quot;: &quot;uuid&quot;, &quot;role&quot;: &quot;assistant&quot;, &quot;content&quot;: &quot;Hi! How can I help?&quot;, ...}
}</code></pre>
                                                            </div>
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-delete" style="font-size:11px;padding:2px 8px;">429</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">ai rate limited</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;message&quot;: &quot;AI service is currently rate limited. Please try again later.&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-POSTapi-v1-conversations--conversation_id--send">Authorization Token</label>
            <input type="text" id="auth-POSTapi-v1-conversations--conversation_id--send" placeholder="Enter your Bearer token">
        </div>

                    <div class="try-it-field">
                <label>conversation_id <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="conversation_id" placeholder="1d7562ac-ae68-4be2-930f-2456d1222dc8">
            </div>
                    <div class="try-it-field">
                <label>conversation <span style="color:#ef4444;">*</span></label>
                <input type="text" data-url-param="conversation" placeholder="550e8400-e29b-41d4-a716-446655440000">
            </div>
        
        
                    <div class="try-it-field">
                <label>content</label>
                                    <input type="text" data-body-param="content" placeholder="Can you help me improve the hook of my post?">
                            </div>
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('POST', 'api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8/send', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
    </div>
                    <div class="endpoint-section" id="group-search">
    <h2 style="display:flex;align-items:center;gap:10px;">
        Search
    </h2>
            <div style="color:var(--text-secondary);font-size:14px;margin-bottom:24px;max-width:680px;">
            <p>Search across all your resources — posts, blueprints, inputs, and conversations — from a single endpoint.
Optionally filter by resource type to narrow results.</p>
        </div>
    
            <div class="endpoint-section" id="search-GETapi-v1-search">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-get">GET</span>
                                        <span class="endpoint-url">api/v1/search</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                            <h3 style="margin-top:0;">Global search</h3>
                                                                <div style="margin-bottom:16px;">
                            <p>Searches across the authenticated user's resources. Results can be filtered by type.
Each result type returns up to <code>per_type</code> items (default 5, max 20).</p>
                        </div>
                                                                <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/search</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        Query Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">q</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Search query. Omitting returns all results.</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">AI</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">type</span>
                                    <span class="param-type">string</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Filter by resource type (posts, blueprints, inputs, conversations).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">posts</code>
                                                            </div>
                                                    <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">per_type</span>
                                    <span class="param-type">integer</span>
                                                                    </div>
                                                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        <p>Items per result type (1-20).</p>
                                    </div>
                                                                                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">5</code>
                                                            </div>
                                            </div>
                </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Body Parameters
                    </div>
                    <div class="card-body">
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">q</span>
                            <span class="param-type">string</span>
                                                </div>

            <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            <p>Must not be greater than 100 characters.</p>
        </div>
    
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">b</code>
            </div>
            
    </div>
                                                    <div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                    <span class="param-name">type</span>
                            <span class="param-type">string</span>
                                                </div>

    
            <div style="margin-top:4px;font-size:13px;color:var(--text-secondary);">
            Must be one of:
            <ul style="list-style-position:inside;margin:4px 0;">
                                    <li><code>posts</code></li>
                                    <li><code>blueprints</code></li>
                                    <li><code>inputs</code></li>
                                    <li><code>conversations</code></li>
                            </ul>
        </div>
    
                        <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">posts</code>
            </div>
            
    </div>
                                            </div>
                </div>
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid var(--border-light);">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">success</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;query&quot;: &quot;AI&quot;,
  &quot;type&quot;: null,
  &quot;results&quot;: {
    &quot;posts&quot;: {&quot;total&quot;: 2, &quot;items&quot;: [{&quot;id&quot;: 1, &quot;title&quot;: &quot;AI Post&quot;, ...}]},
    &quot;blueprints&quot;: {&quot;total&quot;: 1, &quot;items&quot;: [{&quot;id&quot;: 1, &quot;name&quot;: &quot;AI Blueprint&quot;, ...}]},
    &quot;inputs&quot;: {&quot;total&quot;: 0, &quot;items&quot;: []},
    &quot;conversations&quot;: {&quot;total&quot;: 0, &quot;items&quot;: []}
  }
}</code></pre>
                                                            </div>
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-delete" style="font-size:11px;padding:2px 8px;">422</span>
                                                                            <span style="color:var(--text-secondary);font-size:13px;">validation error</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{
  &quot;message&quot;: &quot;Validation failed.&quot;,
  &quot;errors&quot;: {&quot;q&quot;: [&quot;The q field is required.&quot;]}
}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-GETapi-v1-search">Authorization Token</label>
            <input type="text" id="auth-GETapi-v1-search" placeholder="Enter your Bearer token">
        </div>

        
                    <div class="try-it-field">
                <label>q</label>
                <input type="text" data-query-param="q" placeholder="AI">
            </div>
                    <div class="try-it-field">
                <label>type</label>
                <input type="text" data-query-param="type" placeholder="posts">
            </div>
                    <div class="try-it-field">
                <label>per_type</label>
                <input type="text" data-query-param="per_type" placeholder="5">
            </div>
        
                    <div class="try-it-field">
                <label>q</label>
                                    <input type="text" data-body-param="q" placeholder="b">
                            </div>
                    <div class="try-it-field">
                <label>type</label>
                                    <input type="text" data-body-param="type" placeholder="posts">
                            </div>
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('GET', 'api/v1/search', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
    </div>
                    <div class="endpoint-section" id="group-endpoints">
    <h2 style="display:flex;align-items:center;gap:10px;">
        Endpoints
    </h2>
    
            <div class="endpoint-section" id="endpoints-GETapi-v1-health">
    <div class="endpoint-content-grid">
        
        <div class="endpoint-docs">
            
            <div class="card">
                <div class="card-header">
                                            <span class="badge badge-get">GET</span>
                                        <span class="endpoint-url">api/v1/health</span>
                                            <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                                    </div>
                <div class="card-body">
                                                                                    <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">http://forgecoreapi.test/api/v1/health</code>
                            </div>
                        </div>
                                    </div>
            </div>

            
                            <div style="margin-bottom:24px;">
                                            <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td></tr>
                                        <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                        <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                                                <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                                                                    <tr><td><code>Authorization</code></td><td><code>Bearer {YOUR_AUTH_TOKEN}</code></td></tr>
                                                                                    <tr><td><code>Content-Type</code></td><td><code>application/json</code></td></tr>
                                                                                    <tr><td><code>Accept</code></td><td><code>application/json</code></td></tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                                    </div>
            
            
            
            
            
            
            
            
                            <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                                                    <div style="margin-bottom:20px;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge badge-get" style="font-size:11px;padding:2px 8px;">200</span>
                                                                    </div>
                                                                    <pre><code class="language-json">{&quot;status&quot;:&quot;healthy&quot;,&quot;timestamp&quot;:&quot;2026-06-26T16:13:37+00:00&quot;}</code></pre>
                                                            </div>
                        
                                            </div>
                </div>
                    </div>

        
                    <div class="endpoint-tryit">
                <div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-GETapi-v1-health">Authorization Token</label>
            <input type="text" id="auth-GETapi-v1-health" placeholder="Enter your Bearer token">
        </div>

        
        
        
        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('GET', 'api/v1/health', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                Send Request
            </button>
            <span class="try-it-status" style="font-size:13px;color:var(--text-muted);"></span>
        </div>

        <div class="try-it-response" style="display:none;margin-top:16px;">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <span style="font-weight:600;font-size:13px;color:var(--text-secondary);">Response</span>
                <span class="try-it-code badge" style="font-size:11px;"></span>
                <span class="try-it-time" style="font-size:12px;color:var(--text-muted);"></span>
            </div>
            <pre><code class="language-json try-it-body"></code></pre>
        </div>
    </div>
</div>

<script>
(function() {
    if (window.sendTryIt) return;
    window.sendTryIt = function(method, path, btn) {
        var panel = btn.closest('.try-it-out-panel') || btn.closest('.card');
        if (!panel) return;
        var responseEl = panel.querySelector('.try-it-response');
        var bodyEl = panel.querySelector('.try-it-body');
        var codeEl = panel.querySelector('.try-it-code');
        var timeEl = panel.querySelector('.try-it-time');
        var statusEl = panel.querySelector('.try-it-status');

        statusEl.textContent = 'Sending...';
        btn.disabled = true;

        var baseUrl = window.tryItOutBaseUrl || window.location.origin;
        var url = baseUrl.replace(/\/+$/, '') + '/' + path.replace(/^\/+/, '');

        panel.querySelectorAll('[data-url-param]').forEach(function(el) {
            url = url.replace('{' + el.dataset.urlParam + '}', encodeURIComponent(el.value));
            url = url.replace('{' + el.dataset.urlParam + '?}', encodeURIComponent(el.value));
        });

        var qs = [];
        panel.querySelectorAll('[data-query-param]').forEach(function(el) {
            if (el.value) qs.push(el.dataset.queryParam + '=' + encodeURIComponent(el.value));
        });
        if (qs.length) url += '?' + qs.join('&');

        var body = null;
        var bodyParams = panel.querySelectorAll('[data-body-param]');
        if (bodyParams.length) {
            body = {};
            bodyParams.forEach(function(el) { body[el.dataset.bodyParam] = el.value; });
            body = JSON.stringify(body);
        }

        var token = panel.querySelector('[id^="auth-"]');
        var headers = { 'Content-Type': 'application/json', 'Accept': 'application/json' };
        if (token && token.value) headers['Authorization'] = 'Bearer ' + token.value;

        var start = performance.now();

        fetch(url, { method: method, headers: headers, body: body })
            .then(function(r) {
                var elapsed = Math.round(performance.now() - start);
                codeEl.textContent = r.status;
                codeEl.className = 'try-it-code badge ' + (r.status < 400 ? 'badge-get' : 'badge-delete');
                timeEl.textContent = elapsed + 'ms';
                return r.json().catch(function() { return { error: 'Invalid JSON response' }; });
            })
            .then(function(data) {
                bodyEl.textContent = JSON.stringify(data, null, 2);
                if (window.hljs) hljs.highlightElement(bodyEl);
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .catch(function(err) {
                bodyEl.textContent = 'Error: ' + err.message;
                responseEl.style.display = 'block';
                statusEl.textContent = '';
            })
            .finally(function() { btn.disabled = false; });
    };
})();
</script>
            </div>
            </div>
</div>
    </div>
        
            </main>
</div>

<script>
function filterSidebar(query) {
    query = query.toLowerCase();
    document.querySelectorAll('#sidebar-nav .nav-item').forEach(function(item) {
        item.style.display = item.textContent.toLowerCase().indexOf(query) !== -1 ? '' : 'none';
    });
    document.querySelectorAll('#sidebar-nav .nav-group').forEach(function(group) {
        var visible = false;
        group.querySelectorAll('.nav-item').forEach(function(item) {
            if (item.style.display !== 'none') visible = true;
        });
    });
}
document.querySelectorAll('pre code').forEach(function(el) {
    hljs.highlightElement(el);
});
</script>

</body>
</html>
