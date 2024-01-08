<?php
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tdw";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['marque']) && isset($_POST['modele']) && isset($_POST['version'])) {
        $selectedMarque = $_POST['marque'];
        $selectedModele = $_POST['modele'];
        $selectedVersion = $_POST['version'];

        // Récupération des années correspondant à la version sélectionnée
        $sqlAnnee = "SELECT DISTINCT v.Annee
              FROM vehicule v
              INNER JOIN marque m ON v.id_marque = m.id_marque
              WHERE m.Nom_marque = :selectedMarque
              AND v.Modele = :selectedModele
              AND v.Version = :selectedVersion";

        $stmtAnnee = $conn->prepare($sqlAnnee);
        $stmtAnnee->bindParam(':selectedMarque', $selectedMarque);
        $stmtAnnee->bindParam(':selectedModele', $selectedModele);
        $stmtAnnee->bindParam(':selectedVersion', $selectedVersion);
        $stmtAnnee->execute();

        $annees = [];

        if ($stmtAnnee->rowCount() > 0) {
            while ($row = $stmtAnnee->fetch(PDO::FETCH_ASSOC)) {
                $annees[] = $row['Annee'];
            }

            echo json_encode($annees);
        } else {
            echo json_encode(array('error' => 'Aucune année trouvée pour cette version'));
        }
    }
} catch (PDOException $e) {
    echo "La connexion a échoué : " . $e->getMessage();
}
