<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://forgecoreapi.test";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.11.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.11.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                                    <ul id="tocify-subheader-introduction" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication">
                                <a href="#authentication">Authentication</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="rate-limiting">
                                <a href="#rate-limiting">Rate Limiting</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="error-responses">
                                <a href="#error-responses">Error Responses</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="base-url">
                                <a href="#base-url">Base URL</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                                    <ul id="tocify-subheader-authenticating-requests" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="obtaining-a-token">
                                <a href="#obtaining-a-token">Obtaining a Token</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="token-usage">
                                <a href="#token-usage">Token Usage</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-authentication" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication">
                    <a href="#authentication">Authentication</a>
                </li>
                                    <ul id="tocify-subheader-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-login">
                                <a href="#authentication-POSTapi-v1-login">Login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-register">
                                <a href="#authentication-POSTapi-v1-register">Register a new user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-forgot-password">
                                <a href="#authentication-POSTapi-v1-forgot-password">Forgot password</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-reset-password">
                                <a href="#authentication-POSTapi-v1-reset-password">Reset password</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-GETapi-v1-email-verify--id---hash-">
                                <a href="#authentication-GETapi-v1-email-verify--id---hash-">Verify email</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-logout">
                                <a href="#authentication-POSTapi-v1-logout">Logout</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-email-verification-notification">
                                <a href="#authentication-POSTapi-v1-email-verification-notification">Send email verification notification</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-blueprints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="blueprints">
                    <a href="#blueprints">Blueprints</a>
                </li>
                                    <ul id="tocify-subheader-blueprints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="blueprints-GETapi-v1-blueprints">
                                <a href="#blueprints-GETapi-v1-blueprints">List blueprints</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blueprints-GETapi-v1-blueprints-archived">
                                <a href="#blueprints-GETapi-v1-blueprints-archived">List archived blueprints</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blueprints-POSTapi-v1-blueprints-store">
                                <a href="#blueprints-POSTapi-v1-blueprints-store">Create a blueprint</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blueprints-GETapi-v1-blueprints--id-">
                                <a href="#blueprints-GETapi-v1-blueprints--id-">Show a blueprint</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blueprints-PUTapi-v1-blueprints--id--update">
                                <a href="#blueprints-PUTapi-v1-blueprints--id--update">Update a blueprint</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blueprints-DELETEapi-v1-blueprints--blueprint_id--archive">
                                <a href="#blueprints-DELETEapi-v1-blueprints--blueprint_id--archive">Archive a blueprint</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blueprints-POSTapi-v1-blueprints--blueprint_id--restore">
                                <a href="#blueprints-POSTapi-v1-blueprints--blueprint_id--restore">Restore a blueprint</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blueprints-DELETEapi-v1-blueprints--blueprint_id--forceDelete">
                                <a href="#blueprints-DELETEapi-v1-blueprints--blueprint_id--forceDelete">Permanently delete a blueprint</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-conversations" class="tocify-header">
                <li class="tocify-item level-1" data-unique="conversations">
                    <a href="#conversations">Conversations</a>
                </li>
                                    <ul id="tocify-subheader-conversations" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="conversations-GETapi-v1-conversations">
                                <a href="#conversations-GETapi-v1-conversations">List conversations</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="conversations-GETapi-v1-conversations-archived">
                                <a href="#conversations-GETapi-v1-conversations-archived">List archived conversations</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="conversations-POSTapi-v1-conversations-store">
                                <a href="#conversations-POSTapi-v1-conversations-store">Create a conversation</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="conversations-GETapi-v1-conversations--id-">
                                <a href="#conversations-GETapi-v1-conversations--id-">Show a conversation</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="conversations-DELETEapi-v1-conversations--conversation_id--archive">
                                <a href="#conversations-DELETEapi-v1-conversations--conversation_id--archive">Archive a conversation</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="conversations-POSTapi-v1-conversations--conversation_id--restore">
                                <a href="#conversations-POSTapi-v1-conversations--conversation_id--restore">Restore a conversation</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="conversations-DELETEapi-v1-conversations--conversation_id--forceDelete">
                                <a href="#conversations-DELETEapi-v1-conversations--conversation_id--forceDelete">Permanently delete a conversation</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="conversations-POSTapi-v1-conversations--conversation_id--send">
                                <a href="#conversations-POSTapi-v1-conversations--conversation_id--send">Send a message</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-health">
                                <a href="#endpoints-GETapi-v1-health">GET api/v1/health</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-inputs" class="tocify-header">
                <li class="tocify-item level-1" data-unique="inputs">
                    <a href="#inputs">Inputs</a>
                </li>
                                    <ul id="tocify-subheader-inputs" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="inputs-GETapi-v1-inputs">
                                <a href="#inputs-GETapi-v1-inputs">List inputs</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="inputs-GETapi-v1-inputs-archived">
                                <a href="#inputs-GETapi-v1-inputs-archived">List archived inputs</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="inputs-POSTapi-v1-inputs-store">
                                <a href="#inputs-POSTapi-v1-inputs-store">Create an input</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="inputs-GETapi-v1-inputs--id-">
                                <a href="#inputs-GETapi-v1-inputs--id-">Show an input</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="inputs-PUTapi-v1-inputs--id--update">
                                <a href="#inputs-PUTapi-v1-inputs--id--update">Update an input</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="inputs-DELETEapi-v1-inputs--input_id--archive">
                                <a href="#inputs-DELETEapi-v1-inputs--input_id--archive">Archive an input</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="inputs-POSTapi-v1-inputs--input_id--restore">
                                <a href="#inputs-POSTapi-v1-inputs--input_id--restore">Restore an input</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="inputs-DELETEapi-v1-inputs--input_id--forceDelete">
                                <a href="#inputs-DELETEapi-v1-inputs--input_id--forceDelete">Permanently delete an input</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-posts" class="tocify-header">
                <li class="tocify-item level-1" data-unique="posts">
                    <a href="#posts">Posts</a>
                </li>
                                    <ul id="tocify-subheader-posts" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="posts-GETapi-v1-posts">
                                <a href="#posts-GETapi-v1-posts">List posts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="posts-GETapi-v1-posts-archived">
                                <a href="#posts-GETapi-v1-posts-archived">List archived posts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="posts-POSTapi-v1-posts-store">
                                <a href="#posts-POSTapi-v1-posts-store">Create a post</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="posts-GETapi-v1-posts--id-">
                                <a href="#posts-GETapi-v1-posts--id-">Show a post</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="posts-PUTapi-v1-posts--id--update">
                                <a href="#posts-PUTapi-v1-posts--id--update">Update a post</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="posts-PATCHapi-v1-posts--post_id--updateStatus">
                                <a href="#posts-PATCHapi-v1-posts--post_id--updateStatus">Update post status</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="posts-DELETEapi-v1-posts--post_id--archive">
                                <a href="#posts-DELETEapi-v1-posts--post_id--archive">Archive a post</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="posts-POSTapi-v1-posts--post_id--restore">
                                <a href="#posts-POSTapi-v1-posts--post_id--restore">Restore a post</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="posts-DELETEapi-v1-posts--post_id--forceDelete">
                                <a href="#posts-DELETEapi-v1-posts--post_id--forceDelete">Permanently delete a post</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="posts-POSTapi-v1-posts--post_id--retry">
                                <a href="#posts-POSTapi-v1-posts--post_id--retry">Retry post generation</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-profile" class="tocify-header">
                <li class="tocify-item level-1" data-unique="profile">
                    <a href="#profile">Profile</a>
                </li>
                                    <ul id="tocify-subheader-profile" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="profile-GETapi-v1-profile">
                                <a href="#profile-GETapi-v1-profile">Show profile</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-search" class="tocify-header">
                <li class="tocify-item level-1" data-unique="search">
                    <a href="#search">Search</a>
                </li>
                                    <ul id="tocify-subheader-search" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="search-GETapi-v1-search">
                                <a href="#search-GETapi-v1-search">Global search</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: June 26, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>ForgeCore is an AI-powered content generation API that helps you create, manage, and optimize social media posts. It provides:</p>
<ul>
<li><strong>AI Post Generation</strong>: Generate posts using blueprints (tone, platform, structure rules) and raw input content</li>
<li><strong>Blueprint Management</strong>: Define content templates with tone, platform targeting, structure rules, and style guidelines</li>
<li><strong>Input Management</strong>: Store and organize source content for post generation</li>
<li><strong>AI Chat</strong>: Interact with an AI assistant to refine and improve your posts</li>
<li><strong>Global Search</strong>: Search across all your resources from a single endpoint</li>
</ul>
<h2 id="authentication">Authentication</h2>
<p>The API uses Laravel Sanctum token-based authentication. Include your token in the <code>Authorization</code> header:</p>
<pre><code>Authorization: Bearer your-api-token-here</code></pre>
<h2 id="rate-limiting">Rate Limiting</h2>
<ul>
<li><strong>Auth endpoints</strong>: 5 requests per minute</li>
<li><strong>API endpoints</strong>: 60 requests per minute</li>
<li><strong>Conversation send</strong>: 10 requests per minute</li>
</ul>
<h2 id="error-responses">Error Responses</h2>
<p>All errors return consistent JSON responses:</p>
<pre><code class="language-json">{
  "message": "Error description",
  "errors": {}
}</code></pre>
<h2 id="base-url">Base URL</h2>
<p>All endpoints are prefixed with <code>/api/v1/</code>.</p>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>Authenticate requests by including a <strong>Bearer token</strong> in the <code>Authorization</code> header.</p>
<pre><code>Authorization: Bearer 1|abc123...</code></pre>
<h2 id="obtaining-a-token">Obtaining a Token</h2>
<p>Register a new account or login to receive an API token:</p>
<ul>
<li><code>POST /api/v1/register</code> — Create an account and get a token</li>
<li><code>POST /api/v1/login</code> — Login and get a token</li>
</ul>
<p>The token is returned in the response body:</p>
<pre><code class="language-json">{
  "token": "1|abc123...",
  "user": { ... }
}</code></pre>
<h2 id="token-usage">Token Usage</h2>
<p>Include the token in subsequent requests as a Bearer token in the <code>Authorization</code> header. Tokens are valid until explicitly revoked (via logout).</p>
<p><strong>Important</strong>: Most API endpoints require authentication. Unauthenticated requests will receive a <code>401 Unauthorized</code> response.</p>

        <h1 id="authentication">Authentication</h1>

    <p>APIs for user authentication, registration, email verification, and password management.</p>

                                <h2 id="authentication-POSTapi-v1-login">Login</h2>

<p>
</p>

<p>Authenticates a user and returns an API token.</p>

<span id="example-requests-POSTapi-v1-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://forgecoreapi.test/api/v1/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"john@example.com\",
    \"password\": \"secret123\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "john@example.com",
    "password": "secret123"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-login">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;token&quot;: &quot;1|abc123...&quot;,
    &quot;user&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;John Doe&quot;,
        &quot;email&quot;: &quot;john@example.com&quot;,
        &quot;created_at&quot;: &quot;2026-01-01T00:00:00.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, invalid credentials):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Invalid credentials&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-login" data-method="POST"
      data-path="api/v1/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-login"
                    onclick="tryItOut('POSTapi-v1-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-login"
                    onclick="cancelTryOut('POSTapi-v1-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-login"
               value="john@example.com"
               data-component="body">
    <br>
<p>The user's email address. Must be a valid email address. Example: <code>john@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-v1-login"
               value="secret123"
               data-component="body">
    <br>
<p>The user's password. Example: <code>secret123</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTapi-v1-register">Register a new user</h2>

<p>
</p>

<p>Creates a new user account and returns an API token.</p>

<span id="example-requests-POSTapi-v1-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://forgecoreapi.test/api/v1/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"John Doe\",
    \"email\": \"john@example.com\",
    \"password\": \"secret123\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "John Doe",
    "email": "john@example.com",
    "password": "secret123"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-register">
            <blockquote>
            <p>Example response (201, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;token&quot;: &quot;1|abc123...&quot;,
    &quot;user&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;John Doe&quot;,
        &quot;email&quot;: &quot;john@example.com&quot;,
        &quot;created_at&quot;: &quot;2026-01-01T00:00:00.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, validation error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Validation failed.&quot;,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;This email is already registered.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-register" data-method="POST"
      data-path="api/v1/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-register"
                    onclick="tryItOut('POSTapi-v1-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-register"
                    onclick="cancelTryOut('POSTapi-v1-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-register"
               value="John Doe"
               data-component="body">
    <br>
<p>The user's full name. Example: <code>John Doe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-register"
               value="john@example.com"
               data-component="body">
    <br>
<p>The user's email address. Must be a valid email address. Example: <code>john@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-v1-register"
               value="secret123"
               data-component="body">
    <br>
<p>The user's password. Example: <code>secret123</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTapi-v1-forgot-password">Forgot password</h2>

<p>
</p>

<p>Sends a password reset link to the given email address.</p>

<span id="example-requests-POSTapi-v1-forgot-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://forgecoreapi.test/api/v1/forgot-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"john@example.com\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/forgot-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "john@example.com"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-forgot-password">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Password reset link sent.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;We can&#039;t find a user with that email address.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-forgot-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-forgot-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-forgot-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-forgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-forgot-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-forgot-password" data-method="POST"
      data-path="api/v1/forgot-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-forgot-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-forgot-password"
                    onclick="tryItOut('POSTapi-v1-forgot-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-forgot-password"
                    onclick="cancelTryOut('POSTapi-v1-forgot-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-forgot-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/forgot-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-forgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-forgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-forgot-password"
               value="john@example.com"
               data-component="body">
    <br>
<p>The user's email address. Example: <code>john@example.com</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTapi-v1-reset-password">Reset password</h2>

<p>
</p>

<p>Resets the user's password using a valid token.</p>

<span id="example-requests-POSTapi-v1-reset-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://forgecoreapi.test/api/v1/reset-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"token\": \"abc123def456\",
    \"email\": \"john@example.com\",
    \"password\": \"new-secret-123\",
    \"password_confirmation\": \"new-secret-123\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/reset-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "abc123def456",
    "email": "john@example.com",
    "password": "new-secret-123",
    "password_confirmation": "new-secret-123"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-reset-password">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Password reset successfully.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This password reset token is invalid.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-reset-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-reset-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-reset-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-reset-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-reset-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-reset-password" data-method="POST"
      data-path="api/v1/reset-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-reset-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-reset-password"
                    onclick="tryItOut('POSTapi-v1-reset-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-reset-password"
                    onclick="cancelTryOut('POSTapi-v1-reset-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-reset-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/reset-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-reset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-reset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="token"                data-endpoint="POSTapi-v1-reset-password"
               value="abc123def456"
               data-component="body">
    <br>
<p>The password reset token. Example: <code>abc123def456</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-reset-password"
               value="john@example.com"
               data-component="body">
    <br>
<p>The user's email address. Example: <code>john@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-v1-reset-password"
               value="new-secret-123"
               data-component="body">
    <br>
<p>The new password (min 8 characters). Example: <code>new-secret-123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="POSTapi-v1-reset-password"
               value="new-secret-123"
               data-component="body">
    <br>
<p>Must match the new password. Example: <code>new-secret-123</code></p>
        </div>
        </form>

                    <h2 id="authentication-GETapi-v1-email-verify--id---hash-">Verify email</h2>

<p>
</p>

<p>Verifies a user's email address using the signed URL from the verification email.</p>

<span id="example-requests-GETapi-v1-email-verify--id---hash-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://forgecoreapi.test/api/v1/email/verify/1/abc123def456..." \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/email/verify/1/abc123def456..."
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-email-verify--id---hash-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Email verified successfully.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200, already verified):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Email already verified.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Invalid verification link.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-email-verify--id---hash-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-email-verify--id---hash-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-email-verify--id---hash-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-email-verify--id---hash-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-email-verify--id---hash-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-email-verify--id---hash-" data-method="GET"
      data-path="api/v1/email/verify/{id}/{hash}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-email-verify--id---hash-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-email-verify--id---hash-"
                    onclick="tryItOut('GETapi-v1-email-verify--id---hash-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-email-verify--id---hash-"
                    onclick="cancelTryOut('GETapi-v1-email-verify--id---hash-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-email-verify--id---hash-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/email/verify/{id}/{hash}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-email-verify--id---hash-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-email-verify--id---hash-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-email-verify--id---hash-"
               value="1"
               data-component="url">
    <br>
<p>The user's ID. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>hash</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="hash"                data-endpoint="GETapi-v1-email-verify--id---hash-"
               value="abc123def456..."
               data-component="url">
    <br>
<p>The verification hash. Example: <code>abc123def456...</code></p>
            </div>
                    </form>

                    <h2 id="authentication-POSTapi-v1-logout">Logout</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Revokes the current API token.</p>

<span id="example-requests-POSTapi-v1-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://forgecoreapi.test/api/v1/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-logout">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Logged out&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-logout" data-method="POST"
      data-path="api/v1/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-logout"
                    onclick="tryItOut('POSTapi-v1-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-logout"
                    onclick="cancelTryOut('POSTapi-v1-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="authentication-POSTapi-v1-email-verification-notification">Send email verification notification</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Resends the email verification link to the authenticated user.</p>

<span id="example-requests-POSTapi-v1-email-verification-notification">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://forgecoreapi.test/api/v1/email/verification-notification" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/email/verification-notification"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-email-verification-notification">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Verification link sent.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-email-verification-notification" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-email-verification-notification"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-email-verification-notification"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-email-verification-notification" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-email-verification-notification">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-email-verification-notification" data-method="POST"
      data-path="api/v1/email/verification-notification"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-email-verification-notification', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-email-verification-notification"
                    onclick="tryItOut('POSTapi-v1-email-verification-notification');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-email-verification-notification"
                    onclick="cancelTryOut('POSTapi-v1-email-verification-notification');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-email-verification-notification"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/email/verification-notification</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-email-verification-notification"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-email-verification-notification"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="blueprints">Blueprints</h1>

    <p>APIs for managing content blueprints that define tone, platform, and structure rules.</p>

                                <h2 id="blueprints-GETapi-v1-blueprints">List blueprints</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns a paginated list of blueprints for the authenticated user.</p>

<span id="example-requests-GETapi-v1-blueprints">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://forgecoreapi.test/api/v1/blueprints?page=1&amp;per_page=15&amp;search=tech&amp;is_active=1&amp;target_platform=linkedin&amp;sort=created_at&amp;direction=desc" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/blueprints"
);

const params = {
    "page": "1",
    "per_page": "15",
    "search": "tech",
    "is_active": "1",
    "target_platform": "linkedin",
    "sort": "created_at",
    "direction": "desc",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-blueprints">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;blueprints&quot;: [{&quot;id&quot;: 1, &quot;name&quot;: &quot;Tech Blog&quot;, ...}],
  &quot;meta&quot;: {&quot;current_page&quot;: 1, &quot;last_page&quot;: 1, &quot;per_page&quot;: 15, &quot;total&quot;: 1}
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-blueprints" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-blueprints"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-blueprints"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-blueprints" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-blueprints">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-blueprints" data-method="GET"
      data-path="api/v1/blueprints"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-blueprints', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-blueprints"
                    onclick="tryItOut('GETapi-v1-blueprints');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-blueprints"
                    onclick="cancelTryOut('GETapi-v1-blueprints');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-blueprints"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/blueprints</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-blueprints"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-blueprints"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-blueprints"
               value="1"
               data-component="query">
    <br>
<p>Page number. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-v1-blueprints"
               value="15"
               data-component="query">
    <br>
<p>Items per page (1-100). Example: <code>15</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-v1-blueprints"
               value="tech"
               data-component="query">
    <br>
<p>Search by name, description, tone or target platform. Example: <code>tech</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="GETapi-v1-blueprints" style="display: none">
            <input type="radio" name="is_active"
                   value="1"
                   data-endpoint="GETapi-v1-blueprints"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETapi-v1-blueprints" style="display: none">
            <input type="radio" name="is_active"
                   value="0"
                   data-endpoint="GETapi-v1-blueprints"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Filter by active status. Example: <code>true</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>target_platform</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="target_platform"                data-endpoint="GETapi-v1-blueprints"
               value="linkedin"
               data-component="query">
    <br>
<p>Filter by platform (x, linkedin). Example: <code>linkedin</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-v1-blueprints"
               value="created_at"
               data-component="query">
    <br>
<p>Sort by field (created_at, updated_at, name, tone). Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>direction</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="direction"                data-endpoint="GETapi-v1-blueprints"
               value="desc"
               data-component="query">
    <br>
<p>Sort direction (asc, desc). Example: <code>desc</code></p>
            </div>
                </form>

                    <h2 id="blueprints-GETapi-v1-blueprints-archived">List archived blueprints</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns a paginated list of soft-deleted blueprints.</p>

<span id="example-requests-GETapi-v1-blueprints-archived">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://forgecoreapi.test/api/v1/blueprints/archived?page=1&amp;per_page=15&amp;search=tech&amp;sort=created_at&amp;direction=desc" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/blueprints/archived"
);

const params = {
    "page": "1",
    "per_page": "15",
    "search": "tech",
    "sort": "created_at",
    "direction": "desc",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-blueprints-archived">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;blueprints&quot;: [{&quot;id&quot;: 1, &quot;name&quot;: &quot;Tech Blog&quot;, ...}],
  &quot;meta&quot;: {&quot;current_page&quot;: 1, &quot;last_page&quot;: 1, &quot;per_page&quot;: 15, &quot;total&quot;: 1}
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-blueprints-archived" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-blueprints-archived"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-blueprints-archived"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-blueprints-archived" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-blueprints-archived">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-blueprints-archived" data-method="GET"
      data-path="api/v1/blueprints/archived"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-blueprints-archived', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-blueprints-archived"
                    onclick="tryItOut('GETapi-v1-blueprints-archived');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-blueprints-archived"
                    onclick="cancelTryOut('GETapi-v1-blueprints-archived');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-blueprints-archived"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/blueprints/archived</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-blueprints-archived"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-blueprints-archived"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-blueprints-archived"
               value="1"
               data-component="query">
    <br>
<p>Page number. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-v1-blueprints-archived"
               value="15"
               data-component="query">
    <br>
<p>Items per page (1-100). Example: <code>15</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-v1-blueprints-archived"
               value="tech"
               data-component="query">
    <br>
<p>Search by name or description. Example: <code>tech</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-v1-blueprints-archived"
               value="created_at"
               data-component="query">
    <br>
<p>Sort by field (created_at, updated_at, name). Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>direction</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="direction"                data-endpoint="GETapi-v1-blueprints-archived"
               value="desc"
               data-component="query">
    <br>
<p>Sort direction (asc, desc). Example: <code>desc</code></p>
            </div>
                </form>

                    <h2 id="blueprints-POSTapi-v1-blueprints-store">Create a blueprint</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Creates a new content blueprint.</p>

<span id="example-requests-POSTapi-v1-blueprints-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://forgecoreapi.test/api/v1/blueprints/store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Tech Thought Leadership\",
    \"description\": \"Blueprint for technical thought leadership posts on LinkedIn.\",
    \"tone\": \"technical\",
    \"target_platform\": \"linkedin\",
    \"max_length\": 1500,
    \"structure_rules\": [
        \"b\"
    ],
    \"style_rules\": [
        \"n\"
    ],
    \"hashtag_strategy\": [
        \"g\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/blueprints/store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Tech Thought Leadership",
    "description": "Blueprint for technical thought leadership posts on LinkedIn.",
    "tone": "technical",
    "target_platform": "linkedin",
    "max_length": 1500,
    "structure_rules": [
        "b"
    ],
    "style_rules": [
        "n"
    ],
    "hashtag_strategy": [
        "g"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-blueprints-store">
            <blockquote>
            <p>Example response (201, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;message&quot;: &quot;Blueprint created successfully.&quot;,
  &quot;blueprint&quot;: {&quot;id&quot;: 1, &quot;name&quot;: &quot;Tech Blog&quot;, &quot;tone&quot;: &quot;technical&quot;, ...}
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-blueprints-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-blueprints-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-blueprints-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-blueprints-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-blueprints-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-blueprints-store" data-method="POST"
      data-path="api/v1/blueprints/store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-blueprints-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-blueprints-store"
                    onclick="tryItOut('POSTapi-v1-blueprints-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-blueprints-store"
                    onclick="cancelTryOut('POSTapi-v1-blueprints-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-blueprints-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/blueprints/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-blueprints-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-blueprints-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-blueprints-store"
               value="Tech Thought Leadership"
               data-component="body">
    <br>
<p>A name for the blueprint. Must not be greater than 255 characters. Example: <code>Tech Thought Leadership</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-v1-blueprints-store"
               value="Blueprint for technical thought leadership posts on LinkedIn."
               data-component="body">
    <br>
<p>An optional description of the blueprint. Example: <code>Blueprint for technical thought leadership posts on LinkedIn.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tone"                data-endpoint="POSTapi-v1-blueprints-store"
               value="technical"
               data-component="body">
    <br>
<p>The writing tone. Example: <code>technical</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>professional</code></li> <li><code>casual</code></li> <li><code>technical</code></li> <li><code>educational</code></li> <li><code>persuasive</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>target_platform</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="target_platform"                data-endpoint="POSTapi-v1-blueprints-store"
               value="linkedin"
               data-component="body">
    <br>
<p>The target social media platform. Example: <code>linkedin</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>x</code></li> <li><code>linkedin</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_length</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_length"                data-endpoint="POSTapi-v1-blueprints-store"
               value="1500"
               data-component="body">
    <br>
<p>Maximum post length in characters. Must be at least 50. Must not be greater than 5000. Example: <code>1500</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>structure_rules</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="structure_rules[0]"                data-endpoint="POSTapi-v1-blueprints-store"
               data-component="body">
        <input type="text" style="display: none"
               name="structure_rules[1]"                data-endpoint="POSTapi-v1-blueprints-store"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>style_rules</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="style_rules[0]"                data-endpoint="POSTapi-v1-blueprints-store"
               data-component="body">
        <input type="text" style="display: none"
               name="style_rules[1]"                data-endpoint="POSTapi-v1-blueprints-store"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>hashtag_strategy</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="hashtag_strategy[0]"                data-endpoint="POSTapi-v1-blueprints-store"
               data-component="body">
        <input type="text" style="display: none"
               name="hashtag_strategy[1]"                data-endpoint="POSTapi-v1-blueprints-store"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters.</p>
        </div>
        </form>

                    <h2 id="blueprints-GETapi-v1-blueprints--id-">Show a blueprint</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns the details of a specific blueprint.</p>

<span id="example-requests-GETapi-v1-blueprints--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://forgecoreapi.test/api/v1/blueprints/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/blueprints/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-blueprints--id-">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;blueprint&quot;: {&quot;id&quot;: 1, &quot;name&quot;: &quot;Tech Blog&quot;, &quot;tone&quot;: &quot;technical&quot;, ...}
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-blueprints--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-blueprints--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-blueprints--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-blueprints--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-blueprints--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-blueprints--id-" data-method="GET"
      data-path="api/v1/blueprints/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-blueprints--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-blueprints--id-"
                    onclick="tryItOut('GETapi-v1-blueprints--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-blueprints--id-"
                    onclick="cancelTryOut('GETapi-v1-blueprints--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-blueprints--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/blueprints/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-blueprints--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-blueprints--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-blueprints--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the blueprint. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>blueprint</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="blueprint"                data-endpoint="GETapi-v1-blueprints--id-"
               value="1"
               data-component="url">
    <br>
<p>The blueprint ID. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="blueprints-PUTapi-v1-blueprints--id--update">Update a blueprint</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Updates the fields of a specific blueprint.</p>

<span id="example-requests-PUTapi-v1-blueprints--id--update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://forgecoreapi.test/api/v1/blueprints/1/update" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Updated Tech Blueprint\",
    \"description\": \"Updated description for the blueprint.\",
    \"tone\": \"professional\",
    \"target_platform\": \"x\",
    \"max_length\": 2000,
    \"structure_rules\": [
        \"b\"
    ],
    \"style_rules\": [
        \"n\"
    ],
    \"hashtag_strategy\": [
        \"g\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/blueprints/1/update"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Updated Tech Blueprint",
    "description": "Updated description for the blueprint.",
    "tone": "professional",
    "target_platform": "x",
    "max_length": 2000,
    "structure_rules": [
        "b"
    ],
    "style_rules": [
        "n"
    ],
    "hashtag_strategy": [
        "g"
    ]
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-blueprints--id--update">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;message&quot;: &quot;Blueprint updated successfully.&quot;, &quot;blueprint&quot;: {&quot;id&quot;: 1, ...}}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-blueprints--id--update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-blueprints--id--update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-blueprints--id--update"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-blueprints--id--update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-blueprints--id--update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-blueprints--id--update" data-method="PUT"
      data-path="api/v1/blueprints/{id}/update"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-blueprints--id--update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-blueprints--id--update"
                    onclick="tryItOut('PUTapi-v1-blueprints--id--update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-blueprints--id--update"
                    onclick="cancelTryOut('PUTapi-v1-blueprints--id--update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-blueprints--id--update"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/blueprints/{id}/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-blueprints--id--update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-blueprints--id--update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-v1-blueprints--id--update"
               value="1"
               data-component="url">
    <br>
<p>The ID of the blueprint. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>blueprint</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="blueprint"                data-endpoint="PUTapi-v1-blueprints--id--update"
               value="1"
               data-component="url">
    <br>
<p>The blueprint ID. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-blueprints--id--update"
               value="Updated Tech Blueprint"
               data-component="body">
    <br>
<p>The blueprint name. Must not be greater than 255 characters. Example: <code>Updated Tech Blueprint</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-v1-blueprints--id--update"
               value="Updated description for the blueprint."
               data-component="body">
    <br>
<p>The blueprint description. Example: <code>Updated description for the blueprint.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tone"                data-endpoint="PUTapi-v1-blueprints--id--update"
               value="professional"
               data-component="body">
    <br>
<p>The writing tone. Must not be greater than 50 characters. Example: <code>professional</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>target_platform</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="target_platform"                data-endpoint="PUTapi-v1-blueprints--id--update"
               value="x"
               data-component="body">
    <br>
<p>The target platform. Example: <code>x</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>x</code></li> <li><code>linkedin</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_length</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_length"                data-endpoint="PUTapi-v1-blueprints--id--update"
               value="2000"
               data-component="body">
    <br>
<p>Maximum post length. Must be at least 50. Must not be greater than 5000. Example: <code>2000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>structure_rules</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="structure_rules[0]"                data-endpoint="PUTapi-v1-blueprints--id--update"
               data-component="body">
        <input type="text" style="display: none"
               name="structure_rules[1]"                data-endpoint="PUTapi-v1-blueprints--id--update"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>style_rules</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="style_rules[0]"                data-endpoint="PUTapi-v1-blueprints--id--update"
               data-component="body">
        <input type="text" style="display: none"
               name="style_rules[1]"                data-endpoint="PUTapi-v1-blueprints--id--update"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>hashtag_strategy</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="hashtag_strategy[0]"                data-endpoint="PUTapi-v1-blueprints--id--update"
               data-component="body">
        <input type="text" style="display: none"
               name="hashtag_strategy[1]"                data-endpoint="PUTapi-v1-blueprints--id--update"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters.</p>
        </div>
        </form>

                    <h2 id="blueprints-DELETEapi-v1-blueprints--blueprint_id--archive">Archive a blueprint</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Soft-deletes a specific blueprint.</p>

<span id="example-requests-DELETEapi-v1-blueprints--blueprint_id--archive">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://forgecoreapi.test/api/v1/blueprints/1/archive" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/blueprints/1/archive"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-blueprints--blueprint_id--archive">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Blueprint archived successfully.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-blueprints--blueprint_id--archive" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-blueprints--blueprint_id--archive"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-blueprints--blueprint_id--archive"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-blueprints--blueprint_id--archive" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-blueprints--blueprint_id--archive">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-blueprints--blueprint_id--archive" data-method="DELETE"
      data-path="api/v1/blueprints/{blueprint_id}/archive"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-blueprints--blueprint_id--archive', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-blueprints--blueprint_id--archive"
                    onclick="tryItOut('DELETEapi-v1-blueprints--blueprint_id--archive');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-blueprints--blueprint_id--archive"
                    onclick="cancelTryOut('DELETEapi-v1-blueprints--blueprint_id--archive');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-blueprints--blueprint_id--archive"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/blueprints/{blueprint_id}/archive</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-blueprints--blueprint_id--archive"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-blueprints--blueprint_id--archive"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>blueprint_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="blueprint_id"                data-endpoint="DELETEapi-v1-blueprints--blueprint_id--archive"
               value="1"
               data-component="url">
    <br>
<p>The ID of the blueprint. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>blueprint</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="blueprint"                data-endpoint="DELETEapi-v1-blueprints--blueprint_id--archive"
               value="1"
               data-component="url">
    <br>
<p>The blueprint ID. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="blueprints-POSTapi-v1-blueprints--blueprint_id--restore">Restore a blueprint</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Restores a soft-deleted blueprint.</p>

<span id="example-requests-POSTapi-v1-blueprints--blueprint_id--restore">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://forgecoreapi.test/api/v1/blueprints/1/restore" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/blueprints/1/restore"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-blueprints--blueprint_id--restore">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;message&quot;: &quot;Blueprint restored successfully.&quot;, &quot;blueprint&quot;: {&quot;id&quot;: 1, ...}}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-blueprints--blueprint_id--restore" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-blueprints--blueprint_id--restore"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-blueprints--blueprint_id--restore"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-blueprints--blueprint_id--restore" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-blueprints--blueprint_id--restore">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-blueprints--blueprint_id--restore" data-method="POST"
      data-path="api/v1/blueprints/{blueprint_id}/restore"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-blueprints--blueprint_id--restore', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-blueprints--blueprint_id--restore"
                    onclick="tryItOut('POSTapi-v1-blueprints--blueprint_id--restore');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-blueprints--blueprint_id--restore"
                    onclick="cancelTryOut('POSTapi-v1-blueprints--blueprint_id--restore');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-blueprints--blueprint_id--restore"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/blueprints/{blueprint_id}/restore</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-blueprints--blueprint_id--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-blueprints--blueprint_id--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>blueprint_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="blueprint_id"                data-endpoint="POSTapi-v1-blueprints--blueprint_id--restore"
               value="1"
               data-component="url">
    <br>
<p>The ID of the blueprint. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>blueprint</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="blueprint"                data-endpoint="POSTapi-v1-blueprints--blueprint_id--restore"
               value="1"
               data-component="url">
    <br>
<p>The blueprint ID. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="blueprints-DELETEapi-v1-blueprints--blueprint_id--forceDelete">Permanently delete a blueprint</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Force-deletes a blueprint from the database.</p>

<span id="example-requests-DELETEapi-v1-blueprints--blueprint_id--forceDelete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://forgecoreapi.test/api/v1/blueprints/1/forceDelete" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/blueprints/1/forceDelete"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-blueprints--blueprint_id--forceDelete">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Blueprint permanently deleted.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-blueprints--blueprint_id--forceDelete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-blueprints--blueprint_id--forceDelete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-blueprints--blueprint_id--forceDelete"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-blueprints--blueprint_id--forceDelete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-blueprints--blueprint_id--forceDelete">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-blueprints--blueprint_id--forceDelete" data-method="DELETE"
      data-path="api/v1/blueprints/{blueprint_id}/forceDelete"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-blueprints--blueprint_id--forceDelete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-blueprints--blueprint_id--forceDelete"
                    onclick="tryItOut('DELETEapi-v1-blueprints--blueprint_id--forceDelete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-blueprints--blueprint_id--forceDelete"
                    onclick="cancelTryOut('DELETEapi-v1-blueprints--blueprint_id--forceDelete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-blueprints--blueprint_id--forceDelete"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/blueprints/{blueprint_id}/forceDelete</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-blueprints--blueprint_id--forceDelete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-blueprints--blueprint_id--forceDelete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>blueprint_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="blueprint_id"                data-endpoint="DELETEapi-v1-blueprints--blueprint_id--forceDelete"
               value="1"
               data-component="url">
    <br>
<p>The ID of the blueprint. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>blueprint</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="blueprint"                data-endpoint="DELETEapi-v1-blueprints--blueprint_id--forceDelete"
               value="1"
               data-component="url">
    <br>
<p>The blueprint ID. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="conversations">Conversations</h1>

    <p>APIs for managing AI chat conversations and sending messages.</p>

                                <h2 id="conversations-GETapi-v1-conversations">List conversations</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns a paginated list of conversations for the authenticated user.</p>

<span id="example-requests-GETapi-v1-conversations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://forgecoreapi.test/api/v1/conversations?page=1&amp;per_page=15&amp;search=My+Chat&amp;post_id=1&amp;sort=created_at&amp;direction=desc" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/conversations"
);

const params = {
    "page": "1",
    "per_page": "15",
    "search": "My Chat",
    "post_id": "1",
    "sort": "created_at",
    "direction": "desc",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-conversations">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;conversations&quot;: [{&quot;id&quot;: &quot;uuid&quot;, &quot;title&quot;: &quot;My Chat&quot;, ...}],
  &quot;meta&quot;: {&quot;current_page&quot;: 1, &quot;last_page&quot;: 1, &quot;per_page&quot;: 15, &quot;total&quot;: 1}
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-conversations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-conversations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-conversations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-conversations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-conversations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-conversations" data-method="GET"
      data-path="api/v1/conversations"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-conversations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-conversations"
                    onclick="tryItOut('GETapi-v1-conversations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-conversations"
                    onclick="cancelTryOut('GETapi-v1-conversations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-conversations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/conversations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-conversations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-conversations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-conversations"
               value="1"
               data-component="query">
    <br>
<p>Page number. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-v1-conversations"
               value="15"
               data-component="query">
    <br>
<p>Items per page (1-100). Example: <code>15</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-v1-conversations"
               value="My Chat"
               data-component="query">
    <br>
<p>Search by title. Example: <code>My Chat</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="post_id"                data-endpoint="GETapi-v1-conversations"
               value="1"
               data-component="query">
    <br>
<p>Filter by associated post ID. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-v1-conversations"
               value="created_at"
               data-component="query">
    <br>
<p>Sort by field (created_at, updated_at, title). Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>direction</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="direction"                data-endpoint="GETapi-v1-conversations"
               value="desc"
               data-component="query">
    <br>
<p>Sort direction (asc, desc). Example: <code>desc</code></p>
            </div>
                </form>

                    <h2 id="conversations-GETapi-v1-conversations-archived">List archived conversations</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns a paginated list of soft-deleted conversations.</p>

<span id="example-requests-GETapi-v1-conversations-archived">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://forgecoreapi.test/api/v1/conversations/archived?page=1&amp;per_page=15&amp;search=My+Chat&amp;sort=created_at&amp;direction=desc" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/conversations/archived"
);

const params = {
    "page": "1",
    "per_page": "15",
    "search": "My Chat",
    "sort": "created_at",
    "direction": "desc",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-conversations-archived">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;conversations&quot;: [{&quot;id&quot;: &quot;uuid&quot;, &quot;title&quot;: &quot;My Chat&quot;, ...}],
  &quot;meta&quot;: {&quot;current_page&quot;: 1, &quot;last_page&quot;: 1, &quot;per_page&quot;: 15, &quot;total&quot;: 1}
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-conversations-archived" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-conversations-archived"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-conversations-archived"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-conversations-archived" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-conversations-archived">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-conversations-archived" data-method="GET"
      data-path="api/v1/conversations/archived"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-conversations-archived', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-conversations-archived"
                    onclick="tryItOut('GETapi-v1-conversations-archived');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-conversations-archived"
                    onclick="cancelTryOut('GETapi-v1-conversations-archived');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-conversations-archived"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/conversations/archived</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-conversations-archived"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-conversations-archived"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-conversations-archived"
               value="1"
               data-component="query">
    <br>
<p>Page number. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-v1-conversations-archived"
               value="15"
               data-component="query">
    <br>
<p>Items per page (1-100). Example: <code>15</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-v1-conversations-archived"
               value="My Chat"
               data-component="query">
    <br>
<p>Search by title. Example: <code>My Chat</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-v1-conversations-archived"
               value="created_at"
               data-component="query">
    <br>
<p>Sort by field (created_at, updated_at, title). Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>direction</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="direction"                data-endpoint="GETapi-v1-conversations-archived"
               value="desc"
               data-component="query">
    <br>
<p>Sort direction (asc, desc). Example: <code>desc</code></p>
            </div>
                </form>

                    <h2 id="conversations-POSTapi-v1-conversations-store">Create a conversation</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Creates a new conversation for AI chat.</p>

<span id="example-requests-POSTapi-v1-conversations-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://forgecoreapi.test/api/v1/conversations/store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"Drafting my AI post\",
    \"post_id\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/conversations/store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "Drafting my AI post",
    "post_id": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-conversations-store">
            <blockquote>
            <p>Example response (201, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;message&quot;: &quot;Conversation created successfully.&quot;,
  &quot;conversation&quot;: {&quot;id&quot;: &quot;uuid&quot;, &quot;title&quot;: &quot;My Chat&quot;, ...}
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-conversations-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-conversations-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-conversations-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-conversations-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-conversations-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-conversations-store" data-method="POST"
      data-path="api/v1/conversations/store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-conversations-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-conversations-store"
                    onclick="tryItOut('POSTapi-v1-conversations-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-conversations-store"
                    onclick="cancelTryOut('POSTapi-v1-conversations-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-conversations-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/conversations/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-conversations-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-conversations-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-v1-conversations-store"
               value="Drafting my AI post"
               data-component="body">
    <br>
<p>A title for the conversation. Example: <code>Drafting my AI post</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>post_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="post_id"                data-endpoint="POSTapi-v1-conversations-store"
               value="1"
               data-component="body">
    <br>
<p>The ID of an associated post (optional). Must match an existing stored value. Example: <code>1</code></p>
        </div>
        </form>

                    <h2 id="conversations-GETapi-v1-conversations--id-">Show a conversation</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns the details and messages of a specific conversation.</p>

<span id="example-requests-GETapi-v1-conversations--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://forgecoreapi.test/api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-conversations--id-">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;conversation&quot;: {&quot;id&quot;: &quot;uuid&quot;, &quot;title&quot;: &quot;My Chat&quot;, &quot;messages&quot;: [...], ...}
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-conversations--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-conversations--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-conversations--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-conversations--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-conversations--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-conversations--id-" data-method="GET"
      data-path="api/v1/conversations/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-conversations--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-conversations--id-"
                    onclick="tryItOut('GETapi-v1-conversations--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-conversations--id-"
                    onclick="cancelTryOut('GETapi-v1-conversations--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-conversations--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/conversations/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-conversations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-conversations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-conversations--id-"
               value="1d7562ac-ae68-4be2-930f-2456d1222dc8"
               data-component="url">
    <br>
<p>The ID of the conversation. Example: <code>1d7562ac-ae68-4be2-930f-2456d1222dc8</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>conversation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="conversation"                data-endpoint="GETapi-v1-conversations--id-"
               value="550e8400-e29b-41d4-a716-446655440000"
               data-component="url">
    <br>
<p>The conversation UUID. Example: <code>550e8400-e29b-41d4-a716-446655440000</code></p>
            </div>
                    </form>

                    <h2 id="conversations-DELETEapi-v1-conversations--conversation_id--archive">Archive a conversation</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Soft-deletes a specific conversation.</p>

<span id="example-requests-DELETEapi-v1-conversations--conversation_id--archive">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://forgecoreapi.test/api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8/archive" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8/archive"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-conversations--conversation_id--archive">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Conversation archived successfully.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-conversations--conversation_id--archive" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-conversations--conversation_id--archive"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-conversations--conversation_id--archive"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-conversations--conversation_id--archive" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-conversations--conversation_id--archive">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-conversations--conversation_id--archive" data-method="DELETE"
      data-path="api/v1/conversations/{conversation_id}/archive"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-conversations--conversation_id--archive', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-conversations--conversation_id--archive"
                    onclick="tryItOut('DELETEapi-v1-conversations--conversation_id--archive');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-conversations--conversation_id--archive"
                    onclick="cancelTryOut('DELETEapi-v1-conversations--conversation_id--archive');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-conversations--conversation_id--archive"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/conversations/{conversation_id}/archive</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-conversations--conversation_id--archive"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-conversations--conversation_id--archive"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>conversation_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="conversation_id"                data-endpoint="DELETEapi-v1-conversations--conversation_id--archive"
               value="1d7562ac-ae68-4be2-930f-2456d1222dc8"
               data-component="url">
    <br>
<p>The ID of the conversation. Example: <code>1d7562ac-ae68-4be2-930f-2456d1222dc8</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>conversation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="conversation"                data-endpoint="DELETEapi-v1-conversations--conversation_id--archive"
               value="550e8400-e29b-41d4-a716-446655440000"
               data-component="url">
    <br>
<p>The conversation UUID. Example: <code>550e8400-e29b-41d4-a716-446655440000</code></p>
            </div>
                    </form>

                    <h2 id="conversations-POSTapi-v1-conversations--conversation_id--restore">Restore a conversation</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Restores a soft-deleted conversation.</p>

<span id="example-requests-POSTapi-v1-conversations--conversation_id--restore">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://forgecoreapi.test/api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8/restore" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8/restore"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-conversations--conversation_id--restore">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;message&quot;: &quot;Conversation restored successfully.&quot;, &quot;conversation&quot;: {&quot;id&quot;: &quot;uuid&quot;, ...}}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-conversations--conversation_id--restore" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-conversations--conversation_id--restore"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-conversations--conversation_id--restore"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-conversations--conversation_id--restore" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-conversations--conversation_id--restore">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-conversations--conversation_id--restore" data-method="POST"
      data-path="api/v1/conversations/{conversation_id}/restore"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-conversations--conversation_id--restore', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-conversations--conversation_id--restore"
                    onclick="tryItOut('POSTapi-v1-conversations--conversation_id--restore');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-conversations--conversation_id--restore"
                    onclick="cancelTryOut('POSTapi-v1-conversations--conversation_id--restore');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-conversations--conversation_id--restore"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/conversations/{conversation_id}/restore</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-conversations--conversation_id--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-conversations--conversation_id--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>conversation_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="conversation_id"                data-endpoint="POSTapi-v1-conversations--conversation_id--restore"
               value="1d7562ac-ae68-4be2-930f-2456d1222dc8"
               data-component="url">
    <br>
<p>The ID of the conversation. Example: <code>1d7562ac-ae68-4be2-930f-2456d1222dc8</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>conversation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="conversation"                data-endpoint="POSTapi-v1-conversations--conversation_id--restore"
               value="550e8400-e29b-41d4-a716-446655440000"
               data-component="url">
    <br>
<p>The conversation UUID. Example: <code>550e8400-e29b-41d4-a716-446655440000</code></p>
            </div>
                    </form>

                    <h2 id="conversations-DELETEapi-v1-conversations--conversation_id--forceDelete">Permanently delete a conversation</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Force-deletes a conversation from the database.</p>

<span id="example-requests-DELETEapi-v1-conversations--conversation_id--forceDelete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://forgecoreapi.test/api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8/forceDelete" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8/forceDelete"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-conversations--conversation_id--forceDelete">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Conversation permanently deleted.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-conversations--conversation_id--forceDelete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-conversations--conversation_id--forceDelete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-conversations--conversation_id--forceDelete"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-conversations--conversation_id--forceDelete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-conversations--conversation_id--forceDelete">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-conversations--conversation_id--forceDelete" data-method="DELETE"
      data-path="api/v1/conversations/{conversation_id}/forceDelete"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-conversations--conversation_id--forceDelete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-conversations--conversation_id--forceDelete"
                    onclick="tryItOut('DELETEapi-v1-conversations--conversation_id--forceDelete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-conversations--conversation_id--forceDelete"
                    onclick="cancelTryOut('DELETEapi-v1-conversations--conversation_id--forceDelete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-conversations--conversation_id--forceDelete"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/conversations/{conversation_id}/forceDelete</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-conversations--conversation_id--forceDelete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-conversations--conversation_id--forceDelete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>conversation_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="conversation_id"                data-endpoint="DELETEapi-v1-conversations--conversation_id--forceDelete"
               value="1d7562ac-ae68-4be2-930f-2456d1222dc8"
               data-component="url">
    <br>
<p>The ID of the conversation. Example: <code>1d7562ac-ae68-4be2-930f-2456d1222dc8</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>conversation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="conversation"                data-endpoint="DELETEapi-v1-conversations--conversation_id--forceDelete"
               value="550e8400-e29b-41d4-a716-446655440000"
               data-component="url">
    <br>
<p>The conversation UUID. Example: <code>550e8400-e29b-41d4-a716-446655440000</code></p>
            </div>
                    </form>

                    <h2 id="conversations-POSTapi-v1-conversations--conversation_id--send">Send a message</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Sends a message in a conversation and gets an AI-generated reply.</p>

<span id="example-requests-POSTapi-v1-conversations--conversation_id--send">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://forgecoreapi.test/api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8/send" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"content\": \"Can you help me improve the hook of my post?\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/conversations/1d7562ac-ae68-4be2-930f-2456d1222dc8/send"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "content": "Can you help me improve the hook of my post?"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-conversations--conversation_id--send">
            <blockquote>
            <p>Example response (201, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;message&quot;: &quot;Message sent successfully.&quot;,
  &quot;user_message&quot;: {&quot;id&quot;: &quot;uuid&quot;, &quot;role&quot;: &quot;user&quot;, &quot;content&quot;: &quot;Hello&quot;, ...},
  &quot;assistant_message&quot;: {&quot;id&quot;: &quot;uuid&quot;, &quot;role&quot;: &quot;assistant&quot;, &quot;content&quot;: &quot;Hi! How can I help?&quot;, ...}
}</code>
 </pre>
            <blockquote>
            <p>Example response (429, ai rate limited):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;AI service is currently rate limited. Please try again later.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-conversations--conversation_id--send" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-conversations--conversation_id--send"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-conversations--conversation_id--send"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-conversations--conversation_id--send" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-conversations--conversation_id--send">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-conversations--conversation_id--send" data-method="POST"
      data-path="api/v1/conversations/{conversation_id}/send"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-conversations--conversation_id--send', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-conversations--conversation_id--send"
                    onclick="tryItOut('POSTapi-v1-conversations--conversation_id--send');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-conversations--conversation_id--send"
                    onclick="cancelTryOut('POSTapi-v1-conversations--conversation_id--send');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-conversations--conversation_id--send"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/conversations/{conversation_id}/send</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-conversations--conversation_id--send"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-conversations--conversation_id--send"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>conversation_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="conversation_id"                data-endpoint="POSTapi-v1-conversations--conversation_id--send"
               value="1d7562ac-ae68-4be2-930f-2456d1222dc8"
               data-component="url">
    <br>
<p>The ID of the conversation. Example: <code>1d7562ac-ae68-4be2-930f-2456d1222dc8</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>conversation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="conversation"                data-endpoint="POSTapi-v1-conversations--conversation_id--send"
               value="550e8400-e29b-41d4-a716-446655440000"
               data-component="url">
    <br>
<p>The conversation UUID. Example: <code>550e8400-e29b-41d4-a716-446655440000</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="POSTapi-v1-conversations--conversation_id--send"
               value="Can you help me improve the hook of my post?"
               data-component="body">
    <br>
<p>The message content to send to the AI assistant. Example: <code>Can you help me improve the hook of my post?</code></p>
        </div>
        </form>

                <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-v1-health">GET api/v1/health</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-health">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://forgecoreapi.test/api/v1/health" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/health"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-health">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;healthy&quot;,
    &quot;timestamp&quot;: &quot;2026-06-26T13:34:48+00:00&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-health" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-health"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-health"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-health" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-health">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-health" data-method="GET"
      data-path="api/v1/health"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-health', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-health"
                    onclick="tryItOut('GETapi-v1-health');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-health"
                    onclick="cancelTryOut('GETapi-v1-health');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-health"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/health</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-health"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-health"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="inputs">Inputs</h1>

    <p>APIs for managing raw content inputs used for post generation.</p>

                                <h2 id="inputs-GETapi-v1-inputs">List inputs</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns a paginated list of inputs for the authenticated user.</p>

<span id="example-requests-GETapi-v1-inputs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://forgecoreapi.test/api/v1/inputs?page=1&amp;per_page=15&amp;search=article&amp;sort=created_at&amp;direction=desc" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/inputs"
);

const params = {
    "page": "1",
    "per_page": "15",
    "search": "article",
    "sort": "created_at",
    "direction": "desc",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-inputs">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;inputs&quot;: [{&quot;id&quot;: 1, &quot;title&quot;: &quot;My Input&quot;, &quot;raw_input&quot;: &quot;Content...&quot;, ...}],
  &quot;meta&quot;: {&quot;current_page&quot;: 1, &quot;last_page&quot;: 1, &quot;per_page&quot;: 15, &quot;total&quot;: 1}
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-inputs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-inputs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-inputs"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-inputs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-inputs">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-inputs" data-method="GET"
      data-path="api/v1/inputs"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-inputs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-inputs"
                    onclick="tryItOut('GETapi-v1-inputs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-inputs"
                    onclick="cancelTryOut('GETapi-v1-inputs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-inputs"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/inputs</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-inputs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-inputs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-inputs"
               value="1"
               data-component="query">
    <br>
<p>Page number. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-v1-inputs"
               value="15"
               data-component="query">
    <br>
<p>Items per page (1-100). Example: <code>15</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-v1-inputs"
               value="article"
               data-component="query">
    <br>
<p>Search by title or raw input content. Example: <code>article</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-v1-inputs"
               value="created_at"
               data-component="query">
    <br>
<p>Sort by field (created_at, updated_at, title). Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>direction</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="direction"                data-endpoint="GETapi-v1-inputs"
               value="desc"
               data-component="query">
    <br>
<p>Sort direction (asc, desc). Example: <code>desc</code></p>
            </div>
                </form>

                    <h2 id="inputs-GETapi-v1-inputs-archived">List archived inputs</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns a paginated list of soft-deleted inputs.</p>

<span id="example-requests-GETapi-v1-inputs-archived">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://forgecoreapi.test/api/v1/inputs/archived?page=1&amp;per_page=15&amp;search=article&amp;sort=created_at&amp;direction=desc" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/inputs/archived"
);

const params = {
    "page": "1",
    "per_page": "15",
    "search": "article",
    "sort": "created_at",
    "direction": "desc",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-inputs-archived">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;inputs&quot;: [{&quot;id&quot;: 1, &quot;title&quot;: &quot;My Input&quot;, ...}],
  &quot;meta&quot;: {&quot;current_page&quot;: 1, &quot;last_page&quot;: 1, &quot;per_page&quot;: 15, &quot;total&quot;: 1}
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-inputs-archived" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-inputs-archived"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-inputs-archived"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-inputs-archived" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-inputs-archived">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-inputs-archived" data-method="GET"
      data-path="api/v1/inputs/archived"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-inputs-archived', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-inputs-archived"
                    onclick="tryItOut('GETapi-v1-inputs-archived');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-inputs-archived"
                    onclick="cancelTryOut('GETapi-v1-inputs-archived');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-inputs-archived"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/inputs/archived</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-inputs-archived"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-inputs-archived"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-inputs-archived"
               value="1"
               data-component="query">
    <br>
<p>Page number. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-v1-inputs-archived"
               value="15"
               data-component="query">
    <br>
<p>Items per page (1-100). Example: <code>15</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-v1-inputs-archived"
               value="article"
               data-component="query">
    <br>
<p>Search by title or raw input. Example: <code>article</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-v1-inputs-archived"
               value="created_at"
               data-component="query">
    <br>
<p>Sort by field (created_at, updated_at, title). Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>direction</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="direction"                data-endpoint="GETapi-v1-inputs-archived"
               value="desc"
               data-component="query">
    <br>
<p>Sort direction (asc, desc). Example: <code>desc</code></p>
            </div>
                </form>

                    <h2 id="inputs-POSTapi-v1-inputs-store">Create an input</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Creates a new raw content input.</p>

<span id="example-requests-POSTapi-v1-inputs-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://forgecoreapi.test/api/v1/inputs/store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"Article about Machine Learning\",
    \"raw_input\": \"Machine learning is a subset of artificial intelligence that enables systems to learn and improve from experience...\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/inputs/store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "Article about Machine Learning",
    "raw_input": "Machine learning is a subset of artificial intelligence that enables systems to learn and improve from experience..."
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-inputs-store">
            <blockquote>
            <p>Example response (201, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;message&quot;: &quot;Input created successfully.&quot;,
  &quot;input&quot;: {&quot;id&quot;: 1, &quot;title&quot;: &quot;My Input&quot;, &quot;raw_input&quot;: &quot;Content...&quot;, ...}
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-inputs-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-inputs-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-inputs-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-inputs-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-inputs-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-inputs-store" data-method="POST"
      data-path="api/v1/inputs/store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-inputs-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-inputs-store"
                    onclick="tryItOut('POSTapi-v1-inputs-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-inputs-store"
                    onclick="cancelTryOut('POSTapi-v1-inputs-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-inputs-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/inputs/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-inputs-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-inputs-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-v1-inputs-store"
               value="Article about Machine Learning"
               data-component="body">
    <br>
<p>A descriptive title for the input. Example: <code>Article about Machine Learning</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>raw_input</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="raw_input"                data-endpoint="POSTapi-v1-inputs-store"
               value="Machine learning is a subset of artificial intelligence that enables systems to learn and improve from experience..."
               data-component="body">
    <br>
<p>The raw content or source material. Example: <code>Machine learning is a subset of artificial intelligence that enables systems to learn and improve from experience...</code></p>
        </div>
        </form>

                    <h2 id="inputs-GETapi-v1-inputs--id-">Show an input</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns the details of a specific input.</p>

<span id="example-requests-GETapi-v1-inputs--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://forgecoreapi.test/api/v1/inputs/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/inputs/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-inputs--id-">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;input&quot;: {&quot;id&quot;: 1, &quot;title&quot;: &quot;My Input&quot;, &quot;raw_input&quot;: &quot;Content...&quot;, ...}
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-inputs--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-inputs--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-inputs--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-inputs--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-inputs--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-inputs--id-" data-method="GET"
      data-path="api/v1/inputs/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-inputs--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-inputs--id-"
                    onclick="tryItOut('GETapi-v1-inputs--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-inputs--id-"
                    onclick="cancelTryOut('GETapi-v1-inputs--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-inputs--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/inputs/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-inputs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-inputs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-inputs--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the input. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>input</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="input"                data-endpoint="GETapi-v1-inputs--id-"
               value="1"
               data-component="url">
    <br>
<p>The input ID. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="inputs-PUTapi-v1-inputs--id--update">Update an input</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Updates the fields of a specific input.</p>

<span id="example-requests-PUTapi-v1-inputs--id--update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://forgecoreapi.test/api/v1/inputs/1/update" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"Updated ML Article\",
    \"raw_input\": \"Updated content about machine learning techniques...\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/inputs/1/update"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "Updated ML Article",
    "raw_input": "Updated content about machine learning techniques..."
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-inputs--id--update">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;message&quot;: &quot;Input updated successfully.&quot;, &quot;input&quot;: {&quot;id&quot;: 1, ...}}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-inputs--id--update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-inputs--id--update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-inputs--id--update"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-inputs--id--update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-inputs--id--update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-inputs--id--update" data-method="PUT"
      data-path="api/v1/inputs/{id}/update"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-inputs--id--update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-inputs--id--update"
                    onclick="tryItOut('PUTapi-v1-inputs--id--update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-inputs--id--update"
                    onclick="cancelTryOut('PUTapi-v1-inputs--id--update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-inputs--id--update"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/inputs/{id}/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-inputs--id--update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-inputs--id--update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-v1-inputs--id--update"
               value="1"
               data-component="url">
    <br>
<p>The ID of the input. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>input</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="input"                data-endpoint="PUTapi-v1-inputs--id--update"
               value="1"
               data-component="url">
    <br>
<p>The input ID. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-v1-inputs--id--update"
               value="Updated ML Article"
               data-component="body">
    <br>
<p>The input title. Example: <code>Updated ML Article</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>raw_input</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="raw_input"                data-endpoint="PUTapi-v1-inputs--id--update"
               value="Updated content about machine learning techniques..."
               data-component="body">
    <br>
<p>The raw content or source material. Example: <code>Updated content about machine learning techniques...</code></p>
        </div>
        </form>

                    <h2 id="inputs-DELETEapi-v1-inputs--input_id--archive">Archive an input</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Soft-deletes a specific input.</p>

<span id="example-requests-DELETEapi-v1-inputs--input_id--archive">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://forgecoreapi.test/api/v1/inputs/1/archive" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/inputs/1/archive"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-inputs--input_id--archive">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Input archived successfully.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-inputs--input_id--archive" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-inputs--input_id--archive"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-inputs--input_id--archive"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-inputs--input_id--archive" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-inputs--input_id--archive">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-inputs--input_id--archive" data-method="DELETE"
      data-path="api/v1/inputs/{input_id}/archive"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-inputs--input_id--archive', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-inputs--input_id--archive"
                    onclick="tryItOut('DELETEapi-v1-inputs--input_id--archive');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-inputs--input_id--archive"
                    onclick="cancelTryOut('DELETEapi-v1-inputs--input_id--archive');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-inputs--input_id--archive"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/inputs/{input_id}/archive</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-inputs--input_id--archive"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-inputs--input_id--archive"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>input_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="input_id"                data-endpoint="DELETEapi-v1-inputs--input_id--archive"
               value="1"
               data-component="url">
    <br>
<p>The ID of the input. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>input</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="input"                data-endpoint="DELETEapi-v1-inputs--input_id--archive"
               value="1"
               data-component="url">
    <br>
<p>The input ID. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="inputs-POSTapi-v1-inputs--input_id--restore">Restore an input</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Restores a soft-deleted input.</p>

<span id="example-requests-POSTapi-v1-inputs--input_id--restore">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://forgecoreapi.test/api/v1/inputs/1/restore" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/inputs/1/restore"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-inputs--input_id--restore">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;message&quot;: &quot;Input restored successfully.&quot;, &quot;input&quot;: {&quot;id&quot;: 1, ...}}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-inputs--input_id--restore" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-inputs--input_id--restore"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-inputs--input_id--restore"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-inputs--input_id--restore" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-inputs--input_id--restore">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-inputs--input_id--restore" data-method="POST"
      data-path="api/v1/inputs/{input_id}/restore"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-inputs--input_id--restore', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-inputs--input_id--restore"
                    onclick="tryItOut('POSTapi-v1-inputs--input_id--restore');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-inputs--input_id--restore"
                    onclick="cancelTryOut('POSTapi-v1-inputs--input_id--restore');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-inputs--input_id--restore"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/inputs/{input_id}/restore</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-inputs--input_id--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-inputs--input_id--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>input_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="input_id"                data-endpoint="POSTapi-v1-inputs--input_id--restore"
               value="1"
               data-component="url">
    <br>
<p>The ID of the input. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>input</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="input"                data-endpoint="POSTapi-v1-inputs--input_id--restore"
               value="1"
               data-component="url">
    <br>
<p>The input ID. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="inputs-DELETEapi-v1-inputs--input_id--forceDelete">Permanently delete an input</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Force-deletes an input from the database.</p>

<span id="example-requests-DELETEapi-v1-inputs--input_id--forceDelete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://forgecoreapi.test/api/v1/inputs/1/forceDelete" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/inputs/1/forceDelete"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-inputs--input_id--forceDelete">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Input permanently deleted.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-inputs--input_id--forceDelete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-inputs--input_id--forceDelete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-inputs--input_id--forceDelete"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-inputs--input_id--forceDelete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-inputs--input_id--forceDelete">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-inputs--input_id--forceDelete" data-method="DELETE"
      data-path="api/v1/inputs/{input_id}/forceDelete"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-inputs--input_id--forceDelete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-inputs--input_id--forceDelete"
                    onclick="tryItOut('DELETEapi-v1-inputs--input_id--forceDelete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-inputs--input_id--forceDelete"
                    onclick="cancelTryOut('DELETEapi-v1-inputs--input_id--forceDelete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-inputs--input_id--forceDelete"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/inputs/{input_id}/forceDelete</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-inputs--input_id--forceDelete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-inputs--input_id--forceDelete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>input_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="input_id"                data-endpoint="DELETEapi-v1-inputs--input_id--forceDelete"
               value="1"
               data-component="url">
    <br>
<p>The ID of the input. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>input</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="input"                data-endpoint="DELETEapi-v1-inputs--input_id--forceDelete"
               value="1"
               data-component="url">
    <br>
<p>The input ID. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="posts">Posts</h1>

    <p>APIs for managing AI-generated posts.</p>

                                <h2 id="posts-GETapi-v1-posts">List posts</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns a paginated list of posts for the authenticated user.</p>

<span id="example-requests-GETapi-v1-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://forgecoreapi.test/api/v1/posts?page=1&amp;per_page=15&amp;search=AI&amp;status=draft&amp;process_status=completed&amp;sort=created_at&amp;direction=desc" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/posts"
);

const params = {
    "page": "1",
    "per_page": "15",
    "search": "AI",
    "status": "draft",
    "process_status": "completed",
    "sort": "created_at",
    "direction": "desc",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;posts&quot;: [{&quot;id&quot;: 1, &quot;title&quot;: &quot;My Post&quot;, ...}],
  &quot;meta&quot;: {&quot;current_page&quot;: 1, &quot;last_page&quot;: 1, &quot;per_page&quot;: 15, &quot;total&quot;: 1}
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-posts" data-method="GET"
      data-path="api/v1/posts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts"
                    onclick="tryItOut('GETapi-v1-posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts"
                    onclick="cancelTryOut('GETapi-v1-posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-posts"
               value="1"
               data-component="query">
    <br>
<p>Page number. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-v1-posts"
               value="15"
               data-component="query">
    <br>
<p>Items per page (1-100). Example: <code>15</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-v1-posts"
               value="AI"
               data-component="query">
    <br>
<p>Search by title, hook proposal or body points. Example: <code>AI</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-v1-posts"
               value="draft"
               data-component="query">
    <br>
<p>Filter by status (in_review, draft, posted, archived). Example: <code>draft</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>process_status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="process_status"                data-endpoint="GETapi-v1-posts"
               value="completed"
               data-component="query">
    <br>
<p>Filter by process status (pending, processing, completed, failed). Example: <code>completed</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-v1-posts"
               value="created_at"
               data-component="query">
    <br>
<p>Sort by field (created_at, updated_at, title, status). Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>direction</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="direction"                data-endpoint="GETapi-v1-posts"
               value="desc"
               data-component="query">
    <br>
<p>Sort direction (asc, desc). Example: <code>desc</code></p>
            </div>
                </form>

                    <h2 id="posts-GETapi-v1-posts-archived">List archived posts</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns a paginated list of soft-deleted posts for the authenticated user.</p>

<span id="example-requests-GETapi-v1-posts-archived">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://forgecoreapi.test/api/v1/posts/archived?page=1&amp;per_page=15&amp;search=AI&amp;sort=created_at&amp;direction=desc" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/posts/archived"
);

const params = {
    "page": "1",
    "per_page": "15",
    "search": "AI",
    "sort": "created_at",
    "direction": "desc",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts-archived">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;posts&quot;: [{&quot;id&quot;: 1, &quot;title&quot;: &quot;My Post&quot;, ...}],
  &quot;meta&quot;: {&quot;current_page&quot;: 1, &quot;last_page&quot;: 1, &quot;per_page&quot;: 15, &quot;total&quot;: 1}
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts-archived" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts-archived"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts-archived"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts-archived" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts-archived">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-posts-archived" data-method="GET"
      data-path="api/v1/posts/archived"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts-archived', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts-archived"
                    onclick="tryItOut('GETapi-v1-posts-archived');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts-archived"
                    onclick="cancelTryOut('GETapi-v1-posts-archived');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts-archived"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts/archived</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-posts-archived"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-posts-archived"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-posts-archived"
               value="1"
               data-component="query">
    <br>
<p>Page number. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-v1-posts-archived"
               value="15"
               data-component="query">
    <br>
<p>Items per page (1-100). Example: <code>15</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-v1-posts-archived"
               value="AI"
               data-component="query">
    <br>
<p>Search by title, hook proposal or body points. Example: <code>AI</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-v1-posts-archived"
               value="created_at"
               data-component="query">
    <br>
<p>Sort by field (created_at, updated_at, title). Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>direction</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="direction"                data-endpoint="GETapi-v1-posts-archived"
               value="desc"
               data-component="query">
    <br>
<p>Sort direction (asc, desc). Example: <code>desc</code></p>
            </div>
                </form>

                    <h2 id="posts-POSTapi-v1-posts-store">Create a post</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Creates a new post with a blueprint and input, then queues AI generation.</p>

<span id="example-requests-POSTapi-v1-posts-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://forgecoreapi.test/api/v1/posts/store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"Understanding AI in Healthcare\",
    \"blueprint_id\": 1,
    \"input_id\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/posts/store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "Understanding AI in Healthcare",
    "blueprint_id": 1,
    "input_id": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-posts-store">
            <blockquote>
            <p>Example response (201, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;message&quot;: &quot;Post created successfully.&quot;,
  &quot;configuration&quot;: {&quot;id&quot;: 1, &quot;blueprint_id&quot;: 1, &quot;input_id&quot;: 1, ...},
  &quot;post&quot;: {&quot;id&quot;: 1, &quot;title&quot;: &quot;My Post&quot;, &quot;process_status&quot;: &quot;pending&quot;, &quot;status&quot;: &quot;in_review&quot;, ...}
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, validation error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Validation failed.&quot;,
    &quot;errors&quot;: {
        &quot;blueprint_id&quot;: [
            &quot;The selected blueprint is invalid or not active.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-posts-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-posts-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-posts-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-posts-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-posts-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-posts-store" data-method="POST"
      data-path="api/v1/posts/store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-posts-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-posts-store"
                    onclick="tryItOut('POSTapi-v1-posts-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-posts-store"
                    onclick="cancelTryOut('POSTapi-v1-posts-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-posts-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/posts/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-posts-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-posts-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-v1-posts-store"
               value="Understanding AI in Healthcare"
               data-component="body">
    <br>
<p>The post title. Example: <code>Understanding AI in Healthcare</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>blueprint_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="blueprint_id"                data-endpoint="POSTapi-v1-posts-store"
               value="1"
               data-component="body">
    <br>
<p>The ID of an active blueprint belonging to the user. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>input_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="input_id"                data-endpoint="POSTapi-v1-posts-store"
               value="1"
               data-component="body">
    <br>
<p>The ID of an input belonging to the user. Example: <code>1</code></p>
        </div>
        </form>

                    <h2 id="posts-GETapi-v1-posts--id-">Show a post</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns the details of a specific post.</p>

<span id="example-requests-GETapi-v1-posts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://forgecoreapi.test/api/v1/posts/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/posts/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts--id-">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;post&quot;: {&quot;id&quot;: 1, &quot;title&quot;: &quot;My Post&quot;, &quot;process_status&quot;: &quot;completed&quot;, ...}
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Forbidden.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Resource not found.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-posts--id-" data-method="GET"
      data-path="api/v1/posts/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts--id-"
                    onclick="tryItOut('GETapi-v1-posts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts--id-"
                    onclick="cancelTryOut('GETapi-v1-posts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-posts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-posts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-posts--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="post"                data-endpoint="GETapi-v1-posts--id-"
               value="1"
               data-component="url">
    <br>
<p>The post ID. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="posts-PUTapi-v1-posts--id--update">Update a post</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Updates the content fields of a specific post.</p>

<span id="example-requests-PUTapi-v1-posts--id--update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://forgecoreapi.test/api/v1/posts/1/update" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"The Future of AI in Healthcare\",
    \"hook_proposal\": \"Did you know AI can detect diseases earlier than doctors?\",
    \"body_points\": [
        \"b\"
    ],
    \"suggested_hashtags\": [
        \"n\"
    ],
    \"technical_readability_score\": 65,
    \"tone_compliance_justification\": \"The post uses professional language with technical depth as required.\",
    \"status\": \"draft\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/posts/1/update"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "The Future of AI in Healthcare",
    "hook_proposal": "Did you know AI can detect diseases earlier than doctors?",
    "body_points": [
        "b"
    ],
    "suggested_hashtags": [
        "n"
    ],
    "technical_readability_score": 65,
    "tone_compliance_justification": "The post uses professional language with technical depth as required.",
    "status": "draft"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-posts--id--update">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;message&quot;: &quot;Post updated successfully.&quot;, &quot;post&quot;: {&quot;id&quot;: 1, ...}}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-posts--id--update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-posts--id--update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-posts--id--update"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-posts--id--update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-posts--id--update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-posts--id--update" data-method="PUT"
      data-path="api/v1/posts/{id}/update"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-posts--id--update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-posts--id--update"
                    onclick="tryItOut('PUTapi-v1-posts--id--update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-posts--id--update"
                    onclick="cancelTryOut('PUTapi-v1-posts--id--update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-posts--id--update"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/posts/{id}/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-posts--id--update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-posts--id--update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-v1-posts--id--update"
               value="1"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="post"                data-endpoint="PUTapi-v1-posts--id--update"
               value="1"
               data-component="url">
    <br>
<p>The post ID. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-v1-posts--id--update"
               value="The Future of AI in Healthcare"
               data-component="body">
    <br>
<p>The post title. Example: <code>The Future of AI in Healthcare</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>hook_proposal</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="hook_proposal"                data-endpoint="PUTapi-v1-posts--id--update"
               value="Did you know AI can detect diseases earlier than doctors?"
               data-component="body">
    <br>
<p>A hook or opening line for the post. Must not be greater than 500 characters. Example: <code>Did you know AI can detect diseases earlier than doctors?</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>body_points</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="body_points[0]"                data-endpoint="PUTapi-v1-posts--id--update"
               data-component="body">
        <input type="text" style="display: none"
               name="body_points[1]"                data-endpoint="PUTapi-v1-posts--id--update"
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>suggested_hashtags</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="suggested_hashtags[0]"                data-endpoint="PUTapi-v1-posts--id--update"
               data-component="body">
        <input type="text" style="display: none"
               name="suggested_hashtags[1]"                data-endpoint="PUTapi-v1-posts--id--update"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>technical_readability_score</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="technical_readability_score"                data-endpoint="PUTapi-v1-posts--id--update"
               value="65"
               data-component="body">
    <br>
<p>A score from 0 to 100 indicating technical complexity. Must be at least 0. Must not be greater than 100. Example: <code>65</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tone_compliance_justification</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tone_compliance_justification"                data-endpoint="PUTapi-v1-posts--id--update"
               value="The post uses professional language with technical depth as required."
               data-component="body">
    <br>
<p>Explanation of how the post complies with the blueprint tone. Example: <code>The post uses professional language with technical depth as required.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-v1-posts--id--update"
               value="draft"
               data-component="body">
    <br>
<p>The post status. Example: <code>draft</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>in_review</code></li> <li><code>draft</code></li> <li><code>posted</code></li> <li><code>archived</code></li></ul>
        </div>
        </form>

                    <h2 id="posts-PATCHapi-v1-posts--post_id--updateStatus">Update post status</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Updates only the status of a specific post.</p>

<span id="example-requests-PATCHapi-v1-posts--post_id--updateStatus">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://forgecoreapi.test/api/v1/posts/1/updateStatus" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"draft\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/posts/1/updateStatus"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "draft"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-posts--post_id--updateStatus">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;message&quot;: &quot;Post status updated successfully.&quot;, &quot;post&quot;: {&quot;id&quot;: 1, ...}}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-v1-posts--post_id--updateStatus" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-posts--post_id--updateStatus"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-posts--post_id--updateStatus"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-posts--post_id--updateStatus" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-posts--post_id--updateStatus">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-v1-posts--post_id--updateStatus" data-method="PATCH"
      data-path="api/v1/posts/{post_id}/updateStatus"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-posts--post_id--updateStatus', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-v1-posts--post_id--updateStatus"
                    onclick="tryItOut('PATCHapi-v1-posts--post_id--updateStatus');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-v1-posts--post_id--updateStatus"
                    onclick="cancelTryOut('PATCHapi-v1-posts--post_id--updateStatus');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-v1-posts--post_id--updateStatus"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/posts/{post_id}/updateStatus</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-v1-posts--post_id--updateStatus"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-v1-posts--post_id--updateStatus"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="post_id"                data-endpoint="PATCHapi-v1-posts--post_id--updateStatus"
               value="1"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="post"                data-endpoint="PATCHapi-v1-posts--post_id--updateStatus"
               value="1"
               data-component="url">
    <br>
<p>The post ID. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PATCHapi-v1-posts--post_id--updateStatus"
               value="draft"
               data-component="body">
    <br>
<p>The new post status. Must be a valid PostStatus enum value. Example: <code>draft</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>in_review</code></li> <li><code>draft</code></li> <li><code>posted</code></li> <li><code>archived</code></li></ul>
        </div>
        </form>

                    <h2 id="posts-DELETEapi-v1-posts--post_id--archive">Archive a post</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Soft-deletes a specific post.</p>

<span id="example-requests-DELETEapi-v1-posts--post_id--archive">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://forgecoreapi.test/api/v1/posts/1/archive" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/posts/1/archive"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-posts--post_id--archive">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Post archived successfully.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-posts--post_id--archive" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-posts--post_id--archive"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-posts--post_id--archive"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-posts--post_id--archive" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-posts--post_id--archive">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-posts--post_id--archive" data-method="DELETE"
      data-path="api/v1/posts/{post_id}/archive"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-posts--post_id--archive', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-posts--post_id--archive"
                    onclick="tryItOut('DELETEapi-v1-posts--post_id--archive');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-posts--post_id--archive"
                    onclick="cancelTryOut('DELETEapi-v1-posts--post_id--archive');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-posts--post_id--archive"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/posts/{post_id}/archive</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-posts--post_id--archive"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-posts--post_id--archive"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="post_id"                data-endpoint="DELETEapi-v1-posts--post_id--archive"
               value="1"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="post"                data-endpoint="DELETEapi-v1-posts--post_id--archive"
               value="1"
               data-component="url">
    <br>
<p>The post ID. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="posts-POSTapi-v1-posts--post_id--restore">Restore a post</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Restores a soft-deleted post.</p>

<span id="example-requests-POSTapi-v1-posts--post_id--restore">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://forgecoreapi.test/api/v1/posts/1/restore" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/posts/1/restore"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-posts--post_id--restore">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;message&quot;: &quot;Post restored successfully.&quot;, &quot;post&quot;: {&quot;id&quot;: 1, ...}}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-posts--post_id--restore" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-posts--post_id--restore"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-posts--post_id--restore"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-posts--post_id--restore" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-posts--post_id--restore">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-posts--post_id--restore" data-method="POST"
      data-path="api/v1/posts/{post_id}/restore"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-posts--post_id--restore', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-posts--post_id--restore"
                    onclick="tryItOut('POSTapi-v1-posts--post_id--restore');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-posts--post_id--restore"
                    onclick="cancelTryOut('POSTapi-v1-posts--post_id--restore');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-posts--post_id--restore"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/posts/{post_id}/restore</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-posts--post_id--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-posts--post_id--restore"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="post_id"                data-endpoint="POSTapi-v1-posts--post_id--restore"
               value="1"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="post"                data-endpoint="POSTapi-v1-posts--post_id--restore"
               value="1"
               data-component="url">
    <br>
<p>The post ID. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="posts-DELETEapi-v1-posts--post_id--forceDelete">Permanently delete a post</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Force-deletes a post from the database.</p>

<span id="example-requests-DELETEapi-v1-posts--post_id--forceDelete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://forgecoreapi.test/api/v1/posts/1/forceDelete" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/posts/1/forceDelete"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-posts--post_id--forceDelete">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Post permanently deleted.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-posts--post_id--forceDelete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-posts--post_id--forceDelete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-posts--post_id--forceDelete"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-posts--post_id--forceDelete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-posts--post_id--forceDelete">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-posts--post_id--forceDelete" data-method="DELETE"
      data-path="api/v1/posts/{post_id}/forceDelete"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-posts--post_id--forceDelete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-posts--post_id--forceDelete"
                    onclick="tryItOut('DELETEapi-v1-posts--post_id--forceDelete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-posts--post_id--forceDelete"
                    onclick="cancelTryOut('DELETEapi-v1-posts--post_id--forceDelete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-posts--post_id--forceDelete"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/posts/{post_id}/forceDelete</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-posts--post_id--forceDelete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-posts--post_id--forceDelete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="post_id"                data-endpoint="DELETEapi-v1-posts--post_id--forceDelete"
               value="1"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="post"                data-endpoint="DELETEapi-v1-posts--post_id--forceDelete"
               value="1"
               data-component="url">
    <br>
<p>The post ID. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="posts-POSTapi-v1-posts--post_id--retry">Retry post generation</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Resets the process status to pending and re-queues AI generation.</p>

<span id="example-requests-POSTapi-v1-posts--post_id--retry">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://forgecoreapi.test/api/v1/posts/1/retry" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/posts/1/retry"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-posts--post_id--retry">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;message&quot;: &quot;Post queued for regeneration.&quot;, &quot;post&quot;: {&quot;id&quot;: 1, ...}}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-posts--post_id--retry" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-posts--post_id--retry"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-posts--post_id--retry"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-posts--post_id--retry" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-posts--post_id--retry">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-posts--post_id--retry" data-method="POST"
      data-path="api/v1/posts/{post_id}/retry"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-posts--post_id--retry', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-posts--post_id--retry"
                    onclick="tryItOut('POSTapi-v1-posts--post_id--retry');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-posts--post_id--retry"
                    onclick="cancelTryOut('POSTapi-v1-posts--post_id--retry');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-posts--post_id--retry"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/posts/{post_id}/retry</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-posts--post_id--retry"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-posts--post_id--retry"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="post_id"                data-endpoint="POSTapi-v1-posts--post_id--retry"
               value="1"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="post"                data-endpoint="POSTapi-v1-posts--post_id--retry"
               value="1"
               data-component="url">
    <br>
<p>The post ID. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="profile">Profile</h1>

    <p>APIs for viewing and updating the authenticated user's profile.</p>

                                <h2 id="profile-GETapi-v1-profile">Show profile</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns the authenticated user's profile information.</p>

<span id="example-requests-GETapi-v1-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://forgecoreapi.test/api/v1/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/profile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-profile">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;user&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;John Doe&quot;,
        &quot;email&quot;: &quot;john@example.com&quot;,
        &quot;created_at&quot;: &quot;2026-01-01T00:00:00.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-profile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-profile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-profile" data-method="GET"
      data-path="api/v1/profile"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-profile"
                    onclick="tryItOut('GETapi-v1-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-profile"
                    onclick="cancelTryOut('GETapi-v1-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-profile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="search">Search</h1>

    <p>Global search across posts, blueprints, inputs, and conversations.</p>

                                <h2 id="search-GETapi-v1-search">Global search</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Searches across the authenticated user's resources. Results can be filtered by type.
Each result type returns up to <code>per_type</code> items (default 5, max 20).</p>

<span id="example-requests-GETapi-v1-search">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://forgecoreapi.test/api/v1/search?q=AI&amp;type=posts&amp;per_type=5" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"q\": \"b\",
    \"type\": \"conversations\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://forgecoreapi.test/api/v1/search"
);

const params = {
    "q": "AI",
    "type": "posts",
    "per_type": "5",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "q": "b",
    "type": "conversations"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-search">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;query&quot;: &quot;AI&quot;,
  &quot;type&quot;: null,
  &quot;results&quot;: {
    &quot;posts&quot;: {&quot;total&quot;: 2, &quot;items&quot;: [{&quot;id&quot;: 1, &quot;title&quot;: &quot;AI Post&quot;, ...}]},
    &quot;blueprints&quot;: {&quot;total&quot;: 1, &quot;items&quot;: [{&quot;id&quot;: 1, &quot;name&quot;: &quot;AI Blueprint&quot;, ...}]},
    &quot;inputs&quot;: {&quot;total&quot;: 0, &quot;items&quot;: []},
    &quot;conversations&quot;: {&quot;total&quot;: 0, &quot;items&quot;: []}
  }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, validation error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Validation failed.&quot;,
    &quot;errors&quot;: {
        &quot;q&quot;: [
            &quot;The q field is required.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-search" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-search"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-search">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-search" data-method="GET"
      data-path="api/v1/search"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-search"
                    onclick="tryItOut('GETapi-v1-search');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-search"
                    onclick="cancelTryOut('GETapi-v1-search');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-search"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/search</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>q</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="q"                data-endpoint="GETapi-v1-search"
               value="AI"
               data-component="query">
    <br>
<p>Search query (min 2 characters). Example: <code>AI</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="GETapi-v1-search"
               value="posts"
               data-component="query">
    <br>
<p>Filter by resource type (posts, blueprints, inputs, conversations). Example: <code>posts</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_type</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_type"                data-endpoint="GETapi-v1-search"
               value="5"
               data-component="query">
    <br>
<p>Items per result type (1-20). Example: <code>5</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>q</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="q"                data-endpoint="GETapi-v1-search"
               value="b"
               data-component="body">
    <br>
<p>Must be at least 2 characters. Must not be greater than 100 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="GETapi-v1-search"
               value="conversations"
               data-component="body">
    <br>
<p>Example: <code>conversations</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>posts</code></li> <li><code>blueprints</code></li> <li><code>inputs</code></li> <li><code>conversations</code></li></ul>
        </div>
        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
