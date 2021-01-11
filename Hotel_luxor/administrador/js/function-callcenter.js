$("#tableCallcenter").DataTable();

var tableCallcenter;
document.addEventListener("DOMContentLoaded", function () {
  tableCallcenter = $("#tableCallcenter").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/callcenter/table_Callcenter.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "nombre" },
      { data: "apellido" },
      { data: "usuario" },
      { data: "descripcion" },
      { data: "estado" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });

  var formCallcenter = document.querySelector("#formCallcenter");
  formCallcenter.onsubmit = function (e) {
    e.preventDefault();
    var id_usuario=document.querySelector("#id_usuario").value;
    var nombre = document.querySelector("#nombre").value;
    var usuario = document.querySelector("#usuario").value;
    var apellido = document.querySelector("#apellido").value;
    var clave = document.querySelector("#clave").value;
    var estado = document.querySelector("#estado").value;
    var id_cargo = document.querySelector("#id_cargo").value;
    if (
      nombre == "" ||
      usuario == "" ||
      apellido == "" ||
      estado == ""  ||
      id_cargo == ""
    ) {
      swal("Atencion", "Todos los campos son necesarios", "error");
      return false;
    }

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/usuarios/ajax-usuarios.php';
    var form = new FormData(formCallcenter);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalCallcenter").modal("hide");
            formCallcenter.reset();
            swal('Usuario', data.msg,'success');
            tableCallcenter.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }
})

function openModalCallcenter() {
  document.querySelector('#id_usuario').value="";
  document.querySelector('#tituloModal').innerHTML='Nuevo Empleado';
  document.querySelector('#action').innerHTML='Guardar';
  document.querySelector('#formCallcenter').reset();
$("#modalCallcenter").modal("show");
}

function editCallcenter(id){
    document.querySelector('#tituloModal').innerHTML='Editar Usuario';
    document.querySelector('#action').innerHTML='Actualizar';
    var id_usuario=id;
    
    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/usuarios/edit-usuarios.php?id_usuario='+id_usuario;
    request.open("GET", url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            document.querySelector('#id_usuario').value=data.data.id_usuario;
            document.querySelector('#nombre').value=data.data.nombre;
            document.querySelector('#apellido').value=data.data.apellido;
            document.querySelector('#usuario').value=data.data.usuario;
            document.querySelector('#id_cargo').value=data.data.id_cargo;
            document.querySelector('#estado').value=data.data.estado;

            $("#modalCallcenter").modal("show");
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }

  function deleteCallcenter(id){

      var id_usuario=id;

      swal({
          title:"Eliminar Usuario",
          text:"Esta seguro de eliminar el usuario?",
          type:"warning",
          showCancelButton:true,
          confirmButtonText:"Si, eliminar",
          cancelButtonText:"No, cancelar",
          closeOnConfirm:false,
          closeOnCancel:true
      },function(confirm){
          if(confirm){
            var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
            var url = './models/usuarios/delete-usuarios.php';
            request.open('POST', url, true);
            var strData="id_usuario="+id_usuario;
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
              if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if (data.status) {
                    swal('Eliminar', data.msg,'success');
                       tableCallcenter.ajax.reload();
                }else{
                    swal('Atencion', data.msg,'error');
                }
              }
            }

          }
      })
  }