<?php
require '../../../includes/conexion.php';
if(!empty($_GET)){
    $id_usuario=$_GET['id_usuario'];
    
    $sql="SELECT * FROM usuarios WHERE id_usuario = ?";
    $query=$pdo->prepare($sql);
    $query->execute(array($id_usuario));
    $result=$query->fetch(PDO::FETCH_ASSOC);
    

    if(empty($result)){
        $respuesta= array('status' => false,'msg'=>'Datos no encontrados');

    }else{
        $respuesta= array('status' => true,'data'=>$result);
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}
