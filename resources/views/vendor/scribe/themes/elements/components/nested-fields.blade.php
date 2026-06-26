@if(!empty($fields))
    <div style="margin-top:8px;">
        @foreach($fields as $fieldName => $details)
            @if($fieldName === '__translation_key') @continue @endif
            @php
                $params = $details;
                $params['name'] = $details['name'] ?? $fieldName;
                if (!isset($params['__fields'])) { $params['__fields'] = []; }
            @endphp
            @include('scribe::themes.elements.components.field-details', $params)
        @endforeach
    </div>
@endif
