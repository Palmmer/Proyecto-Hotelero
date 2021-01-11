-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-01-2021 a las 23:02:04
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12
create database hotel_luxor2;
use  hotel_luxor2;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel_luxor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL,
  `idReservacion` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`id`, `idReservacion`, `Fecha`) VALUES
(1, 14, '2020-12-29'),
(2, 15, '2020-12-29'),
(3, 16, '2020-12-30'),
(4, 17, '2020-12-30'),
(5, 18, '2020-12-31'),
(6, 19, '2020-12-31'),
(7, 20, '2020-12-31'),
(8, 21, '2020-12-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bonos`
--

CREATE TABLE `bonos` (
  `idBono` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bonos`
--

INSERT INTO `bonos` (`idBono`, `nombre`, `cantidad`, `estado`) VALUES
(1, 'Mayor a 5 dias', 150, 1),
(2, 'Mayor a 10 dias', 200, 1),
(3, 'Mayor a 20 dias', 350, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Hostess'),
(3, 'CallCenter');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `rfc` varchar(13) NOT NULL,
  `telefono` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `apellido`, `correo`, `direccion`, `rfc`, `telefono`) VALUES
(2, 'Andres', 'Lopez', 'andres.perez16@tectijuana.edu.mx', 'Mar del norte #60', 'PYRA765383GY5', 211345340),
(3, 'Adolfo', 'Macedo', 'adolfo@gmail.com', 'direccion 65', 'AMCD568778GY6', 888888880),
(4, 'Alejandro', 'Martinez', 'alejandro@gmail.com', 'EL CIELO #25', 'ALMA787834RE6', 2147483647),
(5, ' Bryan', 'Lopez', 'bryanlopez@hotmail.com', 'direccion87', 'BRLP123123', 27888),
(6, 'Andres', 'Perez', 'ed@gmail.com', 'f431r132', '3222244423423', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `idFactura` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idReservacion` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`idFactura`, `idCliente`, `idReservacion`, `fecha`) VALUES
(1, 2, 16, '2020-12-31'),
(2, 3, 17, '2020-12-31');

--
-- Disparadores `facturas`
--
DELIMITER $$
CREATE TRIGGER `factura_reservacion` AFTER INSERT ON `facturas` FOR EACH ROW UPDATE reservaciones SET estado=4 WHERE idReservacion=new.idReservacion
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `idHabitacion` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `CantidadCamas` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`idHabitacion`, `tipo`, `CantidadCamas`, `precio`, `estado`, `numero`, `descripcion`) VALUES
(1, 'Single', 1, 200, 2, 1, 'Cerca de la playa'),
(2, 'Double', 2, 250, 2, 2, 'Cerca de la playa'),
(4, 'Suit-deluxe', 3, 500, 2, 3, '2 sofas cama, vista al mar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mis_bonos`
--

CREATE TABLE `mis_bonos` (
  `id` int(11) NOT NULL,
  `idBono` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mis_bonos`
--

INSERT INTO `mis_bonos` (`id`, `idBono`, `idEmpleado`, `Fecha`) VALUES
(1, 3, 2, '2020-01-01'),
(2, 2, 3, '2020-12-27'),
(3, 3, 1, '2020-12-31'),
(4, 1, 1, '2020-12-31'),
(5, 2, 1, '2020-12-31'),
(6, 3, 3, '2020-12-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `idPaquete` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`idPaquete`, `nombre`, `precio`, `estado`) VALUES
(1, 'Todo Incluido', 400, 1),
(2, 'Ninguno', 0, 1),
(3, 'Solo Desayuno', 200, 1),
(4, 'Solo Cena', 200, 1),
(6, 'Party', 120, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promos`
--

CREATE TABLE `promos` (
  `idPromos` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `promos`
--

INSERT INTO `promos` (`idPromos`, `nombre`, `cantidad`, `estado`) VALUES
(1, 'Pasenos plis', 30, 1),
(2, 'Buen Fin', 10, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `idReservacion` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `habitacion` int(11) NOT NULL,
  `paquete` int(11) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `estado` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`idReservacion`, `nombre`, `apellido`, `email`, `pais`, `telefono`, `habitacion`, `paquete`, `fecha_entrada`, `fecha_salida`, `estado`, `id_usuario`) VALUES
(14, 'Andres', 'Lopez', 'andrespc852@gmail.com', 'Mexico', 21134534, 1, 1, '2020-12-30', '2020-12-30', 4, 1),
(15, 'Andres', 'Perez', 'thavo@live.com', 'México', 21, 2, 1, '2020-12-30', '2020-12-31', 4, 1),
(16, 'Juan', 'Lopez', 'juan@gmail.com', 'Mexico', 12345, 1, 3, '2020-12-31', '2021-01-08', 4, 1),
(17, 'Denisse', 'Castro', 'denisse@gmail.com', 'Mexico', 1234456, 2, 2, '2021-01-01', '2021-01-09', 4, 1),
(18, 'Bryan', 'Lopez', 'andrespc852@gmail.com', 'Mexico', 2147483647, 1, 1, '2021-01-01', '2021-01-21', 3, 1),
(19, 'Denisse', 'Castro', 'denisse@gmail.com', 'Mexico', 1234456, 2, 3, '2020-12-31', '2021-01-07', 3, 1),
(20, 'Denisse', 'Castro', 'denisse@gmail.com', 'Mexico', 1234456, 1, 1, '2020-12-31', '2021-01-12', 2, 1),
(21, 'Juan', 'Lopez', 'juan@gmail.com', 'Mexico', 21134534, 2, 3, '2020-12-31', '2021-01-21', 1, 3);

--
-- Disparadores `reservaciones`
--
DELIMITER $$
CREATE TRIGGER `auditoria_reservaciones` AFTER INSERT ON `reservaciones` FOR EACH ROW insert into auditoria (idReservacion,Fecha) values (new.idReservacion, CURRENT_DATE)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bonosXreservacion` AFTER INSERT ON `reservaciones` FOR EACH ROW BEGIN
if (datediff(new.fecha_salida,new.fecha_entrada)>=5 and datediff(new.fecha_salida,new.fecha_entrada)<=9) THEN
insert into mis_bonos(idBono,idEmpleado,Fecha
) values (1,new.id_usuario,CURRENT_DATE);
ELSEIF (datediff(new.fecha_salida,new.fecha_entrada)>=10 and datediff(new.fecha_salida,new.fecha_entrada)<=19) THEN
insert into mis_bonos(idBono,idEmpleado,Fecha
) values (2,new.id_usuario,CURRENT_DATE);
ELSEIF datediff(new.fecha_salida,new.fecha_entrada)>=20 THEN
insert into mis_bonos(idBono,idEmpleado,Fecha
) values (3,new.id_usuario,CURRENT_DATE);
end IF;
        
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cancelacion_reservacion` AFTER UPDATE ON `reservaciones` FOR EACH ROW BEGIN
if new.estado =3 THEN
UPDATE habitaciones set estado =1 where idHabitacion=new.habitacion;
end IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `habitacion_pagada` AFTER UPDATE ON `reservaciones` FOR EACH ROW BEGIN
if new.estado =4 THEN
UPDATE habitaciones set estado =1 where idHabitacion=new.habitacion;
end IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `reservacion_cuarto` AFTER INSERT ON `reservaciones` FOR EACH ROW UPDATE habitaciones SET estado=2 WHERE idHabitacion=new.habitacion
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion_servicios`
--

CREATE TABLE `reservacion_servicios` (
  `id` int(11) NOT NULL,
  `idServicio` int(11) NOT NULL,
  `reservacion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservacion_servicios`
--

INSERT INTO `reservacion_servicios` (`id`, `idServicio`, `reservacion`, `cantidad`, `fecha`) VALUES
(2, 2, 14, 3, '2020-12-30'),
(6, 2, 16, 2, '2020-12-30'),
(7, 5, 16, 3, '2020-12-31'),
(8, 7, 17, 1, '2020-12-31'),
(9, 1, 16, 3, '2020-12-31'),
(10, 2, 17, 3, '2020-12-31'),
(11, 5, 20, 3, '2020-12-31'),
(12, 5, 21, 3, '2021-01-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idServicio` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idServicio`, `nombre`, `precio`, `tipo`, `estatus`) VALUES
(1, 'Turibus', 100, 'Externo', 1),
(2, 'Turibus 2', 120, 'Externo', 1),
(5, 'Gimnasio', 200, 'Interno', 1),
(7, 'Campo Golf', 500, 'Interno', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `clave`, `estado`, `id_cargo`) VALUES
(1, 'Andres', 'Perez', 'admin', 'hola', 1, 1),
(2, 'Alex', 'Lopez', 'callcenter', 'hola', 1, 2),
(3, 'Victor', 'Lopez', 'hostess', 'hola', 1, 3),
(4, 'Andres', 'Lopez', 'admin2', 'hola', 2, 1),
(6, 'Juan', 'Lopez', 'hostess1', 'hola', 1, 2),
(8, 'Juan', 'Lopez', 'admin4', 'hola', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idReservacion` (`idReservacion`);

--
-- Indices de la tabla `bonos`
--
ALTER TABLE `bonos`
  ADD PRIMARY KEY (`idBono`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idReservacion` (`idReservacion`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`idHabitacion`);

--
-- Indices de la tabla `mis_bonos`
--
ALTER TABLE `mis_bonos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEmpleado` (`idEmpleado`),
  ADD KEY `idBono` (`idBono`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`idPaquete`);

--
-- Indices de la tabla `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`idPromos`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`idReservacion`),
  ADD KEY `paquete` (`paquete`),
  ADD KEY `habitacion` (`habitacion`),
  ADD KEY `idEmpleado` (`id_usuario`);

--
-- Indices de la tabla `reservacion_servicios`
--
ALTER TABLE `reservacion_servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idServicio` (`idServicio`),
  ADD KEY `idReservacion` (`reservacion`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idServicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `bonos`
--
ALTER TABLE `bonos`
  MODIFY `idBono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `idHabitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mis_bonos`
--
ALTER TABLE `mis_bonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `idPaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `promos`
--
ALTER TABLE `promos`
  MODIFY `idPromos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `idReservacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `reservacion_servicios`
--
ALTER TABLE `reservacion_servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `auditoriaFK` FOREIGN KEY (`idReservacion`) REFERENCES `reservaciones` (`idReservacion`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `factura_clienteFK` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`),
  ADD CONSTRAINT `factura_reservacionFk` FOREIGN KEY (`idReservacion`) REFERENCES `reservaciones` (`idReservacion`);

--
-- Filtros para la tabla `mis_bonos`
--
ALTER TABLE `mis_bonos`
  ADD CONSTRAINT `bonos_bonoFK` FOREIGN KEY (`idEmpleado`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `bonos_empleadosFK` FOREIGN KEY (`idBono`) REFERENCES `bonos` (`idBono`);

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `empleado_reservacionFK` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `habitacionesFk` FOREIGN KEY (`habitacion`) REFERENCES `habitaciones` (`idHabitacion`),
  ADD CONSTRAINT `paquetesfk` FOREIGN KEY (`paquete`) REFERENCES `paquetes` (`idPaquete`);

--
-- Filtros para la tabla `reservacion_servicios`
--
ALTER TABLE `reservacion_servicios`
  ADD CONSTRAINT `servicios2fk` FOREIGN KEY (`reservacion`) REFERENCES `reservaciones` (`idReservacion`),
  ADD CONSTRAINT `servicios_reservacionFK` FOREIGN KEY (`idServicio`) REFERENCES `servicios` (`idServicio`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_cargoUsuario` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
