<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (empty($_POST['nombre'])|| empty($_POST['cantidad']) ){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idPromos = $_POST['idPromos'];
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $estado = $_POST['estado'];

       
        $sql = 'SELECT * FROM promos WHERE idPromos =? AND estado !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($idPromos));
        $result = $query->fetch(PDO::FETCH_ASSOC);

            if($idPromos==0){
                $sqlInsert = 'INSERT INTO promos (nombre,cantidad,estado) VALUES(?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre,$cantidad,$estado));
                $accion = 1; 
            } else {
                $sqlUpdate = 'UPDATE promos SET nombre=?,cantidad=?,estado=? WHERE idPromos=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $cantidad ,$estado, $idPromos));
                    $accion = 2;
            }
               


            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Promo creada correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Promo actualizada correctamente');
                }
            }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}