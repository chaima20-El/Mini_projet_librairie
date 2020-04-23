<?php
session_start();
echo $_SESSION['livredb'];?>
<!DOCTYPE html>
<html>
    <head><style>
table, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style></head>
    <body>
<h1>Gestion du lecteur</h1>
<?php
if(isset($_SESSION["Nomlecteur"])){
   $val =$_SESSION["Nomlecteur"];
   
    $host = "127.0.0.1";
    $user = "root";
    $passwd =  "chaima";
    $connection =mysqli_connect($host, $user, $passwd, "librairie"); 

    if (mysqli_connect_errno()) 
    { 
        echo "Database connection failed."; 
    }
     $query = "SELECT * FROM lecteurs ";
    
    // Execute the query and store the result set 
    $result = mysqli_query($connection, $query); 
     
    if ($result) 
    { 
        // it return number of rows in the table. 
        $row = mysqli_num_rows($result); 
        
           if ($row) {
            while($row = mysqli_fetch_assoc($result)){
                if($val==$row['lecnom'])
                echo 'Le lecteur n°<b>'.$row['lecnum'].'</b>est reconnu';
           }}
          
         
    }
}?>
<h4>Voici la liste des oufrages disponibles à la reservation</h4>
<?php 
$host = "127.0.0.1";
$user = "root";
$passwd =  "chaima";

$connection =mysqli_connect($host, $user, $passwd, "librairie"); 

    if (mysqli_connect_errno()) 
    { 
        echo "Database connection failed."; 
    }
    $query = "SELECT * FROM livres where livdejareserve=0"; 
      
    // Execute the query and store the result set 
    $result = mysqli_query($connection, $query); 
      
    if ($result) 
    { 
        // it return number of rows in the table. 
        $row = mysqli_num_rows($result); 
          
           if ($row) 
              { 
                  
                 
                 ?>

<table style="width:100%">

<tr>
<td><font color=red> CodeLivre</font> </td>
<td><font color=red> NomAuteur</font> </td>
<td><font color=red> PrenomAuteur </font></td>
<td><font color=red> Titre </font></td>
<td><font color=red> Categorie</font></td>
<td><font color=red> ISBN </font></td>
<td><font color=red> </font></td>
</tr>

<?php while($row = mysqli_fetch_assoc($result))
{
    $livcode=$row["livcode"];
    $livnomaut=$row["livnomaut"];
    $livprenomaut=$row["livprenomaut"];
    $livtitre=$row["livtitre"];
    $livcategorie=$row["livcategorie"];
    $livISBN=$row["livISBN"];
?>
<tr>
<td><?php echo $row["livcode"];?> </td>
<td><?php echo $row["livnomaut"];?> </td>
<td><?php echo $row["livprenomaut"];?> </td>
<td><?php echo $row["livtitre"];?> </td>
<td><?php echo $row["livcategorie"];?> </td>
<td><?php echo $row["livISBN"];?> </td>
<td name="reserve"><a href="reserve.php?action=reserve&id=<?php echo $row["livcode"]; ?>">Reserve</a></td>
</tr>

<?php
}

}
else
echo "<center>rien d' affiche </center>" ;

              } 
        // close the result. 
        mysqli_free_result($result); 
    
  
    // Connection close  
    mysqli_close($connection); 
?>
</table>

<h4>Voivi la liste de vos reservations</h4>
<?php
$host = "127.0.0.1";
$user = "root";
$passwd =  "chaima";

$connection =mysqli_connect($host, $user, $passwd, "librairie"); 

    if (mysqli_connect_errno()) 
    { 
        echo "Database connection failed."; 
    }
    $query = "SELECT * FROM livres where livdejareserve=1"; 
      
    // Execute the query and store the result set 
    $result = mysqli_query($connection, $query); 
      
    if ($result) 
    { 
        // it return number of rows in the table. 
        $row = mysqli_num_rows($result); 
          
           if ($row) 
              { 
                 ?>

<table style="width:100%">

<tr>
<td><font color=red> CodeLivre</font> </td>
<td><font color=red> NomAuteur</font> </td>
<td><font color=red> PrenomAuteur </font></td>
<td><font color=red> Titre </font></td>
<td><font color=red> Categorie</font></td>
<td><font color=red> ISBN </font></td>
<td><font color=red> </font></td>
</tr>

<?php while($row = mysqli_fetch_assoc($result))
{
    $livcode=$row["livcode"];
    $livnomaut=$row["livnomaut"];
    $livprenomaut=$row["livprenomaut"];
    $livtitre=$row["livtitre"];
    $livcategorie=$row["livcategorie"];
    $livISBN=$row["livISBN"];
?>
<tr>
<td><?php echo $row["livcode"];?> </td>
<td><?php echo $row["livnomaut"];?> </td>
<td><?php echo $row["livprenomaut"];?> </td>
<td><?php echo $row["livtitre"];?> </td>
<td><?php echo $row["livcategorie"];?> </td>
<td><?php echo $row["livISBN"];?> </td>
</tr>

<?php
}

}
else
echo "<center>rien d' affiche </center>" ;
              }  
        mysqli_free_result($result); 
    mysqli_close($connection); 
?>
</table>
    </body>
</html>