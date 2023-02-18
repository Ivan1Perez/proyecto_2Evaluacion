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
                
                $opcion1 = 1;
                $opcion2 = 2;
                $opcion3 = 3;
                $opcion4 = 4;
                $opcion5 = 5;
                $opcion6 = 6;

                ?>

                <div id="form-container">
                    <form action="#" method="post">
                        <fieldset id="fieldset-root">
                            <legend>Opciones root</legend>
                            <select>
                                <option class="opcion" value="" selected disabled>Seleccione opciones</option>
                                <option onclick="window.location.href='<?php echo 'opcion.php?opcion=' . urlencode($opcion1); ?>';" class="opcion">Listar perfiles</option>
                                <option onclick="window.location.href='<?php echo 'opcion.php?opcion=' . urlencode($opcion2); ?>';" class="opcion">Borrar perfiles</option>
                                <option onclick="window.location.href='<?php echo 'opcion.php?opcion=' . urlencode($opcion3); ?>';" class="opcion">Listar hoteles</option>
                                <option onclick="window.location.href='<?php echo 'opcion.php?opcion=' . urlencode($opcion4); ?>';" class="opcion">Añadir hoteles</option>
                                <option onclick="window.location.href='<?php echo 'opcion.php?opcion=' . urlencode($opcion5); ?>';" class="opcion">Borrar hoteles</option>
                                <option onclick="window.location.href='<?php echo 'opcion.php?opcion=' . urlencode($opcion6); ?>';" class="opcion">Listar reservas</option>
                            </select>
                        </fieldset>
                    </form>
                </div>
            </section>
        </main>
    </div>

</body>

</html>