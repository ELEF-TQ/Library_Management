<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management</title>
    <!-- ======= Styles ====== -->
    <style><?php include './assets/css/style.css'; ?></style>
   
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
                    <a href="index.html">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="Books.html">
                        <span class="icon">
                            <ion-icon name="document-text-outline"></ion-icon>
                        </span>
                        <span class="title">Books</span>
                    </a>
                </li>

                <li>
                    <a href="Clients.html">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Clients</span>
                    </a>
                </li>

                <li>
                    <a href="Loans.html">
                        <span class="icon">
                            <ion-icon name="bag-check-outline"></ion-icon>
                        </span>
                        <span class="title">Loans</span>
                    </a>
                </li>


                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
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

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>List des Livres</h2>
                        <a href="./database/Book/insertBook.php" class="btn">Ajouter un livre</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Auteur</td>
                                <td>Maison</td>
                                <td>NbrExemp</td>
                                <td>NbrPage</td>
                                <td>Statut</td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Select livres-->
                                <?php 
                                include 'database/connect.php' ;
                                $selectSQL = "SELECT * FROM  `livres`";
                                $result=@mysql_query($selectSQL,$idcon);
                                    if($result){
                                        while($row = mysql_fetch_assoc($result) ) {
                                            $id = $row['Numero'] ;
                                            $Titre = $row['Titre'] ;
                                            $Auteur = $row['Auteur'] ;
                                            $Maison = $row['Maison'] ;
                                            $Pages = $row['Pages'] ;
                                            $Exemplaire = $row['Exemplaires'] ;
                                            echo "<tr>";
                                            echo "<td>$Titre</td>";
                                            echo "<td>$Auteur</td>";
                                            echo "<td>$Maison</td>";
                                            echo "<td>$Pages</td>";
                                            echo "<td>$Exemplaire</td>";
                                            echo "<td>";
                                            echo " <button class=\"status delivered\"  name=\"Update\" > <a  href=\"database/Book/updateBook.php?updateid=$id \"> Modifier</a> </button> " ;   
                                            echo " <button class=\"status return\"     name=\"Delete\" > <a  href=\"database/Book/deleteBook.php?deleteid=$id \"> Supprimer</a> </button> " ;             
                                            echo "</td>" ;     
                                            echo " </tr>" ;
                                        }
                                    }
                                mysql_close($idcon);
                                ?>
                            <!-- end of select-->
                        </tbody>
                    </table>
                </div>

                <!-- =========== Ajouter un livre =========  -->
                <!-- <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Ajouter un livre</h2>
                        </div>

                        <form action="insert.php" method="POST">
                                <table>
                                    <tr>
                                        <td>Nom : </td><td><input type="text" name="nom" size="40" id="nom"></td>
                                    </tr>
                                    <tr>
                                        <td>Prenom : </td><td><input type="text" name="prenom" size="40" id="prenom"></td>
                                    </tr>
                                    <tr>
                                        <td>Age : </td><td><input type="text" name="age" size="40" id="age"></td>
                                    </tr>
                                    <tr>
                                        <td>Adresse : </td><td><input type="text" name="adresse" size="40" id="adresse"></td>
                                    </tr>
                                    <tr>
                                        <td>Ville : </td><td><input type="text" name="ville" size="40" id="ville"></td>
                                    </tr>
                                    <tr>
                                        <td>Mail : </td><td><input type="mail" name="mail" size="40" id="mail"></td>
                                    </tr>
                                </table>
                                <tr><td><input type="submit" value= "Ajouter" class="status delivered"/></td></tr>
                        </form>
                    </div>
                </div> -->




    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>