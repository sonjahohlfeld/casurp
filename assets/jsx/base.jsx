const $ = require('jquery');
// create global $ and jQuery variables
global.$ = global.jQuery = $;
global.Raphael = global.Raphael = Raphael;

import Raphael from 'raphael';
import 'morris.js/morris.css';
import 'morris.js/morris.js';

require('bootstrap-sass');
require('bootstrap-select');
require('bootstrap/dist/js/bootstrap.min.js')
require('startbootstrap-sb-admin-2/dist/js/sb-admin-2.js');
require('metismenu/dist/metisMenu.js');

// require('bootstrap-confirmation2/src/confirmation.js');

require('datatables.net');
require('datatables.net-bs');

require('datatables.net-buttons-bs');
require('datatables.net-buttons/js/buttons.colVis');

require('jquery/dist/jquery.min.js');
require('jquery-ui-dist/jquery-ui.min.js');
require('plotly.js/dist/plotly.min.js');
require('morris-js-module/morris.js');
require('raphael/raphael.js');

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

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [
            { y: '2006', a: 100, b: 90 },
            { y: '2007', a: 75,  b: 65 },
            { y: '2008', a: 50,  b: 40 },
            { y: '2009', a: 75,  b: 65 },
            { y: '2010', a: 50,  b: 40 },
            { y: '2011', a: 75,  b: 65 },
            { y: '2012', a: 100, b: 90 }
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B']
    });

    let coffeeData = [
        {
            'name': 'Testi Testmann',
            'expenses': '2,00 €',
            'paid': '5,00 €',
            'credit': '+3,00 €'
        }
    ]

    $('#coffeelist-table').DataTable({
        data: coffeeData,
        columns: [
            {data: 'name'},
            {data: 'expenses'},
            {data: 'paid'},
            {data: 'credit'},
        ],
    })
})

