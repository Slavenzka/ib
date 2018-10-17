@extends('layouts.app')

@section('content')

    <section class="auth section--top">
        <div class="container">
            <div class="maw-md-80 maw-lg-50 mx-auto">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="control{{ $errors->has('email') ? ' has-errors' : '' }}">
                        <label class="control__label-static" for="#email">E-mail</label>
                        <input id="email" type="text" name="email" class="control__input" required autofocus>
                    </div>

                    <div class="control{{ $errors->has('password') ? ' has-errors' : '' }}">
                        <label class="control__label-static" for="#password">@lang('auth.password')</label>
                        <input id="password" type="password" name="password" class="control__input" required>
                    </div>

                    <div class="grid align-center">
                        <div class="c-auto">
                            <button class="button button--primary">
                                @lang('buttons.login')
                            </button>
                        </div>
                        <div class="c">
                            <label>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                @lang('auth.remember')
                            </label>
                        </div>
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('password.request') }}">
                            @lang('auth.forgot')
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
