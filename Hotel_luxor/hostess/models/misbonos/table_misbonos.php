<?php
require_once 'C:\xampp1\htdocs\Hotel_luxor\hostess\includes\sesion.php';
require_once '../../../includes/conexion.php';
$id_usuario= $_SESSION['id_usuario'];

$sql= 'SELECT bonos.nombre, bonos.cantidad, mis_bonos.Fecha FROM bonos inner join  mis_bonos on bonos.idBono = mis_bonos.idBono  WHERE mis_bonos.idEmpleado =? ';
$query= $pdo->prepare($sql);
$query->execute(array($id_usuario));

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){
   


}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();