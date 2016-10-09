var Workspace = Backbone.Router.extend({

    routes: {
        "":         "edit",
        "edit":     "edit",
        "customer": "customer",
        "check":    "check",
    },

    edit: function() {
        cartTableView.render();
    },

    customer: function() {
        cartCustomerView.render();
    },
    check: function(){
        cartCheckView.render();
    }

});