<?php
require_once '../../../includes/conexion.php';

$sql= 'SELECT  habitaciones.numero, facturas.fecha, facturas.idFactura, clientes.rfc, reservaciones.idReservacion, (habitaciones.precio * (DATEDIFF(reservaciones.fecha_salida,reservaciones.fecha_entrada))+paquetes.precio) as total_factura , sum(servicios.precio * reservacion_servicios.cantidad) as total_servicios
from facturas inner join clientes on facturas.idCliente=clientes.idCliente inner join reservaciones on  reservaciones.idReservacion= facturas.idReservacion inner join paquetes on reservaciones.paquete = paquetes.idPaquete inner join habitaciones on habitaciones.idHabitacion= reservaciones.habitacion inner join reservacion_servicios on reservaciones.idReservacion = reservacion_servicios.reservacion 
inner join servicios on reservacion_servicios.idServicio = servicios.idServicio GROUP by reservaciones.idReservacion ';
$query= $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){
   
    
       $consulta[$i]['acciones']= '<button class="btn btn-light" title="Abrir archivo"><i><a target="_blank" href="print.php?idFactura='.$consulta[$i]['idFactura'].'" class="fa fa-print"></a></i></button>'; 
   
 
}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();