<?php
require_once '../../../includes/conexion.php';

if($_POST){
    $idHabitacion= $_POST['idHabitacion'];
    $sql="DELETE FROM habitaciones WHERE idHabitacion=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($idHabitacion));
   
    if($result){
      $respuesta= array('status'=>true,'msg'=>'Habitacion eliminada correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar la habitacion'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}