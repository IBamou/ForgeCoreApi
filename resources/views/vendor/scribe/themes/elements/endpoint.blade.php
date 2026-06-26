@php
    /** @var \Knuckles\Camel\Output\OutputEndpointData $endpoint */
@endphp

<div class="endpoint-section" id="{{ $endpoint->fullSlug() }}">
    <div class="endpoint-content-grid">
        {{-- Main documentation content --}}
        <div class="endpoint-docs">
            {{-- Endpoint header card --}}
            <div class="card">
                <div class="card-header">
                    @foreach($endpoint->httpMethods as $method)
                        <span class="badge badge-{{ strtolower($method) }}">{{ $method }}</span>
                    @endforeach
                    <span class="endpoint-url">{{ $endpoint->uri }}</span>
                    @if($endpoint->isAuthed())
                        <span class="badge" style="background:var(--hover);color:var(--text-muted);border-color:var(--border);font-size:10px;padding:2px 7px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Auth
                        </span>
                    @endif
                </div>
                <div class="card-body">
                    @if($endpoint->metadata->title)
                        <h3 style="margin-top:0;">{{ $endpoint->name() }}</h3>
                    @endif
                    @if($endpoint->metadata->description)
                        <div style="margin-bottom:16px;">
                            {!! Parsedown::instance()->text($endpoint->metadata->description) !!}
                        </div>
                    @endif
                    @if($endpoint->boundUri)
                        <div class="details-box" style="margin-bottom:0;">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                Request URL
                            </div>
                            <div class="details-body">
                                <code style="background:none;padding:0;color:var(--text);font-size:13px;">{{ url($endpoint->boundUri) }}</code>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Auth & Headers --}}
            @if($endpoint->isAuthed() || count($endpoint->headers))
                <div style="margin-bottom:24px;">
                    @if($endpoint->isAuthed())
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
                    @endif
                    @if(count($endpoint->headers))
                        <div class="details-box">
                            <div class="details-title" onclick="this.parentElement.classList.toggle('is-open')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg>
                                Custom Headers
                            </div>
                            <div class="details-body">
                                <table>
                                    <thead><tr><th>Name</th><th>Value</th></tr></thead>
                                    <tbody>
                                        @foreach($endpoint->headers as $header => $value)
                                            <tr><td><code>{{ $header }}</code></td><td><code>{{ $value }}</code></td></tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            @endif

            {{-- URL Parameters --}}
            @if(count($endpoint->urlParameters))
                <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        URL Parameters
                    </div>
                    <div class="card-body">
                        @foreach($endpoint->urlParameters as $param)
                            <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">{{ $param->name }}</span>
                                    <span class="param-type">{{ $param->type }}</span>
                                    @if($param->required)<span class="param-required">REQUIRED</span>@endif
                                </div>
                                @if($param->description)
                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        {!! Parsedown::instance()->text($param->description) !!}
                                    </div>
                                @endif
                                @if($param->example !== null)
                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">{{ is_array($param->example) ? json_encode($param->example) : $param->example }}</code>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Query Parameters --}}
            @if(count($endpoint->queryParameters))
                <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        Query Parameters
                    </div>
                    <div class="card-body">
                        @foreach($endpoint->queryParameters as $param)
                            <div class="param-row">
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
                                    <span class="param-name">{{ $param->name }}</span>
                                    <span class="param-type">{{ $param->type }}</span>
                                    @if($param->required)<span class="param-required">REQUIRED</span>@endif
                                </div>
                                @if($param->description)
                                    <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
                                        {!! Parsedown::instance()->text($param->description) !!}
                                    </div>
                                @endif
                                @if($param->example !== null)
                                    <code style="margin-top:4px;display:inline-block;word-break:normal;overflow-wrap:break-word;">{{ is_array($param->example) ? json_encode($param->example) : $param->example }}</code>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Body Parameters --}}
            @if(count($endpoint->nestedBodyParameters))
                <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Body Parameters
                    </div>
                    <div class="card-body">
                        @foreach($endpoint->nestedBodyParameters as $name => $details)
                            @include('scribe::themes.elements.components.field-details', array_merge($details, [
                                'name' => $name,
                                'endpointId' => $endpoint->endpointId(),
                                'component' => 'body',
                                'isInput' => true,
                            ]))
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Responses --}}
            @if($endpoint->hasResponses() || count($endpoint->responseFields))
                <div class="card">
                    <div class="card-header">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Responses
                    </div>
                    <div class="card-body">
                        @foreach($endpoint->responses as $response)
                            <div style="margin-bottom:20px;@if(!$loop->last)padding-bottom:20px;border-bottom:1px solid var(--border-light);@endif">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                    <span class="badge {{ $response->status < 400 ? 'badge-get' : 'badge-delete' }}" style="font-size:11px;padding:2px 8px;">{{ $response->status }}</span>
                                    @if($response->description)
                                        <span style="color:var(--text-secondary);font-size:13px;">{{ $response->description }}</span>
                                    @endif
                                </div>
                                @if($response->content)
                                    <pre><code class="language-json">{{ $response->content }}</code></pre>
                                @endif
                            </div>
                        @endforeach

                        @if(count($endpoint->nestedResponseFields))
                            <div style="margin-top:16px;">
                                <h4 style="font-size:13px;font-weight:600;color:var(--text-secondary);text-transform:uppercase;letter-spacing:.5px;margin-bottom:12px;">Response Fields</h4>
                                @foreach($endpoint->nestedResponseFields as $name => $details)
                                    @include('scribe::themes.elements.components.field-details', array_merge($details, [
                                        'name' => $name,
                                        'endpointId' => $endpoint->endpointId(),
                                        'component' => 'response',
                                        'isInput' => false,
                                    ]))
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        {{-- Try It Out (right panel on wide screens) --}}
        @if($tryItOut['enabled'] ?? true)
            <div class="endpoint-tryit">
                @include('scribe::themes.elements.try_it_out')
            </div>
        @endif
    </div>
</div>
