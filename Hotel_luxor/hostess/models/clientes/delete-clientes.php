<?php
require_once '../../../includes/conexion.php';

if($_POST){
    $idCliente= $_POST['idCliente'];
    $sql="DELETE FROM clientes WHERE idCliente=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($idCliente));
   
    if($result){
      $respuesta= array('status'=>true,'msg'=>'Cliente eliminado correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar el usuario'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}