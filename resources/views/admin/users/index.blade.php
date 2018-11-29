@extends('layouts.admin')

@section('content')

    <div class="row">
        @forelse($users as $user)
            <div class="col-md-6">
                <article class="item p-4">
                    <div class="d-flex">
                        <h5 class="flex-grow-1">
                            {{ $user->name }}
                        </h5>
                        <div class="ml-3">
                            <a href="mailto:{{ $user->email }}" class="underline">{{ $user->email }}</a>
                        </div>
                    </div>
                    <div>Роль: <strong>{{ \App\Models\User\Role::$ROLES[$user->role->name] }}</strong></div>
                </article>
            </div>
        @empty
            <div class="col">...</div>
        @endforelse
    </div>

@endsection
