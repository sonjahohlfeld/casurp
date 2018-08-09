const $ = require('jquery');
// create global $ and jQuery variables
global.$ = global.jQuery = $;

require('bootstrap-sass');
require('bootstrap-select');
require('bootstrap/dist/js/bootstrap.min')
require('startbootstrap-sb-admin-2/dist/js/sb-admin-2.js');
require('metismenu/dist/metisMenu.js');

// require('bootstrap-confirmation2/src/confirmation.js');

require('datatables.net');
require('datatables.net-bs');

require('datatables.net-buttons-bs');
require('datatables.net-buttons/js/buttons.colVis');

require('jquery/dist/jquery.min');
require('jquery-ui-dist/jquery-ui');
require('plotly.js/dist/plotly.min');

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
})

