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
<header>
    <h1 class="header-title">Ajouter un Usager</h1>
  </header>
<section class="section_form">
  <form id="consultation-form" class="feed-form" method="POST">
    <input name="nom" placeholder="Nom" type="text">
    <input name="prenom" placeholder="Prenom" type="text">
    <input name="adresse" placeholder="Adresse" type="text">
    <input name="email" placeholder="email" type="text">

    <div class="mydict">
        <div>
            <label><input type="radio" name="statut" checked="" value="Etudiant">
            <span>Etudiant</span>
            </label>
            <label><input type="radio" name="statut" value="Enseignant">
            <span>Enseignant</span>
            </label>
        </div>
    </div>

    <button class="button_submit" type="submit" name="Ajouter" >Ajouter</button>
  </form>
</section>

</body>
</html>


<?php 
include '../connect.php' ;

if(isset($_POST['Ajouter'])) {
  $Nom = $_POST['nom'] ;
  $Prenom = $_POST['prenom'] ;
  $Adresse = $_POST['adresse'] ;
  $Statut = $_POST['statut'] ;
  $Email = $_POST['email'] ;

  $insertSQL = "INSERT INTO `usager`( `Nom`, `Prenom`, `Adresse`, `Statut`, `Email`) 
                VALUES ('$Nom','$Prenom','$Adresse','$Statut','$Email')" ;
  $result=@mysql_query($insertSQL,$idcon);

  if($result){
    echo "<script type=\"text/javascript\"> alert('Usagers enregistrer avec succces'); 
    window.location.href = \"http://localhost/projet-web/database/Client/Clients.php\";
           </script>";
  }else {
    echo "<script type=\"text/javascript\"> alert('Erreur : ".mysql_error()."')</script>";
  }

}

?>