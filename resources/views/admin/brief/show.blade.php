@extends('layouts.admin')

@section('content')

    @foreach($brief->body as $g => $group)
        <h3>{{ \App\Models\Contact\Brief::$GROUPS[$g] }}</h3>

        <ul class="list-unstyled">
            @foreach($group as $key => $item)
                <li class="mb-2">
                    @if($item)
                        <fieldset>
                            <legend class="mb-0 text-muted small">
                                {{ trans("page.brief.{$g}.{$key}") }}
                            </legend>
                            {{ $item }}
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
