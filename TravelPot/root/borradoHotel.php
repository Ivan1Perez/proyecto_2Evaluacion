<?php
$url = 'opcion.php?opcion=5&mensaje=Hotel eliminado con éxito.';

$item_hotel = $_GET['numero'];

$doc = new DOMDocument();
$xml_path = (dirname(__FILE__)) . '/../XML/travelpot.xml';
$doc->load($xml_path);


$padre = $doc->getElementsByTagName('hoteles')->item(0);
$hijo = $doc->getElementsByTagName('hotel')->item($item_hotel);
$padre->removeChild($hijo);

$doc->save($xml_path);


header("Location: " . $url);
exit;

?>