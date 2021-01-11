<?php
require_once '../../../includes/conexion.php';

if($_POST){
    $id= $_POST['id'];
    $sql="DELETE FROM reservacion_servicios WHERE id=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($id));
   
    if($result){
      $respuesta= array('status'=>true,'msg'=>'Servicio eliminado correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar el servicio'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}