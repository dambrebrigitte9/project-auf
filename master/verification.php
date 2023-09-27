<?php
include 'connexion.php';
if(isset($_POST['email']) and isset($_POST['motdepasse'])){
    $email=$_POST['$email'];
    $motdepasse=$_POST['$motdepasse'];
    extract($_POST);

    $req=mysqli_query($connexion, "SELECT * FROM ajout_client WHERE email='$email' AND  motdepasse='$motdepasse'");
    $user=mysqli_fetch_assoc($req);

    if(mysqli_num_rows($req)>0){
        session_start();
        $_SESSION['connexion']=true;
        $_SESSION['email']=$email;
        header("location:index.php");
    }else{
       echo " probleme de connexion a la base de donnee";
    }

}


?>
