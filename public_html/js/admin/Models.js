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

        getProducts()
            .done(function(r){
                _.each(r.data, function( product ){
                    self.add( product );
                });
                console.group('ИНИЦИАЛИЗАЦИЯ ПРОДУКТОВ УСПЕХ');
                console.log(self.toJSON());
                console.groupEnd();

            })
            .fail(function(r){
                messagesCollection.add( r.responseJSON.errors );
                // setTimeout(function(){
                //     messagesCollection.reset();
                // }, 1000);
            });

        this.listenTo(this, 'add', function(){
            console.log(this.toJSON());
        });

    }

});

var MessagesCollection = Backbone.Collection.extend({
    initialize: function(){
        this.on('add', function(e,data){
            console.warn(data);
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