<?php
require_once '../../../includes/conexion.php';

if($_POST){
    $idPromos= $_POST['idPromos'];
    $sql="DELETE FROM promos WHERE idPromos=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($idPromos));
   
    if($result){
      $respuesta= array('status'=>true,'msg'=>'Promo eliminado correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar la promo'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}