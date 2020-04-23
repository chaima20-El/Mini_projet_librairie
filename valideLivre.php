<?php
$nom=$_POST['Nomauteur'];
$prenom=$_POST['Prenomauteur'];
$Titre=$_POST['Titre'];
$Catégorie=$_POST['Catégorie'];
$ISBN=$_POST['ISBN'];
if(empty($nom) && empty($prenom) && empty($Titre) && empty($Catégorie) && empty($ISBN)){
echo 'non';
}
else{
    echo'<h1>Validation d\'un lecteur</h1>';
    echo'<table>';
   echo '<tr>';
       echo '<td><label>Nom</label></td>';
       echo'<td > :  <font color=green>'.$nom.'</font></td>';
    echo'</tr>';
    echo'<tr>';
        echo'<td><label>Prénom</label></td>';
        echo'<td> : <font color=green>'.$prenom.'</font></td>';
    echo'</tr>';
    echo'<tr>';
        echo'<td><label>Adresse</label></td>';
        echo'<td> : <font color=green>'.$Titre.'</font></td>';
    echo'</tr>';

    echo'<tr>';
      echo'<td><label>Ville</label></td>';
        echo'<td> : <font color=green>'.$Catégorie.'</font><td>';
    echo'</tr>';
    echo'<tr>';
        echo'<td><label>Code postal</label></td>';
        echo'<td> : <font color=green>'.$ISBN.'</td>';
    echo'</tr >';   
    echo'</tr >';
echo'</table>';
}
?>