<?php  

 try  
 {  
     require("connectionPDO.php");
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["Nomlecteur"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {
                $query = "SELECT * FROM lecteurs WHERE lecnom = :Nomlecteur AND lecmotdepasse = :password";  
                $statement = $connection->prepare($query);  
                $statement->execute(  
                     array(  
                        
                          'Nomlecteur'     =>     $_POST["Nomlecteur"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                echo $count;
                if($count > 0)  
                {  
                    header("location:livredb.php");
                     $_SESSION["Nomlecteur"] = $_POST["Nomlecteur"];
                }  
                else  
                {  header("location:lecteurform.php");
                     $message = '<label>Wrong Data</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>


<html>
    <head></head>
<body>
<h1>Authentification de lecteur</h1>
<form  method="POST">
<table>

    <tr>
        <td><label>Nom du lecteur: </label></td>
        <td><input name ="Nomlecteur"></td>
    </tr>
    <tr>
        <td><label>mot de passe  : </label></td>
        <td><input type="password"  name ="password"></td>
    </tr>
    <tr>
        <td><input type="submit" value="login" name="login"></td>
    </tr>
    
</table>     
        
</form>        
    
</body>
</html>