<?php
require_once 'includes/header.php';
require_once 'includes/modals/modal_reservaciones.php';
require_once 'includes/modals/modal_table-servicios.php';
require_once 'includes/modals/modal_nuevoServicio.php';
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Reservacion</h1>
        </div>
        <div>
        <button class="btn btn-primary" align="right" type="button" onclick="openModalReservacion()"> Nueva Reservacion</button>
        <button class="btn btn-primary" align="right" type="button" onclick="openNuevo()"> Agregar Servicio </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableReservacion">
                            <thead>
                                <tr>
                                <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                    <th>Pais</th>
                                    <th>Telefono</th>
                                    <th>Tipo habitacion</th>
                                    <th>Numero de habitacion</th>
                                    <th>Fecha Entrada</th>
                                    <th>Fecha Salida</th>
                                    <th>Paquete</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>
</main>

<?php
require_once 'includes/footer.php';
?>