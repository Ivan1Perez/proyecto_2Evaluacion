<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelPot.com | Official Site</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <?php

    if($_GET['opcion']==4)
        echo '<div id="full_container_datosMod">';
    else
        echo '<div id="full_containerOpcionesRoot">';

    ?>

        <header>
            <nav>
                <table id="headerTable">
                    <tr>
                        <td style="width: 15%;">
                            <div id="logo">
                                <p><b>TravelPot</b></p>
                            </div>
                        </td>
                        <td style="text-align: right; padding-right: 20px;">
                            <a href="menuOpciones.php" class="volver">Volver</a>
                        </td>
                        <td style="width: 0px;">
                            <p class="cajaPerfil"><img src="../multimedia/user.png" class="perfil" alt="imagen-perfil">root</p>
                        </td>
                    </tr>
                </table>
            </nav>
        </header>
        <main>
            <section>

                <?php

                $opcion = $_GET['opcion'];
                $warning = $_GET['warning'];
                $mensaje = $_GET['mensaje'];


                $doc = new DOMDocument();
                $xml_path = (dirname(__FILE__)) . '/../XML/travelpot.xml';
                $doc->load($xml_path);

                $cantidad_no_root = $doc->getElementsByTagName('no_root')->length;
                $items_no_root = $doc->getElementsByTagName('nombre');
                $cantidad_hoteles = $doc->getElementsByTagName('hotel')->length;
                $cantidad_reservas = $doc->getElementsByTagName('reserva')->length;

                if($mensaje!==null)
                    echo '<h1 style="color: green; padding: 10px; border: 1px solid green; border-radius: 4px; background-color: white; margin: 10px;">'.$mensaje.'</h1>';

                if($warning!==null)
                    echo '<h1 style="color: red; padding: 10px; border: 1px solid red; border-radius: 4px; background-color: white; margin: 10px;">'.$warning.'</h1>';

                switch ($opcion) {
                    case 1:
                        echo '<div id="form-container">
                                <form class="listarForm" action="opcion.php?usuario=' . urlencode($_POST['usuario']) . '&opcion=' . urldecode($opcion) . '" method="post">
                                    <fieldset id="fieldsetUsuarios">
                                        <legend>Listado de usuarios</legend>
                                        <input type="text" name="usuario" placeholder="Buscar usuario">
                                        <input type="submit" id="envio">';

                        $usuarioPost = $_POST['usuario'];

                        if (strlen($usuarioPost) == 0) {
                            for ($i = 1, $j = 0; $i <= $cantidad_no_root; $i++, $j++) {
                                echo '<div class="contenedorUsuarioBorrar"><p>Usuario ' . $i . '</p>';
                                $nombre = $doc->getElementsByTagName('nombre')->item($j)->nodeValue;
                                $apellidos = $doc->getElementsByTagName('apellidos')->item($j)->nodeValue;
                                $direccion = $doc->getElementsByTagName('direccion')->item($j)->nodeValue;
                                $poblacion = $doc->getElementsByTagName('poblacion')->item($j)->nodeValue;
                                $provincia = $doc->getElementsByTagName('provincia')->item($j)->nodeValue;
                                $email = $doc->getElementsByTagName('email')->item($j)->nodeValue;
                                $usuario = $doc->getElementsByTagName('usuario')->item($j + 1)->nodeValue;
                                $password = $doc->getElementsByTagName('password')->item($j + 1)->nodeValue;
                                echo '<div class="contenidoUsuarioBorrar">';
                                echo "<p>Nombre: {$nombre}<br>Apellidos: {$apellidos}<br>Dirección: {$direccion}<br>Población: {$poblacion}<br>
                                        Provincia: {$provincia}<br>Email: {$email}<br>Usuario: {$usuario}<br>Contraseña: {$password}</p></div>";
                                echo '</div>';
                            }
                        } else {
                            $i = 0;
                            $encontrado = false;

                            while ($i < $cantidad_no_root && !$encontrado) {
                                $nombre = $doc->getElementsByTagName('nombre')->item($i)->nodeValue;
                                $apellidos = $doc->getElementsByTagName('apellidos')->item($i)->nodeValue;
                                $direccion = $doc->getElementsByTagName('direccion')->item($i)->nodeValue;
                                $poblacion = $doc->getElementsByTagName('poblacion')->item($i)->nodeValue;
                                $provincia = $doc->getElementsByTagName('provincia')->item($i)->nodeValue;
                                $email = $doc->getElementsByTagName('email')->item($i)->nodeValue;
                                $usuario = $doc->getElementsByTagName('usuario')->item($i + 1)->nodeValue;
                                $password = $doc->getElementsByTagName('password')->item($i + 1)->nodeValue;

                                if ($usuario == $usuarioPost) {
                                    $encontrado = true;
                                    echo '<div class="contenedorUsuarioBorrar"><p>Usuario ' . ($i+1) . '</p>';

                                    echo '<div class="contenidoUsuarioBorrar">';
                                    echo "<p>Nombre: {$nombre}<br>Apellidos: {$apellidos}<br>Dirección: {$direccion}<br>Población: {$poblacion}<br>
                                        Provincia: {$provincia}<br>Email: {$email}<br>Usuario: {$usuario}<br>Contraseña: {$password}</p></div>";
                                    echo '</div>';
                                }

                                $i++;
                            }

                            if (!$encontrado) {
                                $url = 'opcion.php?opcion=' . urlencode($opcion).'&warning='.urldecode("No existe ningún usuario con este nombre.");
                                header("Location: " . $url);
                                exit;
                            }
                        }

                        echo '</fieldset>
                                </form>
                            </div>';
                        break;

                    case 2:
                        echo '<div id="form-container">
                                <form class="listarForm" action="opcion.php?usuario=' . urlencode($_POST['usuario']) . '&opcion=' . urldecode($opcion) . '" method="post">
                                    <fieldset id="fieldsetUsuarios">
                                        <legend>Listado de usuarios</legend>
                                        <input type="text" name="usuario" placeholder="Buscar usuario">
                                        <input type="submit" id="envio">';

                        $usuarioPost = $_POST['usuario'];

                        if (strlen($usuarioPost) == 0) {
                            for ($i = 1, $j = 0; $i <= $cantidad_no_root; $i++, $j++) {
                                echo '<div class="contenedorUsuarioBorrar"><p>Usuario ' . $i . '</p>';
                                $nombre = $doc->getElementsByTagName('nombre')->item($j)->nodeValue;
                                $apellidos = $doc->getElementsByTagName('apellidos')->item($j)->nodeValue;
                                $direccion = $doc->getElementsByTagName('direccion')->item($j)->nodeValue;
                                $poblacion = $doc->getElementsByTagName('poblacion')->item($j)->nodeValue;
                                $provincia = $doc->getElementsByTagName('provincia')->item($j)->nodeValue;
                                $email = $doc->getElementsByTagName('email')->item($j)->nodeValue;
                                $usuario = $doc->getElementsByTagName('usuario')->item($j + 1)->nodeValue;
                                $password = $doc->getElementsByTagName('password')->item($j + 1)->nodeValue;
                                echo '<div class="contenidoUsuarioBorrar">';
                                echo "<p>Nombre: {$nombre}<br>Apellidos: {$apellidos}<br>Dirección: {$direccion}<br>Población: {$poblacion}<br>
                                        Provincia: {$provincia}<br>Email: {$email}<br>Usuario: {$usuario}<br>Contraseña: {$password}</p></div>";
                                echo '<a href="borradoUsuario.php?numero='.urldecode($j).'" class="opcion">Borrar usuario</a>';
                                echo '</div>';
                            }
                        } else {
                            $i = 0;
                            $encontrado = false;

                            while ($i < $cantidad_no_root && !$encontrado) {
                                $nombre = $doc->getElementsByTagName('nombre')->item($i)->nodeValue;
                                $apellidos = $doc->getElementsByTagName('apellidos')->item($i)->nodeValue;
                                $direccion = $doc->getElementsByTagName('direccion')->item($i)->nodeValue;
                                $poblacion = $doc->getElementsByTagName('poblacion')->item($i)->nodeValue;
                                $provincia = $doc->getElementsByTagName('provincia')->item($i)->nodeValue;
                                $email = $doc->getElementsByTagName('email')->item($i)->nodeValue;
                                $usuario = $doc->getElementsByTagName('usuario')->item($i + 1)->nodeValue;
                                $password = $doc->getElementsByTagName('password')->item($i + 1)->nodeValue;

                                if ($usuario == $usuarioPost) {
                                    $encontrado = true;
                                    echo '<div class="contenedorUsuarioBorrar"><p>Usuario ' . ($i+1) . '</p>';

                                    echo '<div class="contenidoUsuarioBorrar">';
                                    echo "<p>Nombre: {$nombre}<br>Apellidos: {$apellidos}<br>Dirección: {$direccion}<br>Población: {$poblacion}<br>
                                        Provincia: {$provincia}<br>Email: {$email}<br>Usuario: {$usuario}<br>Contraseña: {$password}</p></div>";
                                    echo '<a href="borradoUsuario.php?numero='.urldecode($i).'" class="opcion">Borrar usuario</a>';

                                    echo '</div>';
                                }

                                $i++;
                            }

                            if (!$encontrado) {
                                $url = 'opcion.php?opcion=' . urlencode($opcion).'&warning='.urldecode("No existe ningún usuario con este nombre.");
                                header("Location: " . $url);
                                exit;
                            }
                        }

                        echo '</fieldset>
                                </form>
                            </div>';
                        break;

                    case 3:

                        echo '<div id="form-container">
                                <form class="listarForm" action="opcion.php?usuario=' . urlencode($_POST['usuario']) . '&opcion=' . urldecode($opcion).'" method="post">
                                    <fieldset id="fieldsetUsuarios">
                                        <legend>Listado de hoteles</legend>
                                        <input type="text" name="hotel" placeholder="Buscar hotel">
                                        <input type="submit" id="envio">';

                        $encontrado = false;

                        if (strlen($_POST['hotel']) == 0) {
                            for ($i = 1, $j = 0; $i <= $cantidad_hoteles; $i++, $j++) {
                                echo '<div class="contenedorUsuarioBorrar"><p>Hotel ' . $i . '</p>';
                                $nombre_hotel = $doc->getElementsByTagName('nombre_hotel')->item($j)->nodeValue;
                                $ciudad = $doc->getElementsByTagName('ciudad')->item($j)->nodeValue;
                                $numHabitaciones = $doc->getElementsByTagName('numHabitaciones')->item($j)->getAttribute('numero');
                                $importe_habitacion = $doc->getElementsByTagName('importe_habitacion')->item($j)->nodeValue;
                                echo '<div class="contenidoUsuarioBorrar">';
                                echo "<p>Nombre: {$nombre_hotel}<br>Ciudad: {$ciudad}<br>Habitaciones: {$numHabitaciones}<br>Importe: {$importe_habitacion}€</p></div>";
                                echo '</div>';
                            }
                        } else 
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                                for($i = 0 ; $i < $cantidad_hoteles ; $i++){
                                    $nombre_hotel = $doc->getElementsByTagName('nombre_hotel')->item($i)->nodeValue;
                                    $ciudad = $doc->getElementsByTagName('ciudad')->item($i)->nodeValue;
                                    $numHabitaciones = $doc->getElementsByTagName('numHabitaciones')->item($i)->getAttribute('numero');
                                    $importe_habitacion = $doc->getElementsByTagName('importe_habitacion')->item($i)->nodeValue;

                                    if ($nombre_hotel == $_POST['hotel']) {
                                        $encontrado = true;
                                        echo '<div class="contenedorUsuarioBorrar"><p>Hotel ' . ($i+1) . '</p>';
                                        echo '<div class="contenidoUsuarioBorrar">';
                                        echo "<p>Nombre: {$nombre_hotel}<br>Ciudad: {$ciudad}<br>Habitaciones: {$numHabitaciones}<br>Importe: {$importe_habitacion}€</p></div>";
                                        echo '</div>';
                                    }
                                }

                                if (!$encontrado) {
                                    $url = 'opcion.php?opcion=' . urlencode($opcion).'&warning='.urldecode("No existe ningún hotel con este nombre.");
                                    header("Location: " . $url);
                                    exit;
                                }
                            }

                        echo '</fieldset>
                                </form>
                            </div>';
                        break;

                    case 4:
                        echo '<div id="form-container">
                                <form class="listarForm" action="opcion.php?usuario=' . urlencode($_POST['usuario']) . '&opcion=' . urldecode($opcion) . '" method="post">
                                    <fieldset id="fieldsetUsuarios">
                                        <legend>Añadir hotel</legend>
                                        <input type="text" name="hotel" placeholder="Nombre del hotel" minlength="2" required>
                                        <input type="text" name="ciudad" placeholder="Ciudad" minlength="2" required>
                                        <input type="text" name="numHabitaciones" placeholder="Número de habitaciones" minlength="1" pattern="[0-9]+" oninvalid="setCustomValidity(\'Campo obligatorio. Solo se admiten números.\')" required>
                                        <input type="text" name="importe_habitacion" placeholder="Importe de habitación" minlength="1" pattern="[0-9]+" oninvalid="setCustomValidity(\'Campo obligatorio. Solo se admiten números.\')" required>
                                        <input type="textarea" name="descripcion" placeholder="Descripcion">
                                        <input type="submit" style ="margin-top: 20px;" class="opcion" value="Añadir hotel">
                                    </fieldset>
                                </form>
                            </div>';


                            $i = 0;
                            $encontrado = false;

                            if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                                while ($i < $cantidad_hoteles && !$encontrado) {
                                    $nombre_hotel = $doc->getElementsByTagName('nombre_hotel')->item($i)->nodeValue;
                                    $ciudad = $doc->getElementsByTagName('ciudad')->item($i)->nodeValue;
    
                                    if ($nombre_hotel == $_POST['hotel'] && $ciudad == $_POST['ciudad']) {
                                        $encontrado = true;
                                    }
    
                                    $i++;
                                }
    
                                if ($encontrado) {
                                    $url = 'opcion.php?opcion=' . urlencode($opcion).'&warning='.urldecode("Ya existe un hotel con este nombre en esta ciudad.");
                                    header("Location: " . $url);
                                    exit;
                                }else{
    
                                    $hoteles = $doc->getElementsByTagName('hoteles')->item(0);
    
                                    $hotel = $doc->createElement('hotel');
    
                                    $nombre_hotel = $doc->createElement('nombre_hotel', $_POST['hotel']);
                                    $ciudad = $doc->createElement('ciudad', $_POST['ciudad']);
                                    $numHabitaciones = $doc->createElement('numHabitaciones');
                                    $numHabitaciones->setAttribute('numero', $_POST['numHabitaciones']);
                                    $importe_habitacion = $doc->createElement('importe_habitacion', $_POST['importe_habitacion']);
                                    $descripcion = $doc->createElement('descripcion', $_POST['descripcion']);
    
                                    $hotel->appendChild($nombre_hotel);
                                    $hotel->appendChild($ciudad);
                                    $hotel->appendChild($numHabitaciones);
                                    $hotel->appendChild($importe_habitacion);
                                    $hotel->appendChild($descripcion);
    
                                    $hoteles->appendChild($hotel);
    
                                    $doc->save($xml_path);
    
                                    $url = 'opcion.php?opcion=' . urlencode($opcion).'&mensaje='.urldecode("¡Hotel añadido con éxito!");
                                    header("Location: " . $url);
                                    exit;
    
                                }
                            }
                        break;

                    case 5:
                        echo '<div id="form-container">
                                <form class="listarForm" action="opcion.php?usuario=' . urlencode($_POST['usuario']) . '&opcion=' . urldecode($opcion).'" method="post">
                                    <fieldset id="fieldsetUsuarios">
                                        <legend>Listado de hoteles</legend>
                                        <input type="text" name="hotel" placeholder="Buscar hotel">
                                        <input type="submit" id="envio">';

                        $encontrado = false;

                        if (strlen($_POST['hotel']) == 0) {
                            for ($i = 1, $j = 0; $i <= $cantidad_hoteles; $i++, $j++) {
                                echo '<div class="contenedorUsuarioBorrar"><p>Hotel ' . $i . '</p>';
                                $nombre_hotel = $doc->getElementsByTagName('nombre_hotel')->item($j)->nodeValue;
                                $ciudad = $doc->getElementsByTagName('ciudad')->item($j)->nodeValue;
                                $numHabitaciones = $doc->getElementsByTagName('numHabitaciones')->item($j)->getAttribute('numero');
                                $importe_habitacion = $doc->getElementsByTagName('importe_habitacion')->item($j)->nodeValue;
                                echo '<div class="contenidoUsuarioBorrar">';
                                echo "<p>Nombre: {$nombre_hotel}<br>Ciudad: {$ciudad}<br>Habitaciones: {$numHabitaciones}<br>Importe: {$importe_habitacion}€</p></div>";
                                echo '<a href="borradoHotel.php?numero='.urldecode($j).'" class="opcion">Borrar hotel</a>';
                                echo '</div>';
                            }
                        } else 
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                                for($i = 0 ; $i < $cantidad_hoteles ; $i++){
                                    $nombre_hotel = $doc->getElementsByTagName('nombre_hotel')->item($i)->nodeValue;
                                    $ciudad = $doc->getElementsByTagName('ciudad')->item($i)->nodeValue;
                                    $numHabitaciones = $doc->getElementsByTagName('numHabitaciones')->item($i)->getAttribute('numero');
                                    $importe_habitacion = $doc->getElementsByTagName('importe_habitacion')->item($i)->nodeValue;

                                    if ($nombre_hotel == $_POST['hotel']) {
                                        $encontrado = true;
                                        echo '<div class="contenedorUsuarioBorrar"><p>Hotel ' . ($i+1) . '</p>';
                                        echo '<div class="contenidoUsuarioBorrar">';
                                        echo "<p>Nombre: {$nombre_hotel}<br>Ciudad: {$ciudad}<br>Habitaciones: {$numHabitaciones}<br>Importe: {$importe_habitacion}€</p></div>";
                                        echo '<a href="borradoHotel.php?numero='.urldecode($i).'" class="opcion">Borrar hotel</a>';
                                        echo '</div>';
                                    }
                                }

                                if (!$encontrado) {
                                    $url = 'opcion.php?opcion=' . urlencode($opcion).'&warning='.urldecode("No existe ningún hotel con este nombre.");
                                    header("Location: " . $url);
                                    exit;
                                }
                            }

                        echo '</fieldset>
                                </form>
                            </div>';
                        break;

                    case 6:
                        echo '<div id="form-container">
                                <form class="listarForm" action="opcion.php?usuario=' . urlencode($_POST['usuario']) . '&opcion=' . urldecode($opcion) . '" method="post">
                                    <fieldset id="fieldsetUsuarios">
                                        <legend>Listado de reservas</legend>
                                        <input type="text" name="hotel" placeholder="Buscar reserva por hotel">
                                        <input type="submit" id="envio">';


                        if (strlen($_POST['hotel']) == 0) {
                            for ($i = 1, $j = 0; $i <= $cantidad_reservas; $i++, $j++) {
                                echo '<div class="contenedorUsuarioBorrar"><p>Reserva ' . $i . '</p>';
                                $nombre_hotelReserva = $doc->getElementsByTagName('nombre_hotelReserva')->item($j)->nodeValue;
                                $dia_entrada = $doc->getElementsByTagName('dia_entrada')->item($j)->nodeValue;
                                $dia_salida = $doc->getElementsByTagName('dia_salida')->item($j)->nodeValue;
                                $nombre_reserva = $doc->getElementsByTagName('nombre_reserva')->item($j)->nodeValue;
                                $importe_reserva = $doc->getElementsByTagName('importe_reserva')->item($j)->nodeValue;
                                echo '<div class="contenidoUsuarioBorrar">';
                                echo "<p>Hotel: {$nombre_hotelReserva}<br>Fecha de llegada: {$dia_entrada}<br>Fecha de salida: {$dia_salida}<br>Nombre de usuario: {$nombre_reserva}<br>
                                        Importe: {$importe_reserva}€</p></div>";
                                echo '</div>';
                            }
                        } else {
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                                for($i = 0 ; $i < $cantidad_hoteles ; $i++){
                                    $nombre_hotelReserva = $doc->getElementsByTagName('nombre_hotelReserva')->item($i)->nodeValue;
                                    $dia_entrada = $doc->getElementsByTagName('dia_entrada')->item($i)->nodeValue;
                                    $dia_salida = $doc->getElementsByTagName('dia_salida')->item($i)->nodeValue;
                                    $nombre_reserva = $doc->getElementsByTagName('nombre_reserva')->item($i)->nodeValue;
                                    $importe_reserva = $doc->getElementsByTagName('importe_reserva')->item($i)->nodeValue;

                                    if ($nombre_hotelReserva == $_POST['hotel']) {
                                        $encontrado = true;
                                        echo '<div class="contenedorUsuarioBorrar"><p>Reserva ' . ($i+1) . '</p>';
                                        echo '<div class="contenidoUsuarioBorrar">';
                                        echo "<p>Hotel: {$nombre_hotelReserva}<br>Fecha de llegada: {$dia_entrada}<br>Fecha de salida: {$dia_salida}<br>Nombre de usuario: {$nombre_reserva}<br>
                                            Importe: {$importe_reserva}€</p></div>";
                                        echo '</div>';
                                    }
                                }

                                if (!$encontrado) {
                                    $url = 'opcion.php?opcion=' . urlencode($opcion).'&warning='.urldecode("No existen reservas para este hotel.");
                                    header("Location: " . $url);
                                    exit;
                                }
                            }
                        }

                        echo '</fieldset>
                                </form>
                            </div>';
                        break;

                }



                ?>

            </section>
        </main>
    </div>

</body>

</html>