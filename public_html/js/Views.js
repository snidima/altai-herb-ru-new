var CartSumView = Backbone.View.extend({

    template: $('#cart-mini-tmp').html(),

    initialize: function() {
        this.listenTo(this.model, "change", this.render);
    },

    render: function() {

        var rendered = Mustache.render(this.template, {
            sum: this.model.get('sum')
        });
        $('#cart-mini').html(rendered);
    }

});

