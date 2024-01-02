<?php
require_once 'Models/ConnexionBdd.php';
class GestionMarquesModel extends ConnexionBdd
{

    public function getMarques()
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

    public function getMarqueByIdVehicule($idVehicule)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM marque WHERE ID_Marque = (SELECT ID_Marque FROM vehicule WHERE ID_Vehicule = :idVehicule)";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idVehicule', $idVehicule);
            $requete->execute();
            $result = $requete->fetch(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getMarque($idMarque)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM marque WHERE ID_Marque = :idMarque";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idMarque', $idMarque);
            $requete->execute();
            $result = $requete->fetch(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getAllVehicules($idMarque)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM vehicule WHERE ID_Marque = :idMarque";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idMarque', $idMarque);
            $requete->execute();
            $result = $requete->fetchAll(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getFourVehicules($idMarque)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM vehicule WHERE ID_Marque = :idMarque LIMIT 4";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idMarque', $idMarque);
            $requete->execute();
            $result = $requete->fetchAll(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function verifyIfFavoris($idVehicule, $idClient)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM favoris_utilisateur_vehicule WHERE ID_Vehicule = :idVehicule AND ID_utilisateur = :idClient";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idVehicule', $idVehicule);
            $requete->bindParam(':idClient', $idClient);
            $requete->execute();
            $result = $requete->fetch(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function handleAddToFav($idClient, $idVehicule)
    {
        try {
            $database = $this->connexion();
            $sql_query = "INSERT INTO favoris_utilisateur_vehicule (ID_utilisateur, ID_Vehicule) VALUES (:idClient, :idVehicule)";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idClient', $idClient);
            $requete->bindParam(':idVehicule', $idVehicule);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function handleRemoveFromFav($idClient, $idVehicule)
    {
        try {
            $database = $this->connexion();
            $sql_query = "DELETE FROM favoris_utilisateur_vehicule WHERE ID_utilisateur = :idClient AND ID_Vehicule = :idVehicule";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idClient', $idClient);
            $requete->bindParam(':idVehicule', $idVehicule);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getVehicule($idVehicule)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT * FROM vehicule WHERE ID_Vehicule = :idVehicule";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idVehicule', $idVehicule);
            $requete->execute();
            $result = $requete->fetch(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function handleAddNoteToCar($idClient, $idVehicule, $note)
    {
        try {
            $database = $this->connexion();

            // Check if a note exists for the given user and vehicle
            $check_query = "SELECT ID_Note FROM note WHERE ID_utilisateur = :idClient AND ID_Vehicule = :idVehicule";
            $check_statement = $database->prepare($check_query);
            $check_statement->bindParam(':idClient', $idClient);
            $check_statement->bindParam(':idVehicule', $idVehicule);
            $check_statement->execute();
            $existing_note = $check_statement->fetch();

            if ($existing_note) {
                // Update the existing note
                $update_query = "UPDATE note SET Note = :note WHERE ID_Note = :existingNoteId";
                $update_statement = $database->prepare($update_query);
                $update_statement->bindParam(':note', $note);
                $update_statement->bindParam(':existingNoteId', $existing_note['ID_Note']);
                $update_statement->execute();
            } else {
                // Insert the new note
                $insert_query = "INSERT INTO note (ID_utilisateur, ID_Vehicule, Note) VALUES (:idClient, :idVehicule, :note)";
                $insert_statement = $database->prepare($insert_query);
                $insert_statement->bindParam(':idClient', $idClient);
                $insert_statement->bindParam(':idVehicule', $idVehicule);
                $insert_statement->bindParam(':note', $note);
                $insert_statement->execute();
            }

            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function handleAddAvisToCar($idClient, $idVehicule, $avis)
    {
        try {
            $database = $this->connexion();

            $check_query = "SELECT ID_Avis FROM avis WHERE ID_utilisateur = :idClient AND ID_Vehicule = :idVehicule";
            $check_statement = $database->prepare($check_query);
            $check_statement->bindParam(':idClient', $idClient);
            $check_statement->bindParam(':idVehicule', $idVehicule);
            $check_statement->execute();
            $existing_note = $check_statement->fetch();

            if ($existing_note) {
                $delete_query = "DELETE FROM avis WHERE ID_Avis = :existingNoteId";
                $delete_statement = $database->prepare($delete_query);
                $delete_statement->bindParam(':existingNoteId', $existing_note['ID_Avis']);
                $delete_statement->execute();
            }

            $insert_query = "INSERT INTO avis (ID_utilisateur, ID_Vehicule, commentaire, statut) VALUES (:idClient, :idVehicule, :avis, 'En attente')";
            $insert_statement = $database->prepare($insert_query);
            $insert_statement->bindParam(':idClient', $idClient);
            $insert_statement->bindParam(':idVehicule', $idVehicule);
            $insert_statement->bindParam(':avis', $avis);
            $insert_statement->execute();

            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
