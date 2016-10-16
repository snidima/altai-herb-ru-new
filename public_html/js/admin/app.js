var Workspace = Backbone.Router.extend({

    routes: {
        ""       :         "products",
        "product/:id":   "product",
        "products":        "products",
    },

    product: function(id) {

        getProduct(id).done(function(r){
            var product = new ProductModel;
            product.set(r);
            var productView = new ProductView({
                id:id,
                product: product
            });
            console.log(product.toJSON());
        });


    },
    products: function() {
        // productsTableView.render();
        var products = new ProductsCollection;

        getProducts()
            .done(function(r){
                _.each(r.data, function( product ){
                    products.add( product );
                });
                console.group('ИНИЦИАЛИЗАЦИЯ ПРОДУКТОВ УСПЕХ');
                console.log(products.toJSON());
                console.groupEnd();

                var productsTableView = new ProductsTableView({
                    products: products
                });

            });


    },



});












// var product = new ProductModel;
// var products = new ProductsCollection;
// var defaultValues = new DefaultValuesModel;
// var messagesCollection = new MessagesCollection;








var workspace = new Workspace;
Backbone.history.start();









