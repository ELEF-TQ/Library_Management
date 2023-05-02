<?php
include '../connect.php';

if (isset($_GET['deleteid'])) {
    $Numero_emprunt = $_GET["deleteid"];
    $currentDateTime = date("Y-m-d H:i:s");

    $insertQuery = "INSERT INTO emprunts_history (DateEmprunt, DateRetour, Numero_usager, Numero_livre) SELECT DateEmprunt, '$currentDateTime' AS DateRetour, Numero_usager, Numero_livre FROM emprunts WHERE Numero = $Numero_emprunt";
    $deleteQuery = "DELETE FROM emprunts WHERE Numero = $Numero_emprunt";

    $insertResult = mysql_query($insertQuery, $idcon);

    if ($insertResult) {
        $deleteResult = mysql_query($deleteQuery, $idcon);

        if ($deleteResult) {
            echo "<script type=\"text/javascript\"> 
                    alert('Livre rendu avec succes'); 
                    window.location.href = 'http://localhost/projet-web/database/Loan/Loans.php';
                  </script>";
        } else {
            echo "Error executing delete query: " . mysql_error($idcon);
        }
    } else {
        echo "Error executing insert query: " . mysql_error($idcon);
    }
}

?>