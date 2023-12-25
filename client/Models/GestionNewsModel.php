<?php
require_once 'Models/ConnexionBdd.php';
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
            $sql_query = "SELECT * FROM news WHERE Id_news = :idNews";
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

}
