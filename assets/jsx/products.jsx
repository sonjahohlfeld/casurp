$(function () {
    $(document).on('click', '#createNewProductConfirm', function(event){
        let name = $('#createNewProduct_name').val()
        let count = $('#createNewProduct_count').val()
        let price = $('#createNewProduct_price').val()
        let unit = $('#createNewProduct_unit').val()
        $.ajax({
            method: 'POST',
            url: '/productsCreate',
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

                     $('#productCards').append("<div class='col-lg-3' style='margin-bottom: 15px;'>" +
                         "<div class='product-card' style='width: 100%; height: 6em;'><button type='button' class='btn btn-danger removeProductButton' id='"+data.result.product.id+"' style='margin-bottom: 10px;'>Remove</button>" +
                         "<a class='productDetails-link' href='/products/" + data.result.product.id +
                         "' style='color: rgb(51, 51, 51);'>" +
                         "<div style='font-size: 18px;'>"+ data.result.product.name +
                         "</div><div style='font-size: 18px; color: #3f903f'>"+data.result.product.count+" "+data.result.product.unit+
                         "</div></div></div></a></div>")

                } else {
                    $('#resultMessage').append("<div class='alert alert-danger alert-dismissable' role='alert'>" +
                        data.result.error+
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                }
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
                    $('#productPanel-'+productId).remove()
                } else {
                    $('#resultMessage').append("<div class='alert alert-danger alert-dismissable' role='alert'>" +
                        data.result.error+
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                }
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
                    updateCountOfProduct(productId, data.result.count, data.result.unit)
                } else {
                    $('#resultMessage').append("<div class='alert alert-danger alert-dismissable' role='alert'>" +
                        data.result.success+
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                }
            }
        })
    }

    function updateCountOfProduct(productId, productCount, productUnit){
        $('#productPanelCount-'+productId).html(productCount + " " + productUnit)
    }
})