function View () {

}


View.prototype.instances = function (array, cont) {

  $(cont).empty();
  $(cont).html("<label class='textosLogin' for='selInstancia'>Área:</label>");
  var limite = array.length,
  selector = $("<select class='custom-select' id='selInstancia'></select>");
  $(selector).html( "<option selected disabled>Seleccione el área</option>");

  for (let index = 0; index < limite; index++) {
    $(selector).append("<option value="+ array[index].id +"> " + array[index].nombre_area + " </option>")
    }
  $(cont).append(selector);
  }
