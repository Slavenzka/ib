@extends('layouts.admin')

@section('content')

    <div class="row">
        @forelse($contacts as $contact)
            <div class="col-md-6">
                <article class="item p-4">
                    <div class="row">
                        <div class="col">
                            <h4>
                                <a href="{{ route('admin.contacts.edit', $contact) }}">
                                    {{ $contact->name }}
                                </a>
                            </h4>
                            <p>{{ $contact->phone }}</p>
                            <p class="mb-0 small">{{ $contact->created_at->format('d.m.Y \в H:i') }}</p>
                        </div>
                        <div class="col-auto">
                            <span
                                class="py-1 px-2 small rounded text-white bg-{{ $contact->status == 'declined' ? 'danger' : ($contact->status == 'finished' ? 'success' : 'warning') }}">
                            {{ \App\Models\Contact\Contact::$STATUSES[$contact->status] }}
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
