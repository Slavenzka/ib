@extends('layouts.admin')

@section('content')

    @foreach($brief->body as $group => $column)
        <h3>{{ \App\Models\Contact\Brief::$GROUPS[$group] }}</h3>

        <ul class="list-unstyled">
            @foreach($column as $key => $item)
                <li class="mb-2">
                    @if($item)
                        <fieldset>
                            <legend class="mb-0 text-muted small">
                                {{ trans("page.brief.{$group}.{$key}") }}
                            </legend>

                            <textarea name="{{ ''.$group[''.$key.''].'' }}" class="form-control">{{ $item }}</textarea>
                        </fieldset>
                    @endif
                </li>
            @endforeach
        </ul>

        @if (!$loop->last)
            <hr>
        @endif
    @endforeach

@endsection
