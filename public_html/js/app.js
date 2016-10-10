var cartProducts = new CartProducts( JSON.parse( localStorage.getItem('cartProds') ) );

var cartSum = new CartSum;
var cartSumView = new CartSumView({model: cartSum});
var cartCustomer = new CartCustomer( JSON.parse( localStorage.getItem('cartCustomer') ) );

var cartTableView = new CartTableView({collection: cartProducts});
var cartCustomerView = new CartCustomerView({model: cartCustomer});
var cartCheckView = new CartCheckView;

cartProducts.trigger('add');





var workspace = new Workspace;
Backbone.history.start();










