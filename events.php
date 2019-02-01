<?php
session_start();
include 'classes.php';

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Events</title>
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
$password = "";
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
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid"> 
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
          <span class="sr-only"> navigation toggle</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand">Events</a>
      </div>
    <div class="collapse navbar-collapse" id="collapse">
      <ul class="nav navbar-nav">
        <li><a href="/nitro/index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="home.php"><span class="glyphicon glyphicon-modal-window"></span> Boite a idée</a></li>
        <li><a href="boutique/profile.php"><span class="glyphicon glyphicon-shopping-cart"></span> Boutique</a></li>
        <?
        if ($checkRole == 3) {
          ?>
        <li><a href="reportSection.php"><span class="glyphicon glyphicon-flag"></span> Report Section</a></li>
          <?
        }
?>
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
$sql = "SELECT * FROM idea WHERE approved=1 AND status=0 ORDER BY ideaID DESC";
$result = $conn->query($sql);
$userIDD = $_SESSION['uid'];
$role = "SELECT * FROM users WHERE userID = $userIDD";
 $resultRole = $conn->query($role);
 $userRole = $_SESSION['role'];

$userID=$_SESSION['uid'];
$notif="SELECT * FROM idea WHERE ideaUserID=$userID AND approved=1";
$resultnotif = $conn->query($notif);

$reportedpost="SELECT * FROM idea WHERE ideaUserID=$userID AND status=1";
$resultReportedPost = $conn->query($reportedpost);

$reportedCom="SELECT * FROM comments WHERE commentUserID=$userID AND status=1";
$resultReportedCom = $conn->query($reportedCom);

$reportedImg="SELECT * FROM images WHERE imageUserID=$userID AND status=1";
$resultReportedImg = $conn->query($reportedImg);


 // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
    $imagePostID = $_POST['imagePostID'];
    $imageUserName = $_POST['imageUserName'];
    $imageUserID = $_POST['imageUserID'];
    $image = $_FILES['image']['name'];
    // Get text
    $image_text = mysqli_real_escape_string($conn, $_POST['image_text']);
    // image file directory
    $target = "images/".basename($image);

    $sql2 = "INSERT INTO images (image, image_text, imagePostID, imageUserName, imageUserID) VALUES ('$image', '$image_text', '$imagePostID', '$imageUserName', '$imageUserID')";
    mysqli_query($conn, $sql2);

  }
            if(isset($_GET['joined'])){
$counts=$_SESSION['count'];

if ($counts-1 != 0) {
  ?>
      <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>You and 
<? echo $counts-1;?> others joined this event</b>
      </div>  

<?
}
else {
?>
  <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>You have joined this event</b>
      </div>  
  <?
}
}

 if(isset($_GET['voteFail'])){
$counts = $_SESSION['count'];
if ($counts-1 !=0) {
  ?>
 <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>You and 
<? echo $counts-1;?> others already joined this event</b>
      </div>  
<?
}
else {
?>
 <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>You already joined this event</b>
      </div>  
  <?
}
}
?>
<?php
      if(isset($_GET['voteFail'])){
?>
       <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>You already joined this event</b>
      </div>  
<?php
  }
    ?> 
<?php
      if(isset($_GET['liked'])){
?>
 <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>You already liked this post</b>
      </div>  
<?php
  }
    ?> 
<?php
      if(isset($_GET['commentlike'])){
        $nbrcommentLikes=$_SESSION['nbrcommentlikes']; 

if ($nbrcommentLikes-1 != 0) {
  ?>
   <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b> You and 
<? echo $nbrcommentLikes-1;?> others liked this comment</b>
      </div>  
  
<?
}
else {
?>
   <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>You liked this comment</b>
      </div>  
  <?
}
}
?>
<?php
?> 
    <?php
       if(isset($_GET['commentliked'])){
        $nbrcommentLikes=$_SESSION['nbrcommentlikes']; 

if ($nbrcommentLikes-1 != 0) {
  ?>
  <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>  You and 
<? echo $nbrcommentLikes-1;?> others already liked this comment</b>
      </div>  

<?
}
else {
?>
     <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>  You already liked this comment</b>
      </div>  
  <?
}
}
?>
<?php
       if(isset($_GET['like'])){
        $nbrLikes=$_SESSION['nbrlikes']; 

if ($nbrLikes-1 != 0) {
  ?>
  <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b> You and 
<? echo $nbrLikes-1;?> others liked this post</b>
      </div>
<?
}
else {
?>
   <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>You liked this post</b>
      </div>
  <?
}
}
?>
<?
 if(isset($_GET['imagelike'])){
$nbrimgLikes=$_SESSION['nbrimgLikes'];

if ($nbrimgLikes == 1) {
?>
   <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>You liked this photo</b>
      </div>
  
<?
}
else {
?>
   <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b> You and 
<? echo $nbrimgLikes-1;?> others liked this photo</b>
      </div>
 
  <?
}
}
?>
<?php
?> 
    <?php
       if(isset($_GET['imageliked'])){
$nbrimgLikes=$_SESSION['nbrimgLikes'];
if ($nbrimgLikes == 1) {
  ?>
     <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b> You already liked this photo</b>
      </div>
<?
}
else {
?>
   <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b> You and 
<? echo $nbrimgLikes-1;?> others liked this photo</b>
      </div>

  <?
}
}
       if(isset($_GET['imgReport'])){
  ?>
       <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b> Image reported!</b>
      </div>
<?
}
 if(isset($_GET['imgDelete'])){
  ?>
        <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b> Image deleted!</b>
      </div>
  <?
}
       if(isset($_GET['comReport'])){
  ?>
        <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b> Comment reported!</b>
      </div>
<?
}
 if(isset($_GET['comDelete'])){
  ?>
        <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b> Comment deleted</b>
      </div>
  <?
}
       if(isset($_GET['postReport'])){
  ?>
        <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b> Post reported!</b>
      </div>
<?
}
 if(isset($_GET['postDelete'])){
  ?>
        <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b> Post deleted</b>
      </div>
  <?
}

 if(isset($_GET['approved'])){
  ?>
       <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b> Idea approved (moved to events)</b>
      </div>
  <?
}

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
$ideaIDD=$row["ideaID"];
$com = "SELECT * FROM comments WHERE commentPostID=$ideaIDD AND status=0 ORDER BY commentID DESC";
$resultCom = $conn->query($com);
$img = "SELECT * FROM images WHERE imagePostID=$ideaIDD AND status=0";
$resultImg = $conn->query($img);



     echo '<div class="posts" style=" border-left: 4px solid #5D77FE; width: 450px; max-height: 100%; max-width: 100%; border-style: inset; padding: 10px; margin: 5px; border-radius: 10px; border-color: #dfe3ee; background-color: #f7f7f7;">';
echo '<span class="userNames" style="font-family: Impact, Charcoal, sans-serif; color: #5D77FE; font-weight: normal; background-color: #f7f7f7; font-size: 17px; border-radius: 5px; padding-right: 2px; padding-left: 2px; border: 2px solid #dedede;   max-width: 100%;">'; echo htmlspecialchars($row["ideaUserName"]); echo'-'; echo $row["ideaUserCampus"]; echo'</span><br><span style="font-size: 9px;"><img style="height: 10px; width: 10px;" src="img/clock.png" alt="">'; echo $row['timestamp']; echo'</span>';
echo'<div>';
 echo'<strong style="padding: 4px;"><img style="height: 20px; width: 20px; position: relative; top: 4px;" src="img/style.png" alt="">'; echo $row['ideaStyle']; echo'</strong>';
  echo'<strong style="padding: 4px;"><img style="height: 12px; width: 12px; position: relative; top: 1px;" src="img/fee.png" alt="">'; echo' '; echo $row['ideaFee']; echo'</strong>';
  echo'<strong style="padding: 4px;"><img style="height: 20px; width: 20px; position: relative; top: 7px;" src="img/timestamp.png" alt="">'; echo $row['meetingTime']; echo'</strong>';
echo'</div>';
echo'<h4 class="userHeadlines" style="font-family: Impact, Charcoal, sans-serif; color: #5D77FE;   border-bottom: 4px solid #5D77FE; padding: 6px; border-radius: 10px; width: 400px; max-width: 100%;
  background-color: #f7f7f7; font-weight: bold;">'; echo $row['ideaHeadline']; echo'</h4>';
echo'<h5 class="userStories" style="   word-wrap: break-word;
   width: 400px; border-left: 4px solid #5D77FE; margin: 1px; padding: 6px; border-radius: 10px;
  background-color: #ffffff; width: 400px; font-family: Impact, Charcoal, sans-serif; color: black; font-weight: bold; max-width: 100%;">'; echo $row['ideaStory']; echo'</h5>';
?>
  <table>
<form id="formvote" method="post" action='postVote.php'>
<tr><td><input type="hidden" name="voteUserID" value="<?php echo $_SESSION['uid']; ?>" />
</td></tr><tr><td><input type="hidden" name="voteUserName" value="<?php echo $_SESSION['name']; ?>" />
</td></tr><tr><td><input type="hidden" name="voteUserCampus" value="<?php echo $_SESSION['address2']; ?>" />
</td></tr><tr><td><input type="hidden" name="voteUserEmail" value="<?php echo $_SESSION['email']; ?>" />
</td></tr><tr><td><input type="hidden" name="postID" value="<?php echo $row['ideaID']; ?>" />
</td></tr><tr>
<input style="margin: 10px; border-radius: 10px;  border: 2px solid #5D77FE; background-color: white;" type="submit" id="vote" name="vote" value="★ interested!" onsubmit="Interested()" />
</form>
<form id='like' method="post" action='liker.php'>
<input type="hidden" name="likePostID" value="<?php echo $row['ideaID']; ?>" />
<input type="hidden" name="likeUserID" value="<?php echo $_SESSION['uid']; ?>" />
<input style=" margin: 10px; border-radius: 10px;  border: 2px solid #5D77FE; background-color: white;" type="submit" id="likes" name="likes" value="👍🏼 Like" onsubmit="Like()" />
</form>
<?
if ($userRole == 3) {
  ?>
<form id='deleteIdea' method="post" action='deleteIdea.php'>
<input type="hidden" name="ideaID" value="<?php echo $row['ideaID']; ?>" />
<input style=" margin: 10px; border-radius: 10px;  border: 2px solid #5D77FE; background-color: white;" type="submit" id="deleteIdea" name="deleteIdea" value="✖︎ Delete" onsubmit="deleteIdea()" />
</form>

<?
}
if ($userRole == 2) {
?>
<form id='reportIdea' method="post" action='reportIdea.php'>
<input type="hidden" name="ideaID" value="<?php echo $row['ideaID']; ?>" />
<input style="margin: 10px; border-radius: 10px;  border: 2px solid #5D77FE; background-color: white;" type="submit" id="reportIdea" name="reportIdea" value="⚐ Report" onsubmit="reportIdea()" />
</form>            
<?
}
?>






<body>
<div id="content">

  <form method="POST" action="home.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div>
      <input type="file" name="image">
    </div>
    <div>
      <textarea  style="height: 30px; border-radius: 10px; margin-top: 5px; text-align: center;" 
        id="text" 
        cols="40" 
        rows="4" 
        name="image_text" 
        required 
        placeholder="Say something about this image..."></textarea>
       </div>
        <div>
      <input type="hidden" name="imagePostID" value="<?php echo $row['ideaID']; ?>">
      <input type="hidden" name="imageUserName" value="<?php echo $_SESSION["name"]; ?>">
      <input type="hidden" name="imageUserID" value="<?php echo $_SESSION['uid']; ?>" />
    <span class="glyphicon glyphicon-upload"></span><span>   </span><input style="border-radius: 5px;" type="submit" name="upload" value="upload image">
    </div>
  </form>
</div>
</body>
<form id='comment' method="post" action='comment.php'>
<input type="hidden" name="commentPostID" value="<?php echo $row['ideaID']; ?>" />
<input type="hidden" name="commentUserID" value="<?php echo $_SESSION['uid']; ?>" />
<input type="hidden" name="commentUserName" value="<?php echo $_SESSION['name']; ?>" />
<br>
<input type="text" style=" text-align: center; border-radius: 5px; border: 2px solid #5D77FE; width: 300px; height: 35px;" name="commentText" placeholder="write a comment.." required />
<input style=" margin: 1px; border-radius: 5px;  border: 2px solid #5D77FE; background-color: white; height: 36px;" type="submit" id="comment" name="comment" value="💬 Comment" onsubmit="comment()" /><br><br>

</form>
</tr>
</table>
   <script>
   </script>
<?
    while($rowCom = $resultCom->fetch_assoc()) {
      echo '<div style="border-left: 2px solid #5D77FE; background-color: #black; margin: 1px">';
echo'<span class="commentUserName" style="position:relative; right: 110px; font-family: Impact, Charcoal, sans-serif; color: Black; padding: 6px; border-radius: 5px; width: 500px; max-width: 100%; text-align: left; font-size: 13px; margin: 1px
  background-color: #f7f7f7;">'; echo $rowCom['commentUserName']; echo'</span>'; echo'<span style="position:relative; right: 110px; font-size: 11px;"><img style="height: 10px; width: 10px;" src="img/clock.png" alt="">'; echo "   "; echo $rowCom['timestamp']; echo'</span>';
  echo'<h5 class="CommentText" style="word-wrap: break-word; font-size: 12px;
   width: 400px; margin: 1px; padding: 10px; border: 2px solid #5D77FE; border-radius: 5px; text-align: left;
   font-family: Charcoal, sans-serif; color: black; max-width: 100%; background-color: #ffffff; ">'; echo $rowCom['commentText']; echo'</h5>';
   echo '</div>';?><table><form id='commentlike' method="post" action='commentliker.php'>
<input type="hidden" name="commentlikeCommentID" value="<?php echo $rowCom['commentID']; ?>" />
<input type="hidden" name="commentlikeUserID" value="<?php echo $_SESSION['uid']; ?>" />
<input style="margin: 1px; border-radius: 10px;  border: 2px solid #5D77FE; position: relative; left: 90px; background-color: white;" type="submit" id="commentlikes" name="commentlikes" value="👍🏼 Like" onsubmit="Like()" />
</form>
<?
if ($userRole == 2) {
  ?>
<form id='reportComment' method="post" action='reportComment.php'>
<input type="hidden" name="commentID" value="<?php echo $rowCom['commentID']; ?>" />
<input style="margin: 1px; border-radius: 10px;  border: 2px solid #5D77FE; position: relative; left: 100px; background-color: white;" type="submit" id="reportIdea" name="reportComment" value="⚐ Report" onsubmit="reportComment()" />
</form>
<?
}
if ($userRole == 3) {
?>
</form><form id='deleteComment' method="post" action='deleteComment.php'>
<input type="hidden" name="commentID" value="<?php echo $rowCom['commentID']; ?>" />
<input style="margin: 1px; border-radius: 10px;  border: 2px solid #5D77FE; position: relative; left: 110px; background-color: white;" type="submit" id="deleteComment" name="deleteComment" value="✖︎ Delete" onsubmit="deleteComment()" />
</form>
<?
}
?>
</table>
  </form>
  <?

}

if ($resultImg->num_rows > 0) {
 while($rowImg = $resultImg->fetch_assoc()) {
  echo "<br>";
      echo "<span style=' text-align: left; color: #5D77FE; font-weight: bold;'>".$rowImg['imageUserName']."</span>";
      echo "<span style=' text-align: left; color: black;'> has added a picture to this post</span>";
      echo "<p>".$rowImg['image_text']."</p>";
      echo "<img src='images/".$rowImg['image']."'style='width: 400px; border-radius: 10px; border: 3px solid #5D77FE;' >";
      ?>
      <table><form id='imagelike' method="post" action='imageliker.php'>
<input type="hidden" name="imagelikeImageID" value="<?php echo $rowImg['id']; ?>" />
<input type="hidden" name="imagelikeUserID" value="<?php echo $_SESSION['uid']; ?>" />
<input style="margin: 1px; border-radius: 10px;  border: 2px solid #5D77FE; position: relative; left: 110px; background-color: white;" type="submit" id="imagelikes" name="imagelikes" value="👍🏼 Like Photo " onsubmit="imageLike()" />
</form>
<?
if ($userRole == 3) {
  ?>
<form id='deleteImage' method="post" action='deleteImage.php'>
<input type="hidden" name="id" value="<?php echo $rowImg['id']; ?>" />
<input style="margin: 10px; border-radius: 10px;  border: 2px solid #5D77FE; background-color: white; position: relative; left: 110px;" type="submit" id="deleteImage" name="deleteImage" value="✖︎ Delete" onsubmit="deleteImage()" />
</form>
<?
}
if ($userRole == 2) {
?>
<form id='reportImage' method="post" action='reportImage.php'>
<input type="hidden" name="id" value="<?php echo $rowImg['id']; ?>" />
<input style="position: relative; left: 110px; margin: 10px; border-radius: 10px;  border: 2px solid #5D77FE; background-color: white;" type="submit" id="reportImage" name="reportImage" value="⚐ Report" onsubmit="reportImage()" />
</form>
<?
}
?>
<?
}
}
?>

<?
echo "</div>";
?>

<?
}
}
$conn->close();
?>
<?

?>

<?php
            if(isset($_GET['joined'])){
$counts=$_SESSION['count'];

if ($counts-1 != 0) {
  ?>
  <div class="alert1">
  <span class="closebtn1" onclick="this.parentElement.style.display='none';">&times;</span> You and 
<? echo $counts-1;?> others joined this event</div>
<?
}
else {
?>
    <div class="alert1">
  <span class="closebtn1" onclick="this.parentElement.style.display='none';">&times;</span> You joined this event</div>
  <?
}
}

 if(isset($_GET['voteFail'])){
$counts = $_SESSION['count'];
if ($counts-1 !=0) {
  ?>
 <div class="alert2">
  <span class="closebtn1" onclick="this.parentElement.style.display='none';">&times;</span> You and 
<? echo $counts-1;?> others already joined this event</div>
<?
}
else {
?>
<div class="alert2">
  <span class="closebtn1" onclick="this.parentElement.style.display='none';">&times;</span> You already joined this event</div>

  <?
}
}
?>
    <br>
<?php
      if(isset($_GET['voteFail'])){
?>
      <div class="alert2">
  <span class="closebtn2" onclick="this.parentElement.style.display='none';">&times;</span> 
You already registred to this event!</div>
<?php
  }
    ?> 
<br>
<?php
      if(isset($_GET['liked'])){
?>
      <div class="alert2">
  <span class="closebtn2" onclick="this.parentElement.style.display='none';">&times;</span> 
You already liked this post!</div>
<?php
  }
    ?> 
    <br>
<?php
      if(isset($_GET['commentlike'])){
        $nbrcommentLikes=$_SESSION['nbrcommentlikes']; 

if ($nbrcommentLikes-1 != 0) {
  ?>
  <div class="alert1">
  <span class="closebtn1" onclick="this.parentElement.style.display='none';">&times;</span> You and 
<? echo $nbrcommentLikes-1;?> others liked this comment</div>
<?
}
else {
?>
    <div class="alert1">
  <span class="closebtn1" onclick="this.parentElement.style.display='none';">&times;</span> You liked this</div>
  <?
}
}
?>
<?php
?> 
    <br>
    <?php
       if(isset($_GET['commentliked'])){
        $nbrcommentLikes=$_SESSION['nbrcommentlikes']; 

if ($nbrcommentLikes-1 != 0) {
  ?>
  <div class="alert2">
  <span class="closebtn2" onclick="this.parentElement.style.display='none';">&times;</span> You and 
<? echo $nbrcommentLikes-1;?> others already liked this comment</div>
<?
}
else {
?>
    <div class="alert2">
  <span class="closebtn2" onclick="this.parentElement.style.display='none';">&times;</span> You already liked this</div>
  <?
}
}
?>
    <br>
<?php
       if(isset($_GET['like'])){
        $nbrLikes=$_SESSION['nbrlikes']; 

if ($nbrLikes-1 != 0) {
  ?>
  <div class="alert1">
  <span class="closebtn1" onclick="this.parentElement.style.display='none';">&times;</span> You and 
<? echo $nbrLikes-1;?> others liked this post</div>
<?
}
else {
?>
    <div class="alert1">
  <span class="closebtn1" onclick="this.parentElement.style.display='none';">&times;</span> You liked this</div>
  <?
}
}
?>
<?
 if(isset($_GET['imagelike'])){
$nbrimgLikes=$_SESSION['nbrimgLikes'];

if ($nbrimgLikes == 1) {
?>
    <div class="alert1">
  <span class="closebtn1" onclick="this.parentElement.style.display='none';">&times;</span> You liked this</div>
  
<?
}
else {
?>
      <div class="alert1">
  <span class="closebtn1" onclick="this.parentElement.style.display='none';">&times;</span> You and 
<? echo $nbrimgLikes-1;?> others liked this photo</div>
  <?
}
}
?>
<?php
?> 
    <br>
    <?php
       if(isset($_GET['imageliked'])){
$nbrimgLikes=$_SESSION['nbrimgLikes'];
if ($nbrimgLikes == 1) {
  ?>
   <div class="alert1">
  <span class="closebtn1" onclick="this.parentElement.style.display='none';">&times;</span> You already liked this</div>

  
<?
}
else {
?>
    <div class="alert2">
  <span class="closebtn2" onclick="this.parentElement.style.display='none';">&times;</span> You and 
<? echo $nbr;?> others already liked this photo</div>
  <?
}
}
       if(isset($_GET['imgReport'])){
  ?>
   <div class="alert2">
  <span class="closebtn2" onclick="this.parentElement.style.display='none';">&times;</span> Image reported!</div>
<?
}
 if(isset($_GET['imgDelete'])){
  ?>
   <div class="alert2">
  <span class="closebtn2" onclick="this.parentElement.style.display='none';">&times;</span> Image deleted!</div>
  <?
}
       if(isset($_GET['comReport'])){
  ?>
   <div class="alert2">
  <span class="closebtn2" onclick="this.parentElement.style.display='none';">&times;</span> Comment reported!</div>
<?
}
 if(isset($_GET['comDelete'])){
  ?>
   <div class="alert2">
  <span class="closebtn2" onclick="this.parentElement.style.display='none';">&times;</span> Comment deleted!</div>
  <?
}
       if(isset($_GET['postReport'])){
  ?>
   <div class="alert2">
  <span class="closebtn2" onclick="this.parentElement.style.display='none';">&times;</span> Post reported!</div>
<?
}
 if(isset($_GET['postDelete'])){
  ?>
   <div class="alert2">
  <span class="closebtn2" onclick="this.parentElement.style.display='none';">&times;</span> Post deleted!</div>
  <?
}

 if(isset($_GET['approved'])){
  ?>
   <div class="alert1">
  <span class="closebtn1" onclick="this.parentElement.style.display='none';">&times;</span> idea approved (moved to events)!</div>
  <?
}
if(isset($_GET['notif'])){

}
?>

   <div style="position: relative; left: 400px;"><span id="user" style="color: white; position: relative; font-family: Impact, Charcoal, sans-serif;"> <?echo $_SESSION['name'];?> </span>
      <img src="img/logouticon.png" class="exit" style=" width: 20px; height: 20px; left: 40px; position: relative;">
<a href="logout.php">

   <span id="user" style="color: white; position: relative; font-family: Impact, Charcoal, sans-serif;"> <?echo $_SESSION['role'];?> </span></div>
</div>
<body style="background-color: black;">
  <div>
  </div>

</body>

<body>
  </center>
</body>
</html>