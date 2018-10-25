@extends('layouts.app', ['app_title' => $work->title])

@section('content')

    <section>
        <div class="container content">
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

            @if ($work->body)
                <div class="content-entry my-10">
                    {!! $work->body !!}
                </div>
            @endif
        </div>

        <div class="gallery-item my-10 px-2 px-lg-8">
            <div class="gallery-item__deco"></div>
            <img src="{!! $work->getFirstMediaUrl('work') !!}" class="gallery-item__image" alt="">
        </div>

        <div class="container content">
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
