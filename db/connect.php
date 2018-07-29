<?php
	$ruta = 'mysql:host=localhost; dbname=movies_db';
	$usuario = 'root';
	$password = '';
	$opciones = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];

	try {
		$db = new PDO($ruta, $usuario, $password, $opciones);
	}
	catch( PDOException $ErrorEnConexion ) {
		echo "Se ha producido un error: ".$ErrorEnConexion->getMessage();
		echo "<br>";
	}


?>
