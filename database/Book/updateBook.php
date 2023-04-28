

<?php 
include '../connect.php' ;
$id = $_GET['updateid'] ;
$selectSQL = "SELECT * FROM `livres` WHERE Numero=$id" ;
$result=@mysql_query($selectSQL,$idcon);
 
 $row = mysql_fetch_assoc($result) ;
$id_Orig = $row['Numero'] ;
$Titre_Orig = $row['Titre'] ;
$Auteur_Orig = $row['Auteur'] ;
$Maison_Orig = $row['Maison'] ;
$Pages_Orig = $row['Pages'] ;
$Exemplaire_Orig = $row['Exemplaires'] ;
   
  



if(isset($_POST['Modifier'])) {
  $Titre = $_POST['titre'] ;
  $Auteur = $_POST['auteur'] ;
  $Maison = $_POST['maison'] ;
  $Pages = $_POST['nbrPage'] ;
  $Exemplaire = $_POST['nbrExp'] ;
  $updatetSQL = "UPDATE `livres` SET  `Titre`='$Titre' ,`Auteur`='$Auteur' ,`Maison`='$Maison' ,`Pages`='$Pages' ,`Exemplaires`='$Exemplaire' WHERE Numero=$id " ;
  $result=@mysql_query($updatetSQL,$idcon);
  if($result){
    echo "<script type=\"text/javascript\"> alert('Livre Modifier avec succces'); 
    window.location.href = \"http://localhost/projet-web/Books.php\";
           </script>";
  }else {
    echo "<script type=\"text/javascript\"> alert('Erreur : ".mysql_error()."')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- ======= Styles ====== -->
     <style><?php include '../../assets/css/style.css'; ?></style>
    <title>Document</title>
</head>
<body>
<section class="section_form">
  <form id="consultation-form" class="feed-form" method="POST">
    <input name="titre" type="text" value=<?php echo $Titre_Orig ;?> >
    <input name="auteur" type="text" value=<?php echo $Auteur_Orig ;?>>
    <input name="maison" type="text" value=<?php echo $Maison_Orig ;?>>
    <input name="nbrExp" type="text" value=<?php echo $Exemplaire_Orig ;?>>
    <input name="nbrPage" type="text" value=<?php echo $Pages_Orig ;?> >
    <button class="button_submit" type="submit" name="Modifier" >Modifier</button>
  </form>
</section>

</body>
</html>