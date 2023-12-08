<?php

class GestionMarquesModel extends ConnexionBdd
{
    public function getMarqueById($id)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM marque WHERE id = :id";
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
}
