<?php

class GestionVehiculesModel extends ConnexionBdd
{

    public function getVehiculeById($idVehicule)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT v.*, m.Nom_marque
                        FROM vehicule v
                        INNER JOIN marque m ON v.ID_Marque = m.ID_Marque
                        WHERE ID_Vehicule = :idVehicule";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idVehicule', $idVehicule);
            $requete->execute();
            $result = $requete->fetch(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getAllVehicules()
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT v.*, m.Nom_marque
                        FROM vehicule v
                        INNER JOIN marque m ON v.ID_Marque = m.ID_Marque";
            $requete = $database->prepare($sql_query);
            $requete->execute();
            $result = $requete->fetchAll(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
