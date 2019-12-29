@extends('layouts.admin', ['title' => 'Новый проект'])

@section('content')

    <form action="{{ route('admin.crm.projects.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="title">Название проекта</label>
            <input type="text" name="title" class="form-control form-control-lg{{ $errors->has('title') ? ' is-invalid' : '' }}"
                   value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <wysiwyg name="description" content="{{ old('description') }}"></wysiwyg>
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
                            <option value="{{ $status }}">
                                {{ __('crm.statuses.'.$status) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>

@endsection
