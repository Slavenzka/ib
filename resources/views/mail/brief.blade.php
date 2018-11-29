@foreach($brief->body as $group => $column)
    <h3>{{ \App\Models\Contact\Brief::$GROUPS[$group] }}</h3>

    <ul style="list-style: none; padding: 0; margin: 0;">
        @foreach($column as $key => $item)
            <li style="margin-bottom: 10px;">
                @if($item)
                    <fieldset>
                        <legend class="mb-0 text-muted small">
                            {{ trans("page.brief.{$group}.{$key}", [], 'ru') }}
                        </legend>

                        <textarea name="{{ $group.'['.$key.']' }}"
                                  rows="{{ strlen($item) > 100 ? '4' : (strlen($item) > 200 ? '6' : '') }}"
                                  class="form-control">{{ $item }}</textarea>
                    </fieldset>
                @endif
            </li>
        @endforeach
    </ul>
@endforeach
