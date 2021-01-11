<?php
require_once 'includes/header.php';
require_once 'includes/modals/modal_hostess.php';
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Lista de Hostess</h1>
        </div>
        <button class="btn btn-primary" type="button" onclick="openModalHostess()"> Nuevo Hostess</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableHostess">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Usuario</th>
                                    <th>Cargo</th>
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