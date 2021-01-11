 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
        <p class="app-sidebar__user-name"><?=$_SESSION['nombre'];?> <?=$_SESSION['apellido'];?> </p>
        <p class="app-sidebar__user-designation"><?=$_SESSION['nombre_cargo'];?></p>
        </div>
      </div>
      <ul class="app-menu">
         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa fa-users"></i><span class="app-menu__label">Usuarios del Sistema</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="lista_usuarios.php"><i class="icon fa fa-list"></i> Administradores</a></li>
            <li><a class="treeview-item" href="lista_hostess.php" ><i class="icon fa fa-list"></i> Hostess</a></li>
            <li><a class="treeview-item" href="lista_callcenter.php"><i class="icon fa fa-list"></i> Callcenter</a></li>
          </ul>
          </li>
          <li><a class="app-menu__item" href="reservaciones.php"><i class="app-menu__icon fa fa fa-clipboard"></i><span
         class="app-menu__label">Reservaciones</span></a></li>
         <li><a class="app-menu__item" href="habitaciones.php"><i class="app-menu__icon fa fa-bed"></i><span
         class="app-menu__label">Habitaciones</span></a></li>
         <li><a class="app-menu__item" href="paquetes.php"><i class="app-menu__icon fa fa-briefcase"></i><span
         class="app-menu__label">Paquetes</span></a></li>
         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa fa-life-ring"></i><span class="app-menu__label">Servicios </span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="servicios_internos.php"><i class="icon fa fa-bed"></i> Internos</a></li>
            <li><a class="treeview-item" href="servicios_externos.php" ><i class="icon fa fa-university"></i> Externos</a></li>
          </ul>
          </li>
          <li><a class="app-menu__item" href="clientes.php"><i class="app-menu__icon fa fa-user-circle"></i><span
         class="app-menu__label">Clientes</span></a></li>
         <li><a class="app-menu__item" href="facturas.php"><i class="app-menu__icon fa fa-cart-plus"></i><span
         class="app-menu__label">Facturas</span></a></li>
         <li><a class="app-menu__item" href="promociones.php"><i class="app-menu__icon fa fa-credit-card"></i><span
         class="app-menu__label">Promociones</span></a></li>
         <li><a class="app-menu__item" href="bonos.php"><i class="app-menu__icon fa fa-usd"></i><span
         class="app-menu__label">Bonos</span></a></li>
         <li><a class="app-menu__item" href="auditorias.php"><i class="app-menu__icon fa fa-address-book"></i><span
         class="app-menu__label">Auditoria</span></a></li>
         <li><a class="app-menu__item" href="misbonos.php"><i class="app-menu__icon fa fa-gift"></i><span
         class="app-menu__label">Mis Bonos</span></a></li>
          <li><a class="app-menu__item" href="../logout.php"><i class="app-menu__icon fa fa fa-sign-out" ></i><span
         class="app-menu__label">Cerrar Sesion</span></a></li>
      </ul>
    </aside>