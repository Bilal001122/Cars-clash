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

}
