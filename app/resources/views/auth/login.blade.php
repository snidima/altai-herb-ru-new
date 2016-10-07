@extends('layouts/main')

@section('content')
    <div class="enter-wrap">

        <form class="enter" method="POST" action="{{route('getLogin')}}">
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
            {!! csrf_field() !!}
            <div class="enter__row">
                <div class="enter__col">
                    <label>Email:</label>
                </div>
                <div class="enter__col">
                    <input type="email" name="email" id="email" value="{{ old('email') }}" />
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
            <div class="enter__row enter__row_right">
                <div class="shop-filter-checkbox-box">
                    <input type="checkbox" name ="remember" id="sbori"/>
                    <label for="sbori">Запомнить</label>
                </div>
            </div>
            <div class="enter__row">
                <button data-active="true" class="btn-1 btn-medium btn-orange el-fluid">Войти</button>
            </div>
            <div class="enter__row enter__row_center"><a href="">Регистрация</a><a href="">Забыл пароль?</a></div>
        </form>
    </div>
@endsection