<?php

$server="localhost";
$user="root";
$password="";
$dataBase= "client";

$connexion=mysqli_connect($server, $user, $password, $dataBase);
if(mysqli_connect_errno()){
    echo "probleme de connexion a mysqli" .mysqli_connect_error();
}else{
    echo "connexion reussi";
}


?>