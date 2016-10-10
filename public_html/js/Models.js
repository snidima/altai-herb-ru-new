var CartProduct = Backbone.Model.extend({
    validate: function( data ) {
        if ( Number( data.id ) <= 0 ) {
            return 'Не корректный id.';
        }
    }
});

var CartProducts = Backbone.Collection.extend({

    exportToView: function(){
        return this.toJSON();
    },

    initialize: function(){

        this.on("add reset", function(){
            localStorage.setItem("cartProds", JSON.stringify(this.toJSON()))
        });

        this.on("add reset", function(){
            $('.add-to-cart').each(function(i, el){
                var curID = $(el).attr('data-id');
                var curProducts = cartProducts.pluck( 'id' );
                if ( !_.include(curProducts, curID) ){

                    $(el).attr('data-active', 'true')

                    $(el).click(function(){

                        var price = $(this).attr('data-price');
                        var id = $(this).attr('data-id');
                        var image = $(this).attr('data-image');
                        var title = $(this).attr('data-title');

                        var cartProduct = new CartProduct;
                        cartProduct.set({
                            id: id,
                            price: price,
                            image: image,
                            count: 1,
                            title: title,
                            sum: price
                        });

                        if ( !cartProduct.isValid() ) {
                            return false;
                        }

                        cartProducts.add(cartProduct);
                        $(this).attr('data-active', 'false')
                    });
                } else {
                    $(el).attr('data-active', 'false')
                }
            });
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





var CartCustomer = Backbone.Model.extend({
    defaults: function(){
        return {
            name: '',
            surname: '',
            telephone: '',
            email: '',
            region: '',
            city: '',
            street: '',
            building: '',
            apartment: '',
            next: false
        }
    },

    initialize: function(){
        this.on('change', function(){
            console.log( this.toJSON() );
            localStorage.setItem("cartCustomer", JSON.stringify(this.toJSON()));
            var data = this.toJSON();
            if ( data.name != '' && data.surname != '' && data.email != '' && data.telephone != '' ){
                this.set({next: true})
            } else {
                this.set({next: false})
            }
        });
    },
});

