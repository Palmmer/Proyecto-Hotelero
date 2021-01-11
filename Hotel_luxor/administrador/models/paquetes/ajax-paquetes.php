<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (empty($_POST['nombre'])|| empty($_POST['precio']) ){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idPaquete = $_POST['idPaquete'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $estado = $_POST['estado'];

       
        $sql = 'SELECT * FROM paquetes WHERE idPaquete =? AND estado !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($idPaquete));
        $result = $query->fetch(PDO::FETCH_ASSOC);

            if($idPaquete==0){
                $sqlInsert = 'INSERT INTO paquetes (nombre,precio,estado) VALUES(?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre,$precio,$estado));
                $accion = 1; 
            } else {
                $sqlUpdate = 'UPDATE paquetes SET nombre=?,precio=?,estado=? WHERE idPaquete=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $precio ,$estado, $idPaquete));
                    $accion = 2;
            }
               


            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Paquete creado correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Paquete actualizado correctamente');
                }
            }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}

