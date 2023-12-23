<?php
require_once 'Models/ConnexionBdd.php';
class GestionParamsModel extends ConnexionBdd
{
    public function getAllGuides()
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

    public function getAllDiaporamas()
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

    public function getGuide($idGuide)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM guide_achat WHERE ID_Guide = :idGuide";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idGuide', $idGuide);
            $requete->execute();
            $result = $requete->fetch(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getDiaporama($idDiapo)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM diaporama WHERE ID_Image = :idDiapo";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idDiapo', $idDiapo);
            $requete->execute();
            $result = $requete->fetch(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function editGuide($idGuide, $titre, $contenu)
    {
        try {
            $database = $this->connexion();
            $sql_query = "UPDATE guide_achat SET Titre_guide_achat = :titre, Contenu_guide_achat = :contenu WHERE ID_Guide = :idGuide";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idGuide', $idGuide);
            $requete->bindParam(':titre', $titre);
            $requete->bindParam(':contenu', $contenu);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function deleteGuide($idGuide)
    {
        try {
            $database = $this->connexion();
            $sql_query = "DELETE FROM guide_achat WHERE ID_Guide = :idGuide";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idGuide', $idGuide);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function addGuide($titre, $contenu)
    {
        try {
            $database = $this->connexion();
            $sql_query = "INSERT INTO guide_achat (Titre_guide_achat, Contenu_guide_achat) VALUES (:titre, :contenu)";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':titre', $titre);
            $requete->bindParam(':contenu', $contenu);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function editDiaporama($idDiapo, $nom, $lien, $imageDiapoName)
    {
        try {
            $database = $this->connexion();
            $sql_query = "UPDATE diaporama SET Nom_Image = :nom, Lien = :lien, Chemin_Image = :imageDiapoName WHERE ID_Image = :idDiapo";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idDiapo', $idDiapo);
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':lien', $lien);
            $requete->bindParam(':imageDiapoName', $imageDiapoName);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function deleteDiaporama($idDiapo)
    {
        try {
            $database = $this->connexion();
            $sql_query = "DELETE FROM diaporama WHERE ID_Image = :idDiapo";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idDiapo', $idDiapo);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function addDiaporama($nom, $lien, $imageDiapoName)
    {
        try {
            $database = $this->connexion();
            $sql_query = "INSERT INTO diaporama (Nom_Image, Lien, Chemin_Image) VALUES (:nom, :lien, :imageDiapoName)";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':lien', $lien);
            $requete->bindParam(':imageDiapoName', $imageDiapoName);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
