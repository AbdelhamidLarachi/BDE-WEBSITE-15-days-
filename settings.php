<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
	<link rel="icon" type="image/png" href="img/image.png" sizes="32x32" />
<link rel="stylesheet" type="text/css" href="settings.css">
<title>Faith</title>
</head>
<body>
<center id="resetinfo" style="position: relative; top: 150px;">
			<table>
				<tr><h2 style="color: white;">Settings : </h2>
</tr>
<tr>
	<span style="color: white; font-family:Charcoal, sans-serif; font-size: 15px;"><? echo $_SESSION['userName']; ?></span>
				<td><input type="text" name="userNameReset" placeholder="New Username"></td>
				</tr>
				<tr>

					<td><center>
						<span style="color: white; font-family:Charcoal, sans-serif; font-size: 15px;"><? echo $_SESSION['userEmail']; ?></span></center>
						<input type="email" name="userEmailReset" placeholder="New Email"></td>
				</tr>
				<tr>
					<td><input type="password" name="userPassreset" placeholder="New Password"></td>
				</tr>
				<tr>
					<td><input type="submit"  onclick="update()" value="Update" style="transition: 0.5s;"></td>
				</tr>

	</table>
		</center>