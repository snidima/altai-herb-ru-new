var CartSumView = Backbone.View.extend({

    el: '#cart-mini',
    template: $('#cart-mini-tmp').html(),

    events: {
        "click #cart-clear": "cartReset"
    },

    cartReset: function(){
        cartProducts.reset([]);
    },

    initialize: function() {
        this.listenTo(this.model, "change", this.render);
    },

    render: function() {
        var rendered = Mustache.render(this.template, {
            sum: this.model.get('sum')
        });
        this.$el.html( rendered );
        return this;
    }

});


var CartTableView = Backbone.View.extend({

    el: '#cart',

    template: $('#cart-table-tmp').html(),

    initialize: function() {
        this.listenTo(this.collection, "all", this.render);
    },

    render: function() {
        var rendered = Mustache.render(this.template, {
            products: this.collection.exportToView()
        });
        this.$el.html( rendered );
        return this;
    }

});

var CartCustomerView = Backbone.View.extend({

    el: '#cart',

    template: $('#cart-customer-tmp').html(),

    initialize: function() {

    },

    render: function() {
        var rendered = Mustache.render(this.template, {
            customer: 666
        });
        this.$el.html( rendered );
        return this;
    }

});

var CartCheckView = Backbone.View.extend({

    el: '#cart',

    template: $('#cart-check-tmp').html(),

    initialize: function() {

    },

    render: function() {
        var rendered = Mustache.render(this.template, {
            customer: 666
        });
        this.$el.html( rendered );
        return this;
    }

});