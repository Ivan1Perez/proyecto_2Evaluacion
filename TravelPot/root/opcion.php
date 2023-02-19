<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelPot.com | Official Site</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div id="full_containerOpcionesRoot">
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
                $mensajeDeBorrado = $_GET['mensajeDeBorrado'];


                $doc = new DOMDocument();
                $xml_path = (dirname(__FILE__)) . '/../XML/travelpot.xml';
                $doc->load($xml_path);

                $cantidad_no_root = $doc->getElementsByTagName('no_root')->length;
                $items_no_root = $doc->getElementsByTagName('nombre');
                $cantidad_hoteles = $doc->getElementsByTagName('hotel')->length;

                if($mensajeDeBorrado!==null)
                    echo '<h1 style="color: green; padding: 10px; border: 1px solid green; border-radius: 4px; background-color: white; margin: 10px;">'.$mensajeDeBorrado.'</h1>';

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
                                    echo '<div class="contenedorUsuarioBorrar"><p>Usuario ' . $i . '</p>';

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
                                    echo '<div class="contenedorUsuarioBorrar"><p>Usuario ' . $i . '</p>';

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

                    case 3:
                        echo '<div id="form-container">
                                <form class="listarForm" action="opcion.php?usuario=' . urlencode($_POST['usuario']) . '&opcion=' . urldecode($opcion) . '" method="post">
                                    <fieldset id="fieldsetUsuarios">
                                        <legend>Listado de hoteles</legend>
                                        <input type="text" name="hotel" placeholder="Buscar hotel">
                                        <input type="submit" id="envio">';

                        $busquedaHotel = $_POST['hotel'];

                        if (strlen($busquedaHotel) == 0) {
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
                        } else {
                            $i = 0;
                            $encontrado = false;

                            while ($i < $cantidad_hoteles && !$encontrado) {
                                $nombre_hotel = $doc->getElementsByTagName('nombre_hotel')->item($j)->nodeValue;
                                $ciudad = $doc->getElementsByTagName('ciudad')->item($j)->nodeValue;
                                $numHabitaciones = $doc->getElementsByTagName('numHabitaciones')->item($j)->getAttribute('numero');
                                $importe_habitacion = $doc->getElementsByTagName('importe_habitacion')->item($j)->nodeValue;

                                if ($nombre_hotel == $busquedaHotel) {
                                    $encontrado = true;
                                    echo '<div class="contenedorUsuarioBorrar"><p>Hotel ' . $i . '</p>';

                                    echo '<div class="contenidoUsuarioBorrar">';
                                    echo "<p>Nombre: {$nombre_hotel}<br>Ciudad: {$ciudad}<br>Habitaciones: {$numHabitaciones}<br>Importe: {$importe_habitacion}€</p></div>";
                                    echo '</div>';
                                }

                                $i++;
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
                                        <input type="submit" id="envioHotel" value="Añadir hotel">
                                    </fieldset>
                                </form>
                            </div>';

                            $busquedaHotel = $_POST['hotel'];

                            $i = 0;
                            $encontrado = false;

                            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                                while ($i < $cantidad_hoteles && !$encontrado && strlen($busquedaHotel)>0) {
                                    $nombre_hotel = $doc->getElementsByTagName('nombre_hotel')->item($j)->nodeValue;
                                    $ciudad = $doc->getElementsByTagName('ciudad')->item($j)->nodeValue;
                                    $numHabitaciones = $doc->getElementsByTagName('numHabitaciones')->item($j)->getAttribute('numero');
                                    $importe_habitacion = $doc->getElementsByTagName('importe_habitacion')->item($j)->nodeValue;
    
                                    if ($nombre_hotel == $busquedaHotel) {
                                        $encontrado = true;
                                    }
    
                                    $i++;
                                }
    
                                if ($encontrado) {
                                    echo 'encontrado';
                                }else{
    
                                    $hoteles = $doc->getElementsByTagName('hoteles')->item(0);
    
                                    $hotel = $doc->createElement('hotel');
    
                                    $nombre_hotel = $doc->createElement('nombre_hotel', $_POST['hotel']);
                                    $ciudad = $doc->createElement('ciudad', $_POST['ciudad']);
                                    $numHabitaciones = $doc->createElement('numHabitaciones');
                                    $numHabitaciones->setAttribute('numero', $_POST['numHabitaciones']);
                                    $importe_habitacion = $doc->createElement('importe_habitacion', $_POST['importe_habitacion']);
    
                                    $hotel->appendChild($nombre_hotel);
                                    $hotel->appendChild($ciudad);
                                    $hotel->appendChild($numHabitaciones);
                                    $hotel->appendChild($importe_habitacion);
    
                                    $hoteles->appendChild($hotel);
    
                                    $doc->save($xml_path);
    
                                    $url = 'opcion.php?opcion=' . urlencode($opcion).'&mensajeDeBorrado='.urldecode("¡Hotel añadido con éxito!");
                                    header("Location: " . $url);
                                    exit;
    
                                }
                            }

                            
                        break;
                }



                ?>

            </section>
        </main>
    </div>

</body>

</html>