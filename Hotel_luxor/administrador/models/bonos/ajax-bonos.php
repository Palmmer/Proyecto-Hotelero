<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (empty($_POST['nombre'])|| empty($_POST['cantidad']) ){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idBono = $_POST['idBono'];
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $estado = $_POST['estado'];

       
        $sql = 'SELECT * FROM bonos WHERE idBono =? AND estado !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($idBono));
        $result = $query->fetch(PDO::FETCH_ASSOC);

            if($idBono==0){
                $sqlInsert = 'INSERT INTO bonos (nombre,cantidad,estado) VALUES(?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre,$cantidad,$estado));
                $accion = 1; 
            } else {
                $sqlUpdate = 'UPDATE bonos SET nombre=?,cantidad=?,estado=? WHERE idBono=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $cantidad ,$estado, $idBono));
                    $accion = 2;
            }
               


            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Bono creado correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Bono actualizado correctamente');
                }
            }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}