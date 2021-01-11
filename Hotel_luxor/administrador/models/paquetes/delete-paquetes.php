<?php
require_once '../../../includes/conexion.php';

if($_POST){
    $idPaquete= $_POST['idPaquete'];
    $sql="DELETE FROM paquetes WHERE idPaquete=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($idPaquete));
   
    if($result){
      $respuesta= array('status'=>true,'msg'=>'Paquete eliminado correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar el paquete'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}