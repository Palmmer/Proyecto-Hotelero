<?php
require_once 'includes/header.php';
require_once 'includes/modals/modal_clientes.php';
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Clientes</h1>
        </div>
        <button class="btn btn-primary" type="button" onclick="openModalClientes()"> Registrar nuevo</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableClientes">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>RFC</th> 
                                    <th>Telefono</th>
                                    <th>Correo electronico</th>
                                    <th>Direccion</th>
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