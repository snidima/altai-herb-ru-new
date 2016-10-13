Handlebars.registerHelper('eachkeys', function(context, options) {
    var fn = options.fn, inverse = options.inverse;
    var ret = "";

    var empty = true;
    for (key in context) { empty = false; break; }

    if (!empty) {
        for (key in context) {
            ret = ret + fn({ 'key': key, 'value': context[key]});
        }
    } else {
        ret = inverse(this);
    }
    return ret;
});








var ProductsTableModel = Backbone.Model.extend({
    initialize: function(){
        this.listenTo(this, "change", function(){
            console.log(this.toJSON());
        });
    }
});



var DefaultValues = Backbone.Model.extend({
    initialize: function(){
        this.listenTo(this, "change", function(){
            console.log(this.toJSON());
        });
    }
});




var SelectedProducts = Backbone.Model.extend({

});



var ProductsTableView = Backbone.View.extend({

    el: '#products-table',
    template: $('#products-table-2-tmp').html(),

    events: {
        "click .product-row:not(.table-active)": "addProduct",
        "click .product-row.table-active": "delProduct",
        "click .product-row.table-active": "delProduct",
        "click #add-new-product-btn": "addNewProduct",
    },

    addNewProduct: function () {
        var data = $( '#add-new-product-form' ).serialize();
        $('.add-product-modal').modal('hide');
        $.ajax({
            url: 'admin/api/product',
            type: 'PUT',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            success: function() {
                loadProduct();
            },
            error: function (e) {
                console.error(e);
            }
        });
    },

    addProduct: function(e){
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
    delProduct: function (e) {
        if ( $(e.target)[0].nodeName != 'TD' ) return;
        var id = $(e.currentTarget).attr('data-id');
        $(e.currentTarget).removeClass('table-active');
        var cur = selectedProducts.get('ids');
        cur = _.without(cur, id);
        selectedProducts.set({
            ids: cur
        });
    },

    initialize: function(models) {
        // this.listenTo(this.model, "change", this.render);
        // this.listenTo(this.modelDefaultValues, "change", this.render);
        _.bindAll(this, 'render');
        this.products = models.products;
        this.default = models.default;
        this.products.on('change', this.render);
        this.default.on('change', this.render);
    },

    render: function() {
        var rendered = Handlebars.compile(this.template);
        this.$el.html( rendered({
            products: this.products.toJSON(),
            defaults: this.default.toJSON()
        }) );
        return this;
    }

});
var productsTableModel = new ProductsTableModel;
var selectedProducts = new SelectedProducts;
var defaultValues = new DefaultValues;


var productsTableView = new ProductsTableView({
    products: productsTableModel,
    default: defaultValues
});




var loadProduct = function(){
    $.ajax({
        type: "GET",
        url: "admin/api/products",
        data: "",
        dataType: 'json',
        success: function(res) {
            productsTableModel.set(res);

        },
        error: function (e) {
            console.error(e);
        }
    });
};

var loadDeffaultValues = function(){
    $.ajax({
        type: "GET",
        url: "admin/api/characteristics",
        data: "",
        dataType: 'json',
        success: function(res) {
            defaultValues.set(res);
        },
        error: function () {
            defaultValues.set(false);
        }
    });
};


$('#refreshProducts').click(function(){
    loadProduct();
    loadDeffaultValues();
});


loadProduct();
loadDeffaultValues();


