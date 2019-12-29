@extends('layouts.admin', ['title' => $project->title])

@section('content')

    <div class="mb-4 row align-items-end">
        <div class="col-auto">
            <h1 class="h4 mb-0">
                <a href="{{ route('admin.crm.projects.show', $project) }}">{{ $project->title }}</a>
            </h1>
        </div>
        <div class="col-auto d-flex">
            <div class="dot dot--{{ $project->status }}"></div>
            {{ __('crm.statuses.'.$project->status) }}
        </div>
    </div>

    <form action="{{ route('admin.crm.stages.store', $project) }}" method="post">
        @csrf

        <div class="form-group">
            <label for="title">Название этапа</label>
            <input type="text" name="title"
                   class="form-control form-control-lg{{ $errors->has('title') ? ' is-invalid' : '' }}"
                   value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <wysiwyg name="description" content="{{ old('description') }}"></wysiwyg>
        </div>

        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="starts_at">Начало</label>
                    <input type="datetime-local" name="starts_at" class="form-control" value="{{ old('starts_at') }}">
                </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                    <label for="ends_at">Окончание</label>
                    <input type="datetime-local" name="ends_at" class="form-control" value="{{ old('ends_at') }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Оценочная стоимость</label>

            <div class="d-flex">
                <select name="est_currency" id="est_currency" class="form-control w-auto mr-1">
                    @foreach(\App\Models\Base::$currencies as $currency)
                        <option value="{{ $currency }}">
                            {!! __('crm.currencies.'.$currency) !!}
                        </option>
                    @endforeach
                </select>

                <input type="number" name="est_price" class="form-control w-auto" value="{{ old('est_price') }}">
            </div>
        </div>

        <taggable></taggable>

        <div class="mt-4">
            <div class="row">
                <div class="col-auto">
                    <button class="btn btn-primary">Сохранить</button>
                </div>
                <div class="col-auto">
                    <select name="status" id="status" class="form-control">
                        @foreach(\App\Models\Base::$statuses as $status)
                            <option value="{{ $status }}"
                                {{ $status === $project->status ? 'selected' : '' }}>
                                {{ __('crm.statuses.'.$status) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>

@endsection
