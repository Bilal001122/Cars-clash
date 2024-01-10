<?php

class GestionContactsModel extends ConnexionBdd
{
    public function getAllContacts()
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM contact";
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
