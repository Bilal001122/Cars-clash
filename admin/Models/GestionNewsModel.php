<?php
class GestionNewsModel extends ConnexionBdd
{
    public function getAllNews()
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM news";
            $requete = $database->prepare($sql_query);
            $requete->execute();
            $result = $requete->fetchAll(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getNewsById($idNews)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM news WHERE ID_News = :idNews";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idNews', $idNews);
            $requete->execute();
            $result = $requete->fetch(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function editNews($idNews, $titreNews, $contenuNews, $imageNewsName)
    {
        try {
            $database = $this->connexion();
            $sql_query = "UPDATE news SET Titre = :titreNews, Contenu = :contenuNews, Image = :imageNewsName WHERE ID_News = :idNews";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idNews', $idNews);
            $requete->bindParam(':titreNews', $titreNews);
            $requete->bindParam(':contenuNews', $contenuNews);
            $requete->bindParam(':imageNewsName', $imageNewsName);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function deleteNews($idNews)
    {
        try {
            $database = $this->connexion();
            $sql_query = "DELETE FROM news WHERE ID_News = :idNews";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idNews', $idNews);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function addNews($titreNews, $contenuNews, $imageNewsName)
    {
        try {
            $database = $this->connexion();
            $sql_query = "INSERT INTO news (Titre, Contenu, Image) VALUES (:titreNews, :contenuNews, :imageNewsName)";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':titreNews', $titreNews);
            $requete->bindParam(':contenuNews', $contenuNews);
            $requete->bindParam(':imageNewsName', $imageNewsName);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
