<?php
require_once '../../../includes/conexion.php';

if($_POST){
    $id_usuario= $_POST['id_usuario'];
    $sql="DELETE FROM usuarios WHERE id_usuario=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($id_usuario));
   
    if($result){
      $respuesta= array('status'=>true,'msg'=>'Usuario eliminado correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar el usuario'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}