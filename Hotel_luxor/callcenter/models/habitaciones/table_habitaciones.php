<?php
require_once '../../../includes/conexion.php';

$sql= 'SELECT * FROM habitaciones  WHERE estado !=0';
$query= $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){
    if($consulta[$i]['estado']==1){
        $consulta[$i]['estado']= '<span class="badge badge-success">Disponible</span>';
    }else if($consulta[$i]['estado']==2){
        $consulta[$i]['estado']= '<span class="badge badge-danger">Ocupado</span>';
    }else{
        $consulta[$i]['estado']= '<span class="badge badge-warning">Limpieza</span>';
    }

$consulta[$i]['acciones']= '
<button class="btn btn-info" title="Editar" onclick="editHabitacion('.$consulta[$i]['idHabitacion'].')"
><i class="fa fa-pencil-square-o "></i></button>
<button class="btn btn-danger" title="Eliminar" onclick="deleteHabitacion('.$consulta[$i]['idHabitacion'].')"
><i class="fa fa-trash"></i></button>';

}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();