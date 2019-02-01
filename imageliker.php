<?php
include "classes.php";
$imagelikes = new imagelikes();

if(isset($_POST['imagelikes'])){

$imagelikes->setimagelikeUserID($_POST['imagelikeUserID']);
$imagelikes->setimagelikeImageID($_POST['imagelikeImageID']);
$imagelikes->imageliker();

}
?>
