<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelPot.com | Official Site</title>
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
                        <td>
                            <?php
                                $url = "../sesionIniciada/index_esp.php?usuario=" . urlencode($_GET['usuario']);

                                echo '
                                <a href="'.$url.'" class="volver">Volver</a>';?>
                        </td>
                        <td style="width: 150px;">
                            <p class="cajaPerfil"><img src="../multimedia/user.png" class="perfil" alt="imagen-perfil"><?php echo $_GET['usuario']; ?></p>
                        </td>
                    </tr>
                </table>
            </nav>
        </header>

        <?php
        $usuarioOnline = $_GET['usuario'];
        $usuarioExiste = false;
        $i = 0;

        $doc = new DOMDocument();
        $xml_path = (dirname(__FILE__)) . '/../XML/travelpot.xml';
        $doc->load($xml_path);

        $cantidad_usuario = $doc->getElementsByTagName('usuario')->length;

        while ($i < $cantidad_usuario && !$usuarioExiste) {
            $usuario = $doc->getElementsByTagName('usuario')->item($i)->nodeValue;

            if ($usuario == $usuarioOnline) {
                $usuarioExiste = true;
                $nombre = $doc->getElementsByTagName('nombre')->item($i - 1)->nodeValue;
                $apellidos = $doc->getElementsByTagName('apellidos')->item($i - 1)->nodeValue;
                $direccion = $doc->getElementsByTagName('direccion')->item($i - 1)->nodeValue;
                $poblacion = $doc->getElementsByTagName('poblacion')->item($i - 1)->nodeValue;
                $provincia = $doc->getElementsByTagName('provincia')->item($i - 1)->nodeValue;
                $email = $doc->getElementsByTagName('email')->item($i - 1)->nodeValue;
                $password = $doc->getElementsByTagName('password')->item($i - 1)->nodeValue;
            }

            $i++;
        }

        $url = "nuevosDatos.php?usuario=" . urlencode($_GET['usuario']);

        echo '<main>
            <section>
                <div id="form-container">
                    <form action="' . $url . '" method="post">
                        <fieldset>
                            <legend>Datos personales</legend>
                            <label><p id="label-p">Nombre</p></label>
                            <input type="text" name="nombre" value="' . $nombre . '" placeholder="Nuevo nombre" pattern="[a-zA-Z]{2,14}" required>
                            <p id="patron">*Ha de contener entre 1 y 14 letras.</p>
                            <label><p id="label-p">Apellidos</p></label>
                            <input type="text" name="apellidos" value="' . $apellidos . '" placeholder="Apellidos" pattern="[a-zA-Z]{2,30}" required>
                            <p id="patron">*M??n. 2 / M??x. 30 letras.</p>
                            <label><p id="label-p">Direcci??n</p></label>
                            <input type="text" name="direccion" value="' . $direccion . '" placeholder="Nueva direcci??n">
                            <label><p id="label-p">Poblaci??n</p></label>
                            <input type="text" name="poblacion" value="' . $poblacion . '" placeholder="Nueva poblaci??n">
                            <label><p id="label-p">Provincia</p></label>
                            <input type="text" name="provincia" value="' . $provincia . '" placeholder="Nueva provincia">
                            <label><p id="label-p">Email</p></label>
                            <input type="email" name="email" value="' . $email . '" placeholder="Nuevo email" required>
                            <label><p id="label-p">Usuario</p></label>
                            <input type="text" name="usuario" value="' . $usuarioOnline . '" placeholder="Nuevo usuario" pattern="[a-zA-Z0-9]{2,14}" required
							oninvalid="setCustomValidity(\'Cumpla con el formato requerido\')">
                            <p id="patron">*Ha de contener entre 1 y 14 letras o n??meros.</p>
                            <label><p id="label-p">Contrase??a</p></label>
                            <p id="patron">Si es la misma simplemente introd??zcala de nuevo.</p>
                            <input type="password" name="password" placeholder="Introduzca la nueva contrase??a" minlength="8"
							pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+}{\'|\][\:;?/><.,])(?!.*\s).{8,}" required>
                            <p id="patron">La contrase??a debe tener al menos 8 caracteres, incluyendo una letra en may??scula, una letra
							en min??scula, un n??mero o un s??mbolo especial.</p>
                            <input type="submit" value="Guardar cambios" id="iniciar">
                        </fieldset>
                    </form>
                </div>
            </section>
        </main>';
        ?>

    </div>

</body>

</html>