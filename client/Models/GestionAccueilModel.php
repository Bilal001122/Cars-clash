<?php
require_once 'Models/ConnexionBdd.php';
class GestionAccueilModel extends ConnexionBdd
{

    public function getClient($idClient)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM utilisateur WHERE id_utilisateur = :id";
            $requete = $database->prepare($sql_query);
            $requete->execute(['id' => $idClient]);
            $result = $requete->fetch(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getAllDiaporama()
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM diaporama";
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
