<?php

require_once 'Models/ConnexionBdd.php';

class GestionAvisModel extends ConnexionBdd
{

    public function getThreeAvis($idVehicule)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT avis.*, utilisateur.Nom_utilisateur
                        FROM avis
                        INNER JOIN utilisateur ON avis.ID_utilisateur = utilisateur.ID_Utilisateur
                        WHERE avis.ID_Vehicule = :idVehicule AND avis.statut = 'Valide'
                        LIMIT 3";

            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idVehicule', $idVehicule);
            $requete->execute();
            $result = $requete->fetchAll(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
