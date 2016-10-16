var ProductsTableView = Backbone.View.extend({

    el: '#products-table',
    template: $('#products-table-2-tmp').html(),

    events: {
        // "click .product-row:not(.table-active)": "addProduct",
        // "click .product-row.table-active": "delProduct",
        // "click .product-row.table-active": "delProduct",
        "click #add-new-product-btn": "addProduct",
        "click #del-product-btn": "delProduct",
    },



    selectProduct: function(e){
        if ( $(e.target)[0].nodeName != 'TD' ) return;
        var id = $(e.currentTarget).attr('data-id');
        $(e.currentTarget).addClass('table-active');
        var cur = selectedProducts.get('ids');
        if ( cur === undefined ) cur = [];
        cur.push(id);
        selectedProducts.set({
            ids: cur
        });
    },
    unselectProduct: function (e) {
        if ( $(e.target)[0].nodeName != 'TD' ) return;
        var id = $(e.currentTarget).attr('data-id');
        $(e.currentTarget).removeClass('table-active');
        var cur = selectedProducts.get('ids');
        cur = _.without(cur, id);
        selectedProducts.set({
            ids: cur
        });
    },

    addProduct: function(){
        var data = $( '#add-new-product-form' ).serializeObject();
        this.products.add(data);
        saveProduct(data).done(function(r){
            console.log(r)
        });
    },

    delProduct: function(e){
        var id = $(e.target).parents('.product-row').attr('data-id');
        this.products.remove(id);
        delProduct( id ).done(function(r){
            console.log(r);
        });
    },

    initialize: function(models) {
        _.bindAll(this, 'render');
        this.products = models.products;
        this.default = models.default;
        this.errors = models.errors;
        this.products.on('all', this.render);
        this.default.on('all', this.render);
        this.errors.on('all', this.render);
    },

    render: function() {
        var rendered = Handlebars.compile(this.template);
        this.$el.html( rendered({
            products: this.products.toJSON(),
            defaults: this.default.toJSON(),
            messages: this.errors.toJSON(),
        }) );
        return this;
    }

});