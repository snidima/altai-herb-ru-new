<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <title>title</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&amp;subset=cyrillic-ext" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700&amp;subset=cyrillic-ext" rel="stylesheet"/>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
</head>
<body>
<div class="main-header-shop">
    @include('blocks/header')
</div>
<div class="shop-content">
    <div class="container">
        <h1 class="h1-shop">Лечебные травы и сборы</h1>

        <div class="shop-category-herbs">
            <div class="shop-category-wrap">
                <div data-active="false" class="shop-category">
                    <div class="shop-category__title">КАТЕГОРИИ</div>
                    <div class="shop-category-items">
                        @include('categories')
                    </div>
                </div>
                <div class="shop-category">
                    <div class="shop-category__title">ПО АЛФАВИТУ</div>
                    <div class="shop-category-alphabet-items">
                        <div class="shop-category-alphabet__item"><a href="">А</a></div>
                        <div data-active="true" class="shop-category-alphabet__item"><a href="">Б</a></div>
                        <div class="shop-category-alphabet__item"><a href="">В</a></div>
                        <div class="shop-category-alphabet__item"><a href="">Г</a></div>
                        <div class="shop-category-alphabet__item"><a href="">д</a></div>
                        <div class="shop-category-alphabet__item"><a href="">е</a></div>
                        <div class="shop-category-alphabet__item"><a href="">ё</a></div>
                        <div data-none="true" class="shop-category-alphabet__item"><a href="">ж</a></div>
                        <div class="shop-category-alphabet__item"><a href="">з</a></div>
                        <div class="shop-category-alphabet__item"><a href="">и</a></div>
                        <div class="shop-category-alphabet__item"><a href="">й</a></div>
                        <div class="shop-category-alphabet__item"><a href="">к</a></div>
                        <div class="shop-category-alphabet__item"><a href="">л</a></div>
                        <div data-none="true" class="shop-category-alphabet__item"><a href="">м</a></div>
                        <div class="shop-category-alphabet__item"><a href="">н</a></div>
                        <div class="shop-category-alphabet__item"><a href="">о</a></div>
                        <div class="shop-category-alphabet__item"><a href="">п</a></div>
                        <div class="shop-category-alphabet__item"><a href="">р</a></div>
                        <div class="shop-category-alphabet__item"><a href="">с</a></div>
                        <div class="shop-category-alphabet__item"><a href="">т</a></div>
                        <div data-none="true" class="shop-category-alphabet__item"><a href="#">у</a></div>
                        <div class="shop-category-alphabet__item"><a href="">Ф</a></div>
                        <div class="shop-category-alphabet__item"><a href="">Х</a></div>
                        <div class="shop-category-alphabet__item"><a href="">ц</a></div>
                        <div class="shop-category-alphabet__item"><a href="">ч</a></div>
                        <div data-none="true" class="shop-category-alphabet__item"><a href="">ш</a></div>
                        <div class="shop-category-alphabet__item"><a href="">щ</a></div>
                        <div class="shop-category-alphabet__item"><a href="">э</a></div>
                        <div class="shop-category-alphabet__item"><a href="">ю</a></div>
                        <div class="shop-category-alphabet__item"><a href="">я</a></div>
                    </div>
                </div>
            </div>
            <div class="shop-herbs-wrap">
                <div class="shop-filter">
                    <div class="shop-filter__item shop-filter-select-box">
                        <label for="sort">Сортировать по</label>
                        <select name="" id="sort">
                            <option>Алфавиту (вниз)</option>
                            <option>Алфавиту (вверх)</option>
                            <option>Цене (вниз)</option>
                            <option>Цене (вверх)</option>
                        </select>
                    </div>
                    <div class="shop-filter__item shop-filter-select-box">
                        <label for="effects">Выводить по</label>
                        <select name="" id="effects">
                            <option>25</option>
                            <option>50</option>
                            <option>100</option>
                            <option>все</option>
                        </select>
                    </div>
                    <div class="shop-filter__item shop-filter-checkbox-box">
                        <input type="checkbox" id="sbori"/>
                        <label for="sbori">Только в наличии</label>
                    </div>
                    <!--.shop-filter__item.shop-filter-checkbox-box-->
                    <!--    input(type="checkbox", id="action")-->
                    <!--    label(for="action") Только со скидкой-->
                    <div class="shop-filter__item">
                        <button data-active="true" class="btn-1 btn-medium btn-orange">принять</button>
                    </div>
                </div>
                <div class="shop-pages">
                    <div class="shop-pages__item"><a href="#">1</a></div>
                    <div class="shop-pages__item"><a href="#">2</a></div>
                    <div data-active="true" class="shop-pages__item"><a href="#">3</a></div>
                    <div class="shop-pages__item"><span>...</span></div>
                    <div class="shop-pages__item"><a href="#">8</a></div>
                    <div class="shop-pages__item"><a href="#">9</a></div>
                    <div class="shop-pages__item"><a href="#">10</a></div>
                </div>
                <div class="shop-herbs">
                    @yield('content')
                </div>
                <div class="shop-pages">
                    <div class="shop-pages__item"><a href="#">1</a></div>
                    <div class="shop-pages__item"><a href="#">></a></div>
                    <div data-active="true" class="shop-pages__item"><a href="#">39</a></div>
                    <div class="shop-pages__item"><a href="#">40</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer></footer>
</body>
</html>