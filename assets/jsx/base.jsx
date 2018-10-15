const $ = require('jquery');
// create global $ and jQuery variables
global.$ = global.jQuery = $;
global.Raphael = global.Raphael = Raphael;

import Raphael from 'raphael';
import 'morris.js/morris.css';
import 'morris.js/morris.js';
require('jquery/dist/jquery.min.js');
require('jquery-ui-dist/jquery-ui.min.js');

require('bootstrap-sass');
require('startbootstrap-sb-admin-2/dist/js/sb-admin-2.js');
require('metismenu/dist/metisMenu.js');

// require('bootstrap-confirmation2/src/confirmation.js');

require('datatables.net');
require('datatables.net-buttons');

require('datatables.net-buttons-bs');
require('datatables.net-buttons/js/buttons.colVis');

require('plotly.js/dist/plotly.min.js');
require('morris-js-module/morris.js');
require('raphael/raphael.js');
require('pdfmake/build/pdfmake.min.js')
require('pdfmake/build/vfs_fonts.js')
require('jszip/dist/jszip.min.js')

$('document').ready(function(){
    $('#loginButton').on('click', function() {
        var username = $('#inputUsername').val()
        var password = $('#inputPassword').val()
        console.log(username)
        $.ajax({
            method: "POST",
            url: "/login",
            data: {
                username: username,
                password: password
            },
            success: function(result){
                window.location.href = '/login'
            }
        })
    })

    $.getJSON('/getConsumers')
        .done(function(data){
            $('#coffeelist-table').DataTable({
                dom: 'Bfrtip',
                data: data.consumer,
                columns: [
                    {data: 'name'},
                    {data: 'expenses'},
                    {data: 'paid'},
                    {data: 'credit'}
                ],
                buttons: [
                    'pdfHtml5', 'csvHtml5', 'excelHtml5'
                ]
            })
        })
        .fail(function(){
            $('#coffeelist-table').append("<div class='alert alert-success alert-dismissable' role='alert'>Could not load data from database.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
        })



    $('.consumer-card-buy').on('click', function(){
        $('#buyModal').modal('show');
        $('#buyProductModalTitle').html($('input[name=productGroup]:checked').val())
    })

})

$(document).on('click', '#buyCoffee', function(event){
    let count = $('#countOfCoffee').val()
    let consumerId = this.attributes.getNamedItem("id").value
    let productId = $('#buyProductId').val()
    let value = $('#buyProductPrice').val()
    $.ajax({
        method: 'POST',
        url: '/buyProduct',
        data: {
            count: count,
            productId: productId,
            consumerId: consumerId,
            value: value
        },
        success: function(data){
            console.log(data)
            // if('success' in data.result){
            //     $('#resultMessage').append("<div class='alert alert-success alert-dismissable' role='alert'>" +
            //         data.result.success+
            //         "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
            //     let content = "<div class='col-lg-3' style='margin-bottom: 15px;'>" +
            //         "<div class='consumer-card' style='width: 100%; height: 6em;'><button type='button' class='btn btn-danger removeConsumerButton' id='"+data.result.consumer.id+"' style='margin-bottom: 10px;'>Remove</button>" +
            //         "<a class='consumerDetails-link' href='/consumers/" + data.result.consumer.id +
            //         "' style='color: rgb(51, 51, 51);'>" +
            //         "<div style='font-size: 18px;'>"+ data.result.consumer.firstName +" "+ data.result.consumer.lastName+"</div>";
            //
            //     if((data.result.consumer.expenses - data.result.consumer.paid) >= 0){
            //         content += "<div style='font-size: 18px; color: #3f903f'>"+(data.result.consumer.expenses - data.result.consumer.paid)+ " &euro;"+
            //             "</div>";
            //     } else {
            //         content += "<div style='font-size: 18px; color: #c7254e'>"+(data.result.consumer.expenses - data.result.consumer.paid)+ " &euro;"+
            //             "</div>";
            //     }
            //     content += "</div></div></a></div>";
            //     $('#consumerCards').append(content)
            // } else {
            //     $('#resultMessage').append("<div class='alert alert-danger alert-dismissable' role='alert'>" +
            //         data.result.error+
            //         "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
            // }
        }
    })
})

