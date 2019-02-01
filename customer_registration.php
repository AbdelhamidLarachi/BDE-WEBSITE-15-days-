<?php
if (isset($_GET["register"])) {
	
	?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Join us</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<a href="#" class="navbar-brand">JOIN US</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="boutique/index.php"><span class="glyphicon glyphicon-modal-window"></span> Nos produits</a></li>
                <li><a href="events.php"><span class="glyphicon glyphicon-modal-window"></span> Events</a></li>
                <li><a href="boutique/profile.php"><span class="glyphicon glyphicon-shopping-cart"></span> Boutique</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Customer SignUp Form</div>
					<div class="panel-body">
					
					<form id="signup_form" onsubmit="return false">
						<div class="row">
							<div class="col-md-6">
								<label for="f_name">First Name</label>
								<input type="text" id="f_name" name="f_name" class="form-control" placeholder="First Name" required>
							</div>
							<div class="col-md-6">
								<label for="f_name">Last Name</label>
								<input type="text" id="l_name" name="l_name"class="form-control" placeholder="Last Name" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input type="email" id="email" name="email"class="form-control" placeholder="Email" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="password">password</label>
								<input type="password" id="password" name="password"class="form-control" placeholder="Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="repassword">Re-enter Password</label>
								<input type="password" id="repassword" name="repassword"class="form-control"placeholder="Confirm Password" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="mobile">Mobile</label>
								<input type="text" id="mobile" name="mobile"class="form-control" placeholder="Mobile" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="address1">Country</label>
								<input type="text" id="address1" name="address1"class="form-control"placeholder="Country" requiredrequired>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="address2">Campus</label>
								<select name="address2" id="address2" class="form-control" style="width: 790px; height: 35px; border-radius: 20px;">
			<option name="Alger" value="Alger">Alger</option>
			<option name="Arras" value="Arras">Arras</option>
		    <option name="Aix_en_provence" value="Aix_en_provence">Aix en provence</option>
			<option name="Angouleme" value="Angouleme">Angouleme</option>
			<option name="Brest" value="Brest">Brest</option>
		    <option name="Bordaux" value="Bordaux">Bordaux</option>
		    <option name="Caen" value="Caen">Caen</option>
			<option name="Dijon" value="Dijon">Dijon</option>
			<option name="Grenoble" value="Grenoble">Grenoble</option>
			<option name="Lemans" value="Lemans">Lemans</option>
			<option name="Lille" value="Lille">Lille</option>
			<option name="Lyon" value="Lyon">Lyon</option>
			<option name="LaRochelle" value="LaRochelle">La Rochelle</option>
			<option name="Montpellier" value="Montpellier">Montpellier</option>
			<option name="Nancy" value="Nancy">Nancy</option>
		    <option name="Nantes" value="Nantes">Nantes</option>
		    <option name="Nice" value="Nice">Nice</option>
			<option name="Oran" value="Oran">Oran</option>
			<option name="Orleans" value="Orleans">Orleans</option>
			<option name="Pau" value="Pau">Pau</option>
			<option name="Paris_Nanterre" value="Paris_Nanterre">Paris Nanterre</option>
			<option name="Rouen" value="Rouen">Rouen</option>
			<option name="Reims" value="Reims">Reims</option>
			<option name="Strasbourg" value="Strasbourg">Strasbourg</option>
			<option name="Saint_Nazaire" value="Saint_Nazaire">Saint Nazaire</option>
			<option name="Toulouse" value="Toulouse">Toulouse</option>
</select>
							</div>
						</div>
						<p><br/></p>
						<div class="row">
							<div class="col-md-12">
								<input style="width:100%;" value="Sign Up" type="submit" name="signup_button"class="btn btn-success btn-lg">
							</div>
						</div>
						
					</div>
					</form>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>
	<?php
}



?>






















