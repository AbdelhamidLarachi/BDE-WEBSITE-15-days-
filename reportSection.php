<?php
session_start();
include 'classes.php';

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Report Section</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="home.css">
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
<body background="img/back.png">
  <?php
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

if ($checkRole==3) {

?>
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid"> 
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
          <span class="sr-only"> navigation toggle</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand">Report Section</a>
      </div>
    <div class="collapse navbar-collapse" id="collapse">
      <ul class="nav navbar-nav">
        <li><a href="/nitro/index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="events.php"><span class="glyphicon glyphicon-modal-window"></span> Events</a></li>
        <li><a href="home.php"><span class="glyphicon glyphicon-modal-window"></span> Boite a idée</a></li>
        <li><a href="boutique/profile.php"><span class="glyphicon glyphicon-shopping-cart"></span> Boutique</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"  class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo " Hi, ".$_SESSION["name"]; ?></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php" style="text-decoration:none; color:blue; color: black;"><span class="glyphicon glyphicon-off
"></a></li>
          </ul>
        </li>
          <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-bell"></span> Notification</a>
          <ul class="dropdown-menu" style="background-color: #262424; width: 500px; text-align: left; font-size: 12px; border-radius: 10px; padding: 10px;">
            <li><span href="cart.php" style="text-decoration:none; color:white; background-color: black;"><?
    while($rowNotif = $resultnotif->fetch_assoc()) {
?>
  <p style="font-weight: bold; background-color: #262424;"><span class="glyphicon glyphicon-ok"></span><? echo'  Your idea about "'; echo $rowNotif['ideaHeadline']; echo '" has been approved!';?></p>
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
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-2">
        <div id="get_category">
        </div>
      </div>
        </center>
      </div>
    </div>
  </div>
  <center>
    </body>
  <center>
<?php
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
$posts = "SELECT * FROM idea WHERE status=1 ORDER BY ideaID DESC";
$resultPost = $conn->query($posts);
$userIDD = $_SESSION['userID'];
$com = "SELECT * FROM comments WHERE status=1 ORDER BY commentID DESC";
 $resultCom = $conn->query($com);
$img = "SELECT * FROM images WHERE status=1";
$resultImg = $conn->query($img);

$checkRole = $_SESSION['role'];
if ($checkRole == 3) {

if ($resultPost->num_rows > 0) {
  ?>
       <p style=" border-left: 4px solid #5D77FE; width: 450px; max-height: 100%; max-width: 100%; border-style: inset; padding: 10px; margin: 5px; border-radius: 10px; border-color: #dfe3ee; background-color: #393939; color: white; font-weight: bold;"><span class="glyphicon glyphicon-flag"></span> REPORTED POSTS</p><br><br>
<?
    while($row = $resultPost->fetch_assoc()) {

       echo '<div class="posts" style=" border-left: 4px solid #5D77FE; width: 450px; max-height: 100%; max-width: 100%; border-style: inset; padding: 10px; margin: 5px; border-radius: 10px; border-color: #dfe3ee; background-color: #f7f7f7;">';
       ?>
<?echo '<span class="userNames" style="font-family: Impact, Charcoal, sans-serif; color: #5D77FE; font-weight: normal; background-color: #f7f7f7; font-size: 17px; border-radius: 5px; padding-right: 2px; padding-left: 2px; border: 2px solid #dedede;   max-width: 100%;">'; echo htmlspecialchars($row["ideaUserName"]); echo'-'; echo $row["ideaUserCampus"]; echo'</span><br><span style="font-size: 9px;"><img style="height: 10px; width: 10px;" src="img/clock.png" alt="">'; echo $row['timestamp']; echo'</span>';echo "<br>";
 echo'<strong style="padding: 4px;"><img style="height: 20px; width: 20px; position: relative; top: 4px;" src="img/style.png" alt="">'; echo $row['ideaStyle']; echo'</strong>';
  echo'<strong style="padding: 4px;"><img style="height: 12px; width: 12px; position: relative; top: 1px;" src="img/fee.png" alt="">'; echo' '; echo $row['ideaFee']; echo'</strong>';
  echo'<strong style="padding: 4px;"><img style="height: 20px; width: 20px; position: relative; top: 7px;" src="img/timestamp.png" alt="">'; echo $row['meetingTime']; echo'</strong>';
echo'<h4 class="userHeadlines" style="font-family: Impact, Charcoal, sans-serif; color: #5D77FE;   border-bottom: 4px solid #5D77FE; padding: 6px; border-radius: 10px; width: 400px; max-width: 100%;
  background-color: #f7f7f7; font-weight: bold;">'; echo $row['ideaHeadline']; echo'</h4>';
echo'<h5 class="userStories" style="   word-wrap: break-word;
   width: 400px; border-left: 4px solid #5D77FE; margin: 1px; padding: 6px; border-radius: 10px;
  background-color: #ffffff; width: 400px; font-family: Impact, Charcoal, sans-serif; color: black; font-weight: bold; max-width: 100%;">'; echo $row['ideaStory']; echo'</h5>';
  echo'</div>';
?>
<table>
<form id='deleteIdea' method="post" action='deleteIdea.php'>
<input type="hidden" name="ideaID" value="<?php echo $row['ideaID']; ?>" />
<input style="margin: 10px; border-radius: 10px;  border: 2px solid #5D77FE; background-color: white;" type="submit" id="deleteIdea" name="deleteIdea" value="✖︎ Delete" onsubmit="deleteIdea()" />
</form>
<form id='republishIdea' method="post" action='republishIdea.php'>
<input type="hidden" name="ideaID" value="<?php echo $row['ideaID']; ?>" />
<input style="margin: 10px; border-radius: 10px;  border: 2px solid #5D77FE; background-color: white;" type="submit" id="republishIdea" name="republishIdea" value="✓︎ Republish" onsubmit="republishIdea()" />
</form>
</table>
<?
}
?>
<?
}
if ($resultCom->num_rows > 0) {
?>
<br><br> <p style=" border-left: 4px solid #5D77FE; width: 450px; max-height: 100%; max-width: 100%; border-style: inset; padding: 10px; margin: 5px; border-radius: 10px; border-color: #dfe3ee; background-color: #393939; color: white; font-weight: bold;"><span class="glyphicon glyphicon-flag"></span> REPORTED COMMENTS</p><br><br><br><br>
<?
    while($rowCom = $resultCom->fetch_assoc()) {
  echo '<div class="posts" style=" border-left: 4px solid #5D77FE; width: 450px; max-height: 100%; max-width: 100%; border-style: inset; padding: 10px; margin: 5px; border-radius: 10px; border-color: #dfe3ee; background-color: #f7f7f7;">';
       echo '<div style="border-left: 2px solid #5D77FE; background-color: #black; margin: 1px;">';
echo'<span class="commentUserName" style="position:relative; right: 100px; font-family: Impact, Charcoal, sans-serif; color: Black; padding: 6px; border-radius: 5px; width: 500px; max-width: 100%; text-align: left; font-size: 13px; margin: 1px
  background-color: #f7f7f7;">'; echo $rowCom['commentUserName']; echo'</span>'; echo'<span style="position:relative; right: 100px; font-size: 11px;"><img style="height: 10px; width: 10px;" src="img/clock.png" alt="">'; echo "   "; echo $rowCom['timestamp']; echo'</span>';
  echo'<h5 class="CommentText" style="word-wrap: break-word; font-size: 12px;
   width: 400px; margin: 1px; padding: 10px; border: 2px solid #5D77FE; border-radius: 5px; text-align: left;
   font-family: Charcoal, sans-serif; color: black; max-width: 100%; background-color: #ffffff; ">'; echo $rowCom['commentText']; echo'</h5>';
   echo '</div>';
   echo "</div>";
   ?>
<table>
<form id='deleteComment' method="post" action='deleteComment.php'>
<input type="hidden" name="commentID" value="<?php echo $rowCom['commentID']; ?>" />
<input style="margin: 1px; border-radius: 10px;  border: 2px solid #5D77FE; position: relative; left: 10px; background-color: white;" type="submit" id="deleteComment" name="deleteComment" value="✖︎ Delete" onsubmit="deleteComment()" />
</form>
<form id='republishComment' method="post" action='republishComment.php'>
<input type="hidden" name="commentID" value="<?php echo $rowCom['commentID']; ?>" />
<input style="margin: 10px; border-radius: 10px;  border: 2px solid #5D77FE; background-color: white; position: relative; left: 10px;" type="submit" id="republishIdea" name="republishComment" value="✓︎ Republish" onsubmit="republishComment()" />
</form>
</table>
<?
 }
}

if ($resultImg->num_rows > 0) {
  ?>
<br><br> <p style=" border-left: 4px solid #5D77FE; width: 450px; max-height: 100%; max-width: 100%; border-style: inset; padding: 10px; margin: 5px; border-radius: 10px; border-color: #dfe3ee; background-color: #393939; color: white; font-weight: bold;"><span class="glyphicon glyphicon-flag"></span> REPORTED IMAGES</p><br><br><br><br>
<?
 while($rowImg = $resultImg->fetch_assoc()) {
    echo '<div class="posts" style=" border-left: 4px solid #5D77FE; width: 450px; max-height: 100%; max-width: 100%; border-style: inset; padding: 10px; margin: 5px; border-radius: 10px; border-color: #dfe3ee; background-color: #f7f7f7;">';
      echo "<span style=' text-align: left; color: #5D77FE; font-weight: bold;'>".$rowImg['imageUserName']."</span>";
      echo "<span style=' text-align: left; color: black;'> has added a picture</span>";
      echo "<br>";
      echo "<span>".$rowImg['image_text']."</span>";
      echo "<img src='images/".$rowImg['image']."'style='width: 400px; border-radius: 10px; border: 3px solid #5D77FE;' >";
      echo'</div>';
?>
<table>
<form id='deleteImage' method="post" action='deleteImage.php'>
<input type="hidden" name="id" value="<?php echo $rowImg['id']; ?>" />
<input style="margin: 10px; border-radius: 10px;  border: 2px solid #5D77FE; background-color: white;" type="submit" id="deleteImage" name="deleteImage" value="✖︎ Delete" onsubmit="deleteImage()" />
</form>
<form id='republishImage' method="post" action='republishImage.php'>
<input type="hidden" name="id" value="<?php echo $rowImg['id']; ?>" />
<input style="margin: 10px; border-radius: 10px;  border: 2px solid #5D77FE; background-color: white;" type="submit" id="republishImage" name="republishImage" value="✓︎ Republish" onsubmit="republishImage()" />
</form>
</table>
<?
}
}
}
}
else {
  ?>
  <center>
<br><br> <p style=" border-left: 4px solid #5D77FE; width: 600px; text-align: center; max-height: 100%; max-width: 100%; border-style: inset; padding: 10px; margin: 5px; border-radius: 10px; border-color: #dfe3ee; background-color: black; color: white; font-weight: bold;"><span class="glyphicon glyphicon-warning-sign"></span> WARNING : YOU ARE NOT ALLOWED TO ACCESS THIS PAGE!</p><br><br><br><br>
</center>
<?
}
?>
</center>
</html>