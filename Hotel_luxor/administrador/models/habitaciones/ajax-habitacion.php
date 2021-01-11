<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (empty($_POST['numero']) || empty($_POST['tipo'])  || empty($_POST['precio'])) {
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idHabitacion = $_POST['idHabitacion'];
        $tipo = $_POST['tipo'];
        $precio = $_POST['precio'];
        $numero = $_POST['numero'];
        $CantidadCamas = $_POST['CantidadCamas'];
        $estado = $_POST['estado'];
        $descripcion = $_POST['descripcion'];
       

       
        $sql = 'SELECT * FROM habitaciones WHERE numero = ? AND idHabitacion != ? AND estado!=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($numero, $idHabitacion));
        $result = $query->fetch(PDO::FETCH_ASSOC);
      
        if ($result > 0) {
            $respuesta = array('status' => false, 'msg' => 'Error');
        } else {
            if ($idHabitacion == 0) {
                $sqlInsert = 'INSERT INTO habitaciones (tipo,precio,numero,CantidadCamas,estado,descripcion) VALUES(?,?,?,?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($tipo, $precio,$numero, $CantidadCamas, $estado, $descripcion ));
                $accion = 1;
            } else {
                if (empty($CantidadCamas)) {
                    $sqlUpdate = 'UPDATE  habitaciones SET tipo=?,precio=?,estado=?,descripcion=? WHERE idHabitacion=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($tipo, $precio, $estado,$descripcion, $idHabitacion));
                    $accion = 2;
                } else {
                    $sqlUpdate = 'UPDATE  habitaciones SET tipo=?,precio=?,CantidadCamas=?,estado=?,descripcion=? WHERE idHabitacion=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($tipo, $precio, $CantidadCamas,$estado,$descripcion ,$idHabitacion));
                    $accion = 3;
                }
            }


            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Habitacion creada correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Habitacion actualizada correctamente');
                }
            }
        }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
