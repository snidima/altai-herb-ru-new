// var productsTableModel = new ProductsTableModel;
// var selectedProducts = new SelectedProducts;
// var defaultValues = new DefaultValues;
//
// var productsTableView = new ProductsTableView({
//     products: productsTableModel,
//     default: defaultValues
// });
//
//
// var loadProduct = function(){
//     $.ajax({
//         type: "GET",
//         url: "admin/api/products",
//         data: "",
//         dataType: 'json',
//         success: function(res) {
//             productsTableModel.set(res);
//
//         },
//         error: function (e) {
//             console.error(e);
//         }
//     });
// };
//
// var loadDeffaultValues = function(){
//     $.ajax({
//         type: "GET",
//         url: "admin/api/characteristics",
//         data: "",
//         dataType: 'json',
//         success: function(res) {
//             defaultValues.set(res);
//         },
//         error: function () {
//             defaultValues.set(false);
//         }
//     });
// };


// $('#refreshProducts').click(function(){
//     loadProduct();
// });


// loadProduct();
// loadDeffaultValues();












var product = new ProductModel;
var products = new ProductsCollection;
var defaultValues = new DefaultValuesModel;


var productsTableView = new ProductsTableView({
    products: products,
    default: defaultValues
});













