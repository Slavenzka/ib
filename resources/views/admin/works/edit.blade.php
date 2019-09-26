@extends('layouts.admin')

@section('content')

    <form action="{{ route('admin.works.update', $work) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md-8 col-lg-9">
                <block-editor title="{{ $work->title }}">
                    @foreach(config('app.locales') as $lang)
                        <fieldset slot="{{ $lang }}">
                            <div class="form-group{{ $errors->has($lang.'.title') ? ' is-invalid' : '' }}">
                                <label for="title">Заголовок</label>
                                <input type="text" class="form-control" id="title" name="title[{{$lang}}]"
                                       value="{{ old('title.'.$lang) ?? $work->translate('title', $lang) }}"
                                       placeholder="{{ mb_strtoupper($lang) }}"
                                       required>
                                @if($errors->has('title.'.$lang))
                                    <div class="mt-1 text-danger">
                                        {{ $errors->first('title.'.$lang) }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Описание</label>
                                <wysiwyg name="body[{{$lang}}]"
                                         content="{{ old('body.'.$lang) ?? $work->translate('body', $lang) }}"
                                >
                                </wysiwyg>
                            </div>
                        </fieldset>
                    @endforeach

                    <div class="form-group">
                        <label for="type">Тип работы</label>
                        <select name="type_id" id="type" class="form-control">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}"
                                    {{ $work->type_id == $type->id ? 'selected' : '' }}>
                                    {{ $type->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </block-editor>

                <div class="d-flex align-items-center mt-4">
                    <button class="btn btn-primary">Сохранить</button>
                    <div class="ml-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="in_slideshow" class="custom-control-input" id="slideshow"
                                {{ $work->in_slideshow ? 'checked' : '' }}>
                            <label class="custom-control-label" for="slideshow">Показать в слайдшоу</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="preview">Превью</label>
                    <image-uploader src="{{ optional($work->getFirstMedia('preview'))->getFullUrl('small') }}"
                                    name="preview"
                                    id="preview"></image-uploader>
                </div>

                <div class="form-group">
                    <label for="work">Полное изображение</label>
                    <image-uploader src="{{ optional($work->getFirstMedia('work'))->getFullUrl() }}"
                                    name="work"
                                    id="work"></image-uploader>
                </div>
            </div>
        </div>
    </form>

@endsection
