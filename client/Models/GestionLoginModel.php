<?php
require_once 'Models/ConnexionBdd.php';
class GestionLoginModel extends ConnexionBdd
{
    public function login($email, $password)
    {
        $database = $this->connexion();
        $sql_query = "SELECT * FROM utilisateur WHERE email_utilisateur = :email";
        $requete = $database->prepare($sql_query);
        $requete->execute(['email' => $email]);
        if ($requete->rowCount() == 1) {
            $result = $requete->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = hash('sha256', $password);
            if ($result['Mot_de_passe'] === $hashedPassword && $result['Status_de_validation'] === 'Valide' && $result['bloque'] === 'Non') {
                $this->deconnexion($database);
                return $result;
            }
            if ($result['Status_de_validation'] === 'En attente') {
                $this->deconnexion($database);
                return 'En attente';
            }
            if ($result['bloque'] === 'Oui') {
                $this->deconnexion($database);
                return 'bloque';
            }
        }
        $this->deconnexion($database);
        return false;
    }

    public function register($nom, $prenom, $sexe, $dateNaissance, $email, $password)
    {
        $database = $this->connexion();
        $sql_query = "INSERT INTO utilisateur (Nom_utilisateur, Prenom, Sexe, Date_de_naissance, email_utilisateur, Mot_de_passe, Status_de_validation, bloque) VALUES (:nom, :prenom, :sexe, :dateNaissance, :email, :password, :status, :bloque)";
        $requete = $database->prepare($sql_query);
        $requete->execute(['nom' => $nom, 'prenom' => $prenom, 'sexe' => $sexe, 'dateNaissance' => $dateNaissance, 'email' => $email, 'password' => hash('sha256', $password), 'status' => 'En attente', 'bloque' => 'Non']);
        if ($requete->rowCount() == 1) {
            $this->deconnexion($database);
            return 'success';
        }
        $this->deconnexion($database);
        return false;
    }
}
