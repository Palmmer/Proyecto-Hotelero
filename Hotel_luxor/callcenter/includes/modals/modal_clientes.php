<!-- Modal Clientes -->
<div class="modal fade" id="modalClientes" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Nuevo Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCliente" name="formCliente">
                    <input type="hidden" name="idCliente" id="idCliente" value="">
                    <div class="form-group">
                        <label for="control-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Apellido Paterno:</label>
                        <input type="text" class="form-control" name="apellido" id="apellido">
                    </div>
                    <div class="form-group">
                        <label for="control-label">RFC:</label>
                        <input type="text" class="form-control" name="rfc" id="rfc">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Correo:</label>
                        <input type="text" class="form-control" name="correo" id="correo">
                    </div> 
                    <div class="form-group">
                        <label for="control-label">Direccion:</label>
                        <input type="text" class="form-control" name="direccion" id="direccion">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Telefono:</label>
                        <input type="text" class="form-control" name="telefono" id="telefono">
                    </div>                     
                    <div class="modal-footer">
                <button class="btn btn-primary" id= "action" type="submit">Guardar</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>