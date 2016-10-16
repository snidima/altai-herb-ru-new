var ProductsTableView = Backbone.View.extend({

    el: '#products-table',
    template: $('#products-table-2-tmp').html(),

    events: {
        "click #add-new-product-btn": "addProduct",
        "click .edit-product": "editProduct",
    },

    editProduct: function(e){
        id = $(e.currentTarget).attr('data-id');
        workspace.navigate(`product/${id}`, {trigger: true});
    },

    addProduct: function(){
        var data = $( '#add-new-product-form' ).serializeObject();
        this.products.add(data);
        saveProduct(data).done(function(r){
            console.log(r)
        });
    },



    initialize: function(models) {
        _.bindAll(this, 'render');
        this.products = models.products;
        this.products.on('all', this.render);
        this.render();
    },

    render: function() {
        var rendered = Handlebars.compile(this.template);
        this.$el.html( rendered({
            products: this.products.toJSON(),
        }) );
        return this;
    }

});



var ProductView = Backbone.View.extend({

    el: '#products-table',
    template: $('#product-edit-tmp').html(),

    events: {

    },



    initialize: function(data) {
        this.id = data.id;
        this.product = data.product;
        this.render();
        $(document).ready(function(){
            $('.carousel').carousel({
                no_wrap: true
            });
        });
    },

    render: function() {
        var rendered = Handlebars.compile(this.template);
        this.$el.html( rendered({
            id: this.id,
            product: this.product.toJSON()
        }) );
        return this;
    }

});