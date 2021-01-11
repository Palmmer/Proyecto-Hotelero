<?php
session_start();
if (!empty($_POST)) {
    if (empty($_POST['loginProfesor']) || empty($_POST['contraProfesor'])) {
        echo '<div class="alert alert-dismissible alert-danger">
        <button class="close" type="button" data-dismiss="alert">×</button><a class="alert-link" href="#"></a>Todos los campos son requeridos
      </div>';
    } else {
        require_once 'conexion.php';
        $login = $_POST['loginProfesor'];
        $contra = $_POST['contraProfesor'];


      
        $sql = 'SELECT * FROM usuarios  as u INNER JOIN  cargo as c ON u.id_cargo = c.id WHERE u.usuario =? AND u.id_cargo = 3 AND u.estado !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($login));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($query->rowCount() > 0) {
            if ($contra == $result['clave']) {

                if ($result['estado'] == 1) {
                    $_SESSION['activeC'] = true;
                    $_SESSION['id_usuario'] = $result['id_usuario'];
                    $_SESSION['nombre'] = $result['nombre'];
                    $_SESSION['cargo'] = $result['id_cargo'];
                    $_SESSION['nombre_cargo'] = $result['descripcion'];
                    $_SESSION['apellido'] = $result['apellido'];

                    echo '<div class="alert alert-dismissible alert-success"><a class="alert-link" href="#"></a>Accediendo...</div>';

                } else {
                    echo '<div class="alert alert-dismissible alert-warning">
                    <button class="close" type="button" data-dismiss="alert">×</button><a class="alert-link" href="#"></a>Estado inactivo, comuniquese con el administrador.
                  </div>';
                }
            } else {
                echo '<div class="alert alert-dismissible alert-danger">
            <button class="close" type="button" data-dismiss="alert">×</button><a class="alert-link" href="#"></a>Contraseña o correo incorrecto.
          </div>';
            }
        } else {
            echo '<div class="alert alert-dismissible alert-danger">
        <button class="close" type="button" data-dismiss="alert">×</button><a class="alert-link" href="#"></a>Contraseña o correo incorrecto.
      </div>';
        }
    }
}