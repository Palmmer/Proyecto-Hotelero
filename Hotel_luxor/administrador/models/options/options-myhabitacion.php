<?php
require_once '../../../includes/conexion.php';
$idReservacion=$_GET['idReservacion'];
$sql="SELECT idHabitacion, numero, tipo FROM habitaciones left join reservaciones
 on reservaciones.habitacion = habitaciones.idHabitacion WHERE  reservaciones.idReservacion=?";
$query =$pdo->prepare($sql);
$query->execute(array($idReservacion));

$data=$query->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data,JSON_UNESCAPED_UNICODE);