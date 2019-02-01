<?php

include 'classes.php';

$likes =  new likes();
$likes->setlikePostID($_POST['likePostID']);

$likes->countLikes();
header("Location:home.php?nbrLikes=1");

 ?>
  