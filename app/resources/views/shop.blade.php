@extends('layouts/shop')

@section('content')
    @foreach ($products as $product)
        <div class="shop-herb__wrap">
            <div class="shop-herb">
                <div class="shop-herb__title">{{$product->name}}</div>
                <div style="background-image: url(http://prodgid.ru/wp-content/uploads/2014/12/%D0%9C%D1%8F%D1%82%D0%B0-%D0%BF%D0%B5%D1%80%D0%B5%D1%87%D0%BD%D0%B0%D1%8F-2.jpg)" class="shop-herb__image"><img title="ete" src="http://prodgid.ru/wp-content/uploads/2014/12/%D0%9C%D1%8F%D1%82%D0%B0-%D0%BF%D0%B5%D1%80%D0%B5%D1%87%D0%BD%D0%B0%D1%8F-2.jpg"/>
                    <div class="shop-herb-tegs">
                        <div class="shop-herb-teg-wrap">
                            <div class="shop-herb-teg">Для мозгов, но тебе уже поздно</div>
                        </div>
                        <div class="shop-herb-teg-wrap">
                            <div class="shop-herb-teg">Для жопы</div>
                        </div>
                        <div class="shop-herb-teg-wrap">
                            <div class="shop-herb-teg">Чтоб хуй стоял</div>
                        </div>
                    </div>
                </div>
                <div class="shop-herb__description">
                    {{ str_limit($product->desc, $limit = 150, $end = '...') }}
                    <a href="#">Читать далее...</a>
                </div>
                <div class="shop-herb__line">
                    <div class="shop-herb-weight">
                        <div class="shop-filter-select-box el-fluid">
                            <select class="el-fluid">
                                <option>150 гр</option>
                                <option>250 гр</option>
                                <option>500 гр</option>
                                <option>1 кг</option>
                                <option>2 кг</option>
                                <option>5 кг</option>
                            </select>
                        </div>
                    </div>
                    <div class="shop-herb-one-click">
                        <button data-active="true" class="btn-1 btn-medium btn-orange el-fluid">купить</button>
                    </div>
                </div>
                <div class="shop-herb__line">
                    <div class="shop-herb-add">
                        <button data-active="true" class="btn-1 btn-medium btn-trans el-fluid">в корзину</button>
                    </div>
                    <div class="shop-herb-price">
                        <div class="shop-herb__price-old">175 руб.</div>
                        <div class="shop-herb__price-new">{{ $product->price }} руб.</div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection