<?php
include "classes.php";
$idea = new idea();

if(isset($_POST['republishIdea'])){

$idea->setideaID($_POST['ideaID']);
$idea->republishIdea();

}
?>
