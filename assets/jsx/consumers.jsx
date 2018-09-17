$(function () {
    $(document).on('click', '#createNewConsumerConfirm', function(event){
        let firstName = $('#createNewConsumer_firstName').val()
        let lastName = $('#createNewConsumer_lastName').val()
        let email = $('#createNewConsumer_email').val()
        let expenses = $('#createNewConsumer_expenses').val()
        let paid = $('#createNewConsumer_paid').val()
        console.log(firstName)
        $.ajax({
            method: 'POST',
            url: '/consumersCreate',
            data: {
                consumerFirstName: firstName,
                consumerLastName: lastName,
                email: email,
                expenses: expenses,
                paid: paid
            },
            success: function(data){
                if('success' in data.result){
                    $('#resultMessage').append("<div class='alert alert-success alert-dismissable' role='alert'>" +
                        data.result.success+
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                    let content = "<div class='col-lg-3' style='margin-bottom: 15px;'>" +
                        "<div class='consumer-card' style='width: 100%; height: 6em;'><button type='button' class='btn btn-danger removeConsumerButton' id='"+data.result.consumer.id+"' style='margin-bottom: 10px;'>Remove</button>" +
                        "<a class='consumerDetails-link' href='/consumers/" + data.result.consumer.id +
                        "' style='color: rgb(51, 51, 51);'>" +
                        "<div style='font-size: 18px;'>"+ data.result.consumer.firstName +" "+ data.result.consumer.lastName+"</div>";

                    if((data.result.consumer.expenses - data.result.consumer.paid) >= 0){
                        content += "<div style='font-size: 18px; color: #3f903f'>"+(data.result.consumer.expenses - data.result.consumer.paid)+ " &euro;"+
                            "</div>";
                    } else {
                        content += "<div style='font-size: 18px; color: #c7254e'>"+(data.result.consumer.expenses - data.result.consumer.paid)+ " &euro;"+
                            "</div>";
                    }
                    content += "</div></div></a></div>";
                    $('#consumerCards').append(content)
                } else {
                    $('#resultMessage').append("<div class='alert alert-danger alert-dismissable' role='alert'>" +
                        data.result.error+
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                }
            }
        })
    })

    $('.removeConsumerButton').on('click', function () {
        let consumerId = this.attributes.getNamedItem("id").value
        $.ajax({
            method: 'POST',
            url: '/consumersRemove',
            data: {
                consumerId: consumerId
            },
            success: function(data){
                if('success' in data.result){
                    $('#resultMessage').html("<div class='alert alert-success alert-dismissable' role='alert'>" +
                        data.result.success+
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                    $('#consumerCard-'+consumerId).remove()
                } else {
                    $('#resultMessage').html("<div class='alert alert-danger alert-dismissable' role='alert'>" +
                        data.result.error+
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                }
            }

        })
    })

    $('.changeCredit').on('click', function(){
        let consumerId = this.attributes.getNamedItem("id").value
        let value = this.attributes.getNamedItem("value").value
        changeCreditofConsumer(consumerId, value)
    })

    function changeCreditofConsumer(consumerId, value){
        $.ajax({
            method: 'POST',
            url: '/consumersChangeCredit',
            data: {
                consumerId: consumerId,
                value: value
            },
            success: function(data){
                if('success' in data.result){
                    // $('#resultMessage').append("<div class='alert alert-success alert-dismissable' role='alert'>" +
                    //     data.result.success+
                    //     "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                    updateCreditOfConsumer(consumerId, data.result.expenses, data.result.paid)
                } else {
                    $('#resultMessage').append("<div class='alert alert-danger alert-dismissable' role='alert'>" +
                        data.result.success+
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                }
            }
        })
    }

    function updateCreditOfConsumer(consumerId, expenses, paid){
        if((paid - expenses) >= 0) {
            $('#consumerCardCount-'+consumerId).html("<h1 style='color: #3f903f'>" + (paid - expenses) +" &euro;</h1>")
        } else {
            $('#consumerCardCount-' + consumerId).html("<h1 style='color: #c7254e'>" + (paid - expenses) + " &euro;</h1>")
        }
    }
})