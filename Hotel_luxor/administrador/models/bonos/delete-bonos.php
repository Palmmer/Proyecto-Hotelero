<?php
require_once '../../../includes/conexion.php';

if($_POST){
    $idBono= $_POST['idBono'];
    $sql="DELETE FROM bonos WHERE idBono=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($idBono));
   
    if($result){
      $respuesta= array('status'=>true,'msg'=>'Bono eliminado correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar la Bono'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}