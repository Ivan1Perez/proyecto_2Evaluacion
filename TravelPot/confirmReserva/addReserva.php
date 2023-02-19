<?php

$doc = new DOMDocument();
$xml_path = (dirname(__FILE__)) . '/../XML/travelpot.xml';
$doc->load($xml_path);

$reservas = $doc->getElementsByTagName('reservas')->item(0);

$reserva = $doc->createElement('reserva');

$nombre_hotelReserva = $doc->createElement('nombre_hotelReserva', $_GET['nombreHotel']);
$dia_entrada = $doc->createElement('dia_entrada', $_GET['fechaLlegada']);
$dia_salida = $doc->createElement('dia_salida', $_GET['fechaSalida']);
$nombre_reserva = $doc->createElement('nombre_reserva', $_GET['usuario']);
$importe_reserva = $doc->createElement('importe_reserva', $_GET['importe']);

$reserva->appendChild($nombre_hotelReserva);
$reserva->appendChild($dia_entrada);
$reserva->appendChild($dia_salida);
$reserva->appendChild($nombre_reserva);
$reserva->appendChild($importe_reserva);

$reservas->appendChild($reserva);

$doc->save($xml_path);

?>


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
                            <a href="../sesionIniciada/index_esp.php?usuario=<?php echo urldecode($_GET['usuario']); ?>" class="volver">Volver a inicio</a>
                        </td>
                        <td style="width: 0px;">
                            <p class="cajaPerfil"><img src="../multimedia/user.png" class="perfil" alt="imagen-perfil"><?php echo urldecode($_GET['usuario']); ?></p>
                        </td>
                    </tr>
                </table>
            </nav>
        </header>
        <main>
            <section>
                <div id="form-container">
                    <form action="#" method="post">
                        <fieldset id="fieldset-root">
                            <legend style="text-align: center;">✅</legend>
                                <p style="margin-bottom: 20px;">¡Reserva realizada con éxito!</p>
                            <div>
                                <a href="../sesionIniciada/busqueda.php?nombreHotel=<?php $disponible = false; echo urldecode($_GET['nombreHotel']) . '&disponible='.urldecode($disponible).'&fechaLlegada='.urldecode($_GET['fechaLlegada']).'&fechaSalida='.urldecode($_GET['fechaSalida']).'&importe='.urldecode($_GET['importe']).'&usuario='.urldecode($_GET['usuario'])?>" class="confirmar">Volver a hoteles</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </section>
        </main>
    </div>

</body>

</html>