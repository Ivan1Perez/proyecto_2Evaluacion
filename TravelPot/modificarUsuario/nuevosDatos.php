
<?php
$usuarioOnline = $_GET['usuario'];
$nombrePost = $_POST['nombre'];
$apellidosPost = $_POST['apellidos'];
$direccionPost = $_POST['direccion'];
$poblacionPost = $_POST['poblacion'];
$provinciaPost = $_POST['provincia'];
$emailPost = $_POST['email'];
$usuarioPost = $_POST['usuario'];
$passwordPost = $_POST['password'];
$usuarioExiste = false;
$i = 0;

$doc = new DOMDocument();
$xml_path = (dirname(__FILE__)) . '/../XML/travelpot.xml';
$doc->load($xml_path);

$cantidad_usuario = $doc->getElementsByTagName('usuario')->length;

while($i < $cantidad_usuario && !$usuarioExiste){
	$usuario = $doc->getElementsByTagName('usuario')->item($i)->nodeValue;

	if($usuario==$usuarioOnline){
		$usuarioExiste = true;
		$doc->getElementsByTagName('nombre')->item($i-1)->nodeValue = $nombrePost;
		$doc->getElementsByTagName('apellidos')->item($i-1)->nodeValue = $apellidosPost;
		$doc->getElementsByTagName('direccion')->item($i-1)->nodeValue = $direccionPost;
		$doc->getElementsByTagName('poblacion')->item($i-1)->nodeValue = $poblacionPost;
		$doc->getElementsByTagName('provincia')->item($i-1)->nodeValue = $provinciaPost;
		$doc->getElementsByTagName('email')->item($i-1)->nodeValue = $emailPost;
		$doc->getElementsByTagName('usuario')->item($i)->nodeValue = $usuarioPost;
		$doc->getElementsByTagName('password')->item($i)->nodeValue = $passwordPost;
	}

	$i++;
}

$doc->save($xml_path);

$url = "datosModificados.php?usuario=" . urlencode($_POST['usuario']);
header("Location: " . $url);
exit;

?>