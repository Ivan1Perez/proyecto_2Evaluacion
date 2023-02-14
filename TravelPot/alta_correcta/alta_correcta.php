<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta Correcta</title>
	<link rel="stylesheet" href="css/styles.css">
</head>

<body>

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
							<a href="../index_esp.html" class="volver">Bienvenido <?php echo $_POST['nombre']; ?></a>
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
			<section id="section-php">

				<?php
				$nombrePost = $_POST['nombre'];
				$apellidosPost = $_POST['apellidos'];
				$direccionPost = $_POST['direccion'];
				$poblacionPost = $_POST['poblacion'];
				$provinciaPost = $_POST['provincia'];
				$emailPost = $_POST['email'];
				$usuarioPost = $_POST['usuario'];
				$passwordPost = $_POST['password'];

				$doc = new DOMDocument();
				$xml_path = (dirname(__FILE__)) . '/../XML/travelpot.xml';
				$doc->load($xml_path);

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

				echo "<p>[Fichero generado y guardado correctamente]</p>"
				?>

			</section>
		</main>
	</div>
</body>

</html>