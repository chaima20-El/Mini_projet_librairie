<?php
require("connectionPDO.php");
if(isset($_POST['confirmer'])){
    
        $val=$_SESSION["Nomlecteur"];
        $data = $connection->query("select * from lecteurs")->fetchAll();
        // and somewhere later:
        foreach ($data as $row) {
            if($val==$row['lecnom']){
                $lecnum=$row['lecnum'];
        }}
        $sql="select * from livres ";
        $stmt = $connection->prepare($sql);
        //$stmt->bindValue(':id',$_GET['id']);
        $stmt->execute();
        $livre = $stmt->fetch()
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>Confirmation de votre réservation</h1>
       <p> Votre réservation est confirmée sous le numero :<b><?php $empnum= $rest1 = substr($row['lecnom'], 0, 2).$rest2=substr($_SESSION['livredb'], 0, 2).$rest2=substr($lecnum, 0, 4);
       echo $empnum;?></b></p>
       <table>
       <tr>
           <td>Date de réservation :</td>
           <td><?php
           $date1=date("Y-m-d");
           
           echo $date1 ;?></td>
       </tr>
       <tr>
           <td>Date du retour:</td>
           <td><font color='red'><?php
           $date2=date('Y-m-d', strtotime(date("Y-m-d") . ' +5 day'));
           echo $date2; ?></font></td>
       </tr></table>
        <p></p>Vous pouvez à la liste des livres disponible à la réservation en clique <a href ="livredb.php">ici</a>
    </body>
</html>
<?php 
$data = [
    $empnum,$date1,$date2,$_SESSION['livredb'], $lecnum
];
$stmt = $connection->prepare("INSERT INTO emprunts (empnum, empdate, empdateret,empcodelivre,empnumlect) VALUES (?,?,?,?,?)");
$stmt->execute($data);

$data2 = [
    'surname' => $_SESSION['livredb'],
];
$sql1="UPDATE livres SET livdejareserve=1 WHERE livcode=:surname";
$connection->prepare($sql1)->execute($data2);
}

?>

