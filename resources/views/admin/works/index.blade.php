@extends('layouts.admin')

@section('content')

    <div class="mb-5 d-flex align-items-center">
        <h1 class="mb-0 ">Работы</h1>
        <div class="ml-3">
            <a href="{{ route('admin.works.create') }}" class="btn btn-secondary">
                Добавить новую
            </a>
        </div>
    </div>

    <div class="row">
        @forelse($works as $work)
            <div class="col-md-6">
                <article class="item p-4">
                    <div class="item-id">{{ $work->id }}</div>
                    <a href="{{ route('admin.works.edit', $work) }}" class="d-block">
                        <img src="{{ $work->getFirstMediaUrl('preview', 'small') }}" alt="{{ $work->title }}">
                    </a>

                    <h4 class="mt-4 mb-0">
                        <a href="{{ route('admin.works.edit', $work) }}" class="underline">
                            {{ $work->title }}
                        </a>
                    </h4>
                    <p class="mb-0">{{ $work->created_at->format('d.m.Y, H:i') }}</p>
                </article>
            </div>
        @empty
            <div class="col">Работы пока не добавлены...</div>
        @endforelse
    </div>

    {{ $works->links() }}

@endsection
