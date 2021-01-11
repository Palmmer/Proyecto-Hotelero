<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['apellido']) ) {
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idReservacion = $_POST['idReservacion'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $pais = $_POST['pais'];
        $telefono = $_POST['telefono'];
        $habitacion = $_POST['habitacion'];
        $paquete = $_POST['paquete'];
        $fecha_entrada = $_POST['fecha_entrada'];
        $fecha_salida = $_POST['fecha_salida'];
        $estado = $_POST['estado'];
        $idEmpleado = $_POST['idEmpleado'];
        

        $sql = 'SELECT * FROM reservaciones WHERE idReservacion =? and estado >2 ';
        $query = $pdo->prepare($sql);
        $query->execute(array($idReservacion));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result > 0) {
            $respuesta = array('status' => false, 'msg' => 'Esta reservacion ya esta pagada o cancelada');
        } else {
            if ($idReservacion == 0) {
                $sqlInsert = 'INSERT INTO reservaciones (nombre,apellido,email,pais,telefono,habitacion,paquete,fecha_entrada,fecha_salida,estado,id_usuario) VALUES(?,?,?,?,?,?,?,?,?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre, $apellido, $email, $pais, $telefono,$habitacion,$paquete,$fecha_entrada,$fecha_salida,$estado,$idEmpleado));
                $accion = 1;
            } else {
                    $sqlUpdate = 'UPDATE  reservaciones SET nombre=?,apellido=?,email=?,pais=?,telefono=?,habitacion=?,paquete=?,fecha_entrada=?,fecha_salida=?,estado=? WHERE idReservacion=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $apellido, $email, $pais, $telefono,$habitacion,$paquete,$fecha_entrada,$fecha_salida,$estado,$idReservacion));
                    $accion = 2;
                }
            
        


            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Reservacion creada correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Reservacion actualizada correctamente');
                }
            } 
        }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}

