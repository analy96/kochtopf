<?php

require_once __DIR__.'/DefaultControler.php';

$benutzername = $_GET['n'];


$return = DefaultController::login($benutzername);


if($return == true){
	echo "true";
}else{
	echo "Das Passwort stimmt nicht mit dem Benutzername überein.";
}



?>