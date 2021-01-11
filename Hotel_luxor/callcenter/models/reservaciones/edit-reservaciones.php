<?php
require '../../../includes/conexion.php';
if(!empty($_GET)){
    $idReservacion=$_GET['idReservacion'];
    
    $sql="SELECT * FROM reservaciones WHERE idReservacion = ?";
    $query=$pdo->prepare($sql);
    $query->execute(array($idReservacion));
    $result=$query->fetch(PDO::FETCH_ASSOC);

    if(empty($result)){
        $respuesta= array('status' => false,'msg'=>'Datos no encontrados');

    }else{
        $respuesta= array('status' => true,'data'=>$result);
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}