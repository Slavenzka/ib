@foreach($brief->body as $group => $column)
    <h3>{{ \App\Models\Brief::$GROUPS[$group] }}</h3>

    <ul style="list-style: none; padding: 0; margin: 0;">
        @foreach($column as $key => $item)
            <li style="margin-bottom: 0.75rem;">
                @if($item)
                    <p style="margin-bottom: 0.25rem; color: #666;">
                        <small>{{ trans("page.brief.{$group}.{$key}", [], 'ru') }}</small>
                    </p>

                    {{ $item }}
                @endif
            </li>
        @endforeach
    </ul>
@endforeach
