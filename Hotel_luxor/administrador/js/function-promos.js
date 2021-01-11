$("#tablePromo").DataTable();

var tablePromo;
document.addEventListener("DOMContentLoaded", function () {
  tablePromo = $("#tablePromo").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/promos/table_promo.php",
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

  var formPromo = document.querySelector("#formPromo");
  formPromo.onsubmit = function (e) {
    e.preventDefault();
    var idPromos=document.querySelector("#idPromos").value;
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
    var url = './models/promos/ajax-promos.php';
    var form = new FormData(formPromo);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalPromos").modal("hide");
            formPromo.reset();
            swal('Promo', data.msg,'success');
            tablePromo.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }
})

function openModalPromo() {
    document.querySelector('#idPromos').value="";
    document.querySelector('#tituloModal').innerHTML='Nuevo Promo';
    document.querySelector('#action').innerHTML='Guardar';
    document.querySelector('#formPromo').reset();
  $("#modalPromos").modal("show");
  }
  
  function editPromo(id){
      document.querySelector('#tituloModal').innerHTML='Editar Promo';
      document.querySelector('#action').innerHTML='Actualizar';
      var idPromos=id;
      
      var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
      var url = './models/promos/edit-promos.php?idPromos='+idPromos;
      request.open("GET", url, true);
      request.send();
      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          var data = JSON.parse(request.responseText);
          if (data.status) {
              document.querySelector('#idPromos').value=data.data.idPromos;
              document.querySelector('#nombre').value=data.data.nombre;
              document.querySelector('#cantidad').value=data.data.cantidad;
              document.querySelector('#estado').value=data.data.estado;
              $("#modalPromos").modal("show");
          }else{
              swal('Atencion', data.msg,'error');
          }
        }
      }
    }
  
    function deletePromo(id){
  
        var idPromos=id;
  
        swal({
            title:"Eliminar Promo",
            text:"Esta seguro de eliminar la Promo?",
            type:"warning",
            showCancelButton:true,
            confirmButtonText:"Si, eliminar",
            cancelButtonText:"No, cancelar",
            closeOnConfirm:false,
            closeOnCancel:true
        },function(confirm){
            if(confirm){
              var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
              var url = './models/promos/delete-promos.php';
              request.open('POST', url, true);
              var strData="idPromos="+idPromos;
              request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
              request.send(strData);
              request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                  var data = JSON.parse(request.responseText);
                  if (data.status) {
                      swal('Eliminar', data.msg,'success');
                         tablePromo.ajax.reload();
                  }else{
                      swal('Atencion', data.msg,'error');
                  }
                }
              }
  
            }
        })
    }