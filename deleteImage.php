<?php

include "classes.php";
$images = new images();

if(isset($_POST['deleteImage'])){

$images->setid($_POST['id']);
$images->deleteImage();

}
?>
