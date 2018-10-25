@extends('layouts.app', ['app_title' => trans('page.title.works')])

@section('content')

    <section id="content">
        <div class="container">
            <h1 class="page-title">
                <revealer>
                    @lang('page.title.works')
                </revealer>
            </h1>

            <div class="grid works">
            @forelse($works as $work)
                <div class="w-md-6/12">
                    <a href="{{ route('app.work.show', $work) }}" class="work-article">
                        <div class="work-article__img-wrap">
                            <div class="work-article__img" style="background-image: url({{ $work->image_medium }});"></div>
                        </div>
                        <div class="work-article__side">{{ $work->type->title }}</div>
                        <div class="work-article__title-wrap">
                            <span class="work-article__number">{{ $loop->iteration }}</span>
                            <h3 class="work-article__title">{{ $work->title }}</h3>
                            <h4 class="work-article__subtitle mb-0">{{ $work->description }}</h4>
                        </div>
                    </a>
                </div>
            @empty
                <div class="w-1">...</div>
            @endforelse
            </div>
        </div>
    </section>

@endsection
