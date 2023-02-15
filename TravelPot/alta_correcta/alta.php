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

	$nombrePost = $_POST['nombre'];
	$apellidosPost = $_POST['apellidos'];
	$direccionPost = $_POST['direccion'];
	$poblacionPost = $_POST['poblacion'];
	$provinciaPost = $_POST['provincia'];
	$emailPost = $_POST['email'];
	$usuarioPost = $_POST['usuario'];
	$passwordPost = $_POST['password'];

	$usuarioExiste = false;

	$doc = new DOMDocument();
	$docServidor = new DOMDocument();
	$xml_path = (dirname(__FILE__)) . '/../XML/travelpot.xml';
	$doc->load($xml_path);
	$docServidor->load('http://iperez-salameroh.ieslavereda.es/proyecto_2Evaluacion/TravelPot/XML/travelpot.xml');

	//Guardamos la cantidad de 'no_root's que hay.
	$cantidad_no_root = $docServidor->getElementsByTagName('no_root')->length;

	//Recorremos los 'no_root' con un for.
	for ($i = 0; $i < $cantidad_no_root; $i++) {
		$no_root = $docServidor->getElementsByTagName('no_root')->item($i);
		$usuario = $no_root->getElementsByTagName('usuario')->item(0)->nodeValue;
		if ($usuario == $usuarioPost) {
			$usuarioExiste = true;
			echo '<div id="full_container">
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
								<p class="bienvenido">Registro denegado</p>
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
								<legend>¡ERROR!</legend>
								<p>Este nombre usuario ya se encuentra registrado.<br> Pruebe con uno diferente</p>
								<img src="../multimedia/prohibition.png" alt="icono-prohibido">
								<input type="submit" value="Volver al inicio" class="volver-iniciarSesion">
								<input type="button" value="Iniciar sesión" class="volver-iniciarSesion" onclick="location.href=\'../inicio_sesion/inicio_sesion.html\'">
							</fieldset>
						</form>
					</div>
				</section>
			</main>
		</div>';
		}
	}

	if (!$usuarioExiste) {
		$usuarios = $doc->getElementsByTagName('usuarios')->item(0);

		$no_root = $doc->createElement('no_root');

		$nombre = $doc->createElement('nombre', $nombrePost);
		$apellidos = $doc->createElement('apellidos', $apellidosPost);
		$direccion = $doc->createElement('direccion', $direccionPost);
		$poblacion = $doc->createElement('poblacion', $poblacionPost);
		$provincia = $doc->createElement('provincia', $provinciaPost);
		$email = $doc->createElement('email', $emailPost);
		$usuario = $doc->createElement('usuario', $usuarioPost);
		$password = $doc->createElement('password', $passwordPost);

		$no_root->appendChild($nombre);
		$no_root->appendChild($apellidos);
		$no_root->appendChild($direccion);
		$no_root->appendChild($poblacion);
		$no_root->appendChild($provincia);
		$no_root->appendChild($email);
		$no_root->appendChild($usuario);
		$no_root->appendChild($password);

		$usuarios->appendChild($no_root);

		$doc->save($xml_path);

		echo '<div id="full_container">
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
							<p class="bienvenido">Bienvenido ' .$_POST["nombre"]. '</p>
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
							<input type="button" value="Iniciar sesión" class="volver-iniciarSesion" onclick="location.href=\'../inicio_sesion/inicio_sesion.html\'">
						</fieldset>
					</form>
				</div>
			</section>
			<section id="section-php">

				<p>[Fichero generado y guardado correctamente]</p>

			</section>
		</main>
	</div>';
	}

	?>



	
</body>

</html>