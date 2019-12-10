@extends('layouts.app', ['app_title' => trans('page.title.home')])

@section('content')

    @include('app.home.promo')
    @includeWhen($works->count(), 'app.home.slideshow')
    @include('app.home.technologies')

@endsection
