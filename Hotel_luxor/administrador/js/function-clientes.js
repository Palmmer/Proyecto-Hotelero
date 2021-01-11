$("#tableClientes").DataTable();

var tableClientes;
document.addEventListener("DOMContentLoaded", function () {
  tableClientes = $("#tableClientes").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/clientes/table_clientes.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "nombre" },
      { data: "apellido" },
      { data: "rfc" },
      { data: "telefono" },
      { data: "correo" },
      { data: "direccion" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });

  var formCliente = document.querySelector("#formCliente");
  formCliente.onsubmit = function (e) {
    e.preventDefault();
    var idCliente=document.querySelector("#idCliente").value;
    var nombre = document.querySelector("#nombre").value;
    var apellido = document.querySelector("#apellido").value;
    var rfc = document.querySelector("#rfc").value;
    var telefono = document.querySelector("#telefono").value;
    var correo = document.querySelector("#correo").value;
    var direccion = document.querySelector("#direccion").value;
    if (
      nombre == "" ||
      rfc == "" ||
      apellido == "" ||
      telefono == ""  ||
      direccion == ""  ||
      correo == ""
    ) {
      swal("Atencion", "Todos los campos son necesarios", "error");
      return false;
    }

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/clientes/ajax-clientes.php';
    var form = new FormData(formCliente);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalClientes").modal("hide");
            formCliente.reset();
            swal('Usuario', data.msg,'success');
            tableClientes.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }
})

function openModalClientes() {
  document.querySelector('#idCliente').value="";
  document.querySelector('#tituloModal').innerHTML='Nuevo Cliente';
  document.querySelector('#action').innerHTML='Guardar';
  document.querySelector('#formCliente').reset();
$("#modalClientes").modal("show");
}

function editCliente(id){
    document.querySelector('#tituloModal').innerHTML='Editar Cliente';
    document.querySelector('#action').innerHTML='Actualizar';
    var idCliente=id;
    
    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/clientes/edit-clientes.php?idCliente='+idCliente;
    request.open("GET", url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            document.querySelector('#idCliente').value=data.data.idCliente;
            document.querySelector('#nombre').value=data.data.nombre;
            document.querySelector('#apellido').value=data.data.apellido;
            document.querySelector('#rfc').value=data.data.rfc;
            document.querySelector('#telefono').value=data.data.telefono;
            document.querySelector('#correo').value=data.data.correo;
            document.querySelector('#direccion').value=data.data.direccion;

            $("#modalClientes").modal("show");
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }

  function deleteCliente(id){

      var idCliente=id;

      swal({
          title:"Eliminar Cliente",
          text:"Esta seguro de eliminar el Cliente?",
          type:"warning",
          showCancelButton:true,
          confirmButtonText:"Si, eliminar",
          cancelButtonText:"No, cancelar",
          closeOnConfirm:false,
          closeOnCancel:true
      },function(confirm){
          if(confirm){
            var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
            var url = './models/clientes/delete-clientes.php';
            request.open('POST', url, true);
            var strData="idCliente="+idCliente;
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
              if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if (data.status) {
                    swal('Eliminar', data.msg,'success');
                       tableClientes.ajax.reload();
                }else{
                    swal('Atencion', data.msg,'error');
                }
              }
            }

          }
      })
  }