<?php
require_once '../../../includes/conexion.php';

$sql= 'SELECT * FROM servicios WHERE tipo="Interno"';
$query= $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){
    if($consulta[$i]['estatus']==1){
        $consulta[$i]['estatus']= '<span class="badge badge-success">ACTIVO</span>';
    }else{
        $consulta[$i]['estatus']= '<span class="badge badge-danger">INACTIVO</span>';
    }

$consulta[$i]['acciones']= '
<button class="btn btn-info" title="Editar" onclick="editServicioI('.$consulta[$i]['idServicio'].')"
><i class="fa fa-pencil-square-o "></i></button>
<button class="btn btn-danger" title="Eliminar" onclick="deleteServicioI('.$consulta[$i]['idServicio'].')"
><i class="fa fa-trash"></i></button>';

}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();