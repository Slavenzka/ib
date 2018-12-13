@extends('layouts.admin')

@section('content')

    <form action="{{ route('admin.contacts.update', $contact) }}" method="post">
        @csrf
        @method('patch')

        <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }}">
            <label for="name">Имя контакта</label>
            <input type="text" class="form-control form-control-lg" id="name" name="name"
                   value="{{ old('name') ?? $contact->name }}" required>
            @if($errors->has('name'))
                <div class="mt-1 text-danger">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>

        <div class="form-group{{ $errors->has('phone') ? ' is-invalid' : '' }}">
            <label for="phone">Телефон</label>
            <input type="text" class="form-control form-control-lg" id="phone" name="phone"
                   value="{{ old('phone') ?? $contact->phone }}" required>
            @if($errors->has('phone'))
                <div class="mt-1 text-danger">
                    {{ $errors->first('phone') }}
                </div>
            @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }}">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" name="email"
                   value="{{ old('email') ?? $contact->email }}" required>
            @if($errors->has('email'))
                <div class="mt-1 text-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>

        @if ($contact->message)
            <div class="form-group">
                {!! nl2br($contact->message) !!}
            </div>
        @endif

        <div class="form-group">
            <label for="comment">Комментарии</label>
            <textarea name="comment" id="comment" rows="4" class="form-control">{{ old('comment') ?? $contact->comment }}</textarea>
        </div>

        <div class="row align-items-end mt-4">
            <div class="col-auto">
                <button class="btn btn-primary">Обновить</button>
            </div>
            <div class="col-auto">
                <select name="status" id="status" class="form-control w-auto">
                    @foreach(\App\Models\Contact\Contact::$STATUSES as $key => $status)
                        <option value="{{ $key }}" {{ $contact->status === $key ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

@endsection
