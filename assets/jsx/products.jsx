$(function () {
    $(document).on('click', '#createNewProductConfirm', function(event){
        let name = $('#createNewProduct_name').val()
        let count = $('#createNewProduct_count').val()
        let price = $('#createNewProduct_price').val()
        let unit = $('#createNewProduct_unit').val()
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

    $('.removeButton').on('click', function () {
        let productId = this.attributes.getNamedItem("id").value
        $.ajax({
            method: 'POST',
            url: '/products/remove',
            data: {
                productId: productId
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

    $('.incrementCount').on('click', function(){
        let productId = this.attributes.getNamedItem("id").value
        changeCountOfProduct(productId, 1)
    })

    $('.decrementCount').on('click', function(){
        let productId = this.attributes.getNamedItem("id").value
        changeCountOfProduct(productId, -1)
    })

    function changeCountOfProduct(productId, value){
        $.ajax({
            method: 'POST',
            url: '/products/changeCount',
            data: {
                productId: productId,
                value: value
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
            }
        })
    }
})