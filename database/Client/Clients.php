<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management</title>
    <!-- ======= DBConnection ====== -->
    <?php include '../connect.php' ;?>
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
                    <a href="Clients.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Usagers</span>
                    </a>
                </li>

                <li>
                    <a href="../Loan/Loans.php">
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
                    <form class="search" method="GET" >
                        <div class="input-container">
                            <input type="text" name="search_filter" class="input" placeholder="chercher un usager par nom"  id="filterInput">
                            <span class="icon"> 
                                <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            </span>
                        </div>
                    </form>
                </div>
            <!-- ================ Array ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>List des Usagers</h2>
                        <a href="insertUsager.php" class="btn">Ajouter un usager</a>
                    </div>
                    <table id="myTable">
                        <thead>
                            <tr>
                                <td>Numero</td>
                                <td>Nom</td>
                                <td>Prenom</td>
                                <td>Adresse</td>
                                <td>Statut</td>
                                <td>Email</td>
                                <td style="text-align:center;">DB</td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Select livres-->
                                <?php 
                                $selectSQL = "SELECT * FROM  `usager`";
                                $result=@mysql_query($selectSQL,$idcon);
                                    if($result){
                                        while($row = mysql_fetch_assoc($result) ) {
                                            $id = $row['Numero_usager'] ;
                                            $Nom = $row['Nom'] ;
                                            $Prenom = $row['Prenom'] ;
                                            $Adresse = $row['Adresse'] ;
                                            $Statut = $row['Statut'] ;
                                            $Email = $row['Email'] ;
                                            echo "<tr>";
                                            echo "<td>$id</td>" ;
                                            echo "<td>$Nom</td>";
                                            echo "<td>$Prenom</td>";
                                            echo "<td>$Adresse</td>";
                                            echo "<td >$Statut</td>";
                                            echo "<td >$Email</td>";
                                            echo "<td style=\"text-align : center ;\">";
                                            echo " <button class=\"status delivered\"  name=\"Update\" > <a  href=\"updateClient.php?updateid=$id \"> Modifier</a> </button> " ;   
                                            echo " <button class=\"status return\"     name=\"Delete\" > <a  href=\"deleteClient.php?deleteid=$id \"> Supprimer</a> </button> " ;             
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

    <!-- =========== Scripts =========  -->
    <script src="../../assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        // Search Input :
        document.getElementById("filterInput").addEventListener("input", function() {
        var filter = this.value.toUpperCase();
        var table = document.getElementById("myTable");
        var rows = table.getElementsByTagName("tr");
        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            var isVisible = false;

            for (var j = 0; j < cells.length; j++) {
            var cell = cells[j];
            if (cell) {
                var cellText = cell.textContent || cell.innerText;
                if (cellText.toUpperCase().indexOf(filter) > -1) {
                isVisible = true;
                break;
                }
            }
            }
            rows[i].style.display = isVisible ? "" : "none";
        }
        });
    </script>

</body>

</html>

