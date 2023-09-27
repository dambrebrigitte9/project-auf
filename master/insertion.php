<?php
include 'connexion.php';
extract($_POST);
$req=mysqli_query($connexion, "INSERT INTO ajout_client (nom , prenom , pseudo ,email, motdepasse, telephone) VALUES
 ('$nom', '$prenom', '$pseudo', '$email', '$motdepasse' , '$telephone')");
header("location:formulaire.php");

?>