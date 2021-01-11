<?php
require_once '../../../includes/conexion.php';

$sql= 'SELECT * FROM usuarios INNER JOIN cargo  ON usuarios.id_cargo=cargo.id  WHERE usuarios.estado !=0 AND usuarios.id_cargo=2';
$query= $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){
    if($consulta[$i]['estado']==1){
        $consulta[$i]['estado']= '<span class="badge badge-success">ACTIVO</span>';
    }else{
        $consulta[$i]['estado']= '<span class="badge badge-danger">INACTIVO</span>';
    }

$consulta[$i]['acciones']= '
<button class="btn btn-info" title="Editar" onclick="editHostess('.$consulta[$i]['id_usuario'].')"
><i class="fa fa-pencil-square-o "></i></button>
<button class="btn btn-danger" title="Eliminar" onclick="deleteHostess('.$consulta[$i]['id_usuario'].')"
><i class="fa fa-trash"></i></button>';

}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();