$("#tableReservacion").DataTable();

var tableReservacion;
document.addEventListener("DOMContentLoaded", function () {
  tableReservacion = $("#tableReservacion").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/reservaciones/table_reservaciones.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "nombre" },
      { data: "apellido" },
      { data: "email" },
      { data: "pais" },
      { data: "telefono" },
      { data: "tipo" },
      { data: "numero" },
      { data: "fecha_entrada" },
      { data: "fecha_salida" },
      { data: "nombre_paquete" },
      { data: "estado" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });

  var formReservacion = document.querySelector("#formReservacion");
  formReservacion.onsubmit = function (e) {
    e.preventDefault();
    var idReservacion=document.querySelector("#idReservacion").value;
    var nombre = document.querySelector("#nombre").value;
    var apellido = document.querySelector("#apellido").value;
    var email = document.querySelector("#email").value;
    var pais=document.querySelector("#pais").value;
    var telefono = document.querySelector("#telefono").value;
    var habitacion = document.querySelector("#habitacion").value;
    var paquete=document.querySelector("#paquete").value;
    var fecha_entrada = document.querySelector("#fecha_entrada").value;
    var fecha_salida = document.querySelector("#fecha_salida").value;
    var estado = document.querySelector("#estado").value;
    var idEmpleado = document.querySelector("#idEmpleado").value;

    if (
      nombre == "" ||
      apellido == "" ||
      email == "" ||
      pais == "" ||
      telefono == "" ||
      fecha_entrada == "" ||
      fecha_salida ==  "" ||
      estado == "" 
    ) {
      swal("Atencion", "Todos los campos son necesarios", "error");
      return false;
    }

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/reservaciones/ajax-reservaciones.php';
    var form = new FormData(formReservacion);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalReservacion").modal("hide");
            formReservacion.reset();
            swal('Reservacion', data.msg,'success');
            tableReservacion.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }
})

function openModalReservacion() {
    document.querySelector('#idReservacion').value="";
    document.querySelector('#tituloModal').innerHTML='Nueva Reservacion';
    document.querySelector('#action').innerHTML='Guardar';
    document.querySelector('#formReservacion').reset();
  $("#modalReservacion").modal("show");
  showHabitaciones();
  showPaquetes();

}



function showHabitaciones(){
  var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
  var url = './models/options/options-habitacion.php';
  request.open('GET', url, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var data = JSON.parse(request.responseText);
     data.forEach(function(valor){
      data +='<option value="'+valor.idHabitacion+ ' ">'+"Tipo: &nbsp;"+valor.tipo + "&nbsp; &nbsp;"+"Numero: &nbsp;"+ valor.numero+'</option>';

     });
     document.querySelector('#habitacion').innerHTML=data;
    }
  }

}
function showmyHabitacion(id){
  var idReservacion=id;
  var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
  var url = './models/options/options-myhabitacion.php?idReservacion='+idReservacion;
  request.open('GET', url, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var data = JSON.parse(request.responseText);
     data.forEach(function(valor){
      data +='<option value="'+valor.idHabitacion+ ' ">'+"Tipo: &nbsp;"+valor.tipo + "&nbsp; &nbsp;"+"Numero: &nbsp;"+ valor.numero+'</option>';

     });
     document.querySelector('#habitacion').innerHTML=data;
    }
  }

}

function showPaquetes(){
  var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
  var url = './models/options/options-paquete.php';
  request.open('GET', url, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var data = JSON.parse(request.responseText);
     data.forEach(function(valor){
       data +='<option value="'+valor.idPaquete+'">'+valor.nombre +'</option>';

     });
     document.querySelector('#paquete').innerHTML=data;
    }
  }

}

function editReservacion(id){
    document.querySelector('#tituloModal').innerHTML='Editar Reservacion';
    document.querySelector('#action').innerHTML='Actualizar';
    var idReservacion=id;
    showmyHabitacion(id);
  showPaquetes();

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/reservaciones/edit-reservaciones.php?idReservacion='+idReservacion;
    request.open("GET", url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            document.querySelector('#idReservacion').value=data.data.idReservacion;
            document.querySelector('#idEmpleado').value=data.data.id_usuario;
            document.querySelector('#nombre').value=data.data.nombre;
            document.querySelector('#apellido').value=data.data.apellido;
            document.querySelector('#email').value=data.data.email;
            document.querySelector('#pais').value=data.data.pais;
            document.querySelector('#telefono').value=data.data.telefono;
            document.querySelector('#habitacion').value=data.data.habitacion;
            document.querySelector('#paquete').value=data.data.paquete;
            document.querySelector('#fecha_entrada').value=data.data.fecha_entrada;
            document.querySelector('#fecha_salida').value=data.data.fecha_salida;
            document.querySelector('#estado').value=data.data.estado;


            $("#modalReservacion").modal("show");
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }

  function openServicios(id){
    var idReservacion=id;
    var tableMis_servicios;
    
                tableMis_servicios = $("#tableMis_servicios").DataTable({
                aProcessing: true,
                aServerSide: true,
                language: {
                  url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
                },ajax: {
                  url: "./models/reservaciones/table-misServicios.php?idReservacion="+idReservacion,
                  method:"GET",
                  dataSrc: "",
                },
                columns: [
                  { data: "acciones" },
                  { data: "nombre" },
                  { data: "precio" },
                  { data: "cantidad" },
                  { data: "total" },
                  { data: "fecha" },
                ],
                responsive: true,
                bDestroy: true,
                iDisplayLength: 10,
                order: [[0, "asc"]],
              });
            
            $("#modalMis_servicios").modal("show");
                
       
  }

  
function showServicios(){
  var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
  var url = './models/options/options-servicios.php';
  request.open('GET', url, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var data = JSON.parse(request.responseText);
     data.forEach(function(valor){
      data +='<option value="'+valor.idServicio+ ' ">'+"Nombre: &nbsp;"+valor.nombre + "&nbsp; &nbsp;"+"Precio: &nbsp;"+ valor.precio+'</option>';

     });
     document.querySelector('#idServicio').innerHTML=data;
    }
  }

}

function showReservaciones(){
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
     document.querySelector('#reservacion').innerHTML=data;
    }
  }

}

function openNuevo() {
  document.querySelector('#id').value="";
  document.querySelector('#tituloModal').innerHTML='Nuevo Servicio';
  document.querySelector('#action').innerHTML='Agregar';
  document.querySelector('#formnServicio').reset();
$("#modalNuevoServicio").modal("show");
showServicios();
showReservaciones();

}

var formnServicio = document.querySelector("#formnServicio");
formnServicio.onsubmit = function (e) {
    e.preventDefault();
    var id=document.querySelector("#id").value;
    var reservacion=document.querySelector("#reservacion").value;
    var idServicio = document.querySelector("#idServicio").value;
    var cantidad = document.querySelector("#cantidad").value;
    if (
      reservacion == "" ||
      idServicio == "" ||
      cantidad == ""  
    ) {
      swal("Atencion", "Todos los campos son necesarios", "error");
      return false;
    }

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/reservaciones/ajax-nuevoServicio.php';
    var form = new FormData(formnServicio);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalNuevoServicio").modal("hide");
            formReservacion.reset();
            swal('Nuevo Servicio', data.msg,'success');
            
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }

  function delete_miServicio(id){

    var id=id;
     
    $("#modalMis_servicios").modal("hide");
    swal({
        title:"Eliminar el Servicio",
        text:"Esta seguro de eliminar el servicio?",
        type:"warning",
        showCancelButton:true,
        confirmButtonText:"Si, eliminar",
        cancelButtonText:"No, cancelar",
        closeOnConfirm:false,
        closeOnCancel:true
    },function(confirm){
        if(confirm){
          var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
          var url = './models/reservaciones/delete-mi-servicio.php';
          request.open('POST', url, true);
          var strData="id="+id;
          request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
          request.send(strData);
          request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
              var data = JSON.parse(request.responseText);
              if (data.status) {
                  swal('Eliminar', data.msg,'success');
                       
              $("#modalNuevoServicio").modal("hide");
              }else{
                  swal('Atencion', data.msg,'error');
              }
            }
          }
  
        }
    })
  }