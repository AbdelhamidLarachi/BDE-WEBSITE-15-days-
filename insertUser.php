<?php
include "classes.php";
$user = new user();
if(isset($_POST['userName']) && isset($_POST['userEmail']) && isset($_POST['userPass'])){

$user->setUserName($_POST['userName']);
$user->setUserEmail($_POST['userEmail']);
$user->setUserPass(sha1($_POST['userPass']));
$user->setUserCampus($_POST['userCampus']);
$user->insertUser();
}
?>