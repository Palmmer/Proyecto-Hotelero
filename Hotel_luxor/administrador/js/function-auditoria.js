$("#tableAuditoria").DataTable();

var tableAuditoria;
document.addEventListener("DOMContentLoaded", function () {
  tableAuditoria = $("#tableAuditoria").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/auditoria/table_auditoria.php",
      dataSrc: "",
    },
    columns: [
      { data: "nombre_empleado" },
      { data: "apellido_empleado" },
      { data: "descripcion" },
      { data: "idReservacion" },
      { data: "tipo" },
      { data: "numero" },
      { data: "nombre_paquete" },
      { data: "Fecha" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });

})