<?php
session_start();
include "db.php";
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
 <script src="main.js"></script>
 <link rel="stylesheet" type="text/css" href="style.css">
 <style></style>
</head>
<body background="product_images/ghiless.jpeg">
<div class="wait overlay">
<div class="loader"></div>
</div>
<div class="navbar navbar-inverse navbar-fixed-top">
 <div class="container-fluid"> 
  <div class="navbar-header">
   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
    <span class="sr-only">navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
   </button>
   <a href="#" class="navbar-brand">Boutique</a>
  </div>
 <div class="collapse navbar-collapse" id="collapse">
  <ul class="nav navbar-nav">
        <li><a href="../nitro/index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="events.php"><span class="glyphicon glyphicon-modal-window"></span> Events</a></li>
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
   <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Mon Panier<span class="badge">0</span></a>
    <div class="dropdown-menu" style="width:400px;">
     <div class="panel panel-success">
      <div class="panel-heading">
       <div class="row">
        <div class="col-md-3">N°Produit</div>
        <div class="col-md-3">Image du produit</div>
        <div class="col-md-3">Nom du produit</div>
        <div class="col-md-3">Prix en $.</div>
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
   <?
if (!isset($_SESSION['role'])){   ?>
   <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> S'identifier</a>
    
        <ul class="dropdown-menu">
     <div style="width:300px;">
      <div class="panel panel-primary">
       <div class="panel-heading">Se connecter</div>
       <div class="panel-heading">
        <form onsubmit="return false" id="login">
         <label for="email">Email</label>
         <input type="email" class="form-control" name="email" id="email" required/>
         <label for="email">Mot de passe</label>
         <input type="password" class="form-control" name="password" id="password" required/>
         <p><br/></p>
         <a href="#" style="color:white; list-style:none;">Mot de passe oublié ?</a><input type="submit" class="btn btn-success" style="float:right;">
        </form>
       </div>
       <div class="panel-footer" id="e_msg"></div>
      </div>
     </div>
    </ul>
   </li>
<?
   }
   else {
    ?>
<li><a href="#"  class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo " Hi, ".$_SESSION["name"]; ?></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php" style="text-decoration:none; color:blue; color: black;"><span class="glyphicon glyphicon-off
"></a></li>
          </ul>
        </li><?
   }
   ?>
  </ul>
 </div>
</div>
</div> 
<p><br/></p>
<p><br/></p>
<p><br/></p>
<div class="container-fluid">
 <div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-2 col-xs-12">
   <div id="get_category">
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
  <div class="col-md-8 col-xs-12">
   <div class="row">
    <div class="col-md-12 col-xs-12" id="product_msg">
    </div>
   </div>
   <div class="panel panel-info">
    <div class="panel-heading">Ajouter produit</div>
        <div class="panel-heading"><a href="profile.php">Retouner a la Boutique</a></div>
    <div class="panel-body">
     <form method="POST" action="Add.php">
  <div class="form-group">
    <label for="exampleFormControlInput1">Nom du produit</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="produit.." name="nom">
  </div>
    <div class="form-group">
    <label for="exampleFormControlInput1">Prix du produit</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Prix.." name="prix">
  </div>
    <div class="form-group">
    <label for="exampleFormControlInput1">Description du produit</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Description.." name="desc">
  </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Ajouter image</label>
    <input type="file" name="" class="form-control" name="src">
  </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Ajouter un mot clef</label>
    <input type="text" name="" class="form-control" name="clef">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Ctegorie du produit</label>
    <select class="form-control" id="exampleFormControlSelect1" name="categ">
      <option value="1">Electronique</option>
      <option value="2">Vetement</option>
    </select>
  </div>

  </div>
    <button type="submit"  class="btn btn-success">Ajouter le produit</button>
<
</form>
   </div>
  </div>
  <div class="col-md-1"></div>
 </div>
</div>

</body>
</html>

<?php

if (isset($_POST['nom'])) {
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$desc = $_POST['desc'];
$categ = $_POST['categ'];
$src = $_POST['src'];
$clef = $_POST['clef'];
}

$add = "INSERT INTO products (product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords) VALUES ($categ, 1, '$nom', $prix, '$desc', '$src', '$clef')";
$add_applik = mysqli_query($con,$add);