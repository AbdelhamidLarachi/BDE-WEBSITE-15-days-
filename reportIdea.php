<?php
include "classes.php";
$idea = new idea();

if(isset($_POST['reportIdea'])){

$idea->setideaID($_POST['ideaID']);
$idea->reportIdea();

}
?>
