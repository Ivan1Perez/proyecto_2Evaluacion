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
                $mensaje = $_GET['mensaje'];

                $doc = new DOMDocument();
                $xml_path = (dirname(__FILE__)) . '/../XML/travelpot.xml';
                $doc->load($xml_path);

                $cantidad_no_root = $doc->getElementsByTagName('no_root')->length;
                $items_no_root = $doc->getElementsByTagName('nombre');

                if($mensaje!==null)
                    echo '<h1 style="color: red; padding: 10px; border: 1px solid red; border-radius: 4px; background-color: white; margin: 10px;">'.$mensaje.'</h1>';

                switch ($opcion) {
                    case 1:
                        echo '<div id="form-container">
                                <form class="listarForm" action="#" method="post">
                                    <fieldset id="fieldsetUsuarios">
                                        <legend>Listado de usuarios</legend>';
                        for ($i = 1, $j = 0; $i <= $cantidad_no_root; $i++, $j++) {
                            echo '<div class="contenedorUsuarioListar"><p>Usuario ' . $i . '</p>';
                            $nombre = $doc->getElementsByTagName('nombre')->item($j)->nodeValue;
                            $apellidos = $doc->getElementsByTagName('apellidos')->item($j)->nodeValue;
                            $direccion = $doc->getElementsByTagName('direccion')->item($j)->nodeValue;
                            $poblacion = $doc->getElementsByTagName('poblacion')->item($j)->nodeValue;
                            $provincia = $doc->getElementsByTagName('provincia')->item($j)->nodeValue;
                            $email = $doc->getElementsByTagName('email')->item($j)->nodeValue;
                            $usuario = $doc->getElementsByTagName('usuario')->item($j + 1)->nodeValue;
                            $password = $doc->getElementsByTagName('password')->item($j + 1)->nodeValue;
                            echo '<div class="contenidoUsuario">';
                            echo "<p>Nombre: {$nombre}<br>Apellidos: {$apellidos}<br>Dirección: {$direccion}<br>Población: {$poblacion}<br>
                                    Provincia: {$provincia}<br>Email: {$email}<br>Usuario: {$usuario}<br>Contraseña: {$password}</p></div>";
                            echo '</div>';
                        }
                        echo '</fieldset>
                                </form>
                            </div>';

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
                                $url = 'opcion.php?opcion=' . urlencode($opcion).'&mensaje='.urldecode("No existe ningún usuario con este nombre.");
                                header("Location: " . $url);
                                exit;
                            }
                        }

                        echo '</fieldset>
                                </form>
                            </div>';
                }



                ?>

            </section>
        </main>
    </div>

</body>

</html>