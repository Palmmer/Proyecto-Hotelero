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
      
      { data: "nombre" },
      { data: "cantidad" },
      { data: "estado" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });

})