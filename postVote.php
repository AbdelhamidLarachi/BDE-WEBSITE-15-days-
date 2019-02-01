<?php
include "classes.php";
$vote = new vote();

if(isset($_POST['vote'])){

$vote->setvoteUserID($_POST['voteUserID']);
$vote->setvoteUserName($_POST['voteUserName']);
$vote->setvoteUserEmail($_POST['voteUserEmail']);
$vote->setvoteUserCampus($_POST['voteUserCampus']);
$vote->setpostID($_POST['postID']);
$vote->postVote();
}
?>
