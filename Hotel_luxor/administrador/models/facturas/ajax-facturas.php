<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (empty($_POST['idReservacion']) || empty($_POST['idCliente']) ){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idFactura = $_POST['idFactura'];
        $idCliente = $_POST['idCliente'];
        $idReservacion = $_POST['idReservacion'];
        
        
        
       
        $sql = 'SELECT * FROM facturas WHERE idFactura =?';
        $query = $pdo->prepare($sql);
        $query->execute(array($idFactura));
        $result = $query->fetch(PDO::FETCH_ASSOC);

            if($idFactura==0){
                $sqlInsert = 'INSERT INTO facturas(idCliente,idReservacion, fecha ) VALUES(?,?,CURRENT_DATE)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($idCliente, $idReservacion));
                $accion = 1; 
            } else {
                $sqlUpdate = 'UPDATE facturas SET cantidad=?, WHERE idFactura=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($cantidad ,$idFactura));
                    $accion = 2;
            }
               


            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Factura creada correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Servicio actualizado correctamente');
                }
            }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
