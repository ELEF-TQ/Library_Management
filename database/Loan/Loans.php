<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ======= DBConnection ====== -->
    <?php include '../connect.php' ;?>
    <title>Library Management</title>
    <!-- ======= Styles ====== -->
    <style><?php include '../../assets/css/style.css'; ?></style>
   
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="title">Gestion bibliothèque </span>
                    </a>
                </li>

                <li>
                    <a href="../../index.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="../Book/Books.php">
                        <span class="icon">
                            <ion-icon name="document-text-outline"></ion-icon>
                        </span>
                        <span class="title">Livres</span>
                    </a>
                </li>

                <li>
                    <a href="../Client/Clients.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Usagers</span>
                    </a>
                </li>

                <li>
                    <a href="Loans.php">
                        <span class="icon">
                            <ion-icon name="bag-check-outline"></ion-icon>
                        </span>
                        <span class="title">Emprunts</span>
                    </a>
                </li>

            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>
            <!-- ================ List des emprunts en cours ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>List des Emprunts en cours : </h2>
                        <a href="insertEmprunt.php" class="btn">Ajouter un Emprunt</a>
                    </div>

                    <table id="myTable">
                        <thead>
                            <tr>
                                <td>Nom d'usager</td>
                                <td style="text-align : center ;">livre emprunter</td>
                                <td>DateEmp</td>
                                <td style="text-align:center;">DB</td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Select livres-->
                            <?php 
                                $selectSQL = "SELECT * FROM `emprunts`";
                                $resultOuter = mysql_query($selectSQL, $idcon);
                                if ($resultOuter) {
                                    while ($row = mysql_fetch_assoc($resultOuter)) {
                                        $Numero_emprunt = $row['Numero'];
                                        
                                        // Fetching client
                                        $Numero_usager = $row['Numero_usager'];
                                        $selectUsagerSQL = "SELECT Nom, Prenom FROM `usager` WHERE Numero_usager = $Numero_usager";
                                        $resultInner = mysql_query($selectUsagerSQL, $idcon);
                                        $usager = mysql_fetch_assoc($resultInner);
                                        $Nom_usager = $usager['Nom'];
                                        $Prenom_usager = $usager['Prenom'];

                                        // Fetching livre
                                        $Numero_livre = $row['Numero_livre'];
                                        $selectLivreSQL = "SELECT Titre FROM `livres` WHERE Numero_livre = $Numero_livre";
                                        $resultInner = mysql_query($selectLivreSQL, $idcon);
                                        $livre = mysql_fetch_assoc($resultInner);
                                        $Titre_livre = $livre['Titre'];

                                        $DateEmprunt = $row['DateEmprunt'];

                                        echo "<tr>";
                                        echo "<td>" . $Prenom_usager . ' ' . $Nom_usager . "</td>";
                                        echo "<td style=\"text-align: center;\">$Titre_livre</td>";
                                        echo "<td>$DateEmprunt</td>";
                                        echo "<td style=\"text-align: center;\">";
                                        echo " <button class=\"status return\"  name=\"Rendre_livre\" > <a  href=\"deleteEmprunt.php?deleteid=$Numero_emprunt \">Rendre</a> </button> " ;             
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            <!-- end of select-->
                        </tbody>
                    </table>
                </div>          
                 <!-- ================ Historique des emprunts ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Historique des emprunts : </h2>
                    </div>

                    <table id="myTable">
                        <thead>
                            <tr>
                               <td>Nom d'usager</td>
                                <td style="text-align : center ;">livre emprunter</td>
                                <td>DateEmp</td>
                                <td>DateRetour</td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Select livres-->
                            <?php
                                 $selectSQL = "SELECT * FROM `emprunts_history`";
                                 $resultOuter = mysql_query($selectSQL, $idcon);
                                 if ($resultOuter) {
                                     while ($row = mysql_fetch_assoc($resultOuter)) {

                                         // Fetching client
                                         $Numero_usager = $row['Numero_usager'];
                                         $selectUsagerSQL = "SELECT Nom, Prenom FROM `usager` WHERE Numero_usager = $Numero_usager";
                                         $resultInner = mysql_query($selectUsagerSQL, $idcon);
                                         $usager = mysql_fetch_assoc($resultInner);
                                         $Nom_usager = $usager['Nom'];
                                         $Prenom_usager = $usager['Prenom'];
 
                                         // Fetching livre
                                         $Numero_livre = $row['Numero_livre'];
                                         $selectLivreSQL = "SELECT Titre FROM `livres` WHERE Numero_livre = $Numero_livre";
                                         $resultInner = mysql_query($selectLivreSQL, $idcon);
                                         $livre = mysql_fetch_assoc($resultInner);
                                         $Titre_livre = $livre['Titre'];

                                        $DateEmprunt = $row['DateEmprunt'];
                                        $DateRetour = $row['DateRetour'];

                                        echo "<tr>";
                                        echo "<td>" . $Prenom_usager . ' ' . $Nom_usager . "</td>";
                                        echo "<td style=\"text-align: center;\">$Titre_livre</td>";
                                        echo "<td>$DateEmprunt</td>";
                                        echo "<td>$DateRetour</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            <!-- end of select-->
                        </tbody>
                    </table>
                </div>    
    <!-- =========== Scripts =========  -->
    <script src="../../assets/js/main.js"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

