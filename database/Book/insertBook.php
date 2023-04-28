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
    <input name="titre" placeholder="Nom" type="text">
    <input name="auteur" placeholder="Auteur" type="text">
    <input name="maison" placeholder="Maison d'edition" type="text">
    <input name="nbrExp" placeholder="Nombre d'exemplaire" type="text">
    <input name="nbrPage" placeholder="Nombre des Pages" type="text">
    <button class="button_submit" type="submit" name="Ajouter" >Ajouter</button>
  </form>
</section>

</body>
</html>


<?php 
include '../connect.php' ;

if(isset($_POST['Ajouter'])) {
  $Titre = $_POST['titre'] ;
  $Auteur = $_POST['auteur'] ;
  $Maison = $_POST['maison'] ;
  $Pages = $_POST['nbrPage'] ;
  $Exemplaire = $_POST['nbrExp'] ;

  $insertSQL = "INSERT INTO `livres`(`Titre`, `Auteur`, `Maison`, `Pages`, `Exemplaires`) 
               VALUES ('$Titre' , '$Auteur' , '$Maison' , '$Pages' , '$Exemplaire' )" ;

  $result=@mysql_query($insertSQL,$idcon);

  if($result){
    echo "<script type=\"text/javascript\"> alert('Livre enregistrer avec succces'); 
    window.location.href = \"http://localhost/projet-web/Books.php\";
           </script>";
  }else {
    echo "<script type=\"text/javascript\"> alert('Erreur : ".mysql_error()."')</script>";
  }

}

?>