@extends('layouts.app', ['app_title' => trans('page.title.home')])

@section('content')

    @include('app.home.promo')

    @includeWhen(count($works), 'app.home.slideshow')

    @include('app.home.technologies')

@endsection
