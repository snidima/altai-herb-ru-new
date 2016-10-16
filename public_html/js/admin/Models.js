var ProductModel = Backbone.Model.extend({

});

var ProductsCollection = Backbone.Collection.extend({
    model: ProductModel,

    initialize: function(){
        var self = this;



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