<?php
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tdw";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['marque']) && isset($_POST['modele'])) {
        $selectedMarque = $_POST['marque'];
        $selectedModele = $_POST['modele'];

        $sql = "SELECT DISTINCT v.Version
                FROM vehicule v
                INNER JOIN marque m ON v.id_marque = m.id_marque
                WHERE m.Nom_marque = :selectedMarque
                AND v.Modele = :selectedModele";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':selectedMarque', $selectedMarque);
        $stmt->bindParam(':selectedModele', $selectedModele);
        $stmt->execute();

        $versions = [];

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $versions[] = $row['Version'];
            }

            echo json_encode($versions);
        } else {
            echo json_encode(array('error' => 'Aucune version trouvée pour ce modèle'));
        }
    }
} catch (PDOException $e) {
    echo "La connexion a échoué : " . $e->getMessage();
}
