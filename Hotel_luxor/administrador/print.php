<?php

require_once 'C:\xampp1\htdocs\hotel_luxor\includes\conexion.php';

$idFactura=isset($_GET['idFactura'])? $_GET['idFactura'] : "";
$sql= 'SELECT  clientes.nombre as nombre_cliente, clientes.apellido as cliente_apellido,clientes.correo,facturas.fecha, facturas.idFactura, clientes.rfc, reservaciones.idReservacion,
habitaciones.numero, habitaciones.tipo,  habitaciones.precio, DATEDIFF(reservaciones.fecha_salida,reservaciones.fecha_entrada) as n_dias, (habitaciones.precio * (DATEDIFF(reservaciones.fecha_salida,reservaciones.fecha_entrada))) as total_reservacion,
paquetes.nombre as nombre_paquete, paquetes.idPaquete, paquetes.precio as paquete_precio, 
(habitaciones.precio * (DATEDIFF(reservaciones.fecha_salida,reservaciones.fecha_entrada))+paquetes.precio) as total_factura , sum(servicios.precio * reservacion_servicios.cantidad) as total_servicios, 
(habitaciones.precio * (DATEDIFF(reservaciones.fecha_salida,reservaciones.fecha_entrada))+paquetes.precio) +  sum(servicios.precio * reservacion_servicios.cantidad) as totaltodos
from facturas inner join clientes on facturas.idCliente=clientes.idCliente inner join reservaciones on  reservaciones.idReservacion= facturas.idReservacion inner join paquetes on reservaciones.paquete = paquetes.idPaquete inner join habitaciones on habitaciones.idHabitacion= reservaciones.habitacion inner join reservacion_servicios on reservaciones.idReservacion = reservacion_servicios.reservacion 
inner join servicios on reservacion_servicios.idServicio = servicios.idServicio where idFactura=? ';
$query= $pdo->prepare($sql);
$query->execute(array($idFactura));

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){
    $idFactura = $consulta[$i]['idFactura'];
    $fecha = $consulta[$i]['fecha'];
    $c_nombre = $consulta[$i]['nombre_cliente'];
    $c_apellido = $consulta[$i]['cliente_apellido'];
    $rfc = $consulta[$i]['rfc'];
    $correo = $consulta[$i]['correo'];
    $numero_habitacion = $consulta[$i]['numero'];
    $tipo_habitacion = $consulta[$i]['tipo'];
    $precio_habitacion = $consulta[$i]['precio'];
    $n_dias = $consulta[$i]['n_dias'];
    $total_reservacion = $consulta[$i]['total_reservacion'];
    $precio_paquete = $consulta[$i]['paquete_precio'];
    $idPaquete = $consulta[$i]['idPaquete'];
    $paquete_nombre = $consulta[$i]['nombre_paquete'];
    $total_servicios = $consulta[$i]['total_servicios'];
    $totaltodos = $consulta[$i]['totaltodos'];

 
}
?>


<html>
	<head>
		<meta charset="utf-8">
		<title>Factura</title>
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<script src="script.js"></script>
		<style>
		/* reset */

*
{
	border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top;
}

/* content editable */

*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; }

*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

span[contenteditable] { display: inline-block; }

/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: right; width: 12%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

/* javascript */

.add, .cut
{
	border-width: 1px;
	display: block;
	font-size: .8rem;
	padding: 0.25em 0.5em;	
	float: left;
	text-align: center;
	width: 0.6em;
}

.add, .cut
{
	background: #9AF;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
	background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
	border-radius: 0.5em;
	border-color: #0076A3;
	color: #FFF;
	cursor: pointer;
	font-weight: bold;
	text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
}

.add { margin: -2.5em 0 0; }

.add:hover { background: #00ADEE; }

.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
.cut { -webkit-transition: opacity 100ms ease-in; }

tr:hover .cut { opacity: 1; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
}

@page { margin: 0; }
		</style>
		
	</head>
	<body>
		<header>
			<h1>Factura</h1>
			<address >
				<p>HOTEL LUXOR,</p>
				<p>Nueva carretera deL TEC,<br>Tijuana B.C,<br>Mexico.</p>
				<p>(+94) 65 222 44 55</p>
			</address>
			<span><img alt="" src="assets/img/sun.png"></span>
		</header>
		<article>
			<h1>	Recipiente</h1>
			<address >
				<p><?php echo $c_nombre." ".$c_apellido ?> <br></p>
                <p> RFC: <?php echo $rfc?> <br></p>
                <p>Correo: <?php echo $correo?> <br></p>
			</address>
			<table class="meta">
				<tr>
					<th><span >Factura #</span></th>
					<td><span ><?php echo $idFactura; ?></span></td>
				</tr>
				<tr>
					<th><span >Fecha</span></th>
					<td><span ><?php echo $fecha; ?> </span></td>
				</tr>
				
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span >Tipo de habitacion</span></th>
                        <th><span >No de habitacion</span></th>
						<th><span >No de dias</span></th>
						<th><span >Tarifa</span></th>
                        <th><span >Total </span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><span ><?php echo $tipo_habitacion; ?></span></td>
						<td><span ><?php echo $numero_habitacion; ?> </span></td>
                        <td><span ><?php echo $n_dias; ?> </span></td>
						<td><span data-prefix>$</span><span ><?php  echo $precio_habitacion;?></span></td>
						<td><span data-prefix>$</span><span><?php echo $total_reservacion; ?></span></td>
					</tr>
				</tbody>
			</table>
            <table class="inventory">
				<thead>
					<tr>
						<th><span >No. de paquete</span></th>
						<th><span >Descripcion</span></th>
						<th><span >Precio</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><span ><?php echo $idPaquete; ?></span></td>
						<td><span ><?php echo $paquete_nombre; ?> </span></td>
						<td><span data-prefix>$</span><span ><?php  echo $precio_paquete;?></span></td>
					</tr>
				</tbody>
			</table>
			
			<table class="balance">
                <tr>
                <th><span >Total Servicios</span></th>
				<td><span data-prefix>$</span><span><?php echo $total_servicios; ?></span></td>
				</tr>
                <tr>
					<th><span >Total</span></th>
					<td><span data-prefix>$</span><span><?php echo $totaltodos; ?></span></td>
				</tr>
			</table>
		</article>
		<aside>
		</aside>
	</body>
</html>
