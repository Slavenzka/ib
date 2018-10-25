@extends('layouts.app', ['app_title' => $work->title])

@section('content')

    <section class="content">
        <div class="container">
            <h1 class="page-title">
                <revealer>
                    {{ $work->title }}
                </revealer>
            </h1>

            <h4>
                <revealer :params="{bgcolor: '#353535', direction: 'rl'}">
                    {{ $work->description }}
                </revealer>
            </h4>

            <div class="content-entry mt-10">
                {!! $work->body !!}
            </div>

            <div class="gallery-item my-8">
                <div class="gallery-item__deco"></div>
                <img src="{!! $work->getFirstMediaUrl('work') !!}" class="gallery-item__image" alt="">
            </div>

            <div class="text-center mt-8">
                <revealer :params="{direction: 'bt'}">
                    <a href="{{ route('app.brief.index') }}" class="button button--primary">
                        @lang('buttons.discuss')
                    </a>
                </revealer>
            </div>
        </div>
    </section>

@endsection
