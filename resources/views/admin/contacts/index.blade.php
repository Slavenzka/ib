@extends('layouts.admin')

@section('content')

    <table class="table table-striped">
        <thead>
        <tr class="small">
            <th>Имя</th>
            <th>Телефон</th>
            <th>Дата создания</th>
            <th>Статус</th>
            <th width="80"></th>
        </tr>
        </thead>
        @forelse($contacts as $contact)
            <tr>
                <td>
                    <a href="{{ route('admin.contacts.edit', $contact) }}" class="underline">
                        {{ $contact->name }}
                    </a>
                </td>
                <td>
                    <a href="tel:{{ str_replace([' ', '-', '(', ')'], '', $contact->phone) }}" class="dashed">
                        {{ $contact->phone }}
                    </a>
                </td>
                <td>{{ $contact->created_at->format('d.m.Y \в H:i') }}</td>
                <td>
                    <span class="py-1 px-2 small rounded text-white bg-{{ $contact->status == 'declined' ? 'danger' : ($contact->status == 'finished' ? 'success' : 'warning') }}">
                        {{ \App\Models\Contact::$STATUSES[$contact->status] }}
                    </span>
                </td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('admin.contacts.edit', $contact) }}" class="btn btn-warning btn-sm">
                            <svg width="14" height="14" fill="currentColor">
                                <use xlink:href="#edit"></use>
                            </svg>
                        </a>
                        <a href="{{ route('admin.contacts.destroy', $contact) }}"
                           class="btn btn-danger btn-sm"
                           onclick="deleteItem()"
                        >
                            <svg width="14" height="14" fill="currentColor">
                                <use xlink:href="#delete"></use>
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Контактные формы пока никто не заполнял...</td>
            </tr>
        @endforelse
    </table>

    {{ $contacts->links() }}

    @includeIf('partials.admin.common.deletion')

@endsection
