@extends('admin/layouts/main')

@section('content')

<div class="container">
    <h2 class="text-right" style="padding: 30px 0;">Товары</h2>
</div>

<div id="products-table" class="container" ></div>

   <script id="products-table-2-tmp" type="text/x-handlebars-template">
       <table class="table table-hover">
           <thead class="thead-inverse">
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

           @{{#eachkeys products}}
               <tr class="product-row" data-id="@{{this.value.id}}">
                   <th scope="row">@{{this.value.id}}</th>
                   <th scope="row">@{{this.value.price}}</th>
                   <th scope="row">@{{this.value.name}}</th>
                 <td>
                       @{{#eachkeys this.value.categories}}
                           <span class="tag tag-default">@{{this.value.title}} <span class="tag tag-danger" data-toggle="modal" data-target=".del-cat-modal-@{{this.value.id}}"><i class="fa fa-times" aria-hidden="true"></i></span></span>
                         <div class="modal fade del-cat-modal-@{{this.value.id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                             <div class="modal-dialog modal-sm">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                         </button>
                                         <h5 class="modal-title">@{{this.value.id}}: @{{this.value.title}}</h5>
                                     </div>
                                     <div class="modal-body">
                                         <select class="form-control">
                                             <option>Large select</option>
                                             <option>Large select</option>
                                             <option>Large select</option>
                                             <option>Large select</option>
                                             <option>Large select</option>
                                             <option>Large select</option>
                                             <option>Large select</option>
                                         </select>
                                     </div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                         <button type="button" class="btn btn-danger">Удалить</button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     @{{/eachkeys}}
                       <span class="tag tag-success"  data-toggle="modal" data-target=".add-cat-modal-@{{this.value.id}}"><i class="fa fa-plus" aria-hidden="true"></i></span>
                         <div class="modal fade add-cat-modal-@{{this.value.id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                             <div class="modal-dialog modal-md">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                         </button>
                                         <h5 class="modal-title ">Добавить категорию для @{{this.value.name}}</h5>
                                     </div>
                                     <div class="modal-body">
                                         <select class="form-control">
                                             <option>Large select</option>
                                             <option>Large select</option>
                                             <option>Large select</option>
                                             <option>Large select</option>
                                             <option>Large select</option>
                                             <option>Large select</option>
                                             <option>Large select</option>
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
                       <span class="tag tag-success"><i class="fa fa-plus" aria-hidden="true"></i></span>
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
                               <a class="dropdown-item text-danger" href="#"><i class="fa fa-times" aria-hidden="true"></i> Удалить</a>
                           </div>
                       </div>
                   </td>
               </tr>
           @{{/eachkeys}}
           </tbody>
       </table>
       <hr>
       <div class="pull-right">
           <button type="button" class="btn btn-success">
               <i class="fa fa-plus" aria-hidden="true"></i> Додбавить новый товар
           </button>
       </div>



   </script>








@endsection


























