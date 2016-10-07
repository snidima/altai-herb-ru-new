<header class="main-header">
    <div class="main-header-left main-header__item">
        <ul class="header-menu-top">
            <li data-active="true" class="header-menu-top__item"><a href="{{route('shop')}}">Магазин</a></li>
            <li class="header-menu-top__item"><a href="{{route('payment')}}">Оплата и доставка</a></li>
            <li class="header-menu-top__item"><a href="{{route('information')}}">Информация</a></li>
            <li class="header-menu-top__item"><a href="{{route('contacts')}}">Контакты</a></li>
        </ul>
        <div class="header-menu-line"></div>
        <ul class="header-menu-bottom">
            <li data-active="true" class="header-menu-bottom__item"><a href="#">Для сердца</a></li>
            <li class="header-menu-bottom__item"><a href="#">Для желудка</a></li>
            <li class="header-menu-bottom__item"><a href="#">Для головы</a></li>
            <li class="header-menu-bottom__item"><a href="#">Для жопы</a></li>
            <li class="header-menu-bottom__item"><a href="#">...</a></li>
        </ul>
    </div>
    <div class="main-header-center main-header__item"><a href="{{route('main')}}"><img src="{{asset('images/logo-big.png')}}" class="main-logo"/></a></div>
    <div class="main-header-right main-header__item">
        <div class="header-right-top">

            @if ( !Auth::check() )
                <a href="{{route('getLogin')}}">Войти</a>
                <span>/</span>
                <a href="{{route('register')}}">регистрация</a>
            @else
                <a href="{{route('profile')}}">{{Auth::user()->name}}, {{Auth::user()->email}}</a>
                <span>/</span>
                <a href="{{route('logout')}}">выйти</a>
            @endif
        </div>
        <div class="header-menu-line-bottom"></div>
        <div class="header-right-bottom"><a href="#" class="header-right-bottom-cart">
                <div class="header-right-bottom-cart__img"><img src="{{asset('images/cart.png')}}"/></div>
                <div class="header-right-bottom-cart__text">0 руб.</div></a></div>
    </div>
</header>