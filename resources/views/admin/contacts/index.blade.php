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
                                <a href="{{ route('admin.contacts.edit', $contact) }}">
                                    {{ $contact->name }}
                                </a>
                            </h4>
                            <p>{{ $contact->phone }}</p>
                            <p class="mb-0">{{ $contact->created_at->format('d.m.Y \в H:i') }}</p>
                        </div>
                        <div class="col-auto">
                            <span
                                class="py-1 px-2 small rounded bg-{{ $contact->status == 'declined' ? 'danger' : ($contact->status == 'finished' ? 'success' : 'warning') }}">
                            {{ \App\Models\Contact\Brief::$STATUSES[$contact->status] }}
                            </span>
                        </div>
                    </div>
                </article>
            </div>
        @empty
            <div class="col">Контактные формы пока никто не заполнял...</div>
        @endforelse
    </div>

    {{ $contacts->links() }}

@endsection
