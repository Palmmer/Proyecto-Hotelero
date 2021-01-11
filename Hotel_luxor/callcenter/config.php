<?php
require_once 'includes/header.php';
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Configuracion</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Informacion de la cuenta</h3>
                <div class="tile-body">
                    <form>
                        <div class="form-group">
                            <label class="control-label">Nombre:</label>
                            <input class="form-control" type="text" readonly="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Apellido Paterno:</label>
                            <input class="form-control" type="text" readonly="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Apellido Materno:</label>
                            <input class="form-control" type="text" readonly="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Correo Institucional:</label>
                            <input class="form-control" type="email" readonly="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Actualizar Contraseña</h3>
                <div class="tile-body">
                    <form class="form-horizontal">
                        <div class="form-group row">
                            <label class="control-label col-md-3">Contraseña:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="button">Actualizar</button>
                        </div>
                </div>
            </div>
</main>


<?php
require_once 'includes/footer.php';
?>