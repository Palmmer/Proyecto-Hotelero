<?php
require_once '../../../includes/conexion.php';

if($_POST){
    $idproyecto= $_POST['idproyecto'];
    $sql="DELETE FROM reservaciones WHERE IdReservaciones=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($idproyecto));
   
    if($result){
      $respuesta= array('status'=>true,'msg'=>'Reservacion eliminada correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar la reservacion'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}