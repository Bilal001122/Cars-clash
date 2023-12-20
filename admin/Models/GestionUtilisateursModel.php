<?php

require_once 'Models/ConnexionBdd.php';

class GestionUtilisateursModel extends ConnexionBdd
{

    public function getAllUsers()
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT *
                        FROM utilisateur";
            $requete = $database->prepare($sql_query);
            $requete->execute();
            $result = $requete->fetchAll(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function validerUser($idUtilisateur)
    {
        try {
            $database = $this->connexion();
            $sql_query = "UPDATE utilisateur
                        SET Status_de_validation = 'Valide'
                        WHERE ID_Utilisateur = :idUtilisateur";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idUtilisateur', $idUtilisateur);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function bloquerUser($idUtilisateur)
    {
        try {
            $database = $this->connexion();
            $sql_query = "UPDATE utilisateur
                        SET bloque = 'Oui'
                        WHERE ID_Utilisateur = :idUtilisateur";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idUtilisateur', $idUtilisateur);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
