<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (empty($_POST['nombre']) || empty($_POST['apellido'])  || empty($_POST['usuario'])) {
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $id_usuario = $_POST['id_usuario'];
        $nombre = $_POST['nombre'];
        $apelllido = $_POST['apellido'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $estado = $_POST['estado'];
        $id_cargo = $_POST['id_cargo'];
       

       
        $sql = 'SELECT * FROM usuarios WHERE usuario = ? AND id_usuario != ? AND estado!=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($usuario, $id_usuario));
        $result = $query->fetch(PDO::FETCH_ASSOC);
      
        if ($result > 0) {
            $respuesta = array('status' => false, 'msg' => 'Error');
        } else {
            if ($id_usuario == 0) {
                $sqlInsert = 'INSERT INTO usuarios (nombre,apellido,usuario,clave,estado,id_cargo) VALUES(?,?,?,?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre, $apelllido,$usuario, $clave, $estado, $id_cargo ));
                $accion = 1;
            } else {
                if (empty($clave)) {
                    $sqlUpdate = 'UPDATE  usuarios SET nombre=?,apellido=?,estado=?,id_cargo=? WHERE id_usuario=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $apelllido, $estado,$id_cargo, $id_usuario));
                    $accion = 2;
                } else {
                    $sqlUpdate = 'UPDATE  usuarios SET nombre=?,apellido=?,clave=?,estado=?,id_cargo=? WHERE id_usuario=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $apelllido, $clave, $estado,$id_cargo, $id_usuario));
                    $accion = 3;
                }
            }


            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Usuario creado correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Usuario actualizado correctamente');
                }
            }
        }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
