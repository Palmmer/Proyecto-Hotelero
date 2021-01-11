<?php
require '../../../includes/conexion.php';
if(!empty($_GET)){
    $idPaquete=$_GET['idPaquete'];
    
    $sql="SELECT * FROM paquetes WHERE idPaquete = ?";
    $query=$pdo->prepare($sql);
    $query->execute(array($idPaquete));
    $result=$query->fetch(PDO::FETCH_ASSOC);
    

    if(empty($result)){
        $respuesta= array('status' => false,'msg'=>'Datos no encontrados');

    }else{
        $respuesta= array('status' => true,'data'=>$result);
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}
