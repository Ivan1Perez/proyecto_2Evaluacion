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
			<section>
				<!-- <?php
				/*$carga_xml = simplexml_load_file("../../travelpot.xml");
				$travelpot = $carga_xml->travelpot;

				$no_root = $travelpot->usuarios->addChild('no_root');

				$no_root->addChild('nombre', $_POST['nombre']);
				$no_root->addChild('apellidos', $_POST['apellidos']);
				$no_root->addChild('direccion', $_POST['direccion']);
				$no_root->addChild('poblacion', $_POST['poblacion']);
				$no_root->addChild('provincia', $_POST['provincia']);
				$no_root->addChild('email', $_POST['email']);
				$no_root->addChild('usuario', $_POST['usuario']);
				$no_root->addChild('contrasenya', $_POST['contrasenya']);

				$carga_xml->asXML("../../travelpot.xml")*/

				?> -->

				<?php
					$doc = new DOMDocument();
					$doc->load('../../travelpot.xml');

					$usuarios = $doc->documentElement;

					$no_root = $doc->createElement('no_root');
					$nombre = $documento->createElement('nombre', $_POST['nombre']);

					$no_root->appendChild($nombre);

					$doc->save('../../travelpot.xml');

					echo "Fichero generado y guardado correctamente."
				?>


			</section>
		</main>
	</div>
</body>

</html>