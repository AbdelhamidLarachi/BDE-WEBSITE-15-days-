<?php
include "classes.php";
$idea = new idea();

if(isset($_POST['userNotif'])){

$idea->setideaUserID($_POST['ideaUserID']);
$idea->userNotif();

}
?>
