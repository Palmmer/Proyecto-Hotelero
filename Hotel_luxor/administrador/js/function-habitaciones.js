$("#tableHabitaciones").DataTable();

var tableHabitaciones;
document.addEventListener("DOMContentLoaded", function () {
  tableHabitaciones = $("#tableHabitaciones").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/habitaciones/table_habitaciones.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "numero" },
      { data: "tipo" },
      { data: "descripcion" },
      { data: "CantidadCamas" },
      { data: "precio" },
      { data: "estado" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });

  var formHabitacion = document.querySelector("#formHabitacion");
  formHabitacion.onsubmit = function (e) {
    e.preventDefault();
    var idHabitacion=document.querySelector("#idHabitacion").value;
    var numero = document.querySelector("#numero").value;
    var tipo = document.querySelector("#tipo").value;
    var precio = document.querySelector("#precio").value;
    var descripcion = document.querySelector("#descripcion").value;
    var estado = document.querySelector("#estado").value;
    var CantidadCamas = document.querySelector("#CantidadCamas").value;
    if (
      numero == "" ||
      tipo == "" ||
      precio == "" ||
      estado == ""  ||
      CantidadCamas == ""
    ) {
      swal("Atencion", "Todos los campos son necesarios", "error");
      return false;
    }

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/habitaciones/ajax-habitacion.php';
    var form = new FormData(formHabitacion);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalHabitacion").modal("hide");
            formHabitacion.reset();
            swal('tipo', data.msg,'success');
            tableHabitaciones.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }
})

function openModalHabitacion() {
  document.querySelector('#idHabitacion').value="";
  document.querySelector('#tituloModal').innerHTML='Nueva Habitacion';
  document.querySelector('#action').innerHTML='Guardar';
  document.querySelector('#formHabitacion').reset();
$("#modalHabitacion").modal("show");
}

function editHabitacion(id){
    document.querySelector('#tituloModal').innerHTML='Editar Habitacion';
    document.querySelector('#action').innerHTML='Actualizar';
    var idHabitacion=id;
    
    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/habitaciones/edit-habitacion.php?idHabitacion='+idHabitacion;
    request.open("GET", url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            document.querySelector('#idHabitacion').value=data.data.idHabitacion;
            document.querySelector('#numero').value=data.data.numero;
            document.querySelector('#precio').value=data.data.precio;
            document.querySelector('#tipo').value=data.data.tipo;
            document.querySelector('#CantidadCamas').value=data.data.CantidadCamas;
            document.querySelector('#descripcion').value=data.data.descripcion;
            document.querySelector('#estado').value=data.data.estado;

            $("#modalHabitacion").modal("show");
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }

  function deleteHabitacion(id){

      var idHabitacion=id;

      swal({
          title:"Eliminar Habitacion",
          text:"Esta seguro de eliminar la habitacion?",
          type:"warning",
          showCancelButton:true,
          confirmButtonText:"Si, eliminar",
          cancelButtonText:"No, cancelar",
          closeOnConfirm:false,
          closeOnCancel:true
      },function(confirm){
          if(confirm){
            var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
            var url = './models/habitaciones/delete-habitacion.php';
            request.open('POST', url, true);
            var strData="idHabitacion="+idHabitacion;
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
              if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if (data.status) {
                    swal('Eliminar', data.msg,'success');
                       tableHabitaciones.ajax.reload();
                }else{
                    swal('Atencion', data.msg,'error');
                }
              }
            }

          }
      })
  }