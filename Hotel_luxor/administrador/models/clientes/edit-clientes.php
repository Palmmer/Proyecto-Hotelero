<?php
require '../../../includes/conexion.php';
if(!empty($_GET)){
    $idCliente=$_GET['idCliente'];
    
    $sql="SELECT * FROM clientes WHERE idCliente = ?";
    $query=$pdo->prepare($sql);
    $query->execute(array($idCliente));
    $result=$query->fetch(PDO::FETCH_ASSOC);
    

    if(empty($result)){
        $respuesta= array('status' => false,'msg'=>'Datos no encontrados');

    }else{
        $respuesta= array('status' => true,'data'=>$result);
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}
