<?php
require_once '../../../includes/conexion.php';

if($_POST){
    $idServicio= $_POST['idServicio'];
    $sql="DELETE FROM servicios WHERE idServicio=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($idServicio));
   
    if($result){
      $respuesta= array('status'=>true,'msg'=>'Usuario eliminado correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar el usuario'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}