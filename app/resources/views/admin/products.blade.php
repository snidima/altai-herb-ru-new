@extends('admin/layouts/main')

@section('content')

<div class="container">
    <h2 class="text-right" style="padding: 30px 0;">Товары <button type="button" class="btn btn-primary" id="refreshProducts"><i class="fa fa-refresh" aria-hidden="true"></i></button></h2>
</div>

<div id="products-table" class="container" ></div>

   <script id="products-table-2-tmp" type="text/x-handlebars-template">




       @{{#messages}}
       <div class="alert alert-warning alert-dismissible fade in" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
           <strong>@{{title}}</strong><br>@{{msg}}
       </div>
       @{{/messages}}

       <table class="table table-striped table-hover">
           <thead>
           <tr>
               <th>ID</th>
               <th>Цена</th>
               <th>Название</th>
               <th>Категории</th>
               <th>Характеристики</th>
               <th>Действия</th>
           </tr>
           </thead>
           <tbody>

           @{{#products as |product|}}

               <tr class="product-row" data-id="@{{this.value.id}}">
                   <th scope="row">@{{product.id}}</th>
                   <th scope="row">@{{product.price}}</th>
                   <th scope="row">@{{product.name}}</th>
                 <td>
                     <h4>
                         @{{#product.categories as |category|}}


                           <span class="label label-default">
                               @{{category.title}}
                               <span class="label label-danger" data-toggle="modal" data-target=".del-cat-modal-@{{category.id}}">
                                   <i class="fa fa-times" aria-hidden="true"></i>
                               </span>
                           </span>&nbsp;

                         <div class="modal fade del-cat-modal-@{{category.id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                             <div class="modal-dialog modal-sm">
                                 <div class="modal-content">
                                     <div class="modal-body">
                                         Удалить категорию <p><b>@{{category.title}}</b>?</p>
                                     </div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                         <button type="button" class="btn btn-danger" data-cat-id="@{{category.id}}" data-prod-id="@{{category.id}}">Удалить</button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                        @{{/product.categories}}
                     </h4>
                     <h4>
                       <span class="label label-success"  data-toggle="modal" data-target=".add-cat-modal-@{{product.id}}">
                           <i class="fa fa-plus" aria-hidden="true"></i>
                       </span>
                     </h4>
                         <div class="modal fade add-cat-modal-@{{product.id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                             <div class="modal-dialog modal-md">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                         </button>
                                         <h5 class="modal-title ">Добавить категорию для <b>@{{product.name}}</b></h5>
                                     </div>
                                     <div class="modal-body">
                                         <select class="selectpicker" multiple >
                                             @{{#each ../defaults.cats }}
                                                <option value="">@{{ title }}</option>
                                             @{{/each}}
                                         </select>
                                     </div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                         <button type="button" class="btn btn-success">Сохранить</button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                 </td>
                   <td>
                       @{{#eachkeys this.value.characteristics}}
                           <span class="tag tag-default">
                              @{{this.value.value}}@{{this.value.units.unit}}. <span class="tag tag-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                           </span>
                       @{{/eachkeys}}
                       <span class="label label-success"><i class="fa fa-plus" aria-hidden="true"></i></span>
                   </td>
                   <td>
                       <div class="btn-group">
                           <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               . . .
                           </button>
                           <div class="dropdown-menu small">
                               <a class="dropdown-item " href="#"><i class="fa fa-pencil" aria-hidden="true"></i> Редактировать</a>
                               <a class="dropdown-item disabled" href="#"><i class="fa fa-toggle-on text-primary" aria-hidden="true"></i> Отключить</a>
                               <div class="dropdown-divider"></div>
                               <a class="dropdown-item text-danger" href="#"  id="del-product-btn"><i class="fa fa-times" aria-hidden="true" ></i> Удалить</a>
                           </div>
                       </div>
                   </td>
               </tr>
           @{{/products}}
           </tbody>
       </table>
       <hr>
       <div class="pull-right">
           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-product-modal">
               <i class="fa fa-plus" aria-hidden="true"></i> Додбавить новый товар
           </button>
           <div class="modal fade " id="add-product-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-md">
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                           <h5 class="modal-title ">Добавить категорию для @{{this.value.name}}</h5>
                       </div>
                       <div class="modal-body">
                           <form id="add-new-product-form">
                               <div class="form-group row">
                                   <label for="name" class="col-sm-4 col-form-label">Название товара</label>
                                   <div class="col-sm-8">
                                       <input type="text" class="form-control" id="name" name="name" placeholder="Название">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="price" class="col-sm-4 col-form-label">Цена</label>
                                   <div class="col-sm-8">
                                       <input type="text" class="form-control" name="price" id="price" placeholder="Цена">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="desc" class="col-sm-4 col-form-label">Описание</label>
                                   <div class="col-sm-8">
                                       <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="characteristics" class="col-sm-4 col-form-label">Характеристики</label>
                                   <div class="col-sm-8">
                                       <select name="characteristics[]" id="characteristics" multiple class="form-control">
                                           @{{#eachkeys defaults.characteristics}}
                                                <option value="@{{this.value.id}}">@{{this.value.value}}@{{this.value.units.unit}}.</option>
                                           @{{/eachkeys}}
                                       </select>
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="characteristics" class="col-sm-4 col-form-label">Категории</label>
                                   <div class="col-sm-8">
                                       <select name="categories[]" id="characteristics" multiple class="form-control">
                                           @{{#eachkeys defaults.cats}}
                                            <option value="@{{this.value.id}}">@{{this.value.title}}</option>
                                           @{{/eachkeys}}
                                       </select>
                                   </div>
                               </div>
                           </form>

                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                           <button type="button" class="btn btn-success" id="add-new-product-btn">Сохранить</button>
                       </div>
                   </div>
               </div>
           </div>
       </div>



   </script>








@endsection


























