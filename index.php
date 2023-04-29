<!DOCTYPE html>
<html lang="en">

<head>
    <?php  include './database/connect.php' ; ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management</title>
    <!-- ======= Styles ====== -->
    <style><?php include './assets/css/style.css'; ?></style><link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="title">Library Management</span>
                    </a>
                </li>

                <li>
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="./database/Book/Books.php">
                        <span class="icon">
                            <ion-icon name="document-text-outline"></ion-icon>
                        </span>
                        <span class="title">Books</span>
                    </a>
                </li>

                <li>
                    <a href="./database/Client/Clients.php">
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
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">
                           <?php 
                                $selectSQL = "SELECT COUNT(*) as count FROM `livres`";
                                $result=@mysql_query($selectSQL,$idcon);
                                $row = mysql_fetch_assoc($result);
                                $livres = $row['count'];
                                echo "$livres" ;
                            ?>
                        </div>
                        <div class="cardName">Livre</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="book-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                          <?php 
                            $selectSQL = "SELECT COUNT(*) as count FROM `usager`";
                            $result=@mysql_query($selectSQL,$idcon);
                            $row = mysql_fetch_assoc($result);
                            $usagers = $row['count'];
                            echo "$usagers" ;
                            ?>
                        </div>
                        <div class="cardName">Usager</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                          <?php 
                            $selectSQL = "SELECT SUM(Exemplaires) as sum FROM `livres`";
                            $result=@mysql_query($selectSQL,$idcon);
                            $row = mysql_fetch_assoc($result);
                            $nbrExmp = $row['sum'];
                            echo "$nbrExmp" ;
                            ?>
                        </div>
                        <div class="cardName">Exemplaire</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="documents-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">20</div>
                        <div class="cardName">Emprunt</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="file-tray-full-outline"></ion-icon>
                    </div>
                </div>
            </div>

        

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>