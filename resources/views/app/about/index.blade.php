@extends('layouts.app', ['app_title' => trans('page.title.about')])

@section('content')

    <section>
        <div class="container content">
            <revealer :params="{direction: 'rl'}">
                @lang('page.about.intro')
            </revealer>

            <div class="grid principles mt-10">
                @foreach(trans('page.about.principles') as $principe)
                    <div class="w-md-6/12 principe">
                        <h4>
                            <revealer>
                                {{ $principe['title'] }}
                            </revealer>
                        </h4>
                        <div>{!! $principe['body'] !!}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
