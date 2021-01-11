<!-- Modal para habitaciones -->
<div class="modal fade" id="modalHabitacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Nueva Habitacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formHabitacion" name="formHabitacion">
                    <input type="hidden" name="idHabitacion" id="idHabitacion" value="">
                    <div class="form-group">
                        <label for="control-label">Numero:</label>
                        <input type="text" class="form-control" name="numero" id="numero">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Costo:</label>
                        <input type="text" class="form-control" name="precio" id="precio">
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <select class="form-control" name="tipo" id="tipo">
                            <option value="Suit-deluxe">Suit deluxe</option>
                            <option value="Suit-love">Suit love</option>
                            <option value="Suit-Jr">Suit Jr</option>
                            <option value="Quad">Quad</option>
                            <option value="Double">Double</option>
                            <option value="Single">Single</option>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="CantidadCamas">Cantidad de camas:</label>
                        <select class="form-control" name="CantidadCamas" id="CantidadCamas">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="control-label">Descripcion:</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion">
                    </div>    
                     <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado" id="estado">
                            <option value="1">Disponible</option>
                            <option value="2">Ocupada</option>
                            <option value="3">Limpieza</option>
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