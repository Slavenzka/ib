@extends('layouts.admin')

@section('content')

    <form action="{{ route('admin.brief.update', $brief) }}" method="post">
        @csrf
        @method('patch')

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

                                <textarea name="{{ $group.'['.$key.']' }}"
                                          rows="{{ strlen($item) > 100 ? '4' : (strlen($item) > 200 ? '6' : '') }}"
                                          class="form-control">{{ $item }}</textarea>
                            </fieldset>
                        @endif
                    </li>
                @endforeach
            </ul>

            @if (!$loop->last)
                <hr>
            @endif
        @endforeach

        <div class="row">
            <div class="col">
                <button class="btn btn-primary">Обновить</button>
            </div>
            <div class="form-group mb-0 col">
                <label for="status">Статус</label>
                <select name="status" id="status" class="form-control">
                    @foreach(\App\Models\Contact\Brief::$STATUSES as $key => $status)
                        <option value="{{ $key }}" {{ $brief->status === $key ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

@endsection
