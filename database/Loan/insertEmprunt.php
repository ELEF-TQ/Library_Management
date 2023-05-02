
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ======= DBConnection ====== -->
    <?php include '../connect.php' ;?>
    <!-- ======= Styles ====== -->
    <style><?php include '../../assets/css/style.css'; ?></style>
    <title>Ajouter un emmprunt</title>
</head>
<body>
    <header>
        <h1 class="header-title">Ajouter un Emprunt</h1>
    </header>
    <section class="section_form">
        <form method="POST" id="loan-form" class="feed-form">
            <label for="usager"><h3>Usager:</h3></label>
            <select name="Numero_usager" id="usager" class="box">
                <?php
                // Fetch usager data from the database
                $usagerQuery = "SELECT * FROM usager";
                $usagerResult = mysql_query($usagerQuery);
                while ($usager = mysql_fetch_assoc($usagerResult)) {
                    echo "<option value='" . $usager['Numero_usager'] . "'>" . $usager['Nom'] . " " . $usager['Prenom'] . "</option>";
                }
                ?>
            </select>
            <br><br>

            <label for="livre"><h3>Livres:</h3></label>
            <select name="Numero_livre" id="livre" class="box">
                <?php
                // Fetch livre data from the database
                $livreQuery = "SELECT * FROM livres WHERE Exemplaires >= 1";
                $livreResult = mysql_query($livreQuery);
                while ($livre = mysql_fetch_assoc($livreResult)) {
                    echo "<option value='" . $livre['Numero_livre'] . "'>" . $livre['Titre'] . " by " . $livre['Auteur'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <input type="button" value="Ajouter livre" onclick="addLivre()">
            <ul id="selected-livres">
            <h2>List des livres choisit :</h2>
            </ul> 
            <br><br>
            
            <input type="hidden" name="selected_livres" id="selected-livres-input" value="">
            <button  class="button_submit" onclick="submitForm()">Ajouter un emprunt</button>
        </form>
    </section>
<script type="text/javascript">
    const selectedLivres = [];
    function addLivre() {
    const livreSelect = document.getElementById("livre");
    const selectedLivreId = livreSelect.value;
    const selectedLivreText = livreSelect.options[livreSelect.selectedIndex].text;

    if (selectedLivres.length < 5) {
        if (!selectedLivres.includes(selectedLivreId)) {
            selectedLivres.push(selectedLivreId);
            const selectedLivresList = document.getElementById("selected-livres");
            const selectedLivreItem = document.createElement("li");
            selectedLivreItem.textContent = selectedLivreText;
            selectedLivresList.appendChild(selectedLivreItem);
        } else {
            alert("Livre déjà sélectionné.");
        }
    } else {
        alert("Vous ne pouvez sélectionner que 5 livres au maximum.");
    }
    }

    function submitForm() {
        if (selectedLivres.length > 0) {
            if (selectedLivres.length <= 5) {
                const selectedLivresInput = document.getElementById("selected-livres-input");
                selectedLivresInput.value = JSON.stringify(selectedLivres); // Convert the array to a JSON string

                // Execute the form submission
                document.getElementById("loan-form").submit();
            } else {
                alert("vous pouvez pas selectioner plus de 5 livre");
            }
        } else {
            alert("pas de livre selectioner");
        }
    }
</script>

<?php
$selectedLivres = []; 
$usager_id = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usager_id = $_POST['Numero_usager'];

    // Check if livres are selected
    if (isset($_POST['selected_livres']) && !empty($_POST['selected_livres'])) {
        $selectedLivres = json_decode($_POST['selected_livres'], true); // Decode the JSON string to an array
        $numSelectedLivres = count($selectedLivres);

        if ($numSelectedLivres > 0) {
            if ($numSelectedLivres <= 5) {
                // Insert the loans for the selected livres
                foreach ($selectedLivres as $livre_id) {
                    // Get the current date
                    $date_emprunt = date('Y-m-d H:i:s');

                    // Fetch the usager's name from the database
                    $usagerQuery = "SELECT Nom, Prenom FROM usager WHERE Numero_usager = '$usager_id'";
                    $usagerResult = mysql_query($usagerQuery);
                    $usager = mysql_fetch_assoc($usagerResult);

                    // Insert the loan information into the "emprunts" table
                    $sql = "INSERT INTO emprunts (Numero_usager, Numero_livre, DateEmprunt) VALUES ('$usager_id', '$livre_id', '$date_emprunt')";

                    if (mysql_query($sql)) {
                        // Update the "Exemplaires" field to decrement by 1 for the selected livre
                        $updateSql = "UPDATE livres SET Exemplaires = Exemplaires - 1 WHERE Numero_livre = '$livre_id'";
                        mysql_query($updateSql);
                    } else {
                        echo "Error creating loan: " . mysql_error();
                    }
                }
                echo "<script type=\"text/javascript\"> 
                alert('Emprunt cree avec succes'); 
                window.location.href = 'http://localhost/projet-web/database/Loan/Loans.php';
              </script>";
            } else {
                echo "<script type=\"text/javascript\"> 
                    alert('vous pouvez selectioner au maximum 5 livre'); 
                  </script>";
            }
        } else {
            echo "<script type=\"text/javascript\"> 
            alert('pas de livre selectionner'); 
          </script>";
        }
    } else {
        echo "<script type=\"text/javascript\"> 
        alert('pas de lirve selectionner'); 
        </script>";
    }
}
?>
</body>
</html>
