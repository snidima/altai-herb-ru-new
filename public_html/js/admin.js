$.ajax({
    type: "GET",
    url: "admin/api/products",
    data: "",
    dataType: 'json',
    success: function(res) {
        productsTableModel.set(res);
        console.log(res);
    },
    error: function () {
        alert('!');
    }
});

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

});

var SelectedProducts = Backbone.Model.extend({

});



var ProductsTableView = Backbone.View.extend({

    el: '#products-table',
    template: $('#products-table-2-tmp').html(),

    events: {
        "click .product-row:not(.table-active)": "addProduct",
        "click .product-row.table-active": "delProduct",
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

    initialize: function() {
        this.listenTo(this.model, "change", this.render);
    },

    render: function() {
        var rendered = Handlebars.compile(this.template);
        this.$el.html( rendered({products: this.model.toJSON()}) );
        return this;
    }

});
var productsTableModel = new ProductsTableModel;
var selectedProducts = new SelectedProducts;
var productsTableView = new ProductsTableView({model: productsTableModel});



