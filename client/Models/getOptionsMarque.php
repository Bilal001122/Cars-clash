<?php
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tdw";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['marque'])) {
        $selectedMarque = $_POST['marque'];

        // Récupération des modèles distincts correspondant à la marque sélectionnée
        $sqlModele = "SELECT DISTINCT v.Modele
                FROM vehicule v
                INNER JOIN marque m ON v.id_marque = m.id_marque
                WHERE m.Nom_marque = :selectedMarque";

        $stmtModele = $conn->prepare($sqlModele);
        $stmtModele->bindParam(':selectedMarque', $selectedMarque);
        $stmtModele->execute();

        $modeles = [];

        if ($stmtModele->rowCount() > 0) {
            while ($row = $stmtModele->fetch(PDO::FETCH_ASSOC)) {
                $modeles[] = $row['Modele'];
            }
            echo json_encode($modeles);
        } else {
            echo json_encode(array('error' => 'Aucun modèle trouvé pour cette marque'));
        }
    }
} catch (PDOException $e) {
    echo "La connexion a échoué : " . $e->getMessage();
}
