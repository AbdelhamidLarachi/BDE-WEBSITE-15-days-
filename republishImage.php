<?php
include "classes.php";
$images = new images();

if(isset($_POST['republishImage'])){

$images->setid($_POST['id']);
$images->republishImage();

}
?>
