@extends('admin/layouts/material')

@section('content')


    <div id="products-table" class="container"></div>



    <script id="product-edit-tmp" type="text/x-handlebars-template">
        <nav style="margin: 20px 0">
            <div class="nav-wrapper deep-purple lighten-3">
                <div class="col s12">
                    <a href="#products" class="breadcrumb">Товары</a>
                    <span  class="breadcrumb">@{{ product.name }}</span>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col s12 m6">
                <div class="card grey lighten-4">
                    <div class="card-content white-text">
                        <span class="card-title grey-text text-darken-4">Активность товара:</span>
                        <div class="card-content">
                            <div class="switch">
                                <label>
                                    Выкл
                                    <input type="checkbox">
                                    <span class="lever"></span>
                                    Вкл
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card grey lighten-4">
                    <div class="card-content white-text">
                        <span class="card-title grey-text text-darken-4">Название товара:</span>
                        <div class="card-content">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input  id="first_name" type="text" class="validate grey-text text-darken-4" value="@{{ product.name }}">
                                    <label for="first_name" class="grey-text text-lighten-1">Введите название товара</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card grey lighten-4">
                    <div class="card-content white-text">
                        <span class="card-title grey-text text-darken-4">Цена товара:</span>
                        <div class="card-content">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input  id="first_name" type="text" class="validate grey-text text-darken-4" value="@{{ product.price }}">
                                    <label for="first_name" class="grey-text text-lighten-1">Введите цену товара</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card grey lighten-4">
                    <div class="card-content white-text">
                        <span class="card-title grey-text text-darken-4">Изображения</span>
                        <div class="carousel">
                            <a class="carousel-item" href="#one!"><img src="http://lorempixel.com/250/250/nature/1"></a>
                            <a class="carousel-item" href="#two!"><img src="http://lorempixel.com/250/250/nature/2"></a>
                            <a class="carousel-item" href="#three!"><img src="http://lorempixel.com/250/250/nature/3"></a>
                            <a class="carousel-item" href="#four!"><img src="http://lorempixel.com/250/250/nature/4"></a>
                            <a class="carousel-item" href="#five!"><img src="http://lorempixel.com/250/250/nature/5"></a>
                        </div>
                        <div class="switch">
                            <label>
                                Дополнительное
                                <input type="checkbox">
                                <span class="lever"></span>
                                Главное
                            </label>
                        </div>
                    </div>
                    <div class="card-action" style="text-align: right">
                        <a href="#">Добавить новое изображение</a>

                    </div>
                </div>


            </div>

            <div class="col s12 m6">
                <div class="card grey lighten-4">
                    <div class="card-content white-text">
                        <span class="card-title grey-text text-darken-4">Описание товара</span>
                        <div class="card-content">
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="textarea1" class="materialize-textarea grey-text text-darken-4">@{{ product.desc }}</textarea>
                                    <label for="textarea1">Textarea</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card grey lighten-4">
                    <div class="card-content white-text">

                        <span class="card-title grey-text text-darken-4">Категории:</span>
                        <div class="section grey-text text-darken-4">
                            @{{#each product.categories as |category| }}
                                <div class="chip">
                                    <span class="grey-text text-lighten-1">Травы-></span>@{{ category.title }}
                                    <i class="close material-icons">close</i>
                                </div>
                            @{{/each }}
                            <div class="chip  blue lighten-2 white-text">
                                Дабавить
                            </div>
                        </div>
                    </div>
                    <div class="card-action" style="text-align: right">
                        <a href="#">Добавить новую категорию</a>
                    </div>
                </div>
                <div class="card grey lighten-4">
                    <div class="card-content white-text">
                            <span class="card-title grey-text text-darken-4">Характеристики:</span>

                            <div class="divider"></div>
                            <div class="section grey-text text-darken-4">
                                <h6><b>Упаковка</b></h6>
                                <p>
                                @{{#each product.characteristics as |characteristic| }}
                                <div class="chip">
                                    @{{ characteristic.value }}@{{ characteristic.units.unit }}
                                    <i class="close material-icons">close</i>
                                </div>
                                @{{/each }}
                                <div class="chip  blue lighten-2 white-text">
                                    Дабавить
                                </div>
                                </p>
                            </div>

                            <div class="divider"></div>
                            <div class="section grey-text text-darken-4">
                                <h6><b>Оьбем</b></h6>
                                <p>
                                @{{#each product.characteristics as |characteristic| }}
                                <div class="chip">
                                    @{{ characteristic.value }}@{{ characteristic.units.unit }}
                                    <i class="close material-icons">close</i>
                                </div>
                                @{{/each }}
                                <div class="chip  blue lighten-2 white-text">
                                    Дабавить
                                </div>
                                </p>
                            </div>
                    </div>
                    <div class="card-action" style="text-align: right">
                        <a href="#">Добавить новую характеристику</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="" style="text-align: center; margin-top: 30px ">
                <a class="waves-effect waves-light btn-large grey lighten-1"><i class="material-icons left">not_interested</i>Отмена</a>
                <a class="waves-effect waves-light btn-large"><i class="material-icons left">done</i>Сохранить</a>
            </div>
        </div>
    </script>

    <script id="products-table-2-tmp" type="text/x-handlebars-template">


        <table class="bordered striped highlight responsive-table">
            <thead>
            <tr>
                {{--<th data-field="id">ID</th>--}}
                {{--<th data-field="id">Активность</th>--}}
                {{--<th data-field="id">Активность</th>--}}
                <th data-field="name">Цена</th>
                <th data-field="price">Название</th>
                {{--<th data-field="price">Категории</th>--}}
                {{--<th data-field="price">Характеристики</th>--}}
                <th data-field="price">Действия</th>
            </tr>
            </thead>
            <tbody>
            @{{#products as |product|}}
            <tr>
                {{--<td><b>@{{product.id}}</b></td>--}}
                {{--<td>--}}
                {{--<p>--}}
                {{--<input type="checkbox" class="filled-in" id="product-check-@{{product.id}}" />--}}
                {{--<label for="product-check-@{{product.id}}"></label>--}}
                {{--</p>--}}
                {{--</td>--}}
                {{--<td>--}}
                {{--<div class="switch ">--}}
                {{--<label>--}}
                {{--<input type="checkbox" checked>--}}
                {{--<span class="lever"></span>--}}
                {{--</label>--}}
                {{--</div>--}}
                {{--</td>--}}
                <td><b>@{{product.name}}</b></td>
                <td>@{{product.price}}</td>
                {{--<td>--}}
                {{--@{{#product.categories as |category|}}--}}
                {{--<div class="chip">--}}
                {{--@{{category.title}}--}}
                {{--<i class="close material-icons">close</i>--}}
                {{--</div>--}}
                {{--@{{/product.categories}}--}}
                {{--</td>--}}
                {{--<td>--}}
                {{--@{{#product.characteristics as |characteristic|}}--}}
                {{--<div class="chip">--}}
                {{--@{{ characteristic.value }}@{{ characteristic.units.unit }}.--}}
                {{--<i class="close material-icons">close</i>--}}
                {{--</div>--}}
                {{--@{{/product.characteristics}}--}}
                {{--</td>--}}
                <td>
                    <span class='waves-effect waves-light btn blue lighten-2 edit-product' data-id="@{{product.id}}">
                        <i class="material-icons ">settings</i>
                    </span>
                </td>
            </tr>
            @{{/products}}
            </tbody>
        </table>


        <div style="text-align: right; padding-top: 15px">
            <a class="modal-trigger waves-effect waves-light btn modal-trigger deep-orange accent-3" href="#modal1">
                <i class="material-icons left">add</i>
                Добавить новый товар
            </a>
        </div>

    </script>

    <script>

    </script>
@endsection