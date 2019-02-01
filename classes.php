<?php
session_start();

class user{
    private $userID, $userName, $userEmail, $userPass, $userCampus, $role;
    public function getUserID(){
        return $this->userID;
    }
    public function setUserID($userID){
         $this->userID=$userID;
    }
        public function getUserName(){
        return $this->userName;
    }
    public function setUserName($userName){
         $this->userName=$userName;
    }
        public function getUserEmail(){
        return $this->userEmail;
    }
    public function setUserEmail($userEmail){
         $this->userEmail=$userEmail;
    }
        public function getUserPass(){
        return $this->userPass;
    }
    public function setUserPass($userPass){
         $this->userPass=$userPass;
    }
    public function getUserCampus(){
        return $this->userCampus;
    }
    public function setUserCampus($userCampus){
         $this->userCampus=$userCampus;
    }
    public function getrole(){
        return $this->role;
    }
    public function setrole($role){
         $this->role=$role;
    }

public function insertUser(){
        include "conn.php";

$req=$bdd->prepare("SELECT * FROM users WHERE userName=:userName");
            $req->execute(array(
            'userName'=>$this->getUserName()

));

            if ($req->rowCount() > 0) { 
                      header("Location:signup.php?userfail=1");
                     return false;
    }
$req=$bdd->prepare("SELECT * FROM users WHERE userEmail=:userEmail");
            $req->execute(array(
            'userEmail'=>$this->getUserEmail()
));

if ($req->rowCount() > 0) {
                     
                     header("Location:signup.php?error=1");
                     return false;
    }
    else {
        $req=$bdd->prepare("INSERT INTO users(userName, userEmail, userPass, userCampus) VALUES(:userName,:userEmail,:userPass,:userCampus)");
        $req->execute(array(
            'userName'=>$this->getUserName(), 
            'userEmail'=>$this->getUserEmail(), 
            'userPass'=>$this->getUserPass(),
            'userCampus'=>$this->getUserCampus()
        ));

header("Location:index.php?success=1");


    }
}
    public function Userlogin(){
        include "conn.php";
        $req=$bdd->prepare("SELECT * FROM users WHERE userEmail=:userEmail AND userPass=:userPass");
        $req->execute(array(
            'userEmail'=>$this->getUserEmail(), 
            'userPass'=>$this->getUserPass()
    
        ));
    
         if($req->rowCount()==0){
         header("Location:index.php?error=1");
         return false;
    }
else{
    while($data=$req->fetch()){
        $this->setUserID($data['userID']);
        $this->setUserName($data['userName']);
        $this->setUserEmail($data['userEmail']);
        $this->setUserPass($data['userPass']);
        $this->setUserCampus($data['userCampus']);
        $this->setrole($data['role']);
        header("Location:home.php");
    return true;
    }
}
}
/*
public function updateUsername(){
        include "conn.php";
        $reset=$bdd->prepare("UPDATE users SET userName=':userName' WHERE userID=':userName'");
        $reset->execute(array(
            'userName'=>$this->getUserName()
    
        ));
}
*/
}
class idea{
private $ideaID, $ideaHeadline, $ideaStory, $timestamp, $meetingTime, $ideaFee, $ideaStyle, $ideaUserID, $ideaUserName, $ideaUserCampus, $ideaUserEmail;
    public function getideaID(){
        return $this->ideaID;
    }
    public function setideaID($ideaID){
         $this->ideaID=$ideaID;
    }
        public function getideaHeadline(){
        return $this->ideaHeadline;
    }
    public function setideaHeadline($ideaHeadline){
         $this->ideaHeadline=$ideaHeadline;
    }
        public function getideaStory(){
        return $this->ideaStory;
    }
    public function setideaStory($ideaStory){
         $this->ideaStory=$ideaStory;
    }
    public function gettimestamp(){
        return $this->timestamp;
    }
    public function settimestamp($timestamp){
         $this->timestamp=$timestamp;
    }
        public function getmeetingTime(){
        return $this->meetingTime;
    }
    public function setmeetingTime($meetingTime){
         $this->meetingTime=$meetingTime;
    }    
        public function getideaFee(){
        return $this->ideaFee;
    }
    public function setideaFee($ideaFee){
         $this->ideaFee=$ideaFee;
    }
        public function getideaStyle(){
        return $this->ideaStyle;
    }
    public function setideaStyle($ideaStyle){
         $this->ideaStyle=$ideaStyle;
    }
        public function getideaUserID(){
        return $this->ideaUserID;
    }
    public function setideaUserID($ideaUserID){
         $this->ideaUserID=$ideaUserID;
    }
    public function getideaUserName(){
        return $this->ideaUserName;
    }
    public function setideaUserName($ideaUserName){
         $this->ideaUserName=$ideaUserName;
    }
    public function getideaUserEmail(){
        return $this->ideaUserEmail;
    }
    public function setideaUserEmail($ideaUserEmail){
         $this->ideaUserEmail=$ideaUserEmail;
    }
    public function getideaUserCampus(){
        return $this->ideaUserCampus;
    }
    public function setideaUserCampus($ideaUserCampus){
         $this->ideaUserCampus=$ideaUserCampus;
    }
    public function insertIdea(){
        include "conn.php";

        $idea=$bdd->prepare("INSERT INTO idea(ideaHeadline, ideaStory, meetingTime, ideaFee, ideaStyle, ideaUserID, ideaUserName, ideaUserEmail, ideaUserCampus, timestamp) VALUES(:ideaHeadline,:ideaStory,:meetingTime,:ideaFee,:ideaStyle,:ideaUserID,:ideaUserName,:ideaUserEmail,:ideaUserCampus,NOW())");
        $idea->execute(array(
            'ideaHeadline'=>$this->getideaHeadline(), 
            'ideaStory'=>$this->getideaStory(),
            'ideaFee'=>$this->getideaFee(),
            'ideaStyle'=>$this->getideaStyle(),
            'meetingTime'=>$this->getmeetingTime(),
            'ideaUserID'=>$this->getideaUserID(),
            'ideaUserName'=>$this->getideaUserName(),
            'ideaUserEmail'=>$this->getideaUserEmail(),
            'ideaUserCampus'=>$this->getideaUserCampus()
        ));

    }

    public function deleteIdea(){
        include "conn.php";
  $idea=$bdd->prepare("DELETE FROM idea WHERE ideaID=:ideaID");
            $idea->execute(array(
            'ideaID'=>$this->getideaID()
));
        header("Location:home.php?postDelete=1");

    }
    public function reportIdea(){
        include "conn.php";
  $idea=$bdd->prepare("UPDATE idea SET status='1' WHERE ideaID=:ideaID");
            $idea->execute(array(
            'ideaID'=>$this->getideaID()
));
        header("Location:home.php?postReport=1");
}
public function republishIdea(){
        include "conn.php";
  $idea=$bdd->prepare("UPDATE idea SET status='0' WHERE ideaID=:ideaID");
            $idea->execute(array(
            'ideaID'=>$this->getideaID()
));
        header("Location:reportSection.php?republish=1");
}
public function approveIdea(){
        include "conn.php";
  $idea=$bdd->prepare("UPDATE idea SET approved='1' WHERE ideaID=:ideaID");
            $idea->execute(array(
            'ideaID'=>$this->getideaID()
));
        header("Location:home.php?approved=1");
}
public function userNotif(){
        include "conn.php";

$idea=$bdd->prepare("SELECT * FROM idea WHERE ideaUserID=:ideaUserID AND approved=1");
            $idea->execute(array(
            'ideaUserID'=>$this->getideaUserID()

));

            if ($idea->rowCount() > 0) { 
                $notifCount = $idea->rowCount();                     
                $_SESSION['notifCount']=$notifCount;
                header("Location:events.php?notif=1");


}
}

}
class vote{
private $voteUserID, $voteUserName, $voteUserCampus, $voteUserEmail, $postID;
    public function getvoteUserID(){
        return $this->voteUserID;
    }
    public function setvoteUserID($voteUserID){
         $this->voteUserID=$voteUserID;
    }
        public function getvoteUserName(){
        return $this->voteUserName;
    }
    public function setvoteUserName($voteUserName){
         $this->voteUserName=$voteUserName;
    }
        public function getvoteUserCampus(){
        return $this->voteUserCampus;
    }
    public function setvoteUserCampus($voteUserCampus){
         $this->voteUserCampus=$voteUserCampus;
    }
    public function getvoteUserEmail(){
        return $this->voteUserEmail;
    }
    public function setvoteUserEmail($voteUserEmail){
         $this->voteUserEmail=$voteUserEmail;
    }
    public function getpostID(){
        return $this->postID;
    }
    public function setpostID($postID){
         $this->postID=$postID;
    }
public function postVote(){
        include "conn.php";

$vote=$bdd->prepare("SELECT * FROM vote WHERE voteUserID=:voteUserID AND postID=:postID");
            $vote->execute(array(
            'voteUserID'=>$this->getvoteUserID(), 
            'postID'=>$this->getpostID()
));

            if ($vote->rowCount() > 0) { 

                      header("Location:home.php?voteFail=1");
                     return false;
    }
        else {

        $vote=$bdd->prepare("INSERT INTO vote(voteUserID, voteUserName, voteUserEmail, voteUserCampus, postID) VALUES(:voteUserID,:voteUserName,:voteUserEmail,:voteUserCampus,:postID)");
        $vote->execute(array(
            'voteUserID'=>$this->getvoteUserID(), 
            'voteUserName'=>$this->getvoteUserName(),
            'voteUserEmail'=>$this->getvoteUserEmail(),
            'voteUserCampus'=>$this->getvoteUserCampus(),
            'postID'=>$this->getpostID()

        ));
        $count=$bdd->prepare("SELECT * FROM vote WHERE postID=:postID");
            $count->execute(array(
            'postID'=>$this->getpostID()

));
$counts = $count->rowCount();                     
$_SESSION['count']=$counts;
        header("Location:home.php?joined=1");

    }

  }

}

class likes {
private $likeID, $likeUserID, $likePostID;
    public function getlikeID(){
        return $this->likeID;
    }
    public function setlikeID($likeID){
         $this->likeID=$likeID;
    }
        public function getlikeUserID(){
        return $this->likeUserID;
    }
    public function setlikeUserID($likeUserID){
         $this->likeUserID=$likeUserID;
    }
        public function getlikePostID(){
        return $this->likePostID;
    }
    public function setlikePostID($likePostID){
         $this->likePostID=$likePostID;
    }
    
public function liker(){
        include "conn.php";

$likes=$bdd->prepare("SELECT * FROM likes WHERE likeUserID=:likeUserID AND likePostID=:likePostID");
            $likes->execute(array(
            'likeUserID'=>$this->getlikeUserID(), 
            'likePostID'=>$this->getlikePostID()

));

            if ($likes->rowCount() > 0) { 
                      header("Location:home.php?liked=1");
                     return false;
    }
        else {

        $likes=$bdd->prepare("INSERT INTO likes(likeUserID, likePostID) VALUES(:likeUserID,:likePostID)");
        $likes->execute(array(
            'likeUserID'=>$this->getlikeUserID(), 
            'likePostID'=>$this->getlikePostID()
            
        ));
        $countLikes=$bdd->prepare("SELECT * FROM likes WHERE likePostID=:likePostID");
            $countLikes->execute(array(
            'likePostID'=>$this->getlikePostID()

));
$nbrLikes = $countLikes->rowCount();                     
$_SESSION['nbrlikes']=$nbrLikes;
        header("Location:home.php?like=1");

    }

  }

}
class comments {
private $commentID, $commentText, $commentUserID, $commentPostID, $commentUserName, $timestamp;
    public function getcommentID(){
        return $this->commentID;   
    }
    public function setcommentID($commentID){
         $this->commentID=$commentID;
    }
    public function getcommentText(){
        return $this->commentText;
    }
    public function setcommentText($commentText){
         $this->commentText=$commentText;
    }
        public function getcommentUserID(){
        return $this->commentUserID;
    }
    public function setcommentUserID($commentUserID){
         $this->commentUserID=$commentUserID;
    }
    public function getcommentPostID(){
        return $this->commentPostID;
    }
    public function setcommentPostID($commentPostID){
         $this->commentPostID=$commentPostID;
    }
    public function getcommentUserName(){
        return $this->commentUserName;
    }
    public function setcommentUserName($commentUserName){
         $this->commentUserName=$commentUserName;
    }
    public function gettimestamp(){
        return $this->timestamp;
    }
    public function settimestamp($timestamp){
         $this->timestamp=$timestamp;
    }
    public function getcommentLikeUserID(){
        return $this->commentLikeUserID;
    }
    public function setcommentLikeUserID($commentLikeUserID){
         $this->commentLikeUserID=$commentLikeUserID;
    }
public function comment(){
        include "conn.php";

        $comments=$bdd->prepare("INSERT INTO comments(commentUserID, commentText, commentPostID, commentUserName, timestamp) VALUES(:commentUserID, :commentText, :commentPostID,:commentUserName, NOW())");
        $comments->execute(array(
            'commentUserID'=>$this->getcommentUserID(), 
            'commentText'=>$this->getcommentText(), 
            'commentPostID'=>$this->getcommentPostID(),
            'commentUserName'=>$this->getcommentUserName() 
        ));
                      header("Location:home.php");
  }
   public function reportComment(){
        include "conn.php";
  $comments=$bdd->prepare("UPDATE comments SET status='1' WHERE commentID=:commentID");
            $comments->execute(array(
            'commentID'=>$this->getcommentID()
));
        header("Location:home.php?comReport=1");
}
    public function deleteComment(){
        include "conn.php";
  $comments=$bdd->prepare("DELETE FROM comments WHERE commentID=:commentID");
            $comments->execute(array(
            'commentID'=>$this->getcommentID()
));
        header("Location:home.php?comDelete=1");

    }
    public function republishComment(){
        include "conn.php";
  $comments=$bdd->prepare("UPDATE idea SET status='0' WHERE commentID=:commentID");
            $comments->execute(array(
            'commentID'=>$this->getcommentID()
));
        header("Location:reportSection.php?republish=1");
}

}
class commentlikes {
private $commentlikeID, $commentlikeUserID, $commentlikeCommentID;
    public function getcommentlikeID(){
        return $this->commentlikeID;
    }
    public function setcommentlikeID($commentlikeID){
         $this->commentlikeID=$commentlikeID;
    }
        public function getcommentlikeUserID(){
        return $this->commentlikeUserID;
    }
    public function setcommentlikeUserID($commentlikeUserID){
         $this->commentlikeUserID=$commentlikeUserID;
    }
        public function getcommentlikeCommentID(){
        return $this->commentlikeCommentID;
    }
    public function setcommentlikeCommentID($commentlikeCommentID){
         $this->commentlikeCommentID=$commentlikeCommentID;
    }
    
public function commentliker(){
        include "conn.php";

$commentlikes=$bdd->prepare("SELECT * FROM commentlikes WHERE commentlikeUserID=:commentlikeUserID AND commentlikeCommentID=:commentlikeCommentID");
            $commentlikes->execute(array(
            'commentlikeUserID'=>$this->getcommentlikeUserID(), 
            'commentlikeCommentID'=>$this->getcommentlikeCommentID()

));

            if ($commentlikes->rowCount() > 0) { 

                      header("Location:home.php?commentliked=1");
                     return false;
    }
        else {
        $commentlikes=$bdd->prepare("INSERT INTO commentlikes(commentlikeUserID, commentlikeCommentID) VALUES(:commentlikeUserID,:commentlikeCommentID)");
        $commentlikes->execute(array(
            'commentlikeUserID'=>$this->getcommentlikeUserID(), 
            'commentlikeCommentID'=>$this->getcommentlikeCommentID()
            
        ));
 $countcommentLikes=$bdd->prepare("SELECT * FROM commentlikes WHERE commentlikeCommentID=:commentlikeCommentID");
            $countcommentLikes->execute(array(
            'commentlikeCommentID'=>$this->getcommentlikeCommentID()

));
$nbrcommentLikes = $countcommentLikes->rowCount();                     
$_SESSION['nbrcommentlikes']=$nbrcommentLikes;
        header("Location:home.php?commentlike=1");
    }

  }

}

class imagelikes {
private $imagelikeImageID, $imagelikeUserID, $imagelikeID;
    public function getimagelikeImageID(){
        return $this->imagelikeImageID;
    }
    public function setimagelikeImageID($imagelikeImageID){
         $this->imagelikeImageID=$imagelikeImageID;
    }
        public function getimagelikeUserID(){
        return $this->imagelikeUserID;
    }
    public function setimagelikeUserID($imagelikeUserID){
         $this->imagelikeUserID=$imagelikeUserID;
    }    
    public function getimagelikeID(){
        return $this->imagelikeID;
    }
    public function setimagelikeID($imagelikeID){
         $this->imagelikeID=$imagelikeID;
    }    

public function imageliker(){
        include "conn.php";

$imagelikes=$bdd->prepare("SELECT * FROM imagelikes WHERE imagelikeUserID=:imagelikeUserID AND imagelikeImageID=:imagelikeImageID");
            $imagelikes->execute(array(
            'imagelikeUserID'=>$this->getimagelikeUserID(), 
            'imagelikeImageID'=>$this->getimagelikeImageID()

));

            if ($imagelikes->rowCount() > 0) { 
                      header("Location:home.php?imageliked=1");
                     return false;
    }
        else {
        $imagelikes=$bdd->prepare("INSERT INTO imagelikes(imagelikeUserID, imagelikeImageID) VALUES(:imagelikeUserID,:imagelikeImageID)");
        $imagelikes->execute(array(
            'imagelikeUserID'=>$this->getimagelikeUserID(), 
            'imagelikeImageID'=>$this->getimagelikeImageID()

        ));

    $countimgLikes=$bdd->prepare("SELECT * FROM imagelikes WHERE imagelikeImageID=:imagelikeImageID");
    $countimgLikes->execute(array(
            'imagelikeImageID'=>$this->getimagelikeImageID()

));
$nbrimgLikes = $countimgLikes->rowCount();                     
$_SESSION['nbrimgLikes']=$nbrimgLikes;
        header("Location:home.php?imagelike=1");
    }

  }
}
  

class images {
private $id, $image_text, $image, $imagePostID, $imageUserName, $imageUserID;
    public function getid(){
        return $this->id;
    }
    public function setid($id){
         $this->id=$id;
    }
        public function getimage_text(){
        return $this->image_text;
    }
    public function setimage_text($image_text){
         $this->image_text=$image_text;
    }   
            public function getimage(){
        return $this->image;
    }
    public function setimage($image){
         $this->image=$image;
    }    
    public function getimagePostID(){
        return $this->imagePostID;
    }
    public function setimagePostID($imagePostID){
         $this->imagePostID=$imagePostID;
    }    
    public function getimageUserName(){
        return $this->imageUserName;
    }
    public function setimageUserName($imageUserName){
         $this->imageUserName=$imageUserName;
    }    
public function deleteImage(){
        include "conn.php";
  $images=$bdd->prepare("DELETE FROM images WHERE id=:id");
            $images->execute(array(
            'id'=>$this->getid()
));
            header("Location:home.php?imgDelete=1");

    }
    public function reportImage(){
        include "conn.php";
  $images=$bdd->prepare("UPDATE images SET status='1' WHERE id=:id");
            $images->execute(array(
            'id'=>$this->getid()
));
            header("Location:home.php?imgReport=1");
}
public function republishImage(){
        include "conn.php";
  $images=$bdd->prepare("UPDATE images SET status='0' WHERE id=:id");
            $images->execute(array(
            'id'=>$this->getid()
));
        header("Location:reportSection.php?republish=1");
}
}