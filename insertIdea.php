<?php
include "classes.php";
$idea = new idea();

if(isset($_POST['ideaHeadline']) && isset($_POST['ideaStory'])){

$idea->setmeetingTime($_POST['meetingTime']);
$idea->setideaHeadline($_POST['ideaHeadline']);
$idea->setideaStory($_POST['ideaStory']);
$idea->setideaFee($_POST['ideaFee']);
$idea->setideaStyle($_POST['ideaStyle']);
$idea->setIdeaUserID($_POST['ideaUserID']);
$idea->setIdeaUserName($_POST['ideaUserName']);
$idea->setideaUserEmail($_POST['ideaUserEmail']);
$idea->setideaUserCampus($_POST['ideaUserCampus']);
$idea->insertIdea();
header("Location:home.php");
}
?>