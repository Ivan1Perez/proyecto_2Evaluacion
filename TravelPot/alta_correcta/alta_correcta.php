<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta Correcta</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>

	<?php
        $carga_xml = simplexml_load_file("../prueba.xml");
		$nombre = $_POST["nombre"];
		$apellidos = $_POST["apellidos"];
		$direccion = $_POST["direccion"];
		$poblacion = $_POST["poblacion"];
		$provincia = $_POST["provincia"];
		$email = $_POST["email"];
		$usuario = $_POST["usuario"];
		$contraseña = $_POST["contraseña"];
	?>
	<div id="full_container">
		<header>
			<nav>
				<table id="headerTable">
					<tr>
						<td style="width: 15%;">
							<div id="logo">
								<p><b>TravelPot</b></p>
							</div>
						</td>
						<td style="text-align: right;">
							<a href="../index_esp.html"class="volver">Aquí irá el nombre de usuario y el saludo</a>
						</td>
					</tr>
				</table>
			</nav>
		</header>
		<main>
			<section>
				<div id="form-container">
					<form action="../index_esp.html">
						<fieldset>
							<legend>¡Alta correcta!</legend>
							<p>¡Enhorabuena!<br> Te has dado de alta correctamente.</p>
							<img src="../multimedia/check.png" alt="icono-correcto">
					        <input type="submit" value="Volver al inicio" class="volver-iniciarSesion">
							<input type="button" value="Iniciar sesión" class="volver-iniciarSesion" onclick="location.href='../inicio_sesion/inicio_sesion.html'">
						</fieldset>
					</form>
				</div>
			</section>
		</main>
	</div>
</body>
</html>