<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (empty($_POST['reservacion'])|| empty($_POST['cantidad']) || empty($_POST['idServicio']) ){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $id = $_POST['id'];
        $idServicio = $_POST['idServicio'];
        $reservacion = $_POST['reservacion'];
        $cantidad = $_POST['cantidad'];
        
        
       
        $sql = 'SELECT * FROM reservacion_servicios WHERE id =?';
        $query = $pdo->prepare($sql);
        $query->execute(array($id));
        $result = $query->fetch(PDO::FETCH_ASSOC);

            if($id==0){
                $sqlInsert = 'INSERT INTO reservacion_servicios(idServicio,reservacion, cantidad, fecha ) VALUES(?,?,?,CURRENT_DATE)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($idServicio, $reservacion, $cantidad));
                $accion = 1; 
            } else {
                $sqlUpdate = 'UPDATE reservacion_servicios SET cantidad=?, WHERE id=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($cantidad ,$id));
                    $accion = 2;
            }
               


            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Servicio agregado correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Servicio actualizado correctamente');
                }
            }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}

