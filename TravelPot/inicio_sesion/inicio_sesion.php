<?php
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
			$password = $doc->getElementsByTagName('password')->item($i)->nodeValue;

			if($usuario==$usuarioPost && $password==$passwordPost){
				$usuarioExiste = true;
            }

			$i++;
		}

		if($usuarioExiste){
			$url = "../sesionIniciada/index.php?usuario=" . urlencode($usuario);
            header("Location: " . $url);
		    exit;
        }

		else{
			header("Location: ../error_registro/error_registro.html");
		    exit;
		}
		
		
	?>
