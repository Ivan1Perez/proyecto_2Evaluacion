<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelPot.com | Official Site</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div id="full_container_datosMod">
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
                            $url = "modificar.php?usuario=" . urlencode($_GET['usuario']);

                            echo '
							<a href="'.$url.'" class="volver">Volver atrás</a>';
                            ?>
						</td>
                        <td style="width: 150px;">
                            <p class="cajaPerfil"><img src="../multimedia/user.png" class="perfil" alt="imagen-perfil"><?php echo $_GET['usuario']; ?></p>
                        </td>
                    </tr>
                </table>
            </nav>
        </header>
        <main>
            <?php
            $url1 = "../sesionIniciada/index.php?usuario=" . urlencode($_GET['usuario']);
            
            echo '
            <section>
                <div id="form-container">
                    <form action="'.$url1.'" method="post">
                        <fieldset>
                            <legend>Datos modificados</legend>
                            <label><p id="label-p">Tus datos personales han sido modificados correctamente.</p></label>
                            <input type="submit" value="Volver a Inicio" id="iniciar">
                        </fieldset>
                    </form>
                </div>
            </section>';
            ?>
        </main>
    </div>
</body>
</html>