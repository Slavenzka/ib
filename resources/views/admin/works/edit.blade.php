@extends('layouts.admin')

@section('content')

    <form action="{{ route('admin.works.update', $work) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Название</label>
                    <input type="text" class="form-control" name="title[ru]"
                           value="{{ old('title.ru') ?? $work->translate('ru')->value('title') }}" placeholder="ru" required>
                    <input type="text" class="form-control mt-1" name="title[en]"
                           value="{{ old('title.en') ?? $work->translate('en')->value('title') }}" placeholder="en" required>
                    @if($errors->has('title'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Краткое описание</label>
                    <input type="text" class="form-control" name="description[ru]"
                           value="{{ old('description.ru') ?? $work->translate('ru')->value('description') }}" placeholder="ru" required>
                    <input type="text" class="form-control mt-1" name="description[en]"
                           value="{{ old('description.en') ?? $work->translate('en')->value('description') }}" placeholder="en" required>
                    @if($errors->has('description'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                    <label for="body">Полное описание</label>
                    <wysiwyg name="body[ru]" content="{{ old('body.ru') ?? $work->translate('ru')->value('body') }}"></wysiwyg>
                    <wysiwyg class="mt-1" name="body[en]" content="{{ old('body.en') ?? $work->translate('en')->value('body') }}"></wysiwyg>
                    @if($errors->has('body'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="type">Тип работы</label>
                    <select name="type_id" id="type" class="form-control">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ $type->id === $work->type_id ? 'selected' : '' }}>
                                {{ $type->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="hidden" name="in_slideshow" value="0">
                    <input type="checkbox" name="in_slideshow" class="custom-control-input" id="slideshow"
                           value="1" {{ $work->in_slideshow ? 'checked' : '' }}>
                    <label class="custom-control-label" for="slideshow">Показать в слайдшоу</label>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary">
                        Сохранить
                    </button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="preview">Превью</label>
                    <image-uploader
                        src="{{ $work->getFirstMediaUrl('preview') }}"
                        name="preview" id="preview"></image-uploader>
                </div>

                <div class="form-group">
                    <label for="work">Полное изображение</label>
                    <image-uploader
                        src="{{ $work->getFirstMediaUrl('work') }}"
                        name="work" id="work"></image-uploader>
                </div>
            </div>
        </div>
    </form>

@endsection
