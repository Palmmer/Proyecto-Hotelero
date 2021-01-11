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