<?php
include "classes.php";
$likes = new likes();

if(isset($_POST['likes'])){

$likes->setlikeUserID($_POST['likeUserID']);
$likes->setlikePostID($_POST['likePostID']);
$likes->liker();

}
?>
