<?php
include "classes.php";
$idea = new idea();

if(isset($_POST['approveIdea'])){

$idea->setideaID($_POST['ideaID']);
$idea->approveIdea();

}
?>
