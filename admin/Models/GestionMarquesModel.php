<?php

class GestionMarquesModel extends ConnexionBdd
{
    public function getMarqueById($id)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM marque WHERE id_marque = :id";
            $requete = $database->prepare($sql_query);
            $requete->execute(['id' => $id]);
            $result = $requete->fetch(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function getAllMarques()
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

    public function editMarque($idMarque, $nomMarque, $paysOrigine, $siegeSocial, $anneeCreation, $imageMarque)
    {
        try {
            $database = $this->connexion();
            $sql_query = "UPDATE marque SET Nom_marque = :nomMarque, Pays_origine = :paysOrigine, Siege_social = :siegeSocial, Annee_de_creation = :anneeCreation, Image_marque = :imageMarque WHERE ID_Marque = :idMarque";
            $requete = $database->prepare($sql_query);
            $requete->execute(['idMarque' => $idMarque, 'nomMarque' => $nomMarque, 'paysOrigine' => $paysOrigine, 'siegeSocial' => $siegeSocial, 'anneeCreation' => $anneeCreation, 'imageMarque' => $imageMarque]);
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function deleteMarque($idMarque)
    {
        try {
            $database = $this->connexion();
            $sql_query = "DELETE FROM marque WHERE ID_Marque = :idMarque";
            $requete = $database->prepare($sql_query);
            $requete->execute(['idMarque' => $idMarque]);
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function addMarque($nomMarque, $paysOrigine, $siegeSocial, $anneeCreation, $imageMarque)
    {
        try {
            $database = $this->connexion();
            $sql_query = "INSERT INTO marque (Nom_marque, Pays_origine, Siege_social, Annee_de_creation, Image_marque) VALUES (:nomMarque, :paysOrigine, :siegeSocial, :anneeCreation, :imageMarque)";
            $requete = $database->prepare($sql_query);
            $requete->execute(['nomMarque' => $nomMarque, 'paysOrigine' => $paysOrigine, 'siegeSocial' => $siegeSocial, 'anneeCreation' => $anneeCreation, 'imageMarque' => $imageMarque]);
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
