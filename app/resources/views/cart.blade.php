@extends('layouts/static')

@section('content')

    <h1 class="h1-shop">Корзина</h1>



    <div id="cart">

        <script id="cart-table-tmp" type="x-tmpl-mustache">
            <h2 class="cart-step-title">
                Шаг 1 из 3. Редактирование корзины
                <span class="btn-1 btn-medium btn-orange" style="display: inline-block" onclick="workspace.navigate('customer', {trigger: true});">
                    Далее
                </span>
            </h2>
            <div class="cart-table">
                <div class="cart-table__product cart-table__product_titles">
                    <div class="cart-table-product__image">Изображение</div>
                    <div class="cart-table-product__title">Название</div>
                    <div class="cart-table-product__weigth">Упаковка</div>
                    <div class="cart-table-product__count">Количество</div>
                    <div class="cart-table-product__price">Цена</div>
                    <div class="cart-table-product__sum">Сумма</div>
                </div>
                @{{#products}}
                    <div class="cart-table__product">
                        <div class="cart-table-product__image">
                            <div style="background-image: url(http://prodgid.ru/wp-content/uploads/2014/12/%D0%9C%D1%8F%D1%82%D0%B0-%D0%BF%D0%B5%D1%80%D0%B5%D1%87%D0%BD%D0%B0%D1%8F-2.jpg)">
                                <img title="ete" src="http://prodgid.ru/wp-content/uploads/2014/12/%D0%9C%D1%8F%D1%82%D0%B0-%D0%BF%D0%B5%D1%80%D0%B5%D1%87%D0%BD%D0%B0%D1%8F-2.jpg">
                            </div>
                        </div>
                        <div class="cart-table-product__title">
                            <div>@{{title}}</div>
                            <a href="#">Открыть страницу товара</a>
                        </div>
                        <div class="cart-table-product__weigth">
                            <div class="shop-filter-select-box el-fluid">
                                <select class="el-fluid">
                                    <option>150</option>
                                    <option>2000</option>
                                    <option>10000</option>
                                </select>
                            </div>
                        </div>
                        <div class="cart-table-product__count">
                            <input type="text" value="1"/>
                        </div>
                        <div class="cart-table-product__price">@{{price}} руб.</div>
                        <div class="cart-table-product__sum">@{{sum}} руб</div>
                    </div>
                @{{/products}}
            </div>
        </script>

        <script id="cart-customer-tmp" type="x-tmpl-mustache">
            <h2 class="cart-step-title">
                Шаг 2 из 3. Оплата и доставка
                <span class="btn-1 btn-medium btn-orange" style="display: inline-block" onclick="workspace.navigate('', {trigger: true});">
                    Назад
                </span>
                <span class="btn-1 btn-medium btn-orange" style="display: inline-block" onclick="workspace.navigate('check', {trigger: true});">
                    Далее
                </span>
            </h2>
            <div class="cart-table">

                <div class="cart-customer">
                    <div class="cart-customer__row">
                         <div class="cart-customer__col"><label for="">Ваше имя</label></div>
                         <div class="cart-customer__col"><input type="text" /></div>
                    </div>
                    <div class="cart-customer__row">
                         <div class="cart-customer__col"><label for="">Ваше фамилия</label></div>
                         <div class="cart-customer__col"><input type="text" /></div>
                    </div>
                    <div class="cart-customer__row">
                         <div class="cart-customer__col"><label for="">Номер телефона</label></div>
                         <div class="cart-customer__col"><input type="text" /></div>
                    </div>
                    <div class="cart-customer__row">
                         <div class="cart-customer__col"><label for="">Email</label></div>
                         <div class="cart-customer__col"><input type="text" /></div>
                    </div>
                </div>

            </div>
        </script>

        <script id="cart-check-tmp" type="x-tmpl-mustache">
            <h2 class="cart-step-title">
                Шаг 3 из 3. Проверка заказа
                <span class="btn-1 btn-medium btn-orange" style="display: inline-block" onclick="workspace.navigate('customer', {trigger: true});">
                    Назад
                </span>
            </h2>
            <div class="cart-table">
                Проверкад анных корзины
            </div>
        </script>

    </div>
    


@endsection