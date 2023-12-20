<?php

class GestionVehiculesModel extends ConnexionBdd
{

    public function getVehiculeById($idVehicule)
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT v.*, m.Nom_marque
                        FROM vehicule v
                        INNER JOIN marque m ON v.ID_Marque = m.ID_Marque
                        WHERE ID_Vehicule = :idVehicule";
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

    public function getAllVehicules()
    {
        try {
            $database = $this->connexion();
            $sql_query = "SELECT v.*, m.Nom_marque
                        FROM vehicule v
                        INNER JOIN marque m ON v.ID_Marque = m.ID_Marque";
            $requete = $database->prepare($sql_query);
            $requete->execute();
            $result = $requete->fetchAll(PDO::FETCH_ASSOC);
            $this->deconnexion($database);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function editVehicule($idVehicule, $modele, $version, $annee, $dimensions, $consommation, $moteur, $performance, $prix, $imageVehiculeName, $idMarque)
    {
        try {
            $database = $this->connexion();
            $sql_query = "UPDATE vehicule
                        SET Modele = :modele,
                            Version = :version,
                            Annee = :annee,
                            Dimensions = :dimensions,
                            Consommation = :consommation,
                            Moteur = :moteur,
                            Performance = :performance,
                            Prix = :prix,
                            Image_vehicule = :imageVehiculeName,
                            ID_Marque = :idMarque
                        WHERE ID_Vehicule = :idVehicule";
            echo "
                <script>
                    console.log('{$idMarque}');
                </script>
            ";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idVehicule', $idVehicule);
            $requete->bindParam(':modele', $modele);
            $requete->bindParam(':version', $version);
            $requete->bindParam(':annee', $annee);
            $requete->bindParam(':dimensions', $dimensions);
            $requete->bindParam(':consommation', $consommation);
            $requete->bindParam(':moteur', $moteur);
            $requete->bindParam(':performance', $performance);
            $requete->bindParam(':prix', $prix);
            $requete->bindParam(':imageVehiculeName', $imageVehiculeName);
            $requete->bindParam(':idMarque', $idMarque);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function deleteVehicule($idVehicule)
    {
        try {
            $database = $this->connexion();
            $sql_query = "DELETE FROM vehicule WHERE ID_Vehicule = :idVehicule";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':idVehicule', $idVehicule);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function addVehicule($modele, $version, $annee, $dimensions, $consommation, $moteur, $performance, $prix, $imageVehiculeName, $idMarque)
    {

        try {
            $database = $this->connexion();
            $sql_query = "INSERT INTO vehicule (Modele, Version, Annee, Dimensions, Consommation, Moteur, Performance, Prix, Image_vehicule, ID_Marque)
                        VALUES (:modele, :version, :annee, :dimensions, :consommation, :moteur, :performance, :prix, :imageVehiculeName, :idMarque)";
            $requete = $database->prepare($sql_query);
            $requete->bindParam(':modele', $modele);
            $requete->bindParam(':version', $version);
            $requete->bindParam(':annee', $annee);
            $requete->bindParam(':dimensions', $dimensions);
            $requete->bindParam(':consommation', $consommation);
            $requete->bindParam(':moteur', $moteur);
            $requete->bindParam(':performance', $performance);
            $requete->bindParam(':prix', $prix);
            $requete->bindParam(':imageVehiculeName', $imageVehiculeName);
            $requete->bindParam(':idMarque', $idMarque);
            $requete->execute();
            $this->deconnexion($database);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
