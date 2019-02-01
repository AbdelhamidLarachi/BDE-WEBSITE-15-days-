<?php
include "classes.php";
$images = new images();

if(isset($_POST['reportImage'])){

$images->setid($_POST['id']);
$images->reportImage();

}
?>
