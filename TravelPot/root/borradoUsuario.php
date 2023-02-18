<?php
$url = 'opcion.php?opcion=2&mensajeDeBorrado=Usuario eliminado con éxito.';

$item_no_root = $_GET['numero'];

$doc = new DOMDocument();
$xml_path = (dirname(__FILE__)) . '/../XML/travelpot.xml';
$doc->load($xml_path);


$padre = $doc->getElementsByTagName('usuarios')->item(0);
$hijo = $doc->getElementsByTagName('no_root')->item($item_no_root);
$padre->removeChild($hijo);

$doc->save($xml_path);


header("Location: " . $url);
exit;

?>