<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Info Hotel Valencia</title>
	<link rel="stylesheet" href="../hoteles_valencia/hotel/css/styles.css">
</head>
<body>
	<header>
		<nav>
			<table id="headerTable">
				<tr>
					<td style="width: 15%;">
						<div id="logo">
							<p><b>TravelPot</b></p>
						</div>
					</td>
					<td style="text-align: right; width: 150px;">
						<a href="../../index_esp.html"class="volver">Volver al inicio</a>
					</td>

					<td style="text-align: right; width: 150px;">
						<a href="busqueda.php?usuario=<?php echo urlencode($_GET['usuario']).'&fechaLlegada='.urldecode($_GET['fechaLlegada']).'&fechaSalida='.urldecode($_GET['fechaSalida']); ?>" class="volver">Volver a hoteles</a>
					</td>
				</tr>
			</table>
		</nav>
		<nav id="menu1">
			<div class="alojamientos">
				<p>🏨 &nbspAlojamiento</p>
			</div>
			<div class="otros">
				<p>✈️ &nbspVuelos</p>
			</div>
			<div class="otros">
				<p>🌍🧳 &nbspVuelo+Hotel</p>
			</div>
			<div class="otros">
				<p>🚘 &nbspAlquiler de coches</p>
			</div>
			<div class="otros">
				<p>🎢 &nbspAtracciones turísticas</p>
			</div>
			<div class="otros">
				<p>🚝 &nbspConexión aeropuerto</p>
			</div>
		</nav>
	</header>
	<div id="full_container">
		<main>
			<section>
				
				<div id="enunciado">
					<h1><?php echo $_GET['nombreHotel']?></h1>
				</div>

				<!--INICIO MENÚ HOTEL-->

				<div id="menu2">
					<div class="apartados">
						<p>ℹ️🪙</p><p>Info & precios</p>
					</div>
					<div class="apartados">
						<p>📰</p><p>Servicios</p>
					</div>
					<div class="apartados">
						<p>📖</p><p>Léeme</p>
					</div>
					<div class="apartados">
						<p>🪧</p><p>A tener en cuenta</p>
					</div>
					<div class="apartados">
						<p>💡</p><p>Recomendaciones</p>
					</div>
					<div class="apartados">
						<p>✍️</p><p>Comentarios<br>(1.459)</p>
					</div>
				</div>

				<!--FIN MENÚ HOTEL-->

				<div id="contenedor-hoteles">

					<!--INICIO BUSCAR-MAPA-->

					<nav id="buscar-mapa">
						<div id="contenedor-buscar">
							<div class="buscar">
								<p>BUSCAR</p>
								<input type="text" name="buscar" placeholder="🔍 &nbsp Valencia">
							</div>
							<div class="fechas">
								<p>Fecha de llegada</p>
								<input type="date" name="fecha-llegada">
							</div>
							<div class="fechas">
								<p>Fecha de salida</p>
								<input type="date" name="fecha-salida">
							</div>
							<div class="huespedes">
								<p>Nº Huéspedes & Nº Habitaciones</p>
								<input type="submit" name="huespedes" value="Huéspedes/Habitaciones">
							</div>
						</div>
						<div id="contenedor-mapa">
							<p>¿DÓNDE ESTÁ?</p>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3079.6569258305053!2d-0.37630408059804743!3d39.477078564176296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6048adbb602295%3A0xa2c1d346bc24c212!2sC%2F%20de%20Boix%2C%204%2C%2046003%20Val%C3%A8ncia!5e0!3m2!1sen!2ses!4v1668601257902!5m2!1sen!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</nav>

					<!--FIN BUSCAR-MAPA-->

					<div class="contenido-hoteles">

						<!--INICIO IMÁGENES ARRIBA-->
						<div id="arriba">
							<a href="#" class="boton-izq-arriba">
							</a>
							<a href="#" class="img-arriba1">
							</a>
							<a href="#" class="img-arriba2">
							</a>
							<a href="#" class="img-arriba3">
							</a>
							<a href="#" class="boton-der-arriba">
							</a>
						</div>
						<!--FIN IMÁGENES ARRIBA-->

						<!--INICIO IMAGEN CENTRAL-->
						<div id="central">
							<a href="#" class="boton-izq-central">
							</a>
							<a href="#" class="img-central">
							</a>
							<a href="#" class="boton-der-central">
							</a>
						</div>
						<!--FIN IMAGEN CENTRAL-->

						<!--INICIO SECCIÓN RESERVAR Y OTROS-->

						<div id="contenedor-otros">
								<a class="img-todas">
									<div class="texto-img"><p>Ver todas</p></div>
								</a>
							<div class="contenido-otros">
								<div class="contenido-iconos">
									<img src="../multimedia/quality-control.png">
									<img src="../multimedia/badge.png">
								</div>
								<div class="contenido-puntuacion">
									<div class="titulo-puntuacion">Puntuación</div>
									<div class="puntuacion">8,6</div>
								</div>
							</div>
							<div class="reservar">
								<img src="../multimedia/calendar.png">
								<p>Reservar</p>
							</div>
						</div>

						<!--FIN SECCIÓN RESERVAR Y OTROS-->
					</div>
				</div>
				<!--INICIO DESCRIPCIÓN-->

				<h2 id="titulo-descripcion">Alójate en el corazón de Valencia</h2>
				<div id="contenedor-descripcion">
					<input type="checkbox" id="ver-mas">
					<div id="contenido-descripcion">
						<p>
							Este hotel boutique se encuentra en el centro histórico de Valencia, junto a la catedral. El establecimiento ocupa un edificio precioso del siglo XIX y ofrece WiFi gratuita en todas las instalaciones.<br><br>

							El Hotel Ad Hoc Monumental 1881 presenta una decoración moderna combinada con elementos históricos e incluye paredes de piedra y de ladrillo, obras de arte de época y mosaicos. Todas las habitaciones cuentan con muebles antiguos, aire acondicionado, calefacción y escritorio.<br><br>

							El Ad Hoc Monumental 1881 está situado a escasa distancia de numerosos monumentos históricos, como las Torres de Serranos y la Delegación del Gobierno. Asimismo, el establecimiento se halla a pocos pasos de la entrada a la antigua muralla de la ciudad, que data de 1391. El alojamiento también está ubicado a poca distancia a pie de la catedral de Santa María y del Museo de Bellas Artes.<br><br>

							El hotel sirve un desayuno a base de productos ecológicos de la zona y zumo de naranja recién exprimido.<br><br>

							Se ofrece un servicio de enlace con el aeropuerto, disponible bajo petición.<br><br>

							Nuestros clientes dicen que esta parte de Valencia es su favorita, según los comentarios independientes.<br><br>

							A las parejas les encanta la ubicación — Le han puesto un <b>9,4</b> para viajes de dos personas.<br><br>
						</p>
						<label for="ver-mas" class="lbl_ver-mas">Ver más</label>
						<label for="ver-mas" class="lbl_ver-menos">Ver menos</label>
					</div>

				<!--FIN DESCRIPCIÓN-->

				<!--INICIO PUNTOS FUERTES-->

					<div id="puntosFuertes">
						<div class="titulo-pFuertes">
							<p>Puntos fuertes del alojamiento</p>
						</div>
						<div class="contenedordesc-pFuertes">
							<img src="../multimedia/heart2.png" alt="icono-corazon">
							<div class="desc-pFuertes">
								Este hotel está en el corazón de Valencia y tiene una puntuación excelente en ubicación: 9,4
							</div>
						</div>
						<div class="info-pFuertes">
							<p>Información sobre el desayuno</p>
						</div>
						<div class="desc-info">
							<p>Continental, Sin gluten</p>
						</div>

                        <?php
                        if($_GET['disponible'])
                            echo '<div class="reserva-pFuertes" onclick="window.location.href=\'../confirmReserva/confirmReserva.php?nombreHotel=' . urldecode($_GET['nombreHotel']) . '&disponible='.urldecode($_GET['disponible']).'&fechaLlegada='.urldecode($_GET['fechaLlegada']).'&fechaSalida='.urldecode($_GET['fechaSalida']).'&importe='.urldecode($_GET['importe']).'&usuario='.urldecode($_GET['usuario']).'\'">
                                    <abbr title="!Reserva tu hotel ahora!">Reserva ahora</abbr>
                                </div>';
                        else
                            echo '<div class="reserva-pFuertes">
                                    <abbr title="Este hotel ya esta reservado para estas fechas">No disponible</abbr>
                                </div>';
                        ?>

					</div>

				<!--FIN PUNTOS FUERTES-->

				</div>

				<!--INICIO SERVICIOS POPULARES-->

				<div id="titulo-servicios">
					<p>Servicios más populares</p>
				</div>

				<div id="contenedor-servicios">
					<div id="contenido-servicios">
						<div class="servicio">
							<p>📶 WiFi gratis</p>
						</div>
						<div class="servicio">
							<p>🐾 Admite mascotas</p>
						</div>
						<div class="servicio">
							<p>👨‍👩‍👦 Habitaciones familiares</p>
						</div>
						<div class="servicio">
							<p>🚌 Translado al aeropuerto</p>
						</div>
						<div class="servicio">
							<p>🚭 Habitaciones sin humo</p>
						</div>
						<div class="servicio">
							<p>🏪 Recepción 24 horas</p>
						</div>
					</div>
					<div id="vacio-servicios"></div>
				</div>

				<!--FIN SERVICIOS POPULARES-->

				<!--INICIO DISPONIBILIDAD-->

				<div id="titulo-disponibilidad">
					<p>Disponibilidad</p>
				</div>

				<table id="barra_busqueda">
					<tr id="t_row">
						<td style="width: 22%;">
							<p>Fecha de llegada</p>
							<input class="input_fechas" type="date" name="fechas">
						</td>
						<td style="width: 22%;">
							<p>Fecha de salida</p>
							<input class="input_fechas" type="date" name="fechas">
						</td>
						<td style="width: 22%;">
							<form action="#">
								<p>Huéspedes </p>
								<input class="input_huespedes" type="submit" name="huespedes" value="Huéspedes/Habitaciones">
							</form>
						</td>
						<td>
							<form action="#">
								<input class="input_buscar" type="submit" name="buscar" value="Buscar">
							</form>
						</td>
					</tr>
				</table>

				<!--FIN DISPONIBILIDAD-->


			</section>
		</main>
	</div>
</body>
</html>