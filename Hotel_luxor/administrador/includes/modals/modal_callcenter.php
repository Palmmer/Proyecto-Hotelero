<!-- Modal Hostess -->
<div class="modal fade" id="modalCallcenter" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Nuevo Callcenter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCallcenter" name="formCallcenter">
                    <input type="hidden" name="id_usuario" id="id_usuario" value="">
                    <div class="form-group">
                        <label for="control-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Apellido Paterno:</label>
                        <input type="text" class="form-control" name="apellido" id="apellido">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Usuario:</label>
                        <input type="text" class="form-control" name="usuario" id="usuario">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Contraseña:</label>
                        <input type="password" class="form-control" name="clave" id="clave">
                    </div>
                     <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado" id="estado">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="id_cargo">Rol:</label>
                        <select class="form-control" name="id_cargo" id="id_cargo">
                            <option value="3">Callcenter</option>
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