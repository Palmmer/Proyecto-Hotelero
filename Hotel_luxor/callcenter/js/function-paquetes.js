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
     
      { data: "nombre" },
      { data: "precio" },
      { data: "estado" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });

})