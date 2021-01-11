<!-- Modal Servicios Externos -->
<div class="modal fade" id="modalSE" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Nuevo Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formSE" name="formSE">
                    <input type="hidden" name="idServicio" id="idServicio" value="">
                    <div class="form-group">
                        <label for="control-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Costo:</label>
                        <input type="text" class="form-control" name="precio" id="precio">
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <select class="form-control" name="tipo" id="tipo">
                            <option value="Externo">Externo</option>
                        </select>
                    </div>        
                     <div class="form-group">
                        <label for="estatus">Estado</label>
                        <select class="form-control" name="estatus" id="estatus">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>                           
                    <div class="modal-footer">
                <button class="btn btn-primary" id= "action" type="submit">Guardar</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>