<!-- Modal Comentarios-->
<div class="modal fade" id="modalNuevoServicio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Nuevo Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formnServicio" name="formnServicio">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="form-group">
                        <label for="reservacion">Habitacion</label>
                        <select class="form-control" name="reservacion" id="reservacion">

                        </select>
                </div>
                <div class="form-group">
                        <label for="idServicio"> Servicios </label>
                        <select class="form-control" name="idServicio" id="idServicio">

                        </select>
                </div>
                <div class="form-group">
                        <label for="control-label">Cantidad:</label>
                        <input type="text" class="form-control" name="cantidad" id="cantidad">
                    </div>    
                    
                    <div class="modal-footer">
                <button class="btn btn-primary" id= "action" type="submit">Agregar</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>