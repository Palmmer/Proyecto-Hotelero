$("#tablePaquetes").DataTable();

var tablePaquetes;
document.addEventListener("DOMContentLoaded", function () {
  tablePaquetes = $("#tablePaquetes").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/paquetes/table_paquetes.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "nombre" },
      { data: "precio" },
      { data: "estado" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });

  var formPaquetes = document.querySelector("#formPaquetes");
  formPaquetes.onsubmit = function (e) {
    e.preventDefault();
    var idPaquete=document.querySelector("#idPaquete").value;
    var nombre = document.querySelector("#nombre").value;
    var precio = document.querySelector("#precio").value;
    var estado = document.querySelector("#estado").value;
    if (
      nombre == "" ||
      precio == "" ||
      estado == ""
    ) {
      swal("Atencion", "Todos los campos son necesarios", "error");
      return false;
    }

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/paquetes/ajax-paquetes.php';
    var form = new FormData(formPaquetes);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalPaquetes").modal("hide");
            formPaquetes.reset();
            swal('Paquetes', data.msg,'success');
            tablePaquetes.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }
})

function openModalPaquetes() {
    document.querySelector('#idPaquete').value="";
    document.querySelector('#tituloModal').innerHTML='Nuevo Paquete';
    document.querySelector('#action').innerHTML='Guardar';
    document.querySelector('#formPaquetes').reset();
  $("#modalPaquetes").modal("show");
  }
  
  function editPaquete(id){
      document.querySelector('#tituloModal').innerHTML='Editar Paquete';
      document.querySelector('#action').innerHTML='Actualizar';
      var idPaquete=id;
      
      var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
      var url = './models/paquetes/edit-paquetes.php?idPaquete='+idPaquete;
      request.open("GET", url, true);
      request.send();
      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          var data = JSON.parse(request.responseText);
          if (data.status) {
              document.querySelector('#idPaquete').value=data.data.idPaquete;
              document.querySelector('#nombre').value=data.data.nombre;
              document.querySelector('#precio').value=data.data.precio;
              document.querySelector('#estado').value=data.data.estado;
              $("#modalPaquetes").modal("show");
          }else{
              swal('Atencion', data.msg,'error');
          }
        }
      }
    }
  
    function deletePaquete(id){
  
        var idPaquete=id;
  
        swal({
            title:"Eliminar paquete",
            text:"Esta seguro de eliminar el paquete?",
            type:"warning",
            showCancelButton:true,
            confirmButtonText:"Si, eliminar",
            cancelButtonText:"No, cancelar",
            closeOnConfirm:false,
            closeOnCancel:true
        },function(confirm){
            if(confirm){
              var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
              var url = './models/paquetes/delete-paquetes.php';
              request.open('POST', url, true);
              var strData="idPaquete="+idPaquete;
              request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
              request.send(strData);
              request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                  var data = JSON.parse(request.responseText);
                  if (data.status) {
                      swal('Eliminar', data.msg,'success');
                         tablePaquetes.ajax.reload();
                  }else{
                      swal('Atencion', data.msg,'error');
                  }
                }
              }
  
            }
        })
    }