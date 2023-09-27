<?php

include 'connexion.php';
$id = $_GET['id'];
$req = mysqli_query($connexion, "SELECT * FROM ajout_client WHERE id=$id");
$nombre = mysqli_fetch_assoc($req);
if(isset($_POST['soumettre'])){
    extract($_POST);
    if(isset($nom, $prenom, $pseudo, $email, $motdepasse, $telephone)){ // Vérifiez que toutes les variables POST nécessaires sont définies
        $modifier = mysqli_query($connexion, "UPDATE ajout_client SET nom='$nom', prenom='$prenom', pseudo='$pseudo', email='$email', motdepasse='$motdepasse', telephone='$telephone' WHERE id=$id");
        if ($modifier) {
            header('Location: liste.php');
            exit; // Terminer le script après la redirection
        } else {
            $message = 'Erreur lors de la mise à jour de l\'enregistrement.';
            echo $message;
        }
    } else {
        $message = 'Veuillez saisir toutes les données.';
        echo $message;
    }
}
?>


















        <form method="POST">
          <tr>
               
               <td>
                 <input type="text" name='nom' value=<?=$nombre['nom']?>>
               </td>
               <td>
                 <input type="text" name='prenom' value=<?=$nombre['prenom']?>>
               </td>
               <td>
                 <input type="text" name='pseudo' value=<?=$nombre['pseudo']?>>
               </td>
               <td>
                 <input type="text" name='email' value=<?=$nombre['email']?>>
               </td>
               <td>
                 <input type="text" name='motdepasse' value=<?=$nombre['motdepasse']?>>
               </td>
               <td>
                 <input type="text" name='telephone' value=<?=$nombre['telephone']?>>
               </td>
               <td>
                 <input type="submit" name='soumettre' value='soumettre'>
               </td>
                 
            </tr>

        </form>