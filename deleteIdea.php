<?php
include "classes.php";
$idea = new idea();

if(isset($_POST['deleteIdea'])){

$idea->setideaID($_POST['ideaID']);
$idea->deleteIdea();

}
?>
