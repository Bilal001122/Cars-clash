<?php

require_once 'Models/ConnexionBdd.php';
class LoginModel
{
    private $db;

    public function login($email, $password)
    {
        $this->db = new ConnexionBdd();
        $bdd = $this->db->connexion();
        $requete = $bdd->prepare("SELECT * FROM Admins WHERE Email = :email");
        $requete->execute(['email' => $email]);
        if ($requete->rowCount() == 1) {
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = hash('sha256', $password);
            if ($resultat['Mot_de_passe'] === $hashedPassword) {
                session_start();
                $_SESSION['Email'] = $resultat['Email'];
                return true;
            }
        }
        return false;
    }

}
