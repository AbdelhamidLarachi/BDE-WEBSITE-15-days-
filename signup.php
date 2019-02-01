<!DOCTYPE HTML>
<html>
<head>
	<link rel="icon" type="image/png" href="img/cesi.png" sizes="32x32" />
<link rel="stylesheet" type="text/css" href="signup.css">
<title>Exia</title>
</head>
<body>
<center>
	<div id="signUp">
	<form id='form2' method='post' action="insertUser.php">
				<a href="http://localhost/exia/pages/index.php">
		    <img src="img/cesi.png" class="logo">
		</a>
				<div>

</div>
<center>
					<div class="tooltip1">

		<h2 style="color: #5D77FE;">Sign-Up</h2><span class="tooltiptext1">CESI École d’Ingénieurs permet à chaque élève ingénieur-e de construire un parcours personnalisé dont il est acteur, grâce à une école en cinq ans, sous statut étudiant, en apprentissage ou en formation continue, 33 options et 25 campus en France!</span>
					</div>
		<table class="information">
			<tr>
				<td><input type="text" name="userName" placeholder="UserName" required></td>
			</tr>
			<tr>
				<td><input type="email" name="userEmail" placeholder="Email" required></td>
			</tr>
			<tr>
				<td><input type="password" name="userPass" placeholder="Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required></td> 
			</tr>
			<tr>
<select name="userCampus" style="width: 125px; height: 20px; border-radius: 20px;">
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
		</tr>
			<tr>
                <td><input type="submit" value="Join" style="transition: 0.5s;"></td>
			</tr>

			</table>


</center>
</form>
</div>
<form>

	<center>
		<table>

	<tr><td></td><td><a href="http://localhost/exia/pages/index.php" style="color: #5D77FE; position: relative; top: 20px;">Already a member?</a></td></tr>

		</table>
		<div class="logos">
			<div class="tooltip9"><img src="img/campus1.png" id="campus1"><span class="tooltiptext9">Choose your Campus!</span></div>
			<div class="tooltip4"><img src="img/username2.png" id="username2"><span class="tooltiptext4">User-Name is required to Signup!</span></div>
<div class="tooltip5"><img src="img/email1.png" id="email1"><span class="tooltiptext5">User-Email is required to Signup!</span></div>
<div class="tooltip6"><img src="img/password2.png" id="password2"><span class="tooltiptext6">Password must contain Upercase, Lowercase and a Number!</span></div>

</div>
</form>
<table><tr>	<?php
include "classes.php";
			if(isset($_GET['error'])){
			?>
			<tr>
			<td></td><td><span style="color: red; position: relative; bottom: 90px;">Cet email est déja utilisé!</span></td>
		</tr>

		<script type="text/javascript" name="Alert"> alert("Email already taken!");</script></tr>
		<?php
	}
		?>
		<tr></tr><?php
	      if(isset($_GET['userfail'])){
			?>
			<tr>
			<td></td><td><span style="color: red; position: relative; bottom: 90px;">Ce pseudo est déja utilisé!</span></td>
		</tr>

		<script type="text/javascript" name="Alert"> alert("Username already taken!");</script></tr>
		<?php
	}
		?></table>
</body>
</html>