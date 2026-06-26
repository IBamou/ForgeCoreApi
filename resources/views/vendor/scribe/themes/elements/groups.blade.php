<div class="endpoint-section" id="group-{{ \Illuminate\Support\Str::slug($group['name']) }}">
    <h2 style="display:flex;align-items:center;gap:10px;">
        {{ $group['name'] }}
    </h2>
    @if($group['description'])
        <div style="color:var(--text-secondary);font-size:14px;margin-bottom:24px;max-width:680px;">
            {!! Parsedown::instance()->text($group['description']) !!}
        </div>
    @endif

    @foreach($group['endpoints'] as $endpoint)
        @include('scribe::themes.elements.endpoint')
    @endforeach
</div>
