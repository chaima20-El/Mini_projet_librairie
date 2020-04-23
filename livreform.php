<html>
    <head></head>
<body>
<h1>Enregistrement d'un livre</h1>
<form action="valideLivre.php" method="POST">
<table>
    <tr>
        <td><label>Nom de l'auteur</label></td>
        <td> : <input name = "Nomauteur"></td>
    </tr>
    <tr>
        <td><label>Prénom de l'auteur</label></td>
        <td> : <input name = "Prenomauteur"></td>
    </tr>
    <tr>
        <td><label>Titre</label></td>
        <td> : <input name = "Titre"></td>
    </tr>
    <tr>
        <td><label>Catégorie : </label></td>
        <td><select name="Catégorie">
        <option>Roman                </option>
        <option>Science-fiction      </option>
        <option>Policier             </option>
    </td>
    </tr>
    <tr>
        <td><label>Numéro ISBN : </label></td>
        <td> : <input name = "ISBN"></td>
    </tr >
    <tr>
        <td><input type="submit" value="Enregistre"></td>  
    </tr>
</table>        
</form>         
</body>
</html>