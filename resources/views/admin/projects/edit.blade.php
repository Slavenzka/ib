@extends('layouts.admin', ['title' => $project->title])

@section('content')

    <form action="{{ route('admin.crm.projects.update', $project->id) }}" method="post">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="title">Название проекта</label>
            <input type="text" name="title" class="form-control form-control-lg{{ $errors->has('title') ? ' is-invalid' : '' }}"
                   value="{{ old('title') ?? $project->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <wysiwyg name="description" content="{{ old('description') ?? $project->description }}"></wysiwyg>
        </div>

        <taggable :tagged="{{ $tags }}"></taggable>

        <div class="mt-4">
            <div class="row">
                <div class="col-auto btn-group">
                    <button class="btn btn-primary">Сохранить</button>
                    <a href="{{ url()->previous() }}" class="btn btn-light">Назад</a>
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
