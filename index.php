<?php
session_start();
if(isset($_SESSION["uid"])){
	header("location:profile.php");
}
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
        <link rel="icon" type="image/png" href="img/cesi.png" sizes="32x32" />
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
				<a href="#" class="navbar-brand"> Boutique</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
        <li><a href="../nitro/index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="events.php"><span class="glyphicon glyphicon-modal-window"></span> Events</a></li>
        <li><a href="boutique/profile.php"><span class="glyphicon glyphicon-shopping-cart"></span> Boutique</a></li>
        <?
         if ($checkRole == 3) {
          ?>
        <li><a href="reportSection.php"><span class="glyphicon glyphicon-flag"></span> Report Section</a></li>
          <?
        }
?>
			</ul>
			<form class="navbar-form navbar-left">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search" id="search">
		        </div>
		        <button type="submit" class="btn btn-primary" id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
		     </form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Mon Panier<span class="badge">0</span></a>
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
	
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
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

				<div id="get_brand">
				</div>

			</div>
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<div id="get_product">
						</div>
					</div>
					<div class="panel-footer">&copy; CESI.EXIA GROUPE 01 2019</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>
















































