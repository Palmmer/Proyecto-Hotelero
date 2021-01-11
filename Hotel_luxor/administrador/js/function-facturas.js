$("#tableFacturas").DataTable();

var tableFacturas;
document.addEventListener("DOMContentLoaded", function () {
  tableFacturas = $("#tableFacturas").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/facturas/table_facturas.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "idFactura" },
      { data: "rfc" },
      { data: "idReservacion" },
      { data: "numero" },
      { data: "total_factura" },
      { data: "total_servicios" },
      { data: "fecha" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });
  var formFactura = document.querySelector("#formFactura");
  formFactura.onsubmit = function (e) {
    e.preventDefault();
    var idReservacion=document.querySelector("#idReservacion").value;
    var idFactura = document.querySelector("#idFactura").value;
    var idCliente = document.querySelector("#idCliente").value;

    if (
      idReservacion == "" ||
      idCliente == "" 
    ) {
      swal("Atencion", "Todos los campos son necesarios", "error");
      return false;
    }

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/facturas/ajax-facturas.php';
    var form = new FormData(formFactura);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalFactura").modal("hide");
            formFactura.reset();
            swal('Factura', data.msg,'success');
            tableFacturas.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }


})

function openModalFacturas() {
    document.querySelector('#idFactura').value="";
    document.querySelector('#tituloModal').innerHTML='Nueva Factura';
    document.querySelector('#action').innerHTML='Guardar';
    document.querySelector('#formFactura').reset();
  $("#modalFactura").modal("show");
  showFReservaciones();
  showClientes();
  }


  function showFReservaciones(){
    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/options/options-reservaciones.php';
    request.open('GET', url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
       data.forEach(function(valor){
        data +='<option value="'+valor.idReservacion+ ' ">'+"Numero de habitacion: &nbsp;"+valor.numero + "&nbsp; &nbsp;"+"Nombre: &nbsp;"+ valor.nombre+"&nbsp;"+valor.apellido+'</option>';
  
       });
       document.querySelector('#idReservacion').innerHTML=data;
      }
    }
  
  }
  function showClientes(){
    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/options/options-clientes.php';
    request.open('GET', url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
       data.forEach(function(valor){
        data +='<option value="'+valor.idCliente+ ' ">'+"RFC: &nbsp;"+valor.rfc + "&nbsp; &nbsp;"+"Nombre: &nbsp;"+ valor.nombre+"&nbsp;"+valor.apellido+'</option>';
  
       });
       document.querySelector('#idCliente').innerHTML=data;
      }
    }
  
  }