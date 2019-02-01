<?php
include "classes.php";
$comments = new comments();

if(isset($_POST['reportComment'])){

$comments->setcommentID($_POST['commentID']);
$comments->reportComment();

}
?>
