var CartProduct = Backbone.Model.extend({
    validate: function( data ) {
        if ( Number( data.id ) <= 0 ) {
            return 'Не корректный id.';
        }
    }
});

var CartProducts = Backbone.Collection.extend({
    initialize: function(){
        this.on("add reset", function(){
            localStorage.setItem("cartProds", JSON.stringify(this.toJSON()))
        });

    }
});

var CartSum = Backbone.Model.extend({

    initialize: function(){
        this.listenTo(cartProducts, 'add reset', this.updateCartSum);
    },

    updateCartSum: function(){
        var pricies = cartProducts.pluck('price');
        var sum = _.reduce(pricies, function(memo, num){ return memo + Number(num); }, 0);
        this.set({sum: sum});
    }
});