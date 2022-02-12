<?php

$conn=mysqli_connect("localhost", "root", "") or die("Impossible de se connecter");
mysqli_select_db($conn,"fichier des comptes") or die("pas possible de trouver la base");

?>