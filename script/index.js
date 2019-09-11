//Método de index

$(document).ready(function () {
    ShowVersion();
    setTimeout(function(){ 
        loadMod();
     }, 2000);
});


function loadMod() {
    window.location.assign("./modules/login/login.html")
}