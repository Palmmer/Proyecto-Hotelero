<div class="modal fade" id="modalFactura" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Nueva Factura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formFactura" name="formFactura">
                    <input type="hidden" name="idFactura" id="idFactura" value="">
                    <div class="form-group">
                        <label for="idCliente">Cliente</label>
                        <select class="form-control" name="idCliente" id="idCliente">

                        </select>
                </div>
                <div class="form-group">
                        <label for="idReservacion"> Numero de cuarto </label>
                        <select class="form-control" name="idReservacion" id="idReservacion">

                        </select>
                </div>  
                    
                    <div class="modal-footer">
                <button class="btn btn-primary" id= "action" type="submit">Agregar</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>