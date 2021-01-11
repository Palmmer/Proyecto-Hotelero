<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (empty($_POST['nombre']) || empty($_POST['apellido'])  || empty($_POST['rfc'])) {
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idCliente = $_POST['idCliente'];
        $nombre = $_POST['nombre'];
        $apelllido = $_POST['apellido'];
        $rfc = $_POST['rfc'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
       

       
        $sql = 'SELECT * FROM clientes WHERE rfc = ? AND idCliente != ?';
        $query = $pdo->prepare($sql);
        $query->execute(array($rfc, $idCliente));
        $result = $query->fetch(PDO::FETCH_ASSOC);
      
        if ($result > 0) {
            $respuesta = array('status' => false, 'msg' => 'Error');
        } else {
            if ($idCliente == 0) {
                $sqlInsert = 'INSERT INTO clientes (nombre,apellido,rfc,correo,telefono,direccion) VALUES(?,?,?,?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre, $apelllido,$rfc, $correo, $telefono, $direccion ));
                $accion = 1;
            } else {
                if (empty($correo)) {
                    $sqlUpdate = 'UPDATE  clientes SET nombre=?,apellido=?,telefono=?,direccion=? WHERE idCliente=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $apelllido, $telefono,$direccion, $idCliente));
                    $accion = 2;
                } else {
                    $sqlUpdate = 'UPDATE  clientes SET nombre=?,apellido=?,rfc=?,correo=?,telefono=?,direccion=? WHERE idCliente=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $apelllido,$rfc, $correo, $telefono, $direccion, $idCliente));
                    $accion = 3;
                }
            }


            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Cliente creado correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Cliente actualizado correctamente');
                }
            }
        }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}