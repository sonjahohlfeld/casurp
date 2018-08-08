const $ = require('jquery');
// create global $ and jQuery variables
global.$ = global.jQuery = $;

require('bootstrap-sass')
require('startbootstrap-sb-admin/js/sb-admin.min.js')
// require('jquery-ui-dist')

$('document').ready(function(){
    $('#loginButton').on('click', function() {
        var username = $('#inputUsername').val()
        var password = $('#inputPassword').val()
        $.ajax({
            method: "POST",
            url: "/login",
            data: {
                username: username,
                password: password
            },
            success: function(result){
                console.log(result)
            }
        })
    })
})

