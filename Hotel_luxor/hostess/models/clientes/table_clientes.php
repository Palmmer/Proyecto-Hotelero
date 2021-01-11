<?php
require_once '../../../includes/conexion.php';

$sql= 'SELECT * FROM clientes';
$query= $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){

$consulta[$i]['acciones']= '
<button class="btn btn-info" title="Editar" onclick="editCliente('.$consulta[$i]['idCliente'].')"
><i class="fa fa-pencil-square-o "></i></button>
<button class="btn btn-danger" title="Eliminar" onclick="deleteCliente('.$consulta[$i]['idCliente'].')"
><i class="fa fa-trash"></i></button>';

}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();