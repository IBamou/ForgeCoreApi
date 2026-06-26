@php
    use Knuckles\Scribe\Tools\WritingUtils as u;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>{!! $metadata['title'] !!}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{!! $assetPathPrefix !!}css/theme-elements.style.css" media="screen">
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
                @if($metadata['logo'])
                    <img src="{{ $metadata['logo'] }}" alt="">
                @endif
                <span>{{ $metadata['title'] }}</span>
            </div>
            @if($metadata['auth'])
                <div style="margin-top:8px;">
                    <a href="#" onclick="document.querySelector('.auth-section').scrollIntoView({behavior:'smooth'});return false;"
                       style="font-size:12px;color:var(--brand);display:inline-flex;align-items:center;gap:4px;">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        Authentication
                    </a>
                </div>
            @endif
        </div>
        <div class="sidebar-search">
            <input type="text" id="sidebar-search" placeholder="Search endpoints..." oninput="filterSidebar(this.value)">
        </div>
        <div class="sidebar-inner" id="sidebar-nav">
            @foreach($groupedEndpoints as $group)
                <div class="nav-group">
                    <a href="#group-{{ \Illuminate\Support\Str::slug($group['name']) }}" class="nav-group-title">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                            @php $gn = $group['name']; @endphp
                            @if($gn === 'Health')
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                            @elseif($gn === 'Auth' || $gn === 'Authentication')
                                <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            @elseif($gn === 'Profile')
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                            @elseif($gn === 'Posts')
                                <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/>
                            @elseif($gn === 'Blueprints')
                                <rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/>
                            @elseif($gn === 'Inputs')
                                <path d="M4 7V4a2 2 0 0 1 2-2h8.5L20 7.5V20a2 2 0 0 1-2 2h-8"/><polyline points="14 2 14 8 20 8"/><path d="M5 17h2M8 13h4"/>
                            @elseif($gn === 'Conversations')
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                            @elseif($gn === 'Search')
                                <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                            @else
                                <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                            @endif
                        </svg>
                        {{ $group['name'] }}
                    </a>
                    @foreach($group['endpoints'] as $endpoint)
                        <a href="#{{ $endpoint->fullSlug() }}" class="nav-item">
                            <span class="badge badge-{{ strtolower($endpoint->httpMethods[0]) }}">{{ $endpoint->httpMethods[0] }}</span>
                            <span class="label">{{ $endpoint->name() }}</span>
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
    </nav>

    <main id="main">
        <header class="docs-header">
            <h1>{{ $metadata['title'] }}</h1>
            @if($metadata['last_updated'])
                <p style="font-size:13px;color:var(--text-muted);margin-bottom:8px;">{{ $metadata['last_updated'] }}</p>
            @endif
        </header>

        @if($auth)
            <div class="auth-section">
                <div class="details-box">
                    <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        Authentication / Authorization
                    </div>
                    <div class="details-body">
                        {!! $auth !!}
                    </div>
                </div>
            </div>
        @endif

        @if($intro)
            <div style="max-width:680px;margin-bottom:40px;">
                {!! $intro !!}
            </div>
        @endif

        @foreach($groupedEndpoints as $group)
            @include('scribe::themes.elements.groups')
        @endforeach

        @if($append)
            <div style="margin-top:40px;max-width:680px;">
                {!! $append !!}
            </div>
        @endif
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
