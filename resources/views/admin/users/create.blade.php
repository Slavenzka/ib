@extends('layouts.admin')

@section('content')

    <form action="{{ route('admin.users.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                   value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email"
                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}"
                   required>
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password"
                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}"
                   required autocomplete="nope">
        </div>

        <div class="form-group">
            <label for="telegram_user_id">Telegram ID</label>
            <input type="text" name="telegram_user_id" id="telegram_user_id" class="form-control"
                   value="{{ old('telegram_user_id') }}" autocomplete="nope">
        </div>

        <div class="mt-4">
            <button class="btn btn-primary">Сохранить</button>
        </div>
    </form>

@endsection
