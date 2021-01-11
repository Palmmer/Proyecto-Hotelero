<?php
require_once '../../../includes/conexion.php';

$sql= 'SELECT usuarios.nombre as nombre_empleado, usuarios.apellido as apellido_empleado, cargo.descripcion,
reservaciones.idReservacion,tipo,numero, paquetes.nombre as nombre_paquete, auditoria.Fecha
FROM auditoria inner join reservaciones on auditoria.idReservacion= reservaciones.idReservacion inner join habitaciones on reservaciones.habitacion = habitaciones.idHabitacion 
inner join paquetes on reservaciones.paquete = paquetes.idPaquete inner join usuarios
on reservaciones.id_usuario =usuarios.id_usuario inner join cargo on  usuarios.id_cargo= cargo.id';
$query= $pdo->prepare($sql);
$query->execute();
$consulta = $query->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();