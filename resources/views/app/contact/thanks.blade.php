@extends('layouts.app', ['app_title' => trans('page.title.thanks')])

@section('content')

    <section class="content flex flex-column justify-center mihv-100">
        <div class="container text-center">
            <h1>
                <revealer>@lang('page.thanks.title')</revealer>
            </h1>

            @if ($content)
                <p>{{ $content }}</p>
            @endif

            <a href="{{ route('app.home') }}" class="button button--primary">
                @lang('buttons.back_to_main')
            </a>
        </div>
    </section>

@endsection
