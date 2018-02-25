@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Главная</a>
            @else
                <a href="{{ route('login') }}">Войти</a>
                <a href="{{ route('register') }}">Регистрация</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <h2>Калькулятор для расчёта стоимости продуктов и деталей.</h2>
    </div>
</div>
@endsection