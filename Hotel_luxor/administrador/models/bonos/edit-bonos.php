<?php
require '../../../includes/conexion.php';
if(!empty($_GET)){
    $idBono=$_GET['idBono'];
    
    $sql="SELECT * FROM bonos WHERE idBono = ?";
    $query=$pdo->prepare($sql);
    $query->execute(array($idBono));
    $result=$query->fetch(PDO::FETCH_ASSOC);
    

    if(empty($result)){
        $respuesta= array('status' => false,'msg'=>'Datos no encontrados');

    }else{
        $respuesta= array('status' => true,'data'=>$result);
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}
