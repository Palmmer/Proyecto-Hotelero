<?php
require_once 'includes/header.php';
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Auditoria de reservaciones</h1>
        </div>
       
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableAuditoria">
                            <thead>
                                <tr>
                                    <th>Nombre empleado</th>
                                    <th>Apellido</th>
                                    <th>Puesto</th>
                                    <th>Numero de reservacion</th>
                                    <th>Tipo habitacion</th>
                                    <th>Numero de habitacion</th>
                                    <th>Paquete</th>
                                    <th>Fecha de registro</th>
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