<?php
require_once '../../../includes/conexion.php';
$sql="SELECT reservaciones.idReservacion, reservaciones.nombre, reservaciones.apellido, habitaciones.numero FROM reservaciones
inner join habitaciones on reservaciones.habitacion = habitaciones.idHabitacion
where reservaciones.estado =1 or reservaciones.estado=2";
$query =$pdo->prepare($sql);
$query->execute();

$data=$query->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data,JSON_UNESCAPED_UNICODE);