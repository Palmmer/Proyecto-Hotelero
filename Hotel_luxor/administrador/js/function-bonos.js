$("#tableBono").DataTable();

var tableBono;
document.addEventListener("DOMContentLoaded", function () {
  tableBono = $("#tableBono").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/bonos/table_bono.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "nombre" },
      { data: "cantidad" },
      { data: "estado" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });

  var formBono = document.querySelector("#formBono");
  formBono.onsubmit = function (e) {
    e.preventDefault();
    var idBono=document.querySelector("#idBono").value;
    var nombre = document.querySelector("#nombre").value;
    var cantidad = document.querySelector("#cantidad").value;
    var estado = document.querySelector("#estado").value;
    if (
      nombre == "" ||
      cantidad == "" ||
      estado == ""
    ) {
      swal("Atencion", "Todos los campos son necesarios", "error");
      return false;
    }

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/bonos/ajax-bonos.php';
    var form = new FormData(formBono);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalBono").modal("hide");
            formBono.reset();
            swal('Promo', data.msg,'success');
            tableBono.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }
})

function openModalBono() {
    document.querySelector('#idBono').value="";
    document.querySelector('#tituloModal').innerHTML='Nuevo bono';
    document.querySelector('#action').innerHTML='Guardar';
    document.querySelector('#formBono').reset();
  $("#modalBono").modal("show");
  }
  
  function editBono(id){
      document.querySelector('#tituloModal').innerHTML='Editar bono';
      document.querySelector('#action').innerHTML='Actualizar';
      var idBono=id;
      
      var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
      var url = './models/bonos/edit-bonos.php?idBono='+idBono;
      request.open("GET", url, true);
      request.send();
      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          var data = JSON.parse(request.responseText);
          if (data.status) {
              document.querySelector('#idBono').value=data.data.idBono;
              document.querySelector('#nombre').value=data.data.nombre;
              document.querySelector('#cantidad').value=data.data.cantidad;
              document.querySelector('#estado').value=data.data.estado;
              $("#modalBono").modal("show");
          }else{
              swal('Atencion', data.msg,'error');
          }
        }
      }
    }
  
    function deleteBono(id){
  
        var idBono=id;
  
        swal({
            title:"Eliminar Bono",
            text:"Esta seguro de eliminar la Bono?",
            type:"warning",
            showCancelButton:true,
            confirmButtonText:"Si, eliminar",
            cancelButtonText:"No, cancelar",
            closeOnConfirm:false,
            closeOnCancel:true
        },function(confirm){
            if(confirm){
              var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
              var url = './models/bonos/delete-bonos.php';
              request.open('POST', url, true);
              var strData="idBono="+idBono;
              request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
              request.send(strData);
              request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                  var data = JSON.parse(request.responseText);
                  if (data.status) {
                      swal('Eliminar', data.msg,'success');
                         tableBono.ajax.reload();
                  }else{
                      swal('Atencion', data.msg,'error');
                  }
                }
              }
  
            }
        })
    }