<?php
require_once 'ConnexionBdd.php';
class GestionComparaisonModel extends ConnexionBdd
{
    public function compareTwoVehicules($marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2)
    {
        try {
            $database = $this->connexion();
            $sql_query = "INSERT INTO comparaison (id_vehicule1, id_vehicule2) VALUES (
              (SELECT id_vehicule FROM vehicule WHERE LOWER(version) = LOWER(:version_1) AND LOWER(annee) = LOWER(:annee_1) AND LOWER(modele) = LOWER(:modele_1) AND id_marque = (SELECT id_marque FROM marque WHERE LOWER(nom_marque) = LOWER(:marque_1))),
              (SELECT id_vehicule FROM vehicule WHERE LOWER(version) = LOWER(:version_2) AND LOWER(annee) = LOWER(:annee_2) AND LOWER(modele) = LOWER(:modele_2) AND id_marque = (SELECT id_marque FROM marque WHERE LOWER(nom_marque) = LOWER(:marque_2)))
          )";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':version_1', $version_1);
            $requete->bindParam(':annee_1', $annee_1);
            $requete->bindParam(':modele_1', $modele_1);
            $requete->bindParam(':marque_1', $marque_1);
            $requete->bindParam(':version_2', $version_2);
            $requete->bindParam(':annee_2', $annee_2);
            $requete->bindParam(':modele_2', $modele_2);
            $requete->bindParam(':marque_2', $marque_2);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function compareThreeVehicules($marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2, $marque_3, $modele_3, $version_3, $annee_3)
    {
        try {
            $database = $this->connexion();
            $sql_query = "INSERT INTO comparaison (id_vehicule1, id_vehicule2, id_vehicule3) VALUES (
              (SELECT id_vehicule FROM vehicule WHERE LOWER(version) = LOWER(:version_1) AND LOWER(annee) = LOWER(:annee_1) AND LOWER(modele) = LOWER(:modele_1) AND id_marque = (SELECT id_marque FROM marque WHERE LOWER(nom_marque) = LOWER(:marque_1))),
              (SELECT id_vehicule FROM vehicule WHERE LOWER(version) = LOWER(:version_2) AND LOWER(annee) = LOWER(:annee_2) AND LOWER(modele) = LOWER(:modele_2) AND id_marque = (SELECT id_marque FROM marque WHERE LOWER(nom_marque) = LOWER(:marque_2))),
              (SELECT id_vehicule FROM vehicule WHERE LOWER(version) = LOWER(:version_3) AND LOWER(annee) = LOWER(:annee_3) AND LOWER(modele) = LOWER(:modele_3) AND id_marque = (SELECT id_marque FROM marque WHERE LOWER(nom_marque) = LOWER(:marque_3)))
          )";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':version_1', $version_1);
            $requete->bindParam(':annee_1', $annee_1);
            $requete->bindParam(':modele_1', $modele_1);
            $requete->bindParam(':marque_1', $marque_1);
            $requete->bindParam(':version_2', $version_2);
            $requete->bindParam(':annee_2', $annee_2);
            $requete->bindParam(':modele_2', $modele_2);
            $requete->bindParam(':marque_2', $marque_2);
            $requete->bindParam(':version_3', $version_3);
            $requete->bindParam(':annee_3', $annee_3);
            $requete->bindParam(':modele_3', $modele_3);
            $requete->bindParam(':marque_3', $marque_3);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function compareFourVehicules($marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2, $marque_3, $modele_3, $version_3, $annee_3, $marque_4, $modele_4, $version_4, $annee_4)
    {
        try {
            $database = $this->connexion();
            $sql_query = "INSERT INTO comparaison (id_vehicule1, id_vehicule2, id_vehicule3, id_vehicule4) VALUES (
              (SELECT id_vehicule FROM vehicule WHERE LOWER(version) = LOWER(:version_1) AND LOWER(annee) = LOWER(:annee_1) AND LOWER(modele) = LOWER(:modele_1) AND id_marque = (SELECT id_marque FROM marque WHERE LOWER(nom_marque) = LOWER(:marque_1))),
              (SELECT id_vehicule FROM vehicule WHERE LOWER(version) = LOWER(:version_2) AND LOWER(annee) = LOWER(:annee_2) AND LOWER(modele) = LOWER(:modele_2) AND id_marque = (SELECT id_marque FROM marque WHERE LOWER(nom_marque) = LOWER(:marque_2))),
              (SELECT id_vehicule FROM vehicule WHERE LOWER(version) = LOWER(:version_3) AND LOWER(annee) = LOWER(:annee_3) AND LOWER(modele) = LOWER(:modele_3) AND id_marque = (SELECT id_marque FROM marque WHERE LOWER(nom_marque) = LOWER(:marque_3))),
              (SELECT id_vehicule FROM vehicule WHERE LOWER(version) = LOWER(:version_4) AND LOWER(annee) = LOWER(:annee_4) AND LOWER(modele) = LOWER(:modele_4) AND id_marque = (SELECT id_marque FROM marque WHERE LOWER(nom_marque) = LOWER(:marque_4)))
          )";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':version_1', $version_1);
            $requete->bindParam(':annee_1', $annee_1);
            $requete->bindParam(':modele_1', $modele_1);
            $requete->bindParam(':marque_1', $marque_1);
            $requete->bindParam(':version_2', $version_2);
            $requete->bindParam(':annee_2', $annee_2);
            $requete->bindParam(':modele_2', $modele_2);
            $requete->bindParam(':marque_2', $marque_2);
            $requete->bindParam(':version_3', $version_3);
            $requete->bindParam(':annee_3', $annee_3);
            $requete->bindParam(':modele_3', $modele_3);
            $requete->bindParam(':marque_3', $marque_3);
            $requete->bindParam(':version_4', $version_4);
            $requete->bindParam(':annee_4', $annee_4);
            $requete->bindParam(':modele_4', $modele_4);
            $requete->bindParam(':marque_4', $marque_4);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getVehicule($marque, $modele, $version, $annee)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM vehicule WHERE LOWER(version) = LOWER(:version) AND LOWER(annee) = LOWER(:annee) AND LOWER(modele) = LOWER(:modele) AND id_marque = (SELECT id_marque FROM marque WHERE LOWER(nom_marque) = LOWER(:marque))";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':version', $version);
            $requete->bindParam(':annee', $annee);
            $requete->bindParam(':modele', $modele);
            $requete->bindParam(':marque', $marque);
            $requete->execute();
            $vehicule = $requete->fetch();
            $this->deconnexion($database);
            return $vehicule;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getTopThreeComparaison()
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT ID_Vehicule1, ID_Vehicule2, COUNT(*) AS nbComparaisons
            FROM comparaison JOIN vehicule
            GROUP BY ID_Vehicule1, ID_Vehicule2
            ORDER BY nbComparaisons DESC
            LIMIT 3;
            ";
            $requete = $database->prepare($sql_query);
            $requete->execute();
            $topThreeComparaison = $requete->fetchAll();
            $this->deconnexion($database);
            return $topThreeComparaison;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getOptionsMarque($marque)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT DISTINCT v.Modele
            FROM vehicule v
            INNER JOIN marque m ON v.id_marque = m.id_marque
            WHERE m.Nom_marque = :selectedMarque";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':selectedMarque', $marque);
            $requete->execute();
            $modeles = [];
            if ($requete->rowCount() > 0) {
                while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $modeles[] = $row['Modele'];
                }
            }
            $this->deconnexion($database);
            return $modeles;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getOptionsModele($marque, $modele)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT DISTINCT v.Version
            FROM vehicule v
            INNER JOIN marque m ON v.id_marque = m.id_marque
            WHERE m.Nom_marque = :selectedMarque
            AND v.Modele = :selectedModele";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':selectedMarque', $marque);
            $requete->bindParam(':selectedModele', $modele);
            $requete->execute();
            $versions = [];
            if ($requete->rowCount() > 0) {
                while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $versions[] = $row['Version'];
                }
            }
            $this->deconnexion($database);
            return $versions;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getOptionsVersion($marque, $modele, $version)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT DISTINCT v.Annee
            FROM vehicule v
            INNER JOIN marque m ON v.id_marque = m.id_marque
            WHERE m.Nom_marque = :selectedMarque
            AND v.Modele = :selectedModele
            AND v.Version = :selectedVersion";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':selectedMarque', $marque);
            $requete->bindParam(':selectedModele', $modele);
            $requete->bindParam(':selectedVersion', $version);
            $requete->execute();
            $annees = [];
            if ($requete->rowCount() > 0) {
                while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $annees[] = $row['Annee'];
                }
            }
            $this->deconnexion($database);
            return $annees;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
