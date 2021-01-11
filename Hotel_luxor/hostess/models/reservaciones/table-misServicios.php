<?php
 require_once 'C:\xampp1\htdocs\hotel_luxor\includes\conexion.php';

$idReservacion=$_GET['idReservacion'];
$sql= 'SELECT servicios.nombre, servicios.precio, reservacion_servicios.cantidad , (servicios.precio * reservacion_servicios.cantidad) as total , reservacion_servicios.fecha,
reservacion_servicios.id , reservacion_servicios.idServicio
FROM reservacion_servicios inner join servicios 
on reservacion_servicios.idServicio=servicios.idServicio WHERE reservacion_servicios.reservacion=?';
$query= $pdo->prepare($sql);
$query->execute(array($idReservacion));

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){



$consulta[$i]['acciones']= '
<button class="btn btn-danger" title="Eliminar" onclick="delete_miServicio('.$consulta[$i]['id'].')"><i class="fa fa-trash"></i></button>';
}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();
