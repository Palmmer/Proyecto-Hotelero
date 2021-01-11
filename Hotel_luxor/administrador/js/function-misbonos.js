$("#tableMisBonos").DataTable();

var tableMisBonos;
document.addEventListener("DOMContentLoaded", function () {
    tableMisBonos = $("#tableMisBonos").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/misbonos/table_misbonos.php",
      dataSrc: "",
    },
    columns: [
  
      { data: "nombre" },
      { data: "cantidad" },
      { data: "Fecha" },
     
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });

})