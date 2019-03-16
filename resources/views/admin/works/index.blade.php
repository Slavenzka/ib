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

                    <div class="mt-4 d-flex">
                        <div>
                            <h4 class="mb-1">
                                <a href="{{ route('admin.works.edit', $work) }}" class="underline">
                                    {{ $work->title }}
                                </a>
                            </h4>
                            {{ $work->created_at->format('d.m.Y, H:i') }}
                        </div>

                        @if ($work->in_slideshow)
                        <div class="ml-auto">
                            <svg width="30" height="30" fill="#f4645f"><use xlink:href="#eye"></use></svg>
                        </div>
                        @endif
                    </div>
                </article>
            </div>
        @empty
            <div class="col">Работы пока не добавлены...</div>
        @endforelse
    </div>

    {{ $works->links() }}

@endsection
