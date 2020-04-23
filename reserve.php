
<!DOCTYPE html>
<html>
    <head><style>
table, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style></head>
    <body> 
        <h1>Réserver un livre</h1>
       Vous désirez réserver ver le livre suivant:
<?php
     require("connectionPDO.php");
    if($_GET['action'] == "reserve"){
        $_SESSION['livredb']=$_GET['id'];
        
        $sql="select * from livres where livcode= :id ";

        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':id',$_GET['id']);
        $stmt->execute();
        while($livre = $stmt->fetch()){
            ?>
            <form action="confirmation.php" method="POST">
            <table>
        <tr>
        <td><label><font color=red>Nom du livre</font></label></td>
        <td><?php echo $livre["livcode"];?> </td>
        </tr>
    <tr>
        <td><label><font color=red>Nom de l'auteur</font></label></td>
        <td><?php echo $livre["livnomaut"];?> </td>
    </tr>
    <tr>
        <td><label><font color=red>Prenom de l'auteur</font></label></td>
        <td><?php echo $livre["livprenomaut"];?> </td>
    </tr>
    <tr>
        <td><label><font color=red>Titre</font></label></td>
        <td><?php echo $livre["livtitre"];?> </td>
    </td>
    </tr>
   
    <tr>
        <td><label><font color=red>Catigorie : </font></label></td>
        <td><?php echo $livre["livcategorie"];?> </td>
    </tr >
    <tr>
    <td><label><font color=red>ISBN : </font></label></td>
    <td><?php echo $livre["livISBN"];?> </td>
    </tr>
    </table><br>
    <input type="submit" value="confirmer" name="confirmer"></form>
<?php
        }
    }
    ?>
   
    </body>
</html>