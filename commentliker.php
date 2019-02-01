<?php
include "classes.php";
$commentlikes = new commentlikes();

if(isset($_POST['commentlikes'])){

$commentlikes->setcommentlikeUserID($_POST['commentlikeUserID']);
$commentlikes->setcommentlikeCommentID($_POST['commentlikeCommentID']);
$commentlikes->commentliker();

}
?>
