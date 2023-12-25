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

    public function verifyIfFavoris($idVehicule, $idClient)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM favoris_utilisateur_vehicule WHERE ID_Vehicule = :idVehicule AND ID_utilisateur = :idClient";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idVehicule', $idVehicule);
            $requete->bindParam(':idClient', $idClient);
            $requete->execute();
            $result = $requete->fetch(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function handleAddToFav($idClient, $idVehicule)
    {
        try {
            $database = $this->connexion();
            $sql_query = "INSERT INTO favoris_utilisateur_vehicule (ID_utilisateur, ID_Vehicule) VALUES (:idClient, :idVehicule)";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idClient', $idClient);
            $requete->bindParam(':idVehicule', $idVehicule);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function handleRemoveFromFav($idClient, $idVehicule)
    {
        try {
            $database = $this->connexion();
            $sql_query = "DELETE FROM favoris_utilisateur_vehicule WHERE ID_utilisateur = :idClient AND ID_Vehicule = :idVehicule";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idClient', $idClient);
            $requete->bindParam(':idVehicule', $idVehicule);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
