<?php

 include 'classes.php';

$vote =  new vote();
$vote->setpostID($_POST['postID']);

$vote->countVotes();
header("Location:home.php?nbrVotes=1");

 ?>
  