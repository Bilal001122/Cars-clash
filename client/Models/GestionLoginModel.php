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
        }
        $this->deconnexion($database);
        return false;
    }
}
