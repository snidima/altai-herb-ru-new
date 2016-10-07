@extends('layouts/main')

@section('content')
    <div class="enter-wrap">
        <form class="enter" method="POST" action="{{route('register')}}">
            {!! csrf_field() !!}
            <div class="enter__row">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="enter__row">
                <div class="enter__col">
                    <label>Имя:</label>
                </div>
                <div class="enter__col">
                    <input type="text" name="name" value="{{ old('name') }}" />
                </div>
            </div>
            <div class="enter__row">
                <div class="enter__col">
                    <label>Email:</label>
                </div>
                <div class="enter__col">
                    <input type="email" name="email" value="{{ old('email') }}"/>
                </div>
            </div>
            <div class="enter__row">
                <div class="enter__col">
                    <label>Пароль:</label>
                </div>
                <div class="enter__col">
                    <input type="password" name="password"/>
                </div>
            </div>
            <div class="enter__row">
                <div class="enter__col">
                    <label for="password_confirmation">Парольx2:</label>
                </div>
                <div class="enter__col">
                    <input type="password" name="password_confirmation" id="password_confirmation"/>
                </div>
            </div>

            <div class="enter__row">
                <button data-active="true" class="btn-1 btn-medium btn-orange el-fluid">регистрация</button>
            </div>
        </form>
    </div>
@endsection