@extends('layouts.admin')

@section('content')

    <div class="row">
        @forelse($briefs as $brief)
            <div class="col-md-6">
                <article class="item">
                    <div class="item-id">{{ $brief->id }}</div>
                </article>
            </div>
        @empty
            <div class="col">Брифов пока нет...</div>
        @endforelse
    </div>

@endsection
