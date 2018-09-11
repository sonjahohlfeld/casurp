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

})

