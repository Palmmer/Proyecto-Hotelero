<?php
require '../../../includes/conexion.php';
if(!empty($_GET)){
    $idHabitacion=$_GET['idHabitacion'];
    
    $sql="SELECT * FROM habitaciones WHERE idHabitacion = ?";
    $query=$pdo->prepare($sql);
    $query->execute(array($idHabitacion));
    $result=$query->fetch(PDO::FETCH_ASSOC);
    

    if(empty($result)){
        $respuesta= array('status' => false,'msg'=>'Datos no encontrados');

    }else{
        $respuesta= array('status' => true,'data'=>$result);
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}
