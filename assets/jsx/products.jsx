$(function () {
    $(document).on('click', '#createNewProductConfirm', function(event){
        var name = $('#createNewProduct_name').val()
        var count = $('#createNewProduct_count').val()
        var price = $('#createNewProduct_price').val()
        var unit = $('#createNewProduct_unit').val()
        $.ajax({
            method: 'POST',
            url: '/products/create',
            data: {
                productName: name,
                productCount: count,
                productPrice: price,
                productUnit: unit
            },
            success: function(data){
                console.log(data)
            }
        })
    })
})