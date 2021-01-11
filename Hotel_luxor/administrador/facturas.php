<?php
require_once 'includes/header.php';
require_once 'includes/modals/modal_factura.php';
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Clientes</h1>
        </div>
        <button class="btn btn-primary" type="button" onclick="openModalFacturas()"> Crear Factura</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableFacturas">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Numero de Factura</th>
                                    <th>RFC</th>
                                    <th>Numero de reservacion</th>
                                    <th>Numero de habitacion</th>
                                    <th>Total reservacion</th>
                                    <th>Total servicios</th>
                                    <th>Fecha de emision </th>
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