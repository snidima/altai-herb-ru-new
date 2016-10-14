// var ProductsTableModel = Backbone.Model.extend({
//     initialize: function(){
//         this.listenTo(this, "change", function(){
//             // console.log(this.toJSON());
//         });
//     }
// });
//
//

//
//
// var SelectedProducts = Backbone.Model.extend({
//
// });



var ProductModel = Backbone.Model.extend({

});

var ProductsCollection = Backbone.Collection.extend({
    model: ProductModel,

    initialize: function(){
        var self = this;

        getProducts().done(function(data){
            _.each(data, function( product ){
                self.add( product );
            });
            console.group('ИНИЦИАЛИЗАЦИЯ ПРОДУКТОВ УСПЕХ');
            console.log(self.toJSON());
            console.groupEnd();
        });

        this.listenTo(this, 'add', function(){
            console.log(this.toJSON());
        });

    }

});


var DefaultValuesModel = Backbone.Model.extend({
    initialize: function(){
        var self = this;

        getDefaultValue().done(function(data){
            self.set( data );
            console.group('ИНИЦИАЛИЗАЦИЯ ДОП.ПАРАМЕТРОВ УСПЕХ');
            console.log(self.toJSON());
            console.groupEnd();
        });

    }
});