<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de hoteles</title>
    <link rel="stylesheet" href="../hoteles_valencia/css/styles.css">
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
                        <a href="index_esp.php?usuario=<?php echo urlencode($_GET['usuario']); ?>" class="volver">Volver</a>
                    </td>
                </tr>
            </table>
        </nav>
        <nav id="menu">
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


<?php

/*--------------------------------------FECHAS----------------------------------------------------------*/
if($_GET['fechaLlegada']==null && $_GET['fechaSalida']==null){
    $fechaLlegadaPost = $_POST['fechaLlegada'];
    $fechaSalidaPost = $_POST['fechaSalida'];
}else{
    $fechaLlegadaPost = $_GET['fechaLlegada'];
    $fechaSalidaPost = $_GET['fechaSalida'];
}
    
$docFecha = new DOMDocument();
$xml_pathFecha = (dirname(__FILE__)) . '/../XML/fechaBusqueda.xml';
$docFecha->load($xml_pathFecha);

$docFecha->getElementsByTagName('fechaLlegada')->item(0)->nodeValue = $fechaLlegadaPost;
$docFecha->getElementsByTagName('fechaSalida')->item(0)->nodeValue = $fechaSalidaPost;

$docFecha->save($xml_pathFecha);

/*--------------------------------------COMPROBACIÓN DISPONIBILIDAD-----------------------------------------*/


$destino = $_POST['destino'];
$doc = new DOMDocument();
$xml_path = (dirname(__FILE__)) . '/../XML/travelpot.xml';
$doc->load($xml_path);
$ciudadEncontrada = false;
$numHotel = 0;

$reservas = $doc->getElementsByTagName('reserva')->length;
$ciudades = $doc->getElementsByTagName('ciudad')->length;

if (strlen($destino) == 0) {
    $ciudadEncontrada = true;

    for ($i = 0; $i < $ciudades; $i++) {
        $numHotel++;
        $ciudad = $doc->getElementsByTagName('ciudad')->item($i)->nodeValue;
        $nombreHotel = $doc->getElementsByTagName('nombre_hotel')->item($i)->nodeValue;
        $numHabitaciones = $doc->getElementsByTagName('numHabitaciones')->item($i)->getAttribute('numero');
        $importe_habitacion = $doc->getElementsByTagName('importe_habitacion')->item($i)->nodeValue;
        $descripcion = $doc->getElementsByTagName('descripcion')->item($i)->nodeValue;

        if ($numHotel == 1){
            echo '<div id="enunciado">
                <h1>Todos los hoteles</h1>
            </div>';
        }
            

        $disponible = true;
        $j = 0;
        
        while ($j < $reservas && $disponible) {
            $nombreHotelReserva = $doc->getElementsByTagName('nombre_hotelReserva')->item($j)->nodeValue;
            $fechaLlegada = $doc->getElementsByTagName('dia_entrada')->item($j)->nodeValue;
            $fechaSalida = $doc->getElementsByTagName('dia_salida')->item($j)->nodeValue;

            if ($fechaLlegada == $fechaLlegadaPost && $fechaSalida == $fechaSalidaPost) {
                if ($nombreHotel == $nombreHotelReserva)
                    $disponible = false;
            }
            $j++;
        }

        echo '
        <div id="contenedor-hoteles">
            <div class="contenido-hoteles">
                <a href="nuevoHotel.php?nombreHotel=' . urldecode($nombreHotel) . '&disponible='.urldecode($disponible).'&fechaLlegada='.urldecode($fechaLlegadaPost).'&fechaSalida='.urldecode($fechaSalidaPost).'&importe='.urldecode($importe_habitacion).'&usuario='.urldecode($_GET['usuario']).'" class="img-hotel1">
                    <img src="../multimedia/heart.png" alt="icono-corazon" class="corazon">
                </a>
                <div class="descripcion-hoteles">
                    <a href="nuevoHotel.php?nombreHotel=' . urldecode($nombreHotel) . '&disponible='.urldecode($disponible).'&fechaLlegada='.urldecode($fechaLlegadaPost).'&fechaSalida='.urldecode($fechaSalidaPost).'&importe='.urldecode($importe_habitacion).'&usuario='.urldecode($_GET['usuario']).'" style="text-decoration: none;"><h2>' . $nombreHotel . '</h2></a>
                    <p><a href="#" class="enlaces-hotel">Ciutat Vella, Valencia</a> &nbsp <a href="#" class="enlaces-hotel">Mostrar en el mapa</a> &nbsp· a 0,9 km del centro</p>
                    <p>' . $descripcion . '</p>
                    <div class="caja-puntuacion">
                        <div class="titulo-puntuacion">Puntuación</div>
                        <div class="puntuacion">8,6</div>
                        <p class="puntuacion-texto">Alta</p>';

                        if(!$disponible)
                        echo '<div class="noDisponible">No disponible para estas fechas</div>
                        <div class="noDispoImg"><img src="../multimedia/delete.png" style="width: 35px;"></div>';

                        else{
                            echo '<div class="disponible">Disponible</div>
                                <div class="dispo_Img"><img src="../multimedia/calendar.png" style="width: 35px;"></div>';
                        }

                        echo'
                    </div>
                </div>
                <div class="contenedor-precio">
                    <input type="checkbox" id="btn-modal' . $numHotel . '">
                    <label for="btn-modal' . $numHotel . '" class="mostrar-precio">Mostrar precio</label>
                    <div class="modal">
                        <div class="contenedor">
                            <label for="btn-modal' . $numHotel . '">❎</label>
                            <div class="contenido">
                                <a href="#" class="precio">desde ' . $importe_habitacion . '€/n</a>
                            </div>
                        </div>
                    </div>
                    <p class="comentarios"><b>1500+</b><br> comentarios ✅</p>
                </div>
            </div>
        </div>';
    }
} else {
    $numHotel = 0;

    for ($i = 0; $i < $ciudades; $i++) {
        $ciudad = $doc->getElementsByTagName('ciudad')->item($i)->nodeValue;

        if (stripos($ciudad, $_POST['destino']) !== false) {
            $ciudadEncontrada = true;
            $numHotel++;
            $nombreHotel = $doc->getElementsByTagName('nombre_hotel')->item($i)->nodeValue;
            $numHabitaciones = $doc->getElementsByTagName('numHabitaciones')->item($i)->getAttribute('numero');
            $importe_habitacion = $doc->getElementsByTagName('importe_habitacion')->item($i)->nodeValue;
            $descripcion = $doc->getElementsByTagName('descripcion')->item($i)->nodeValue;

            if ($numHotel == 1){
                echo '<div id="enunciado">
                <h1>Hoteles en \'' . $destino . '\'</h1>
            </div>';
            }


            $disponible = true;
            $j = 0;
            
            while ($j < $reservas && $disponible) {
                $nombreHotelReserva = $doc->getElementsByTagName('nombre_hotelReserva')->item($j)->nodeValue;
                $fechaLlegada = $doc->getElementsByTagName('dia_entrada')->item($j)->nodeValue;
                $fechaSalida = $doc->getElementsByTagName('dia_salida')->item($j)->nodeValue;

                if ($fechaLlegada == $fechaLlegadaPost && $fechaSalida == $fechaSalidaPost) {
                    if ($nombreHotel == $nombreHotelReserva)
                        $disponible = false;
                }
                $j++;
            }

            echo '
            <div id="contenedor-hoteles">
                <div class="contenido-hoteles">
                    <a href="nuevoHotel.php?nombreHotel=' . urldecode($nombreHotel) . '&disponible='.urldecode($disponible).'&fechaLlegada='.urldecode($fechaLlegadaPost).'&fechaSalida='.urldecode($fechaSalidaPost).'&importe='.urldecode($importe_habitacion).'&usuario='.urldecode($_GET['usuario']).'" class="img-hotel1">
                        <img src="../multimedia/heart.png" alt="icono-corazon" class="corazon">
                    </a>
                    <div class="descripcion-hoteles">
                        <a href="nuevoHotel.php?nombreHotel=' . urldecode($nombreHotel) . '&disponible='.urldecode($disponible).'&fechaLlegada='.urldecode($fechaLlegadaPost).'&fechaSalida='.urldecode($fechaSalidaPost).'&importe='.urldecode($importe_habitacion).'&usuario='.urldecode($_GET['usuario']).'" style="text-decoration: none;"><h2>' . $nombreHotel . '</h2></a>
                        <p><a href="#" class="enlaces-hotel">Ciutat Vella, Valencia</a> &nbsp <a href="#" class="enlaces-hotel">Mostrar en el mapa</a> &nbsp· a 0,9 km del centro</p>
                        <p>' . $descripcion . '</p>
                        <div class="caja-puntuacion">
                            <div class="titulo-puntuacion">Puntuación</div>
                            <div class="puntuacion">8,6</div>
                            <p class="puntuacion-texto">Alta</p>';

                            if(!$disponible)
                            echo '<div class="noDisponible">No disponible para estas fechas</div>
                            <div class="noDispoImg"><img src="../multimedia/delete.png" style="width: 35px;"></div>';

                            else
                                echo '<div class="disponible">Disponible</div>
                                    <div class="dispo_Img"><img src="../multimedia/calendar.png" style="width: 35px;"></div>';

                            echo'
                        </div>
                    </div>
                    <div class="contenedor-precio">
                        <input type="checkbox" id="btn-modal' . $numHotel . '">
                        <label for="btn-modal' . $numHotel . '" class="mostrar-precio">Mostrar precio</label>
                        <div class="modal">
                            <div class="contenedor">
                                <label for="btn-modal' . $numHotel . '">❎</label>
                                <div class="contenido">
                                    <a href="#" class="precio">desde ' . $importe_habitacion . '€/n</a>
                                </div>
                            </div>
                        </div>
                        <p class="comentarios"><b>1500+</b><br> comentarios ✅</p>
                    </div>
                </div>
            </div>';
        }
    }
}



if (!$ciudadEncontrada)
    echo 'No se ha encontrado la ciudad.';

?>


            </section>
        </main>
    </div>
</body>

</html>