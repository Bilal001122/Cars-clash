<?php

require_once 'Models/ConnexionBdd.php';
class GestionGuideAchatModel extends ConnexionBdd
{

    public function getAllGuideAchat()
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM guide_achat";
            $requete = $database->prepare($sql_query);
            $requete->execute();
            $result = $requete->fetchAll(PDO::FETCH_ASSOC);
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
            $sql_query = "SELECT * FROM vehicule";
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
