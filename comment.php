<?php
include "classes.php";
$comments = new comments();

if(isset($_POST['commentText'])){

$comments->setcommentUserID($_POST['commentUserID']);
$comments->setcommentPostID($_POST['commentPostID']);
$comments->setcommentText($_POST['commentText']);
$comments->setcommentUserName($_POST['commentUserName']);
$comments->comment();
}
?>