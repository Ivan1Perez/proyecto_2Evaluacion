<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro</title>
	<!-- <link rel="stylesheet" href=""> -->
</head>

<body>

	<h1>LISTADO DE USUARIOS</h1>

	<?php
	$carga_xml = simplexml_load_file("travelpot.xml");
	$travelpot = $carga_xml->travelpot;

	foreach ($travelpot->usuarios->no_root as $nodo) {
		$atributo = $nodo->attributes();
		echo '<p>' . $atributo . '</p>';
	}

	?>

</body>

</html>