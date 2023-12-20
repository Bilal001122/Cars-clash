<?php
require_once 'Models/ConnexionBdd.php';
class GestionAVisModel extends ConnexionBdd
{

    public function getAllAvis()
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM avis a INNER JOIN utilisateur u ON a.ID_Utilisateur = u.ID_Utilisateur INNER JOIN vehicule v ON a.ID_Vehicule = v.ID_Vehicule";
            $requete = $database->prepare($sql_query);
            $requete->execute();
            $result = $requete->fetchAll(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function validerCommentaire($idAvis)
    {
        try {
            $database = $this->connexion();
            $sql_query = "UPDATE avis SET Statut = 'Valide' WHERE ID_Avis = :idAvis";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idAvis', $idAvis);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function bloquerUserFromAvis($idUser)
    {
        try {
            $database = $this->connexion();
            $sql_query = "UPDATE utilisateur SET bloque = 'Oui' WHERE ID_Utilisateur = :idUser";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idUser', $idUser);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
