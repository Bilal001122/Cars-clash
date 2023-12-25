<?php
require_once 'Models/ConnexionBdd.php';
class GestionMarquesModel extends ConnexionBdd
{

    public function getMarques()
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM marque";
            $requete = $database->prepare($sql_query);
            $requete->execute();
            $result = $requete->fetchAll(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getMarque($idMarque)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM marque WHERE ID_Marque = :idMarque";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idMarque', $idMarque);
            $requete->execute();
            $result = $requete->fetch(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getAllVehicules($idMarque)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM vehicule WHERE ID_Marque = :idMarque";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idMarque', $idMarque);
            $requete->execute();
            $result = $requete->fetchAll(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getFourVehicules($idMarque)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM vehicule WHERE ID_Marque = :idMarque LIMIT 4";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idMarque', $idMarque);
            $requete->execute();
            $result = $requete->fetchAll(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
