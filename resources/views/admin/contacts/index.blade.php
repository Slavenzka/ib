@extends('layouts.admin')

@section('content')

    <div class="row">
        @forelse($contacts as $contact)
            <div class="col-md-6">
                <article class="item p-4">
                    <div class="item-id">{{ $contact->id }}</div>
                    <div class="row">
                        <div class="col">
                            <h4>
                                <a href="{{ route('admin.contacts.show', $contact) }}">
                                    {{ $contact->name }}
                                </a>
                            </h4>
                            <p class="mb-0">{{ $brief->created_at->format('d.m.Y \в H:i') }}</p>
                        </div>
                    </div>
                </article>
            </div>
        @empty
            <div class="col">Брифов пока нет...</div>
        @endforelse
    </div>

    {{ $briefs->links() }}

@endsection
