@php
    $isArrayBody = $name === '[]';
@endphp

<div class="param-row" style="margin-left:16px;border-left:1px solid var(--border-light);padding-left:12px;">
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:2px;">
        @unless($isArrayBody)
            <span class="param-name">{{ $name }}</span>
            @if(isset($type) && $type)
                <span class="param-type">{{ $type }}</span>
            @endif
            @if(isset($required) && $required)
                <span class="param-required">REQUIRED</span>
            @endif
            @if(isset($deprecated) && $deprecated)
                <span style="color:#d97706;font-size:12px;font-weight:600;">DEPRECATED</span>
            @endif
        @else
            <span class="param-name">array of:</span>
            @if(isset($required) && $required)
                <span class="param-required">REQUIRED</span>
            @endif
        @endunless
    </div>

    @if(isset($description) && $description)
        <div style="color:var(--text-secondary);font-size:13px;margin-top:4px;">
            {!! \Parsedown::instance()->text($description) !!}
        </div>
    @endif

    @if(!empty($enumValues))
        <div style="margin-top:4px;font-size:13px;color:var(--text-secondary);">
            Must be one of:
            <ul style="list-style-position:inside;margin:4px 0;">
                @foreach($enumValues as $val)
                    <li><code>{{ $val }}</code></li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(!isset($__fields) || empty($__fields))
        @if(isset($example) && $example !== null && $example !== '')
            <div style="margin-top:4px;display:flex;align-items:center;gap:4px;color:var(--text-muted);font-size:12px;">
                <span>Example:</span>
                <code style="font-size:12px;">{{ is_array($example) || is_bool($example) ? json_encode($example) : $example }}</code>
            </div>
        @endif
    @endif

    @if(!empty($__fields))
        @include('scribe::themes.elements.components.nested-fields', ['fields' => $__fields])
    @endif
</div>
