var cartProducts = new CartProducts( JSON.parse( localStorage.getItem('cartProds') ) );


var cartSum = new CartSum;
var cartSumView = new CartSumView({model: cartSum});


cartProducts.trigger('add');




var updateAddProductBtn = function(){
    $('.add-to-cart').each(function(i, el){
        var curID = $(el).attr('data-id');
        var curProducts = cartProducts.pluck( 'id' );
        if ( !_.include(curProducts, curID) ){

            $(el).attr('data-active', 'true')

            $(el).click(function(){

                var price = $(this).attr('data-price');
                var id = $(this).attr('data-id');
                var image = $(this).attr('data-image');


                var cartProduct = new CartProduct;
                cartProduct.set({
                    id: id,
                    price: price,
                    image: image
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
};
updateAddProductBtn();

$('body').on('click','#cart-clear',function(){
    cartProducts.reset([]);
    updateAddProductBtn();
});





