<?php
include "classes.php";
$comments = new comments();

if(isset($_POST['republishComment'])){

$images->setCommentID($_POST['commentID']);
$images->republishComment();

}
?>
