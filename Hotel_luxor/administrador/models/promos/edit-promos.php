<?php
require '../../../includes/conexion.php';
if(!empty($_GET)){
    $idPromos=$_GET['idPromos'];
    
    $sql="SELECT * FROM promos WHERE idPromos = ?";
    $query=$pdo->prepare($sql);
    $query->execute(array($idPromos));
    $result=$query->fetch(PDO::FETCH_ASSOC);
    

    if(empty($result)){
        $respuesta= array('status' => false,'msg'=>'Datos no encontrados');

    }else{
        $respuesta= array('status' => true,'data'=>$result);
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}
