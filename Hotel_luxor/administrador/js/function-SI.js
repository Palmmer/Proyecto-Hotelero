$("#tableServiciosI").DataTable();

var tableServiciosI;
document.addEventListener("DOMContentLoaded", function () {
  tableServiciosI = $("#tableServiciosI").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/servicios/table_SI.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "nombre" },
      { data: "precio" },
      { data: "tipo" },
      { data: "estatus" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });

  var formSI = document.querySelector("#formSI");
  formSI.onsubmit = function (e) {
    e.preventDefault();
    var idServicio=document.querySelector("#idServicio").value;
    var nombre = document.querySelector("#nombre").value;
    var precio = document.querySelector("#precio").value;
    var tipo = document.querySelector("#tipo").value;
    var estatus = document.querySelector("#estatus").value;
    if (
      nombre == "" ||
      precio == "" ||
      tipo == ""  ||
      estatus == ""
    ) {
      swal("Atencion", "Todos los campos son necesarios", "error");
      return false;
    }

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/servicios/ajax-servicios.php';
    var form = new FormData(formSI);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalSI").modal("hide");
            formSI.reset();
            swal('Servicio', data.msg,'success');
            tableServiciosI.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }
})

function openModalServiciosI() {
    document.querySelector('#idServicio').value="";
    document.querySelector('#tituloModal').innerHTML='Nuevo Servicio';
    document.querySelector('#action').innerHTML='Guardar';
    document.querySelector('#formSI').reset();
  $("#modalSI").modal("show");
  }
  
  function editServicioI(id){
      document.querySelector('#tituloModal').innerHTML='Editar Servicio';
      document.querySelector('#action').innerHTML='Actualizar';
      var idServicio=id;
      
      var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
      var url = './models/servicios/edit-servicios.php?idServicio='+idServicio;
      request.open("GET", url, true);
      request.send();
      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          var data = JSON.parse(request.responseText);
          if (data.status) {
              document.querySelector('#idServicio').value=data.data.idServicio;
              document.querySelector('#nombre').value=data.data.nombre;
              document.querySelector('#precio').value=data.data.precio;
              document.querySelector('#tipo').value=data.data.tipo;
              document.querySelector('#estatus').value=data.data.estatus;
              $("#modalSI").modal("show");
          }else{
              swal('Atencion', data.msg,'error');
          }
        }
      }
    }
  
    function deleteServicioI(id){
  
        var idServicio=id;
  
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
              var url = './models/servicios/delete-servicios.php';
              request.open('POST', url, true);
              var strData="idServicio="+idServicio;
              request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
              request.send(strData);
              request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                  var data = JSON.parse(request.responseText);
                  if (data.status) {
                      swal('Eliminar', data.msg,'success');
                         tableServiciosI.ajax.reload();
                  }else{
                      swal('Atencion', data.msg,'error');
                  }
                }
              }
  
            }
        })
    }