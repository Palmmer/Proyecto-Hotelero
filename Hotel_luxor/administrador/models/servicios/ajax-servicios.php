<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (empty($_POST['nombre'])|| empty($_POST['precio']) ){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idServicio = $_POST['idServicio'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $tipo = $_POST['tipo'];
        $estatus = $_POST['estatus'];

       
        $sql = 'SELECT * FROM servicios WHERE idServicio =? AND estatus !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($idServicio));
        $result = $query->fetch(PDO::FETCH_ASSOC);

            if($idServicio==0){
                $sqlInsert = 'INSERT INTO servicios(nombre,precio,tipo,estatus) VALUES(?,?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre, $precio, $tipo, $estatus));
                $accion = 1; 
            } else {
                $sqlUpdate = 'UPDATE servicios SET precio=?,estatus=? WHERE idServicio=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($precio ,$estatus, $idServicio));
                    $accion = 2;
            }
               


            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Servicio creado correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Servicio actualizado correctamente');
                }
            }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}

