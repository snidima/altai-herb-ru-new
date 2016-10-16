@extends('admin/layouts/material')

@section('content')


    <div id="products-table" class="container"></div>



    <script id="product-edit-tmp" type="text/x-handlebars-template">
        <h1>@{{ product.name }}</h1>
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
        <h2>Товары</h2>
        <div class="row">
            @{{#products as |product|}}
            <div class="col s12 m6 l3">
                <div class="card large">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="http://prodgid.ru/wp-content/uploads/2014/12/%D0%9C%D1%8F%D1%82%D0%B0-%D0%BF%D0%B5%D1%80%D0%B5%D1%87%D0%BD%D0%B0%D1%8F-2.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">
                            @{{ product.name }}
                            {{--<i class="material-icons right">more_vert</i>--}}
                        </span>
                        <p><a href="#">Открыть на сайте</a></p>
                        <p class="grey-text" style="font-size: .8rem;">@{{ product.desc }}</p>

                    </div>
                    <div class="card-action">
                       <div style="display: flex; align-items: center; justify-content: space-between">
                            <a href="#product/@{{ product.id }}">Редактировать</a>
                            <a class="red-text" href="#product/@{{ product.id }}">Удалить</a>
                       </div>

                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><b>@{{ product.name }}</b><i class="material-icons right">close</i></span>
                        <blockquote>
                                    <h6><u>Описание</u></h6>
                                    @{{ product.desc }}
                        </blockquote>
                        <blockquote>
                            <h6><u>Цена</u></h6>
                            @{{ product.price }} руб.
                        </blockquote>
                    </div>

                </div>
            </div>
            @{{/products}}
        </div>


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