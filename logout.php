<?php

session_start();

unset($_SESSION["uid"]);

unset($_SESSION["name"]);

header("location:/boutique/index.php");

?>