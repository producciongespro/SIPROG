"use strict";

var m = new Model ();

$(document).ready(function () {
    ShowVersion();
});



jQuery(document).on('submit','#frmLogin',function(event){ 
    event.preventDefault();
    var formData = $(this).serialize();
    //m.conectFormAjax("../../server/login.php", formData, 'json', redirectUser );
    m.conectFormAjax("../../server/login.php", formData, '', redirectUser );



});


function redirectUser(response) {
        if (response.error==true) {
            alertify.error("Usuario o contraseña incorrectos.");
            $("#txtPassword").val("");
        } else {
            window.location.assign("../menu/menu.php");    
        }

}