<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
$checkRole = $_SESSION['role'];

$servername = "localhost";
$username = "root";
$password = "rootmacpro";
$dbname = "exia";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM idea WHERE status=0 ORDER BY ideaID DESC";
$result = $conn->query($sql);
$userIDD = $_SESSION['uid'];
$role = "SELECT * FROM users WHERE userID = $userIDD";
$resultRole = $conn->query($role);
$userRole = $_SESSION['role'];

$userID=$_SESSION['uid'];
$notif="SELECT * FROM idea WHERE ideaUserID=$userID AND approved=1 ORDER BY ideaID DESC";
$resultnotif = $conn->query($notif);

$reportedpost="SELECT * FROM idea WHERE ideaUserID=$userID AND status=1 ORDER BY ideaID DESC";
$resultReportedPost = $conn->query($reportedpost);

$reportedCom="SELECT * FROM comments WHERE commentUserID=$userID AND status=1 ORDER BY commentID DESC";
$resultReportedCom = $conn->query($reportedCom);

$reportedImg="SELECT * FROM images WHERE imageUserID=$userID AND status=1 ORDER BY id DESC";
$resultReportedImg = $conn->query($reportedImg);
$checkRole = $_SESSION['role'];


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Boutique</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="icon" type="image/png" href="img/cesi.png" sizes="32x32" />
		<script src="main.js"></script>
		<style>
			@media screen and (max-width:480px){
				#search{width:80%;}
				#search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}
			}
		</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only"> navigation toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">Boutique</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
        <li><a href="../nitro/index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="../events.php"><span class="glyphicon glyphicon-modal-window"></span> Events</a></li>
        <li><a href="profile.php"><span class="glyphicon glyphicon-shopping-cart"></span> Boutique</a></li>

				<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
				<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3 col-xs-3">Sl.No</div>
									<div class="col-md-3 col-xs-3">Product Image</div>
									<div class="col-md-3 col-xs-3">Product Name</div>
									<div class="col-md-3 col-xs-3">Price in $.</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								<!--<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $.</div>
								</div>-->
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
		
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"  class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo " Hi, ".$_SESSION["name"]; ?></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php" style="text-decoration:none; color:blue; color: black;"><span class="glyphicon glyphicon-off
"></a></li>
          </ul>
        </li>
          <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-bell"></span> Notification</a>
          <ul class="dropdown-menu" style="background-color: #262424; width: 500px; text-align: left; font-size: 12px;">
            <li><span href="cart.php" style="text-decoration:none; color:white; background-color: black;"><?
    while($rowNotif = $resultnotif->fetch_assoc()) {
?>
  <span style="font-weight: bold; background-color: #262424;"><span class="glyphicon glyphicon-ok"><? echo'  Your idea about "'; echo $rowNotif['ideaHeadline']; echo '" has been approved!';?></span>
  <?
}
?></li>
            <li class="divider"></li>
            <li><span href="customer_order.php" style="text-decoration:none; color:white; background-color: black;"><?
 while($rowReportedCom = $resultReportedCom->fetch_assoc()) {
?>
  <span style="font-weight: bold; background-color: #262424;"><span class="glyphicon glyphicon-flag"><? echo' Your Comment about '; echo $rowReportedCom['commentText']; echo ' has been Reported!';?></span>
  <?
}
?></span></li>
            <li class="divider"></li>
            <li><span href="" style="text-decoration:none; color:white; background-color: black;"><? while($rowReportedImg = $resultReportedImg->fetch_assoc()) {
?>
  <span style="font-weight: bold; background-color: #262424;"><span class="glyphicon glyphicon-flag"><span><? echo' Your Image about '; echo $rowReportedImg['image_text']; echo ' has been Reported!';?></span>
  <?
}
?></span></li>
          </ul>
        </li>

         <?
      $checkRole = $_SESSION['role'];

?>
 <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"></span><?php echo "AS "; if ($checkRole == 3) {
echo " ADMIN"; } if ($checkRole == 2) {
echo " SALARIED"; } if ($checkRole == 1) {
echo " STUDENT"; }?></a>
    </div>
  </div>
  </div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div id="get_category" >
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
				<div id="get_brand">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brand</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
			</div>
			<div class="col-md-8">	
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-info" id="scroll">
					<?
					         if ($checkRole == 3) {
					         	?>
					<div class="panel-heading"><a href="Add.php" class="btn btn-success">Add a product</a></div>	
					<?
				}
				?>
					<div class="panel-body">
						<div id="get_product">
							<!--Here we get product jquery Ajax Request-->
						</div>
						<!--<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Samsung Galaxy</div>
								<div class="panel-body">
									<img src="product_images/images.JPG"/>
								</div>
								<div class="panel-heading">$.500.00
									<button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
								</div>
							</div>
						</div> -->
					</div>
					<div class="panel-footer">&copy; EXIA CESI GROUPE 01 2019</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<center>
					<ul class="pagination" id="pageno">
						<li><a href="#">1</a></li>
					</ul>
				</center>
			</div>
		</div>
	</div>
</body>
</html>
















































