<div class="modal fade" id="modalReservacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Nuevo Bono</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formReservacion" name="formReservacion">
                <input type="hidden" name="idReservacion" id="idReservacion" value="">
                <input type="hidden" name="idEmpleado" id="idEmpleado" value="<?=$_SESSION['id_usuario'];?>">
                <div class="form-group">
                        <label for="control-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
                <div class="form-group">
                        <label for="control-label">Apellido:</label>
                        <input type="text" class="form-control" name="apellido" id="apellido">
                </div>
                <div class="form-group">
                        <label for="control-label">Email:</label>
                        <input type="text" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                        <label for="control-label">Pais:</label>
                        <input type="text" class="form-control" name="pais" id="pais">
                </div>
                <div class="form-group">
                        <label for="control-label">Telefono:</label>
                        <input type="num" class="form-control" name="telefono" id="telefono">
                </div>
                <div class="form-group">
                        <label for="habitacion"> Habitaciones disponibles</label>
                        <select class="form-control" name="habitacion" id="habitacion">

                        </select>
                </div>
                <div class="form-group">
                        <label for="paquete"> Paquetes </label>
                        <select class="form-control" name="paquete" id="paquete">

                        </select>
                </div>
                <div class="form-group">
                        <label for="control-label">Fecha entrada:</label>
                        <input type="date" class="form-control" name="fecha_entrada" id="fecha_entrada">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Fecha salida:</label>
                        <input type="date" class="form-control" name="fecha_salida" id="fecha_salida">
                    </div>
                
                    <div class="form-group">
                        <label for="listTipo">Estado:</label>
                        <select class="form-control" name="estado" id="estado">
                            <option value="1">Pendiente</option>
                            <option value="2">Confirmada</option>
                            <option value="3">Cancelada</option>
                            <option value="4">Pagada</option>
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