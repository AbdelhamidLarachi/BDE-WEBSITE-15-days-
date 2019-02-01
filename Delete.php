<?php include "db.php";
  $q = htmlspecialchars($_GET['id']);
  $sech = "DELETE FROM products WHERE product_id = '$q'";
$add_ = mysqli_query($con,$sech);
header("Location:index.php");
?>