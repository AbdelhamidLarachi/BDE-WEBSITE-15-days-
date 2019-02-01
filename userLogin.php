<?php
include "classes.php";

if(isset($_POST['userEmailLogin']) && isset($_POST['userPassLogin'])){
	$user = new user();
    $user->setUserEmail($_POST['userEmailLogin']);
    $user->setUserPass(sha1($_POST['userPassLogin']));
    
if($user->Userlogin()==true){
	$_SESSION['userID']=$user->getUserID(); 
    $_SESSION['userName']=$user->getUserName(); 
	$_SESSION['userEmail']=$user->getUserEmail(); 
	$_SESSION['userCampus']=$user->getUserCampus(); 
	$_SESSION['role']=$user->getrole(); 



}
}
?>