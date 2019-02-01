<?php
include "classes.php";
$comments = new comments();

if(isset($_POST['deleteComment'])){

$comments->setcommentID($_POST['commentID']);
$comments->deleteComment();

}
?>
