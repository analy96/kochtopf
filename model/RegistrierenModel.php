<?php

require_once __DIR__.'/UserModel.php';

$benutzername = $_GET['n'];


$return = UserModel::checkUsername($benutzername);


if($return == true){
	echo "true";
}else{
	echo "Benutzername bereits vergeben. Bitte wähle einen anderen Benutzernamen.";
}



?>
