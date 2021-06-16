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
                <article class="item border rounded p-4">
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
                                <svg width="30" height="30" fill="#f4645f">
                                    <use xlink:href="#eye"></use>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <hr class="my-3">

                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <a href="{{ route('admin.works.edit', $work) }}" class="d-inline-flex">
                                <svg fill="currentColor" width="15" height="15">
                                    <use xlink:href="#edit"></use>
                                </svg>
                                <span class="ml-2">Редактировать</span>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('admin.works.destroy', $work) }}" class="text-danger d-inline-flex"
                               onclick="event.preventDefault(); document.getElementById('work-delete-{{ $work->id }}').submit();">
                                <svg fill="currentColor" width="15" height="15">
                                    <use xlink:href="#delete"></use>
                                </svg>
                                Удалить
                            </a>

                            <form id="work-delete-{{ $work->id }}" action="{{ route('admin.works.destroy', $work) }}"
                                  method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </div>
                </article>
            </div>
        @empty
            <div class="col">Работы пока не добавлены...</div>
        @endforelse
    </div>

    {{ $works->links() }}

@endsection
