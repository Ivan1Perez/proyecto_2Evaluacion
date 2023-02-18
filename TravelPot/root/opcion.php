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
                            <a href="#" class="volver">Volver</a>
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

                $doc = new DOMDocument();
                $xml_path = (dirname(__FILE__)) . '/../XML/travelpot.xml';
                $doc->load($xml_path);

                $cantidad_no_root = $doc->getElementsByTagName('no_root')->length;
                $items_no_root = $doc->getElementsByTagName('nombre');

                switch ($opcion) {
                    case 1:
                        echo '<div id="form-container">
                                <form action="#" method="post">
                                    <fieldset id="fieldsetUsuarios">
                                        <legend>Listado de usuarios</legend>';
                        for ($i = 1, $j = 0; $i <= $cantidad_no_root; $i++, $j++) {
                            echo '<div class="contenedorUsuario"><p>Usuario ' . $i . '</p>';
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
                                    Provincia: {$provincia}<br>Email: {$email}<br>Usuario: {$usuario}<br>Contraseña: {$contraseña}</p></div>";
                            echo '</div>';
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