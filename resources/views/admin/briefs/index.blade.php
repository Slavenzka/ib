@extends('layouts.admin')

@section('content')

    <div class="row">
        @forelse($briefs as $brief)
            <div class="col-md-6">
                <article class="item p-4">
                    <div class="item-id">{{ $brief->id }}</div>
                    <div class="row">
                        <div class="col">
                            <h4>
                                <a href="{{ route('admin.briefs.show', $brief) }}">
                                    {{ ucfirst($brief->body['contact']['f1']) }}
                                </a>
                            </h4>
                            <p class="mb-0">{{ $brief->created_at->format('d.m.Y \в H:i') }}</p>
                        </div>
                        <div class="col-auto">
                            <span
                                class="py-1 px-2 small rounded bg-{{ $brief->status == 'progress' ? 'warning' : ($brief->status == 'finished' ? 'success' : 'danger') }}">
                            {{ \App\Models\Contact\Brief::$STATUSES[$brief->status] }}
                            </span>
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
