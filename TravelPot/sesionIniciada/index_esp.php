<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TravelPot.com | Sitio Oficial</title>
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
	<div id="changebd">
		<div class="beach_bg">
			<div class="darker"></div>
		</div>
		<div class="nightcity_bg">
			<div class="darker"></div>
		</div>
		<div class="snow_bg">
			<div class="darker"></div>
		</div>
		<div class="egypt_bg">
			<div class="darker"></div>
		</div>
	</div>
	<div id="full_container">
		<header>
			<nav>
				<table id="headerTable">
					<tr>
						<td style="text-align: left;">
							<div id="logo">
								<p><b>TravelPot</b></p>
							</div>
						</td>
						<td style="text-align: right; padding-right: 10px">
							<input type="checkbox" id="btn-modal">
							<label for="btn-modal" class="lbl-modal">Elegir idioma 🇪🇸</label>
							<div class="modal">
								<div class="contenedor">
									<p>Selecciona tu idioma</p>
									<label for="btn-modal">❎</label>
									<div class="contenido">
										<a href="index_esp.php?usuario=<?php echo urlencode($_GET['usuario']); ?>" class="idioma">Español 🇪🇸</a>
										<a href="index_eng.php?usuario=<?php echo urlencode($_GET['usuario']); ?>" class="idioma">English 🇬🇧</a>
									</div>
								</div>
							</div>
						</td>
						<td style="padding-right: 10px; width: 0px;">
							<!-- Perfil -->
							<a href="../modificarUsuario/modificar.php?usuario=<?php echo urlencode($_GET['usuario']); ?>" class="cajaPerfil"><img src="../multimedia/user.png" class="perfil" alt="imagen-perfil"><?php echo $_GET['usuario']?></a>
						</td>
						<?php
						
						if(urlencode($_GET['usuario'])=="root"){
							echo '<td style="padding-right: 10px; width: 0px;">
							<!-- Opciones root -->
							<a href="../root/menuOpciones.php" class="cajaRoot"><img src="../multimedia/settings.png" class="perfil" alt="imagen-perfil">Opciones root</a>
							</td>';
						}

						?>
						<td style="width: 130px;">
							<a href="../inicio_sesion/inicio_sesion.html" class="cajaReg">Cerrar sesión</a>
						</td>
					</tr>
				</table>
			</nav>
			<form action="busqueda.php" method="post">
				<table id="barra_busqueda">
					<tr id="t_row">
						<td style="width: 40%;">
							<input class="input_destino" type="text" name="destino" placeholder="Elige el destino">
						</td>
						<td style="width: 22%;">
							<input class="input_fechas" type="date" name="fechas">
						</td>
						<td style="width: 22%;">
							<input class="input_huespedes" type="text" name="huespedes" value="Huéspedes/Habitaciones">
						</td>
						<td>
							<input class="input_buscar" type="submit" name="buscar" value="Buscar">
						</td>
					</tr>
				</table>
			</form>
		</header>
		<main>
			<div id="destinos">
				<div id="destacadas">
					<p>Ciudades destacadas</p>
				</div>
				<section class="section1">
					<div class="ciudades">
						<a href="../hoteles_valencia/index_valencia.html" class="ciudad">Valencia</a>
						<br>
						<br>
						<a href="../hoteles_valencia/index_valencia.html"><img src="../imagenes/valencia.jpg" class="img_ciudad" alt="imagen valencia"></a>
					</div>
					<div class="ciudades">
						<a href="../hoteles_barcelona/index_barcelona.html" class="ciudad">Barcelona</a>
						<br>
						<br>
						<a href="../hoteles_barcelona/index_barcelona.html"><img src="../imagenes/barcelona.jpg" class="img_ciudad" alt="imagen barcelona"></a>
					</div>
					<div class="ciudades">
						<a href="../hoteles_madrid/index_madrid.html" class="ciudad">Madrid</a>
						<br>
						<br>
						<a href="../hoteles_madrid/index_madrid.html"><img src="../imagenes/madrid.jpg" class="img_ciudad" alt="imagen madrid"></a>
					</div>
					<div class="ciudades">
						<a href="../hoteles_bilbao/index_bilbao.html" class="ciudad">Bilbao</a>
						<br>
						<br>
						<a href="../hoteles_bilbao/index_bilbao.html"><img src="../imagenes/bilbao.jpg" class="img_ciudad" alt="imagen bilbao"></a>
					</div>
				</section>
			</div>
		</main>
	</div>
	<section id="bienvenida">
		<div class="text_intro">
			<p>Disfruta de increíbles destinos con las mejores ofertas</p>
		</div>
		<article id="cajaArt">
			<div class="textOfert">
				<h2>Ofertas de temporada</h2>
				<br>
				<br>
				<p>
					Aprovecha el momento y hazte con los mejores descuentos hasta la fecha!
				</p>
				<div class="formOfert">
					<form action="#">
						<input class="botonesBienv" type="submit" name="Ofertas" value="Ver Ofertas">
					</form>
					<img src="../multimedia/gift.png">
				</div>
			</div>
			<div style="height: 328px; width: 100%;">
				<img src="../imagenes/ski.jpg" id="imgSki">
			</div>
			<div style="height: 328px; width: 100%;">
				<img src="../imagenes/collage.jpg" id="imgPack">
			</div>
			<div class="textPack">
				<h2>Pack de destinos</h2>
				<br>
				<br>
				<p>
					Descubre el pack de destinos que mejor se adapta a ti!
				</p>
				<div class="formPack">
					<img src="../multimedia/package.png">
					<form action="#">
						<input class="botonesBienv" type="submit" name="Ofertas" value="Ver Ofertas">
					</form>
				</div>
			</div>
		</article>
	</section>
	<section id="publi">
		<a href="#" class="img-publi1">
			<p>Compara miles de vuelos entre cientos de aerolíneas.</p>
		</a>
		<a href="#" class="img-publi2">
			<p>Alquila los mejores coches a precios increíbles.</p>
		</a>
	</section>
	<hr style="top: 880px; position: relative; color:black">
	<footer>
		<div id="autor">
			<p> Desarrollado por <b>Iván Pérez-Salamero Hernández</b>&copy</p>
			<br>
			<p>1º Desarrollo de Aplicaciones WEB</p>
			<br>
			<a id="autores" href="../agradecimientos/index_agradecimientos.html">Agradecimientos</a>
		</div>
	</footer>
</body>
</html>