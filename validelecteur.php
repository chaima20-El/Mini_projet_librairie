<?php
   if (isset($_POST['Enregistre']))
   {
   $Nom = htmlspecialchars(trim($_POST['Nom']));
   $Prenom = htmlspecialchars(trim($_POST['Prenom']));
   $Adresse=htmlspecialchars(trim($_POST['Adresse']));
   $Ville=htmlspecialchars(trim($_POST['Ville']));
   $password = htmlspecialchars(trim($_POST['password']));
   $numero = htmlspecialchars(trim($_POST['Numéro']));
   $postal = htmlspecialchars(trim($_POST['postal']));
   if ($Nom&&$Prenom&&$password&&$numero&&$Adresse&&$postal&&$Ville)
           {
           if (strlen($password)>=6)
               {
                
       $Nom = $_POST["Nom"];
       $Prenom = $_POST["Prenom"];
       $postal = $_POST["postal"];
       $Ville = $_POST["Ville"];
       $Adresse = $_POST["Adresse"];
       $numero = $_POST["Numéro"];
       $pass = $_POST["password"];
       try{
           require("connectionPDO.php");
           $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
                   $donnees = [
                    'Nom'  => $Nom ,
                    'Prenom'  => $Prenom ,
                    'postal'  => $postal ,
                    'ville' =>  $Ville ,
                    'adresse' => $Adresse ,
                    'numero' => $numero ,
                    'pass'=> $password,   
                   ]; 
                   $sth = $connection->prepare("
               INSERT INTO lecteurs(lecnum,lecnom,lecprenom,lecadresse,lecville,leccodepostal,lecmotdepasse)
               VALUES( :numero,:Nom,:Prenom,:adresse,:ville,:postal,:pass)");
               
                   
               $sth->execute($donnees);

     echo'<h1>Validation d\'un lecteur</h1>';
     echo'<table>';
     echo '<tr>';
        echo '<td><label>Nom</label></td>';
        echo'<td > :  <font color=green>'.$Nom.'</font></td>';
     echo'</tr>';
     echo'<tr>';
        echo'<td><label>Prénom</label></td>';
        echo'<td> : <font color=green>'.$Prenom.'</font></td>';
    echo'</tr>';
    echo'<tr>';
        echo'<td><label>Adresse</label></td>';
        echo'<td> : <font color=green>'.$Adresse.'</font></td>';
    echo'</tr>';

    echo'<tr>';
      echo'<td><label>Ville</label></td>';
        echo'<td> : <font color=green>'.$Ville.'</font><td>';
    echo'</tr>';
    echo'<tr>';
        echo'<td><label>Code postal</label></td>';
        echo'<td> : <font color=green>'.$postal.'</td>';
    echo'</tr >';   
    echo'</tr >';
echo'</table>';
echo'Vous étes enregistré dans la base se la bibliotéque.';
echo'vous avez maintenant la possibilité de reserver des livres ou vous <a href="authentification.php">identifiant ici</a>';
       }
       catch(PDOException $e){
           echo 'Le numero est deje utilser entre un autre nemero!!!! ';
       }
   }else echo "Le mot de passe est trop court !";
   }else echo "Veuillez saisir tous les champs !";
}
