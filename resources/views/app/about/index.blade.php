@extends('layouts.app', ['app_title' => trans('page.title.about')])

@section('content')

    <section class="content py-10 my-10">
        <div class="container">
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
                        <p>{{ $principe['body'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
