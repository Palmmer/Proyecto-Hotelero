$("#tableHabitaciones").DataTable();

var tableHabitaciones;
document.addEventListener("DOMContentLoaded", function () {
  tableHabitaciones = $("#tableHabitaciones").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/habitaciones/table_habitaciones.php",
      dataSrc: "",
    },
    columns: [
  
      { data: "numero" },
      { data: "tipo" },
      { data: "descripcion" },
      { data: "CantidadCamas" },
      { data: "precio" },
      { data: "estado" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });

})