function getDefaultValue(){
    return $.ajax({
        type: "GET",
        url: "admin/api/characteristics",
        dataType: 'json'
    });
}


function getProducts(){
    return $.ajax({
        type: "GET",
        url: "admin/api/products",
        dataType: 'json'
    });
}


function saveProduct( data ) {

    return $.ajax({
        url: 'admin/api/product',
        type: 'PUT',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data
    });
}

function delProduct( id ) {

    return $.ajax({
        url: 'admin/api/product',
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        }
    });
}