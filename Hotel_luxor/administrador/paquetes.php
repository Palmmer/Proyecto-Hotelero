<?php
require_once 'includes/header.php';
require_once 'includes/modals/modal_paquetes.php';
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Paquetes de reservacion</h1>
        </div>
        <button class="btn btn-primary" type="button" onclick="openModalPaquetes()">Nuevo Paquetes</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tablePaquetes">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Costo</th>
                                    <th>Estatus</th>
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