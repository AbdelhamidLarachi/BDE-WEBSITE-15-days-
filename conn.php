<?php
try{
	$bdd = new PDO("mysql:host=localhost;dbname=exia", "root", "");
}
catch(Exception $e){
die("Error : " .$e->getMessage());
}
?>