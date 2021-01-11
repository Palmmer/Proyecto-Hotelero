<?php
require_once '../../../includes/conexion.php';

$sql= 'SELECT reservaciones.idReservacion, reservaciones.nombre, reservaciones.apellido, reservaciones.email, reservaciones.pais,
reservaciones.telefono,reservaciones.fecha_entrada, reservaciones.fecha_salida, reservaciones.estado, 
habitaciones.tipo, habitaciones.numero, paquetes.nombre as nombre_paquete
FROM reservaciones inner join habitaciones on reservaciones.habitacion = habitaciones.idHabitacion 
inner join paquetes on reservaciones.paquete = paquetes.idPaquete ';
$query= $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){
    if($consulta[$i]['estado']==1){
            $consulta[$i]['estado']= '<span class="badge badge-secondary">Pendiente</span>';
        }else if ($consulta[$i]['estado']==2){
            $consulta[$i]['estado']= '<span class="badge badge-success">Confirmada</span>';
        }else if ($consulta[$i]['estado']==3){
            $consulta[$i]['estado']= '<span class="badge badge-danger">Cancelada</span>';
        }else{
            $consulta[$i]['estado']= '<span class="badge badge-primary">Pagada</span>';
        }

    
       $consulta[$i]['acciones']= '
        <button class="btn btn-info" title="Editar" onclick="editReservacion('.$consulta[$i]['idReservacion'].')"
        ><a class="fa fa-pencil-square-o "></a></button>
        <button class="btn btn-secondary" title="Servicios" onclick="openServicios('.$consulta[$i]['idReservacion'].')"
        ><a class="fa fa-life-ring "></a></button>'; 
   
 
}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();