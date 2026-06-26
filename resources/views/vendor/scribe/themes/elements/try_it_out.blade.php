<div class="card" style="margin-top:24px;">
    <div class="card-header" style="background:var(--brand);color:white;border-bottom:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Try It Out
    </div>
    <div class="card-body">
        <div class="try-it-field">
            <label for="auth-{{ $endpoint->endpointId() }}">Authorization Token</label>
            <input type="text" id="auth-{{ $endpoint->endpointId() }}" placeholder="Enter your Bearer token">
        </div>

        @foreach($endpoint->urlParameters as $param)
            <div class="try-it-field">
                <label>{{ $param->name }} @if($param->required)<span style="color:#ef4444;">*</span>@endif</label>
                <input type="text" data-url-param="{{ $param->name }}" placeholder="{{ $param->example ?? $param->name }}">
            </div>
        @endforeach

        @foreach($endpoint->cleanQueryParameters as $name => $example)
            <div class="try-it-field">
                <label>{{ $name }}</label>
                <input type="text" data-query-param="{{ $name }}" placeholder="{{ is_scalar($example) ? $example : '' }}">
            </div>
        @endforeach

        @foreach($endpoint->cleanBodyParameters as $name => $example)
            <div class="try-it-field">
                <label>{{ $name }}</label>
                @if(is_array($example))
                    <textarea data-body-param="{{ $name }}" rows="3">{{ json_encode($example, JSON_PRETTY_PRINT) }}</textarea>
                @else
                    <input type="text" data-body-param="{{ $name }}" placeholder="{{ is_scalar($example) ? $example : '' }}">
                @endif
            </div>
        @endforeach

        <div style="display:flex;align-items:center;gap:12px;margin-top:16px;">
            <button class="try-it-btn" onclick="sendTryIt('{{ $endpoint->httpMethods[0] }}', '{{ $endpoint->boundUri ?? $endpoint->uri }}', this)">
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
