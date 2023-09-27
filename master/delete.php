<?php
include 'connexion.php';
$id=$_GET['id'];
$req=mysqli_query($connexion, "DELETE FROM ajout_client WHERE id=$id");
header("Location:liste.php");

?>