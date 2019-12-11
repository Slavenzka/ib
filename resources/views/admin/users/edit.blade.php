@extends('layouts.admin')

@section('content')

    @if ($errors)
        <div class="alert alert-danger">
            <ol>
                @foreach($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user) }}" method="post">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                   value="{{ old('name') ?? $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email"
                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                   value="{{ old('email') ?? $user->email }}"
                   readonly disabled>
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password"
                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                   value="{{ old('password') }}">
        </div>

        <div class="form-group">
            <label for="telegram_user_id">Telegram ID</label>
            <input type="text" name="telegram_user_id" id="telegram_user_id" class="form-control"
                   value="{{ old('telegram_user_id') ?? $user->telegram_user_id }}">
        </div>

        <div class="form-group">
            <select name="role" id="role" class="form-control">
                @foreach(\App\Models\User::$ROLES as $role)
                    <option value="{{ $role }}"
                        {{ $user->role === $role ? 'selected' : '' }}
                    >{{ __('roles.'.$role) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <button class="btn btn-primary">Сохранить</button>
        </div>
    </form>

@endsection
