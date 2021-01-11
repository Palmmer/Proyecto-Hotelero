<?php
require_once 'includes/header.php';
require_once 'includes/modals/modal_habitaciones.php';
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Habitaciones</h1>
        </div>
        <button class="btn btn-primary" type="button" onclick="openModalHabitacion()"> Nueva Habitacion</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableHabitaciones">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Numero</th>
                                    <th>Tipo</th>
                                    <th>Descripcion</th>
                                    <th>Cantidad de camas</th>
                                    <th>Costo</th>
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