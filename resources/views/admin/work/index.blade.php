@extends('layouts.admin')

@section('content')

    <div class="mb-5 d-flex align-items-center">
        <h1 class="mb-0 ">Работы</h1>
        <div class="ml-3">
            <a href="{{ route('admin.work.create') }}" class="btn btn-secondary">
                Добавить новую
            </a>
        </div>
    </div>

    <div class="row">
        @forelse($works as $work)
            <div class="col-md-6">
                <article class="item p-4">
                    <div class="item-id">{{ $work->id }}</div>
                    <img src="{{ $work->image_medium }}" alt="{{ $work->title }}">

                    <h4 class="mt-4 mb-0">
                        <a href="{{ route('admin.work.edit', $work) }}" class="underline">
                            {{ $work->title }}
                        </a>
                    </h4>
                </article>
            </div>
        @empty
            <div class="col">Работы пока не добавлены...</div>
        @endforelse
    </div>

    {{ $works->links() }}

@endsection
