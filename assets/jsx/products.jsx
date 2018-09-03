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
                if('success' in data.result){
                    $('#resultMessage').append("<div class='alert alert-success alert-dismissable' role='alert'>" +
                        data.result.success+
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                } else {
                    $('#resultMessage').append("<div class='alert alert-danger alert-dismissable' role='alert'>" +
                        data.result.success+
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                }
                $('#exampleModal').modal('hide');
            }
        })
    })
})