<html>
    <head></head>
<body>
<h1>Gestion de lecteur</h1>
<p>Le lecteur n'est reconnu</p>
<p>Clique <a href="authentification.php">ici</a> pour tenter une nouvelle identification</p>
<h3>Enregistrement d'un lecteur</h3>
<form action="validelecteur.php" method="POST">
<table>

    <tr>
        <td><label>Nom : </label></td>
        <td><input name = "Nom"></td>
    </tr>
    <tr>
        <td><label>Prénom : </label></td>
        <td><input  name = "Prenom"></td>
    </tr>
    <tr>
        <td><label>mot de passe  : </label></td>
        <td><input type="password"  name = "password"></td>
    </tr>
    <tr>
        <td><label>Adresse : </label></td>
        <td><input name = "Adresse"></td>
    </tr>
    <tr>
        <td><label>Ville : </label></td>
        <td><input name = "Ville"></td>
    </tr>
    <tr>
        <td><label>Code postal : </label></td>
        <td><input name = "postal"></td>
    </tr >
    <tr>
        <td><label>Numéro : </label></td>
        <td><input name = "Numéro"></td>
    </tr >
    <tr>
        <td><input type="submit" value="Enregistre" name="Enregistre"></td>
        
    </tr >
    
</table>        
</form>           
</body>
</html>