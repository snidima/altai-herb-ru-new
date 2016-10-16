
@extends('admin/layouts/material')

@section('content')

    <div class="container">
        <h1>Товары</h1>
    </div>
    <div id="products-table" class="container"></div>




    <script id="products-table-2-tmp" type="text/x-handlebars-template">

        <table class="bordered striped highlight responsive-table">
            <thead>
                <tr>
                    {{--<th data-field="id">ID</th>--}}
                    <th data-field="id">Активность</th>
                    <th data-field="name">Цена</th>
                    <th data-field="price">Название</th>
                    <th data-field="price">Категории</th>
                    <th data-field="price">Характеристики</th>
                    <th data-field="price">Действия</th>
                </tr>
            </thead>
            <tbody>
            @{{#products as |product|}}
            <tr>
                {{--<td><b>@{{product.id}}</b></td>--}}
                <td>
                    <div class="switch ">
                        <label>
                            <input type="checkbox" checked>
                            <span class="lever"></span>
                        </label>
                    </div>
                </td>
                <td>@{{product.price}}</td>
                <td>@{{product.name}}</td>
                <td>
                    @{{#product.categories as |category|}}
                        <div class="chip">
                            @{{category.title}}
                            <i class="close material-icons">close</i>
                        </div>
                    @{{/product.categories}}
                </td>
                <td>
                    @{{#product.characteristics as |characteristic|}}
                        <div class="chip">
                            @{{ characteristic.value }}@{{ characteristic.units.unit }}.
                            <i class="close material-icons">close</i>
                        </div>
                    @{{/product.characteristics}}
                </td>
                <td>
                    <!-- Dropdown Trigger -->
                    <a class='dropdown-button waves-effect waves-light btn blue lighten-2' href='#' data-activates='dropdown1' data-constrainwidth="false">
                        <i class="material-icons ">reorder</i>
                    </a>

                    <!-- Dropdown Structure -->
                    <ul id='dropdown1' class='dropdown-content z-depth-4'>
                        <li><span class="grey-text text-darken-2">Редактировать</span></li>
                        <li><span class="grey-text text-darken-2">Открыть на сайте</span></li>
                        <li class="divider"></li>
                        <li><span class="red-text">Удалить</span></li>
                    </ul>
                </td>
            </tr>
    @{{/products}}
            </tbody>
        </table>
        <!-- Modal Trigger -->
        <div style="text-align: right; padding-top: 15px">
        <a class="modal-trigger waves-effect waves-light btn modal-trigger deep-orange accent-3" href="#modal1">Добавить новый товар</a>
        </div>
        <!-- Modal Structure -->
        <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Modal Header</h4>
                <p>A bunch of text</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
            </div>
        </div>
</script>

    <script>
        $('.modal-trigger').leanModal({
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    in_duration: 300, // Transition in duration
                    out_duration: 200, // Transition out duration
                    starting_top: '4%', // Starting top style attribute
                    ending_top: '10%', // Ending top style attribute
                }
        );
    </script>
@endsection