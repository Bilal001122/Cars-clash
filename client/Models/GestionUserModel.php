<?php

class GestionUserModel extends ConnexionBdd
{

    public function getUserInformation($idUtilisateur)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM utilisateur WHERE Id_utilisateur = :idUtilisateur";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idUtilisateur', $idUtilisateur);
            $requete->execute();
            $result = $requete->fetch(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function updateUserInfo($idClient, $nom, $prenom, $email, $sexe, $dateNaissance)
    {
        try {
            $database = $this->connexion();
            $sql_query = "UPDATE utilisateur SET Nom_utilisateur = :nom, Prenom = :prenom, email_utilisateur = :email, Sexe = :sexe, Date_de_naissance = :dateNaissance WHERE Id_utilisateur = :idClient";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idClient', $idClient);
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':prenom', $prenom);
            $requete->bindParam(':email', $email);
            $requete->bindParam(':sexe', $sexe);
            $requete->bindParam(':dateNaissance', $dateNaissance);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getUserComments($idUtilisateur)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM avis a JOIN vehicule v on a.id_vehicule = v.id_vehicule  WHERE Id_utilisateur = :idUtilisateur";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idUtilisateur', $idUtilisateur);
            $requete->execute();
            $result = $requete->fetchAll(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}