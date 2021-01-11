<?php
session_start();
if (!empty($_SESSION['active'])) {
    header('Location:administrador/');
} else if (!empty($_SESSION['activeC'])) {
    header('Location:callcenter/');
} else if (!empty($_SESSION['activeH'])) {
    header('Location:hostess/');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Sistema hotelero</title>
</head>

<body>
    <header class="main-header">
        <div class="main-cont">
            <div class="desc-header">
                <img src="images/fondolegal.jpg" alt="image">
                <p>SISTEMA HOTELERO</p>
            </div>
        </div>
        <div class="cont-header">
            <h1>BIENVENIDO</h1>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link active" id="nav-admin-tab" data-toggle="tab" href="#nav-admin" role="tab" aria-controls="nav-home" aria-selected="true">Administrador</a>
                    <a class="nav-link" id="nav-prof-tab" data-toggle="tab" href="#nav-prof" role="tab" aria-controls="nav-profile" aria-selected="false">Call-center</a>
                    <a class="nav-link" id="nav-alumn-tab" data-toggle="tab" href="#nav-alumn" role="tab" aria-controls="nav-contact" aria-selected="false">Hostess</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-admin" role="tabpanel">
                    <form action="" onsubmit="return validar()">
                        <div class="form-group">
                            <input class="form-control" name="usuario" id="usuario" type="text" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="contra" id="contra" type="password" placeholder="Contraseña">
                        </div>
                        <div id="messageAdmin"></div>
                        <button id="loginAdmin" class="btn btn-primary btn-lg btn-block" type="button">INICIAR SESION</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-prof" role="tabpanel">
                    <form action="" onsubmit="return validar()">
                        <div class="form-group">
                            <input class="form-control" name="usuarioCallcenter" id="usuarioCallcenter" type="text"  placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="contraCallcenter" id="contraCallcenter" type="password" placeholder="Contraseña">
                        </div>
                        <div id="messageProfesor"></div>
                        <button id="loginProfesor" class="btn btn-primary btn-lg btn-block" type="button">INICIAR SESION</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-alumn" role="tabpanel">
                    <form action="" onsubmit="return validar()">
                        <div class="form-group">
                            <input class="form-control" name="usuarioHostess" id="usuarioHostess" type="text"  placeholder="usuario">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="contraHostess" id="contraHostess" type="password" placeholder="Contraseña">
                        </div>

                        <div id="messageAlumno"></div>
                        
                        <button id="loginAlumno" class="btn btn-primary btn-lg btn-block" type="button">INICIAR SESION</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/login.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>