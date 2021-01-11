$("#tableServiciosE").DataTable();

var tableServiciosE;
document.addEventListener("DOMContentLoaded", function () {
  tableServiciosE = $("#tableServiciosE").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/servicios/table_SE.php",
      dataSrc: "",
    },
    columns: [
    
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

})